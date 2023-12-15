<?php

namespace Searchanise\SmartWoocommerceSearch;

defined('ABSPATH') || exit;

class AdminSetting
{
    public function init()
    {
        add_action('woocommerce_admin_field_semultiselect', array($this, 'getSemultiselectField'));
        add_filter('woocommerce_admin_settings_sanitize_option_productcategory', array($this, 'sanitizeSemultiselectOption'), 50);
        add_filter('woocommerce_settings_tabs_array', array($this, 'setSettingsTab'), 50);
        add_action('woocommerce_update_options_searchanise_settings', array($this, 'updateSettings'));
        add_filter('woocommerce_sections_searchanise_settings',  array($this, 'setSectionTabs'));
        add_action('woocommerce_settings_searchanise_settings',  array($this, 'getSection'));
    }

    /**
     * Add setting section tabs
     *
     * @param  array $settings_tab
     *
     * @return void
     */
    public function setSectionTabs($settings_tab)
    {
        global $current_section;

        $sections = [
            ''     => 'General',
            'info' => 'Info'
        ];

        echo '<ul class="subsubsub">';

        $array_keys = array_keys($sections);

        foreach ($sections as $id => $label) {
            $url       = admin_url('admin.php?page=wc-settings&tab=searchanise_settings&section=' . sanitize_title($id));
            $class     = ($current_section === $id ? 'current' : '');
            $separator = (end($array_keys) === $id ? '' : '|');
            $text      = esc_html($label);
            echo "<li><a href='$url' class='$class'>$text</a> $separator </li>"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }

        echo '</ul><br class="clear" />';
    }

    /**
     * Output current section
     *
     * @return void
     */
    public function getSection()
    {
        global $current_section, $hide_save_button, $se_need_reindexation;

        // TODO: Fix this
        if ($se_need_reindexation) {
            if (ApiSe::getInstance()->queueImport(null, false)) {
                $se_need_reindexation = false;
                echo '<div id="message" class="updated inline"><p><strong>' . esc_html(__('The product catalog is queued for syncing with Searchanise', 'woocommerce-searchanise')) . '</strong></p></div>';
            }
        }

        if ($current_section == 'info') {
            $hide_save_button = true;
            require_once SE_TEMPLATES_PATH . 'searchanise_settings_info.php';
        } else {
            $this->settingsTab();
        }
    }

    /**
     * Custom type field multiselect
     *
     * @param  array $value
     *
     * @return void
     */
    public function getSemultiselectField($value)
    {
        $custom_attributes = [];
        $option_value = $value['value'];
        $description = $value['desc'] ? '<p class="description">' . wp_kses_post($value['desc']) . '</p>' : false;
        ?>
        <tr valign="top">
            <th scope="row" class="titledesc">
                <label for="<?php echo esc_attr($value['id']); ?>"><?php echo esc_html($value['title']); ?></label>
            </th>
            <td class="forminp forminp-<?php echo esc_attr(sanitize_title($value['type'])); ?>">
                <select name="<?php echo esc_attr($value['field_name']); ?><?php echo '[]'; ?>" id="<?php echo esc_attr($value['id']); ?>" style="<?php echo esc_attr($value['css']); ?>" class="<?php echo esc_attr($value['class']); ?>" <?php echo implode(' ', $custom_attributes); ?>
                    ?> <?php echo 'multiple="multiple"'; ?>>
                    <?php
                    foreach ($value['options'] as $key => $val) {
                    ?>
                        <option value="<?php echo esc_attr($key); ?>" <?php

                            if (is_array($option_value)) {
                                selected(in_array((string) $key, $option_value, true), true);
                            } else {
                                $option_value = explode(',', $option_value);
                                selected(in_array((string) $key, $option_value, true), true);
                            }

                            ?>><?php echo esc_html($val); ?></option>
                    <?php
                    }
                    ?>
                </select> <?php echo $description;
                ?>
            </td>
        </tr>
        <?php
    }

    /**
     * Sanitize data for new settings type
     *
     * @param  array $value
     * @param  array $option
     * @param  array $raw_value
     *
     * @return array $value
     */
    public function sanitizeSemultiselectOption($value, $option, $raw_value)
    {
        $value = array_filter(array_map('wc_clean', (array) $raw_value));

        return $value;
    }

