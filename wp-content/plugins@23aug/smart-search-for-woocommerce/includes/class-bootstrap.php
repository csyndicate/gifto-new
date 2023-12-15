<?php

namespace Searchanise\SmartWoocommerceSearch;

defined('ABSPATH') || exit;

use Searchanise\Extensions\WcWeglot;
use Searchanise\Extensions\WcSeJetpack;

class Bootstrap
{
    public static function init()
    {
        // Init logger
        add_action('init', function() {
            $GLOBALS['SearchaniseLogger'] = Logger::getInstance(array(
                'log_dir'      => SE_LOG_DIR,
                'log_debug'    => SE_DEBUG_LOG,
                'log_errors'   => SE_ERROR_LOG,
                'output_debug' => SE_DEBUG,
            ));
        });

        if (defined('WP_UNINSTALL_PLUGIN')) {
            return;
        }

        add_action('plugins_loaded', array(__CLASS__, 'pluginLoaded'));
        add_action('wp_dashboard_setup', array(AdminDashboard::class, 'init'));

        // Init Searchanise Async
        add_action('plugins_loaded', array(Async::class, 'init'), ApiSe::LOAD_PRIORITY);

        // Add to cart action
        if (defined('DOING_AJAX') && DOING_AJAX) {
            add_action('wp_ajax_se_ajax_add_to_cart', array(SearchResults::class, 'ajaxAddToCart'));
            add_action('wp_ajax_nopriv_se_ajax_add_to_cart', array(SearchResults::class, 'ajaxAddToCart'));
        }

        // Init Se info
        add_action('wp_ajax_nopriv_se_info', array(Info::class, 'display'));
        add_action('wp_ajax_se_info', array(Info::class, 'display'));
        add_action('init', array(Info::class, 'init'));

        // Init Se cron
        add_filter('cron_schedules', array(Cron::class, 'addIntervals'));
        add_action('wp', array(Cron::class, 'activate'));
        add_action(Cron::CRON_INDEX_EVENT, array(Cron::class, 'indexer'));
        add_action(Cron::CRON_RESYNC_EVENT, array(Cron::class, 'reimporter'));

        // Init hooks
        $GLOBALS['SeHooks'] = new Hooks();

        self::loadExtensions();
    }

    public static function pluginLoaded()
    {
        if (defined('WP_CLI') && WP_CLI) {
            $GLOBALS['SearchaniseCli'] = new CliCommands();

        } elseif (!is_admin() && !defined('DOING_AJAX') && !defined('DOING_CRON')) {
            // Init Searchanise SmartNavigaion
            $GLOBALS['SearchaniseNavigation'] = new Navigation(ApiSe::getInstance()->getLocale());
            // Init Searchanise Recommendations
            $GLOBALS['SearchaniseRecommendations'] = new Recommendations(ApiSe::getInstance()->getLocale());
            // Init fulltext search
            $GLOBALS['SearchaniseSearch'] = new FulltextSearch();
            // Init widgets
            add_action('plugins_loaded', function () {
                $currently_language = ApiSe::getInstance()->getCurrentlyLanguage();
                $GLOBALS['searchanise'] = new SearchResults($currently_language);
            }, ApiSe::POSTPONED_LOAD_PRIORITY);

            Async::init();

        } elseif (is_admin() && !defined('DOING_AJAX') && !defined('DOING_CRON')) {
            $GLOBALS['SearchaniseAdmin'] = new SearchaniseAdmin();
        }
    }

    public static function loadExtensions()
    {
        add_action('plugins_loaded', function() {
            $GLOBALS['WoocommerceSearchaniseWeglot'] = new WcWeglot();
            $GLOBALS['WoocommerceSearchaniseJetpack'] = new WcSeJetpack();
        }, 5);

        register_uninstall_hook(WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'weglot/weglot.php', array(WcWeglot::class, 'uninstallAddon'));
    }
}