    /**
     * Add_settings_tab to Woocommerce options
     *
     * @param  array $settings_tabs
     *
     * @return array $settings_tabs
     */
    public function setSettingsTab($settings_tabs)
    {
        $settings_tabs['searchanise_settings'] = __('Searchanise', 'woocommerce-searchanise_settings');

        return $settings_tabs;
    }

    /**
     * Update_settings hook save settings
     *
     * @return void
     */
    public function updateSettings()
    {
        woocommerce_update_options($this->getSettings());
    }

    /**
     * Default struct setting_tab
     *
     * @return void
     */
    public function settingsTab()
    {
        woocommerce_admin_fields($this->getSettings());
    }

    /**
     * Get all Searchanise options
     *
     * @return array $settings
     */
    public function getSettings()
    {
        // General settings
        $settings = array(
            'se_page_option_general_start' => array(
                'name'     => __('General', 'woocommerce-searchanise'),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'se_page_option_general'
            ),
            'se_search_input_selector' => array(
                'name'       => __('Search input jQuery selector', 'woocommerce-searchanise'),
                'type'       => 'text',
                'field_name' => 'se_search_input_selector',
                'desc'       => __('Important: Edit only if your custom theme changes the default search input ID!', 'woocommerce-searchanise'),
                'id'         => 'se_search_input_selector',
                'value'      => ApiSe::getInstance()->getSearchInputSelector(),
            ),
            'se_search_result_page' => array(
                'name'       => __('Search results page', 'woocommerce-searchanise'),
                'type'       => 'text',
                'field_name' => 'se_search_result_page',
                'id'         => 'se_search_result_page',
                'value'      => ApiSe::getInstance()->getSearchResultsPage(),
            ),
            'se_enabled_searchanise_search' => array(
                'name' => __('Use Searchanise for Full-text search', 'woocommerce-searchanise'),
                'type' => 'select',
                'desc' => __('Disable in case of invalid search operation. The instant search widget will <b>remain active</b>.', 'woocommerce-searchanise'),
                'id'   => 'se_enabled_searchanise_search',
                'options' => ['Y' => 'Yes', 'N' => 'No'],
            ),
            'se_use_wp_jquery' => array(
                'name'    => __('Use WordPress integrated jQuery version', 'woocommerce-searchanise'),
                'type'    => 'select',
                'desc'    => __('Select "Yes" to use WordPress integrated jQuery version instead of Searchanise CDN version on the frontend of your website. It reduces the traffic and makes the website a little faster.', 'woocommerce-searchanise'),
                'id'      => 'se_use_wp_jquery',
                'options' => ['Y' => 'Yes', 'N' => 'No'],
            ),
            'se_page_option_general_end' => array(
                'type' => 'sectionend',
                'id'   => 'se_page_option_general',
            ),
        );

        // Sync settings
        $settings = array_merge($settings, array(
            'se_sync_settings_start' => array(
                'name'     => __('Synchronisation settings', 'woocommerce-searchanise'),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'se_sync_settings_start'
            ),
            'se_sync_mode' => array(
                'name' => __('Sync catalog', 'woocommerce-searchanise'),
                'type' => 'select',
                'desc' => __('Select <strong>When catalog updates</strong> to keep track of catalog changes and index them automatically.<br>Select <strong>Periodically via cron</strong> to index catalog changes according to "Cron resync interval" setting.<br>Select <strong>Manually</strong> to index catalog changes manually by clicking <i>FORCE RE-INDEXATION</i> button in the Searchanise control panel(<i>Products → Searchanise</i>).', 'woocommerce-searchanise'),
                'id'   => 'se_sync_mode',
                'options' => [
                    ApiSe::SYNC_MODE_REALTIME => __('When catalog updates', 'woocommerce-searchanise'),
                    ApiSe::SYNC_MODE_PERIODIC => __('Periodically via cron', 'woocommerce-searchanise'),
                    ApiSe::SYNC_MODE_MANUAL   => __('Manually', 'woocommerce-searchanise'),
                ],
            )
        ));

        if (ApiSe::getInstance()->isPeriodicSyncMode()) {
            $settings = array_merge($settings, array(
                'se_resync_interval' => array(
                    'name' => __('Cron resync interval', 'woocommerce-searchanise'),
                    'type' => 'select',
                    'desc' => __('Valid only if "Sync catalog" is set to "Periodically via cron"!', 'woocommerce-searchanise'),
                    'id'   => 'se_resync_interval',
                    'options' => [
                        'hourly'     => __('Hourly', 'woocommerce-searchanise'),
                        'twicedaily' => __('Twice in day', 'woocommerce-searchanise'),
                        'daily'      => __('Daily', 'woocommerce-searchanise'),
                    ],
                )
            ));
        }

        $settings = array_merge($settings, array(
            'se_use_direct_image_links' => array(
                'name'    => __('Use direct images links', 'woocommerce-searchanise'),
                'type'    => 'select',
                'desc'    => __('Note: Catalog reindexation will start automatically when value changed.', 'woocommerce-searchanise'),
                'id'      => 'se_use_direct_image_links',
                'options' => ['Y' => 'Yes', 'N' => 'No'],
            ),
            'se_import_block_posts' => array(
                'name'    => __('Import blog posts', 'woocommerce-searchanise'),
                'type'    => 'select',
                'desc'    => __('Select "Yes" if you want Searchanise search by block posts as pages.</br>Note: Catalog reindexation will start automatically when value changed..', 'woocommerce-searchanise'),
                'id'      => 'se_import_block_posts',
                'options' => ['Y' => 'Yes', 'N' => 'No'],
            ),
            'se_color_attribute' => array(
                'name'    => __('Color attribute', 'woocommerce-searchanise'),
                'type'    => 'multiselect',
                'class'   => 'multiselect wc-enhanced-select',
                'id'      => 'se_color_attribute',
                'options' => $this->getOptionValues('product_filters'),
            ),
            'se_size_attribute' => array(
                'name'    => __('Size attribute', 'woocommerce-searchanise'),
                'type'    => 'multiselect',
                'class'   => 'multiselect wc-enhanced-select',
                'id'      => 'se_size_attribute',
                'options' => $this->getOptionValues('product_filters'),
            ),
            'se_sync_settings_end' => array(
                'type' => 'sectionend',
                'id'   => 'se_sync_settings_end',
            ),
            'se_advance_sync_settings_start' => array(
                'name'     => __('Advanced synchronisation settings', 'woocommerce-searchanise'),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'se_advance_sync_settings_start'
            ),
        ));

        $custom_attributes = $this->getOptionValues('custom_attributes');
        $custom_product_fields = $this->getOptionValues('custom_product_fields');

        if (!empty($custom_attributes)) {
            $settings = array_merge($settings, array(
                'se_custom_attribute' => array(
                    'name'    => __('Custom taxonomies', 'woocommerce-searchanise'),
                    'type'    => 'multiselect',
                    'class'   => 'multiselect wc-enhanced-select',
                    'desc'    => __('Select custom product taxonomies to import. Selected taxonomies data will be imported and new filters will be created for them.</br>Note: Catalog reindexation will start automatically when value changed.', 'woocommerce-searchanise'),
                    'id'      => 'se_custom_attribute',
                    'options' => $custom_attributes,
                )
            ));
        }

        if (!empty($custom_product_fields)) {
            $settings = array_merge($settings, array(
                'se_custom_product_fields' => array(
                    'name'    => __('Custom product meta fields', 'woocommerce-searchanise'),
                    'type'    => 'multiselect',
                    'class'   => 'multiselect wc-enhanced-select',
                    'desc'    => 'Select custom product fields to import. Selected fields data will be imported and it will be possible to search for products by them.</br>Note: Catalog reindexation will start automatically when value changed.',
                    'id'      => 'se_custom_product_fields',
                    'options' => $custom_product_fields,
                )
            ));
        }

        $settings = array_merge($settings, array(
            'se_excluded_tags' => array(
                'name'    => __('Exclude products with these tags', 'woocommerce-searchanise'),
                'type'    => 'multiselect',
                'class'   => 'multiselect wc-enhanced-select',
                'desc'    => 'Product with these tags will be excluded from indexation.<br />Note: Catalog reindexation will start automatically when value changed.',
                'id'      => 'se_excluded_tags',
                'options' => $this->getOptionValues('excluded_tags'),
            ),
            'se_excluded_pages' => array(
                'name'    => __('Exclude these pages', 'woocommerce-searchanise'),
                'type'    => 'multiselect',
                'class'   => 'multiselect wc-enhanced-select',
                'desc'    => __('These pages will be excluded from indexation and will not be displayed in search results.<br />Note: Catalog reindexation will start automatically when value changed.', 'woocommerce-searchanise'),
                'id'      => 'se_excluded_pages',
                'options' => $this->getOptionValues('excluded_pages'),
            ),
            'se_excluded_categories' => array(
                'name'    => __('Exclude these categories', 'woocommerce-searchanise'),
                'type'    => 'multiselect',
                'class'   => 'multiselect wc-enhanced-select',
                'desc'    => __('These categories will be excluded from indexation and will not be displayed in search results.<br />Note: Catalog reindexation will start automatically when value changed.', 'woocommerce-searchanise'),
                'id'      => 'se_excluded_categories',
                'options' => $this->getOptionValues('excluded_categories'),
            ),

            'se_advance_sync_settings_end' => array(
                'type' => 'sectionend',
                'id'   => 'se_advance_sync_settings_end'
            ),
            'se_admin_settings_start' => array(
                'name'     => __('Admin settings', 'woocommerce-searchanise'),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'se_admin_settings_start'
            ),
            'se_show_analytics_on_dashboard' => array(
                'name'    => __('Show Smart Search dashboard widget', 'woocommerce-searchanise'),
                'type'    => 'select',
                'desc'    => __('Select "Yes" to display "Smart Search Analytics" widget on dashboard page.', 'woocommerce-searchanise'),
                'id'      => 'se_show_analytics_on_dashboard',
                'options' => ['Y' => 'Yes', 'N' => 'No'],
            ),
            'se_admin_settings_end' => array(
                'type' => 'sectionend',
                'id'   => 'se_admin_settings_end'
            )
        ));

        return apply_filters('wc_settings_tab_searchanise_settings', $settings);
    }

    /**
     * Get Option values for option_name
     *
     * @param  string $option_name
     *
     * @return array $results
     */
    public function getOptionValues($option_name)
    {
        $results = array();

        switch ($option_name) {
            case 'product_filters':
                $options = Async::getInstance()->getAttributeFilters(ApiSe::getInstance()->getLocale());
                break;
            case 'custom_attributes':
                $options = Async::getInstance()->generateCustomProductAttribute();
                break;
            case 'excluded_tags':
                $options = Async::getInstance()->getProductTags(ApiSe::getInstance()->getLocale());
                break;
            case 'excluded_pages':
                $options = $this->getAllPages(ApiSe::getInstance()->getLocale());
                break;
            case 'excluded_categories':
                $options = $this->getAllCategories(ApiSe::getInstance()->getLocale());
                break;
            case 'custom_product_fields':
                $options = Async::getInstance()->getMetaProductTypes();
                break;
            default:
                $options = [];
        }

        if (in_array($option_name, array('excluded_pages', 'excluded_categories'))) {
            foreach ($options as $slug => $title) {
                $results = array_merge($results, [$slug => $title]);
            }
        } elseif ($option_name == 'custom_product_fields') {
            foreach ($options as $option) {
                $results = array_merge($results, [$option->name => $option->label]);
            }
        } else {
            foreach ($options as $option) {
                $results = array_merge($results, [$option['name'] => $option['label']]);
            }
        }

        return $results;
    }

    /**
     * Returns all pages for system settings
     *
     * @param string $lang_code Language code
     *
     * @return array
     */
    public function getAllPages($lang_code)
    {
        $pages = array();

        $posts = get_posts(array(
            'post_type'   => Async::getPostTypes(),
            'numberposts' => -1,
        ));

        foreach ($posts as $post) {
            $pages[$post->post_name] = $post->post_title;
        }

        return (array) apply_filters('se_get_all_pages', $pages, $lang_code);
    }

    /**
     * Returns all categories for system settings
     *
     * @param string $lang_code Language code
     *
     * @return array
     */
    public function getAllCategories($lang_code)
    {
        $categories = array();

        $terms = get_terms('product_cat');

        foreach ($terms as $term) {
            $categories[$term->slug] = $term->name;
        }

        return (array) apply_filters('se_get_all_categories', $categories, $lang_code);
    }
}
