<?php


define( 'MINIMOG_FRAMEWORK_DIR', get_stylesheet_directory() . DIRECTORY_SEPARATOR . 'framework' );



require_once ABSPATH . "wp-config.php";
require_once ABSPATH . "wp-includes/wp-db.php";
require_once ABSPATH . "wp-admin/includes/taxonomy.php";

//require_once('stripe/vendor/autoload.php');

//files for media_sideload_image
require_once ABSPATH . "wp-admin/includes/media.php";
require_once ABSPATH . "wp-admin/includes/file.php";
require_once ABSPATH . "wp-admin/includes/image.php";
require_once "ding-functions/ding-functions.php";

// Include acf.php
include_once(ABSPATH.'wp-content/plugins/advanced-custom-fields-pro/acf.php');

add_action("wp_enqueue_scripts", "my_theme_enqueue_styles");
function my_theme_enqueue_styles()
{
    $parenthandle = "twentytwenty-style";
    $theme = wp_get_theme();
    wp_enqueue_style(
        $parenthandle,
        get_template_directory_uri() . "/style.css",
        [],
        $theme->parent()->get("Version")
    );
    wp_enqueue_style(
        "child-style",
        get_stylesheet_uri(),
        [$parenthandle],
        $theme->get("Version")
    );
    wp_enqueue_style(
        "tooltip-main",
        "https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/css/tooltipster.min.css"
    );
    wp_enqueue_style(
        "tooltip-light-theme",
        "https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/css/themes/tooltipster-light.min.css"
    );

    wp_enqueue_style(
        "fontawsome",
        "https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    );

    wp_enqueue_style(
        "select2css",
        "https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"
    );
    wp_enqueue_style(
        "customcss",
        get_stylesheet_directory_uri() . "/customcss.css"
    );

    // wp_enqueue_script('jqcustomlib', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', 'jQuery', '', true);
    wp_enqueue_script(
        "custom",
        get_stylesheet_directory_uri() . "/custom.js",
        "jQuery",
        "",
        true
    );
    wp_enqueue_script(
        "slect2js",
        "https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js",
        "jQuery",
        "",
        true
    );
    wp_enqueue_script(
        "wc-blockui",
        "https://malsup.github.io/jquery.blockUI.js",
        ["jquery"],
        "0.01",
        true
    );
    wp_enqueue_script(
        "tooltip",
        "https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js",
        ["jquery"],
        "0.01",
        true
    );
}



// Only show products in the front-end search results

function __search_by_title_only($search, &$wp_query)
{
    global $wpdb;

    if (empty($search)) {
        return $search;
    } // skip processing - no search term in query

    $q = $wp_query->query_vars;
    $n = !empty($q["exact"]) ? "" : "%";

    $search = $searchand = "";

    foreach ((array) $q["search_terms"] as $term) {
        $term = esc_sql(like_escape($term));
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = " AND ";
    }

    if (!empty($search)) {
        $search = " AND ({$search}) ";
        if (!is_user_logged_in()) {
            $search .= " AND ($wpdb->posts.post_password = '') ";
        }
    }

    return $search;
}
add_filter("posts_search", "__search_by_title_only", 500, 2);

add_filter("pre_get_posts", "search_filter_pages");
function search_filter_pages($query)
{
    // Frontend search only

    if (!is_admin() && $query->is_search() && $query->is_main_query()) {
        $query->set("post_type", "product");
        $query->set("wc_query", "product_query");
    } elseif (is_shop() && $query->is_main_query()) {
        if (
            isset($_GET["filterc_country"]) &&
            $_GET["filterc_country"] != "" &&
            $_GET["filterc_country"] != "all_cnt"
        ) {
            // My criteria
            if ($_GET["filterc_country"] == "global") {
                $query->set("p", 5400);
            } else {
                $meta_query[] = [
                    "key" => "rwd_product_country",
                    "value" => $_GET["filterc_country"],
                    "compare" => "=",
                ];

                // Set the meta query to the complete, altered query
                $query->set("meta_query", $meta_query);
            }
        }

        //categories are commented now
        // if(isset($_GET['category_filter']) && $_GET['category_filter']){
        //  $query->set('product_cat',$_GET['category_filter']);
        // }
    }

    return $query;
}
//Change the 'Billing details' checkout label to 'Contact Information'
function wc_billing_field_strings($translated_text, $text, $domain)
{
    switch ($translated_text) {
        case "Billing details":
            $translated_text = __(
                "Please Enter Your Billing details",
                "woocommerce"
            );
            break;
    }
    return $translated_text;
}
add_filter("gettext", "wc_billing_field_strings", 20, 3);

//for checkout fields
add_filter("woocommerce_checkout_fields", "misha_remove_fields", 9999);
function misha_remove_fields($woo_checkout_fields_array)
{
    unset(
        $woo_checkout_fields_array["billing"]["billing_address_1"]["required"]
    );
    unset($woo_checkout_fields_array["billing"]["billing_city"]["required"]);
    unset($woo_checkout_fields_array["billing"]["billing_state"]["required"]); // remove state field
    unset(
        $woo_checkout_fields_array["billing"]["billing_postcode"]["required"]
    ); // remove zip code field

    return $woo_checkout_fields_array;
}

//short code for carticon
add_shortcode("woo_cart_but", "woo_cart_but");
function woo_cart_but()
{
    ob_start();

    $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
    $cart_url = wc_get_cart_url();
    // Set Cart URL
    ?>

    <div class="cart-icon-global">
        <a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
            <i class="fas fa-shopping-cart"></i>
            <?php if ($cart_count > 0) { ?>
                <span class="cart-contents-count" id="mini-cart-count"><?php echo $cart_count; ?></span>
            <?php } ?>
        </a>
    </div>
    <?php return ob_get_clean();
}
// update cart count on ajax like on cart page update
add_filter("woocommerce_add_to_cart_fragments", "wc_refresh_mini_cart_count");
function wc_refresh_mini_cart_count($fragments)
{
    ob_start();
    $items_count = WC()->cart->get_cart_contents_count();
    ?>
    <span class="cart-contents-count" id="mini-cart-count"><?php echo $items_count
     ? $items_count
     : ""; ?></span>            
    <?php
    $fragments["#mini-cart-count"] = ob_get_clean();
    return $fragments;
}

//for removing the sortbyprice options from product listing page
add_filter("woocommerce_catalog_orderby", "_remove_default_sorting_options");
function _remove_default_sorting_options($options)
{
    // unset( $options[ 'popularity' ] );
    //unset( $options[ 'menu_order' ] );
    //unset( $options[ 'rating' ] );
    //unset( $options[ 'date' ] );
    unset($options["price"]);
    unset($options["price-desc"]);
    return $options;
}

//customize the no products found message
add_action(
    "woocommerce_no_products_found",
    function () {
        remove_action(
            "woocommerce_no_products_found",
            "wc_no_products_found",
            10
        );

        // HERE change your message below
        $message = __(
            "Sorry, none available. Please check & use our global gift cards for this country. *T&C apply",
            "woocommerce"
        );
        echo '<p class="woocommerce-info">' . $message . "</p>";
    },
    9
);

// START to show product tabs of discription or disclosure
if (class_exists("acf") && class_exists("WooCommerce")) {
    add_filter("woocommerce_product_tabs", function ($tabs) {
        global $post, $product; // Access to the current product or post
        $prd_disclosure = get_field("product_disclosure", $post->ID);
        // if(!isset($prd_disclosure) || $prd_disclosure==""){
        //  return;
        // }

        if (isset($prd_disclosure) && $prd_disclosure != "") {
            $custom_tab_title = "Disclosure";

            if (!empty($custom_tab_title)) {
                $tabs["awp-" . sanitize_title($custom_tab_title)] = [
                    "title" => $custom_tab_title,
                    "callback" => "awp_custom_woocommerce_tabs",
                    "priority" => 10,
                ];
            }
        }
        return $tabs;
    });

    function awp_custom_woocommerce_tabs($key, $tab)
    {
        global $post;

        $custom_tab_contents = get_field("product_disclosure", $post->ID);
        echo $custom_tab_contents;
    }
}
// END to show product tabs of discription or disclosure

//for showing discountpercentage in product page
remove_action(
    "woocommerce_single_product_summary",
    "woocommerce_template_single_title",
    5
);
function woocommerce_add_custom_text_before_product_title()
{
    global $product;
    $product_id = $product->get_id();

    if (get_field("custom_discount", $product_id)) {
        echo '<div class="entry-product-badges product-badges product-badges-label" bis_skin_checked="1"><div class="vi-sctv-sale-badge onsale" bis_skin_checked="1"><span>-' .
            get_field("custom_discount", $product_id) .
            "%</span></div></div>";
    } elseif (get_field("product_discount", $product_id)) {
        echo '<div class="entry-product-badges product-badges product-badges-label" bis_skin_checked="1"><div class="vi-sctv-sale-badge onsale" bis_skin_checked="1"><span>-' .
            get_field("product_discount", $product_id) .
            "%</span></div></div>";
    }

    the_title('<h3 class="product_title entry-title">' . $custom_text, "</h3>");
}
add_action(
    "woocommerce_single_product_summary",
    "woocommerce_add_custom_text_before_product_title",
    5
);

//END for showing discountpercentage in product page
function add_povider_des($provider)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL =>
            "https://api.dingconnect.com/api/V1/GetProviders/?providerCodes=" .
            $provider,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "api_key: KJIE4QYvKk95YVUTqCzl9v",
            "Cookie: visid_incap_1694192=/GFjcyk9QCOLEPJazG6zavnZz2IAAAAAQUIPAAAAAADIZLCa+SmmK+YX1cP7z8uY; __cf_bm=ncFPbme8lA8iqD5r5X2t57mnzF6VS9G7e6ZLk9m3rTM-1661426745-0-AftF0L9Ne8tKw4fMqAdVo69UCe1gvDuCh+sEq/aa/db8NNdcW/0+bGQ8bB0djquERQYa7SNQN3Va9FnBxKBRqUk=",
        ],
    ]);

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    curl_close($curl);
    /*  echo "<pre>";
print_r ($response);
echo "</pre>";  */
    $product_name = $response["Items"][0]["Name"];
    //echo $name;
    $product_logo = $response["Items"][0]["LogoUrl"];
    //echo $logo;

    $return_array = [$product_name, $product_logo];
    return $return_array;
}

function addDingProduct($prd_info_array)
{
    $provi_prd = add_povider_des($prd_info_array["ProviderCode"]);

    $rwd_product_exists = get_posts([
        "numberposts" => -1,
        "post_type" => "product",
        "meta_key" => "product_type",

        "meta_value" => $prd_info_array["SkuCode"],
        "fields" => "ids",
    ]);

    if ($rwd_product_exists) {
        update_ding_prd($rwd_product_exists[0], $prd_info_array);
        $ret_array = [
            "code" => "2",
            "message" => "Product Already Exists",
            "SkuCode" => $rwd_product_exists[0],
        ];
        return $ret_array;
    }
    //

    //adding the ADD Dingproduct with API returned ID
    $rwd_desc = $prd_info_array["DefaultDisplayText"];
    if ($rwd_desc == "") {
        $rwd_desc = " ";
    }

    $rwd_prd_post = [
        "post_type" => "product",
        "post_status" => "publish",
        "post_title" => $provi_prd[0],
        "post_content" => $prd_info_array["DefaultDisplayText"],
    ];
    $inserted_post_id = wp_insert_post($rwd_prd_post, true);

    if (is_wp_error($inserted_post_id)) {
        $ret_array = [
            "code" => "3",
            "message" => "Product not inserted " . $inserted_post_id,
        ];
        return $ret_array;
    } else {
        //create common category for order API
        $cat_exists_cmn = term_exists("egifts-plus", "product_cat");
        if (!$cat_exists_cmn) {
            $insert_cmn_cat = wp_insert_term(
                "egifts-plus", // the term
                "product_cat", // the taxonomy
                [
                    "description" =>
                        "Common Ding Gift Tremendous API Product Category",
                ]
            );
            $cmn_cat_id = $insert_cmn_cat["term_id"];
        } else {
            $cmn_cat_id = $cat_exists_cmn["term_id"];
        }

        //create category if not present and assign or added ding API product to it.
        if ($prd_info_array["categories"] != "") {
            $api_products_catgs = explode(",", $prd_info_array["categories"]);
            $catgs_to_add = [];
            $catgs_exixts = [];

            foreach ($api_products_catgs as $api_products_catgs_val) {
                $cat_exists = term_exists(
                    $api_products_catgs_val,
                    "product_cat"
                );

                if ($cat_exists) {
                    $catgs_exixts[] = (int) $cat_exists["term_id"];
                } else {
                    $inserted_cat = wp_insert_term(
                        $api_products_catgs_val, // the term
                        "product_cat", // the taxonomy
                        [
                            "description" => "Reward Product Form Xoxo API",
                        ]
                    );

                    if (!is_wp_error($inserted_cat)) {
                        $catgs_to_add[] = (int) $inserted_cat["term_id"];
                    }
                }
            }

            $assign_catgs = array_merge($catgs_to_add, $catgs_exixts);
            $assign_catgs[] = (int) $cmn_cat_id;
            wp_set_object_terms(
                $inserted_post_id,
                $assign_catgs,
                "product_cat"
            );
        }

        //when product added, update the meta_data
        wp_set_object_terms($inserted_post_id, "simple", "product_type");
        wp_set_object_terms($inserted_post_id, "egifts-plus", "product_cat");
        wp_set_object_terms($inserted_post_id, "realtime", "product_tag");
        update_post_meta(
            $inserted_post_id,
            "_sku",
            $prd_info_array["SkuCode"] . "D"
        );

        update_post_meta($inserted_post_id, "_virtual", "yes");
        update_post_meta($inserted_post_id, "_regular_price", "1");
        update_post_meta($inserted_post_id, "_price", "1");
        update_field("fromproduct_type", "Ding Api", $inserted_post_id);
        update_field(
            "rwd_product_api_id",
            $prd_info_array["SkuCode"],
            $inserted_post_id
        );
        update_field("rwd_product_api_image", $provi_prd[1], $inserted_post_id);
        update_field(
            "rwd_product_currency",
            $prd_info_array["Minimum"]["SendCurrencyIso"],
            $inserted_post_id
        );
        update_field(
            "rwd_product_country",
            $prd_info_array["RegionCode"],
            $inserted_post_id
        );
        update_field(
            "product_disclosure",
            $prd_info_array["termsAndConditionsInstructions"],
            $inserted_post_id
        );
        update_field(
            "delivery_type",
            $prd_info_array["ProcessingMode"],
            $inserted_post_id
        );
        update_field(
            "deliverytime",
            $prd_info_array["tatInDays"],
            $inserted_post_id
        );
        update_field(
            "redemptionmechanism",
            $prd_info_array["RedemptionMechanism"],
            $inserted_post_id
        );

        if ($prd_info_array["discount"] > 0) {
            update_field(
                "product_discount",
                $prd_info_array["discount"],
                $inserted_post_id
            );
        }

        if (
            isset($prd_info_array["description"]) &&
            $prd_info_array["description"] != ""
        ) {
            $update_post_cont = [
                "ID" => $inserted_post_id,
                "post_content" => $prd_info_array["description"],
            ];
            // Update the post into the database
            wp_update_post($update_post_cont);
        }

        $row = [
            "min_sku" => $prd_info_array["Minimum"]["SendValue"],
            "max_sku" => $prd_info_array["Maximum"]["SendValue"],
        ];
        add_row("skus", $row, $inserted_post_id);
         fifu_dev_set_image($inserted_post_id,$provi_prd[1]);
        

        $ret_array = [
            "code" => "1",
            "message" =>
                "Product added successfully. Product ID: " . $inserted_post_id,
        ];
        return $ret_array;
    }
}

function update_ding_prd($product_id, $prd_info_array)
{
    $provi_prd = add_povider_des($prd_info_array["ProviderCode"]);
    //print_r($provi_prd);
    //echo $prd_info_array['ProviderCode'].'<br><br/>';
    //echo $prd_info_array['SkuCode'].'<br>';
    //removing existing categories
    $terms = get_the_terms($product_id, "product_cat");
    foreach ($terms as $term) {
        wp_remove_object_terms($product_id, $term->term_id, "product_cat");
    }
    //END removing existing categories

    //create common category for order API
    $cat_exists_cmn = term_exists("egifts-plus", "product_cat");
    if (!$cat_exists_cmn) {
        $insert_cmn_cat = wp_insert_term(
            "egifts-plus", // the term
            "product_cat", // the taxonomy
            [
                "description" =>
                    "Common Ding Gift Tremendous API Product Category",
            ]
        );
        $cmn_cat_id = $insert_cmn_cat["term_id"];
    } else {
        $cmn_cat_id = $cat_exists_cmn["term_id"];
    }

    //create category if not present and assign or added reward API product to it.
    if ($prd_info_array["categories"] != "") {
        $api_products_catgs = explode(",", $prd_info_array["categories"]);
        $catgs_to_add = [];
        $catgs_exixts = [];

        foreach ($api_products_catgs as $api_products_catgs_val) {
            $cat_exists = term_exists($api_products_catgs_val, "product_cat");

            if ($cat_exists) {
                $catgs_exixts[] = (int) $cat_exists["term_id"];
            } else {
                $inserted_cat = wp_insert_term(
                    $api_products_catgs_val, // the term
                    "product_cat" // the taxonomy
                    /* array(
                    'description'=> 'Reward Product Form Xoxo API',
                  ) */
                );

                $catgs_to_add[] = (int) $inserted_cat["term_id"];
            }
        }

        $assign_catgs = array_merge($catgs_to_add, $catgs_exixts);
        $assign_catgs[] = (int) $cmn_cat_id;
        wp_set_object_terms($product_id, $assign_catgs, "product_cat");
    }

    //when product added, update the meta_data

    wp_set_object_terms($product_id, "simple", "product_type");
    wp_set_object_terms($product_id, "egifts-plus", "product_cat");
    wp_set_object_terms($product_id, "realtime", "product_tag");
    update_post_meta($product_id, "_virtual", "yes");
    update_post_meta(
        $inserted_post_id,
        "_sku",
        $prd_info_array["SkuCode"] . "D"
    );
    update_post_meta($product_id, "_regular_price", "1");
    update_post_meta($product_id, "_price", "1");
    update_field("fromproduct_type", "Ding Api", $product_id);
    update_field("rwd_product_api_id", $prd_info_array["SkuCode"], $product_id);
    update_field("rwd_product_api_image", $provi_prd[1], $product_id);
    update_field(
        "rwd_product_currency",
        $prd_info_array["Minimum"]["SendCurrencyIso"],
        $product_id
    );
    update_field(
        "rwd_product_country",
        $prd_info_array["RegionCode"],
        $product_id
    );
    update_field(
        "product_disclosure",
        $prd_info_array["termsAndConditionsInstructions"],
        $product_id
    );
    update_field(
        "delivery_type",
        $prd_info_array["ProcessingMode"],
        $product_id
    );
    update_field("deliverytime", $prd_info_array["tatInDays"], $product_id);
    update_field(
        "redemptionmechanism",
        $prd_info_array["RedemptionMechanism"],
        $product_id
    );

    if ($prd_info_array["discount"] > 0) {
        update_field(
            "product_discount",
            $prd_info_array["discount"],
            $inserted_post_id
        );
    }

    if (
        isset($prd_info_array["description"]) &&
        $prd_info_array["description"] != ""
    ) {
        $update_post_cont = [
            "ID" => $product_id,
            "post_content" => $prd_info_array["description"],
        ];
        // Update the post into the database
        wp_update_post($update_post_cont);
    }

    //deleting current rows
    $images = get_field("skus", $product_id);
    if (!empty($images)) {
        $count = count($images);
        for ($index = 1; $index <= $count; $index++) {
            delete_row("images", $index, $product_id);
        }
    }
    //END deleting current rows

    if ($prd_info_array["valueType"] == "fixed_denomination") {
        $denominations_array = explode(
            ",",
            $prd_info_array["valueDenominations"]
        );

        foreach ($denominations_array as $key_sku => $value_sku) {
            $row = [
                "min_sku" => $denominations_array[$key_sku],
                "max_sku" => $denominations_array[$key_sku],
            ];
            add_row("skus", $row, $inserted_post_id);
        }
    } elseif ($prd_info_array["valueType"] == "open_value") {
        $row = [
            "min_sku" => $prd_info_array["Minimum"]["SendValue"],
            "max_sku" => $prd_info_array["Maximum"]["SendValue"],
        ];
        add_row("skus", $row, $inserted_post_id);
    }
    /* $row = array(
                'min_sku' => $prd_info_array['Minimum']['SendValue'],
                'max_sku' => $prd_info_array['Maximum']['SendValue']
            ); */
    add_row("skus", $row, $inserted_post_id);

    //uploading and adding the feature image to the post
    fifu_dev_set_image($product_id,$provi_prd[1]);
}

function addRewardProduct($prd_info_array)
{
    // echo $prd_info_array['productId']."<br><br>";
    // check if the rwdProduct already exixts
    $rwd_product_exists = get_posts([
        "numberposts" => -1,
        "post_type" => "product",
        "meta_key" => "rwd_product_api_id",
        "meta_value" => $prd_info_array["productId"],
        "fields" => "ids",
    ]);

    if ($rwd_product_exists) {
        update_reward_prd($rwd_product_exists[0], $prd_info_array);
        $ret_array = [
            "code" => "2",
            "message" => "Product Already Exists",
            "productId" => $rwd_product_exists[0],
        ];
        return $ret_array;
    }
    //adding the rewardproduct with API returned ID
    $rwd_desc = $prd_info_array["description"];
    if ($rwd_desc == "") {
        $rwd_desc = " ";
    }

    $rwd_prd_post = [
        "post_type" => "product",
        "post_status" => "publish",
        "post_title" => $prd_info_array["name"],
        "post_content" => $prd_info_array["description"],
    ];
    $inserted_post_id = wp_insert_post($rwd_prd_post, true);
    //print_r($inserted_post_id);

    if (is_wp_error($inserted_post_id)) {
        $ret_array = [
            "code" => "3",
            "message" => "Product not inserted " . $inserted_post_id,
        ];
        return $ret_array;
    } else {
        //create common category for order API
        $cat_exists_cmn = term_exists("egifts", "product_cat");
        if (!$cat_exists_cmn) {
            $insert_cmn_cat = wp_insert_term(
                "egifts", // the term
                "product_cat", // the taxonomy
                [
                    "description" =>
                        "Common Reward Tremendous API Product Category",
                ]
            );
            $cmn_cat_id = $insert_cmn_cat["term_id"];
        } else {
            $cmn_cat_id = $cat_exists_cmn["term_id"];
        }

        //create category if not present and assign or added reward API product to it.
        if ($prd_info_array["categories"] != "") {
            $api_products_catgs = explode(",", $prd_info_array["categories"]);
            $catgs_to_add = [];
            $catgs_exixts = [];

            foreach ($api_products_catgs as $api_products_catgs_val) {
                $cat_exists = term_exists(
                    $api_products_catgs_val,
                    "product_cat"
                );

                if ($cat_exists) {
                    $catgs_exixts[] = (int) $cat_exists["term_id"];
                } else {
                    $inserted_cat = wp_insert_term(
                        $api_products_catgs_val, // the term
                        "product_cat", // the taxonomy
                        [
                            "description" => "Reward Product Form Xoxo API",
                        ]
                    );

                    if (!is_wp_error($inserted_cat)) {
                        $catgs_to_add[] = (int) $inserted_cat["term_id"];
                    }
                }
            }

            $assign_catgs = array_merge($catgs_to_add, $catgs_exixts);
            $assign_catgs[] = (int) $cmn_cat_id;
            wp_set_object_terms(
                $inserted_post_id,
                $assign_catgs,
                "product_cat"
            );
        }

        //when product added, update the meta_data
        wp_set_object_terms($inserted_post_id, "simple", "product_type");
        wp_set_object_terms(
            $inserted_post_id,
            $prd_info_array["deliveryType"],
            "product_tag"
        );
        wp_set_object_terms($inserted_post_id, "egifts", "product_cat");

        update_post_meta(
            $inserted_post_id,
            "_sku",
            "827" . $prd_info_array["productId"] . "P"
        );
        update_post_meta($inserted_post_id, "_virtual", "yes");
        update_post_meta($inserted_post_id, "_regular_price", "1");
        update_post_meta($inserted_post_id, "_price", "1");
        update_field("fromproduct_type", "XOXO", $inserted_post_id);
        update_field(
            "rwd_product_api_id",
            $prd_info_array["productId"],
            $inserted_post_id
        );
        update_field(
            "rwd_product_api_image",
            $prd_info_array["imageUrl"],
            $inserted_post_id
        );
        update_field(
            "rwd_product_currency",
            $prd_info_array["currencyCode"],
            $inserted_post_id
        );
        update_field(
            "rwd_product_country",
            $prd_info_array["countryCode"],
            $inserted_post_id
        );
        update_field(
            "product_disclosure",
            $prd_info_array["termsAndConditionsInstructions"],
            $inserted_post_id
        );
        update_field(
            "delivery_type",
            $prd_info_array["deliveryType"],
            $inserted_post_id
        );
        update_field(
            "deliverytime",
            $prd_info_array["tatInDays"],
            $inserted_post_id
        );

        if ($prd_info_array["discount"] > 0) {
            update_field(
                "product_discount",
                $prd_info_array["discount"],
                $inserted_post_id
            );
        }

        if (
            isset($prd_info_array["description"]) &&
            $prd_info_array["description"] != ""
        ) {
            $update_post_cont = [
                "ID" => $inserted_post_id,
                "post_content" => $prd_info_array["description"],
            ];
            // Update the post into the database
            wp_update_post($update_post_cont);
        }

        if ($prd_info_array["valueType"] == "fixed_denomination") {
            $denominations_array = explode(
                ",",
                $prd_info_array["valueDenominations"]
            );

            foreach ($denominations_array as $key_sku => $value_sku) {
                $row = [
                    "min_sku" => $denominations_array[$key_sku],
                    "max_sku" => $denominations_array[$key_sku],
                ];
                add_row("skus", $row, $inserted_post_id);
            }
        } elseif ($prd_info_array["valueType"] == "open_value") {
            $row = [
                "min_sku" => $prd_info_array["minValue"],
                "max_sku" => $prd_info_array["maxValue"],
            ];
            add_row("skus", $row, $inserted_post_id);
        }
        //Insert thimbnail image
        fifu_dev_set_image($inserted_post_id,$prd_info_array["imageUrl"]);
        $ret_array = [
            "code" => "1",
            "message" =>
                "Product added successfully. Product ID: " . $inserted_post_id,
        ];
        return $ret_array;
    }
}

function update_reward_prd($product_id, $prd_info_array)
{
    //removing existing categories
    $terms = get_the_terms($product_id, "product_cat");
    foreach ($terms as $term) {
        wp_remove_object_terms($product_id, $term->term_id, "product_cat");
    }
    //END removing existing categories

    //create common category for order API
    $cat_exists_cmn = term_exists("egifts", "product_cat");
    if (!$cat_exists_cmn) {
        $insert_cmn_cat = wp_insert_term(
            "egifts", // the term
            "product_cat", // the taxonomy
            [
                "description" =>
                    "Common Reward Tremendous API Product Category",
            ]
        );
        $cmn_cat_id = $insert_cmn_cat["term_id"];
    } else {
        $cmn_cat_id = $cat_exists_cmn["term_id"];
    }

    //create category if not present and assign or added reward API product to it.
    if ($prd_info_array["categories"] != "") {
        $api_products_catgs = explode(",", $prd_info_array["categories"]);
        $catgs_to_add = [];
        $catgs_exixts = [];

        foreach ($api_products_catgs as $api_products_catgs_val) {
            $cat_exists = term_exists($api_products_catgs_val, "product_cat");

            if ($cat_exists) {
                $catgs_exixts[] = (int) $cat_exists["term_id"];
            } else {
                $inserted_cat = wp_insert_term(
                    $api_products_catgs_val, // the term
                    "product_cat", // the taxonomy
                    [
                        "description" => "Reward Product Form Xoxo API",
                    ]
                );

                $catgs_to_add[] = (int) $inserted_cat["term_id"];
            }
        }

        $assign_catgs = array_merge($catgs_to_add, $catgs_exixts);
        $assign_catgs[] = (int) $cmn_cat_id;
        wp_set_object_terms($product_id, $assign_catgs, "product_cat");
    }

    //when product added, update the meta_data
    wp_set_object_terms($product_id, "simple", "product_type");
    wp_set_object_terms(
        "product_tag",
        $prd_info_array["deliveryType"],
        $product_id
    );
    wp_set_object_terms($inserted_post_id, "egifts", "product_cat");
    update_post_meta(
        $product_id,
        "_sku",
        "827" . $prd_info_array["productId"] . "P"
    );
    update_post_meta($product_id, "_regular_price", "1");
    update_post_meta($product_id, "_price", "1");
    update_field("fromproduct_type", "XOXO", $product_id);
    update_field(
        "rwd_product_api_id",
        $prd_info_array["productId"],
        $product_id
    );
    update_field(
        "rwd_product_api_image",
        $prd_info_array["imageUrl"],
        $product_id
    );
    update_field(
        "rwd_product_currency",
        $prd_info_array["currencyCode"],
        $product_id
    );
    update_field(
        "rwd_product_country",
        $prd_info_array["countryCode"],
        $product_id
    );
    update_field(
        "product_disclosure",
        $prd_info_array["termsAndConditionsInstructions"],
        $product_id
    );
    update_field("delivery_type", $prd_info_array["deliveryType"], $product_id);
    update_field("deliverytime", $prd_info_array["tatInDays"], $product_id);
    if ($prd_info_array["discount"] > 0) {
        update_field(
            "product_discount",
            $prd_info_array["discount"],
            $inserted_post_id
        );
    }

    if (
        isset($prd_info_array["description"]) &&
        $prd_info_array["description"] != ""
    ) {
        $update_post_cont = [
            "ID" => $product_id,
            "post_content" => $prd_info_array["description"],
        ];
        // Update the post into the database
        wp_update_post($update_post_cont);
    }

    //deleting current rows
    $images = get_field("skus", $product_id);
    if (!empty($images)) {
        $count = count($images);
        for ($index = 1; $index <= $count; $index++) {
            delete_row("images", $index, $product_id);
        }
    }
    //END deleting current rows

    if ($prd_info_array["valueType"] == "FIXED") {
        $denominations_array = explode(
            ",",
            $prd_info_array["valueDenominations"]
        );

        foreach ($denominations_array as $key_sku => $value_sku) {
            $row = [
                "min_sku" => $denominations_array[$key_sku],
                "max_sku" => $denominations_array[$key_sku],
            ];
            add_row("skus", $row, $product_id);
        }
    } elseif ($prd_info_array["valueType"] == "RANGE") {
        $row = [
            "min_sku" => $prd_info_array["minValue"],
            "max_sku" => $prd_info_array["maxValue"],
        ];
        add_row("skus", $row, $product_id);
    }
//upload thumbnail image
    fifu_dev_set_image($product_id,$prd_info_array["imageUrl"]);
}

//////////////////////////////////ADD RELOADLY PRODUCTS//////////////////////////////////////

function addreloadlyProduct($prd_info_array)
{
    
    $rwd_product_exists = get_posts([
        "numberposts" => -1,
        "post_type" => "product",
        "meta_key" => "rwd_product_api_id",
        "meta_value" => $prd_info_array["productId"],
        "fields" => "ids",
    ]);

    if ($rwd_product_exists) {
        update_giftcard_prd($rwd_product_exists[0], $prd_info_array);
        $ret_array = [
            "code" => "2",
            "message" => "Product Already Exists",
            "SkuCode" => $rwd_product_exists[0],
        ];
        return $ret_array;
    }
    //

    //adding the ADD ReloadlyProduct with API returned ID
    $rwd_desc = $prd_info_array["redeemInstruction"]["verbose"];
    if ($rwd_desc == "") {
        $rwd_desc = " ";
    }

    $rwd_prd_post = [
        "post_type" => "product",
        "post_status" => "publish",
        "post_title" => $prd_info_array["productName"],
        "post_content" => $prd_info_array["redeemInstruction"]["verbose"],
    ];
    $inserted_post_id = wp_insert_post($rwd_prd_post, true);

    if (is_wp_error($inserted_post_id)) {
        $ret_array = [
            "code" => "3",
            "message" => "Product not inserted " .$inserted_post_id,
        ];
        return $ret_array;
    } else {
        //create common category for order API
        $cat_exists_cmn = term_exists("gifto", "product_cat");
        if (!$cat_exists_cmn) {
            $insert_cmn_cat = wp_insert_term(
                "gifto", // the term
                "product_cat", // the taxonomy
                [
                    "description" =>
                        "Common Reloadly Gift Tremendous API Product Category",
                ]
            );
            $cmn_cat_id = $insert_cmn_cat["term_id"];
        } else {
            $cmn_cat_id = $cat_exists_cmn["term_id"];
        }

        //create category if not present and assign or added ding API product to it.
        if ($prd_info_array["categories"] != "") {
            $api_products_catgs = explode(",", $prd_info_array["categories"]);
            $catgs_to_add = [];
            $catgs_exixts = [];

            foreach ($api_products_catgs as $api_products_catgs_val) {
                $cat_exists = term_exists(
                    $api_products_catgs_val,
                    "product_cat"
                );

                if ($cat_exists) {
                    $catgs_exixts[] = (int) $cat_exists["term_id"];
                } else {
                    $inserted_cat = wp_insert_term(
                        $api_products_catgs_val, // the term
                        "product_cat", // the taxonomy
                        [
                            "description" => "Reward Product Form Relodly API",
                        ]
                    );

                    if (!is_wp_error($inserted_cat)) {
                        $catgs_to_add[] = (int) $inserted_cat["term_id"];
                    }
                }
            }

            $assign_catgs = array_merge($catgs_to_add, $catgs_exixts);
            $assign_catgs[] = (int) $cmn_cat_id;
            wp_set_object_terms(
                $inserted_post_id,
                $assign_catgs,
                "product_cat"
            );
        }

        //when product added, update the meta_data
        wp_set_object_terms($inserted_post_id, "simple", "product_type");
        wp_set_object_terms(
            $inserted_post_id,
            $prd_info_array["brand"]["brandName"],
            "product_tag "
        );
        wp_set_object_terms($inserted_post_id, "gifto", "product_cat");
        //wp_set_object_terms( $inserted_post_id, 'productId', '_sku' );

        //fixedRecipientToSenderDenominationsMap
        update_post_meta($inserted_post_id, "_virtual", "yes");
        update_post_meta($inserted_post_id, "fixedRecipientDenominations", "1");
        update_post_meta($inserted_post_id, "_price", "1");
        update_post_meta(
            $inserted_post_id,
            "_sku",
            "347" . $prd_info_array["productId"] . "R"
        );

        update_field("fromproduct_type", "reloadly", $inserted_post_id);
        update_field(
            "rwd_product_api_id",
            $prd_info_array["productId"],
            $inserted_post_id
        );

        update_field(
            "rwd_product_api_image",
            $prd_info_array["logoUrls"][0],
            $inserted_post_id
        );
        update_field(
            "rwd_product_currency",
            $prd_info_array["recipientCurrencyCode"],
            $inserted_post_id
        );
        update_field(
            "rwd_product_country",
            $prd_info_array["country"]["isoName"],
            $inserted_post_id
        );

        if ($prd_info_array["discount"] > 0) {
            update_field(
                "product_discount",
                $prd_info_array["discount"],
                $inserted_post_id
            );
        }

        if (
            isset($prd_info_array["redeemInstruction"]["verbose"]) &&
            $prd_info_array["redeemInstruction"]["verbose"] != ""
        ) {
            $update_post_cont = [
                "ID" => $inserted_post_id,
                "post_content" =>
                    $prd_info_array["redeemInstruction"]["verbose"],
            ];
            // Update the post into the database
            wp_update_post($update_post_cont);
        }

        if ($prd_info_array["denominationType"] == "FIXED") {
            $denominations_array =
                $prd_info_array["fixedRecipientDenominations"];
            //print_r($denominations_array);
            foreach ($denominations_array as $key_sku => $value_sku) {
                $row = [
                    "min_sku" => $denominations_array[$key_sku],
                    "max_sku" => $denominations_array[$key_sku],
                ];
                add_row("skus", $row, $inserted_post_id);
            }
        } elseif ($prd_info_array["denominationType"] == "RANGE") {
            $row = [
                "min_sku" => $prd_info_array["minRecipientDenomination"],
                "max_sku" => $prd_info_array["maxRecipientDenomination"],
            ];
            add_row("skus", $row, $inserted_post_id);
        }
        //upload thumbnail image for products
          fifu_dev_set_image($inserted_post_id,$prd_info_array["logoUrls"][0]);
        
        $ret_array = [
            "code" => "1",
            "message" =>
                "Product added successfully. Product ID: " . $inserted_post_id,
        ];
        return $ret_array;
    }
}
//////End add reloady products///////
///////////////////////////////////////UPDATE RELOADLY PRODUCTS/////////////////////////////////////////////////

function update_giftcard_prd($product_id, $prd_info_array)
{
    $terms = get_the_terms($product_id, "product_cat");
    foreach ($terms as $term) {
        wp_remove_object_terms($product_id, $term->term_id, "product_cat");
    }
    //END removing existing categories

    //create common category for order API
    $cat_exists_cmn = term_exists("gifto", "product_cat");
    if (!$cat_exists_cmn) {
        $insert_cmn_cat = wp_insert_term(
            "gifto", // the term
            "product_cat", // the taxonomy
            [
                "description" => "Reloadly giftcard products",
            ]
        );
        $cmn_cat_id = $insert_cmn_cat["term_id"];
    } else {
        $cmn_cat_id = $cat_exists_cmn["term_id"];
    }

    //create category if not present and assign or added reward API product to it.
    if ($prd_info_array["categories"] != "") {
        $api_products_catgs = explode(",", $prd_info_array["categories"]);
        $catgs_to_add = [];
        $catgs_exixts = [];

        foreach ($api_products_catgs as $api_products_catgs_val) {
            $cat_exists = term_exists($api_products_catgs_val, "product_cat");

            if ($cat_exists) {
                $catgs_exixts[] = (int) $cat_exists["term_id"];
            } else {
                $inserted_cat = wp_insert_term(
                    $api_products_catgs_val, // the term
                    "product_cat" // the taxonomyd
                    /* array(
                    'description'=> 'Reward Product Form Xoxo API',
                  ) */
                );

                $catgs_to_add[] = (int) $inserted_cat["term_id"];
            }
        }

        $assign_catgs = array_merge($catgs_to_add, $catgs_exixts);
        $assign_catgs[] = (int) $cmn_cat_id;
        wp_set_object_terms($product_id, $assign_catgs, "product_cat");
    }

    //when product added, update the meta_data

    wp_set_object_terms($product_id, "simple", "product_type");
    wp_set_object_terms($product_id, "gifto", "product_cat");

    wp_set_object_terms(
        $product_id,
        $prd_info_array["brand"]["brandName"],
        "product_tag"
    );
    update_post_meta($product_id, "_virtual", "yes");
    update_post_meta($product_id, "_regular_price", "1");
    update_post_meta(
        $product_id,
        "_sku",
        "347" . $prd_info_array["productId"] . "R"
    );

    update_post_meta($product_id, "_price", "1");
    //update_post_meta($product_id, 'sku', 'r');
    update_field("fromproduct_type", "reloadly", $inserted_post_id);
    update_field(
        "rwd_product_api_id",
        $prd_info_array["productId"],
        $inserted_post_id
    );
    update_field(
        "rwd_product_api_image",
        $prd_info_array["logoUrls"][0],
        $product_id
    );

    update_field(
        "rwd_product_currency",
        $prd_info_array["recipientCurrencyCode"],
        $inserted_post_id
    );
    update_field(
        "rwd_product_country",
        $prd_info_array["country"]["isoName"],
        $inserted_post_id
    );
    //update_field('product_disclosure', $prd_info_array['redeemInstruction']['verbose'], $inserted_post_id);

    if ($prd_info_array["discount"] > 0) {
        update_field(
            "product_discount",
            $prd_info_array["discount"],
            $inserted_post_id
        );
    }

    if (
        isset($prd_info_array["description"]) &&
        $prd_info_array["description"] != ""
    ) {
        $update_post_cont = [
            "ID" => $product_id,
            "post_content" => $prd_info_array["description"],
        ];
        // Update the post into the database
        wp_update_post($update_post_cont);
    }

    //deleting current rows
    $images = get_field("skus", $product_id);
    if (!empty($images)) {
        $count = count($images);
        for ($index = 1; $index <= $count; $index++) {
            delete_row("images", $index, $product_id);
        }
    }

    if ($prd_info_array["valueType"] == "fixed_denomination") {
        $denominations_array = explode(
            ",",
            $prd_info_array["valueDenominations"]
        );

        foreach ($denominations_array as $key_sku => $value_sku) {
            $row = [
                "min_sku" => $denominations_array[$key_sku],
                "max_sku" => $denominations_array[$key_sku],
            ];
            add_row("skus", $row, $product_id);
        }
    } elseif ($prd_info_array["valueType"] == "open_value") {
        $row = [
            "min_sku" => $prd_info_array["minValue"],
            "max_sku" => $prd_info_array["maxValue"],
        ];
        add_row("skus", $row, $product_id);
    }

    fifu_dev_set_image($product_id,$prd_info_array["logoUrls"][0]);
}

////end reloadly plugin//////

// define the woocommerce_thankyou callback
function action_woocommerce_thankyou($order_get_id)
{
    global $product;
    ob_start();

    global $product;

    $order = wc_get_order($order_get_id);
      $billing_phone  = $order->get_billing_phone();
      //print_r($billing_phone);
      //print_r($billing_phone);
      
      // check if API already run for the order
    $api_run = get_field("reward_api_run", $order_get_id);
    if ($api_run) {
        return;
    }

    $reward_products = [];
    // The loop to get the order items which are WC_Order_Item_Product objects since WC 3+
    $order_itr = 1;
    $pending = 0;
    $api_statuses = [];
    $delivery_statuses = [];
    $po_numbers = [];
    $ding_delivery_sts = [];
    $ding_prdct_err = [];
    $ding_type_prd = [];

    $log_file_content = "";
    $root_path = ABSPATH;
    $created_reward_order = fopen(
        $root_path . "add_xoxo_prodsorder_logs.txt",
        "a+"
    );

    $log_file_content .= "\n";
    $log_file_content .= "\n";
    $log_file_content .= "Order ID: " . $order_get_id;
    $log_file_content .= "\n";
    $log_file_content .=
        "Total Reward Products/Orders: " . count($order->get_items());
    $log_file_content .= "\n";
    $log_file_content .=
        "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
    $log_file_content .= "\n";
    $log_file_content .= date("Y-m-d h:i:sa");
    $log_file_content .= "\n";

    foreach ($order->get_items() as $item_id => $item) {
        $product_id = $item->get_product_id();

        $product_type = get_field(
            "fromproduct_type",
            $product_id,
            "Product Type"
        );
        //echo $product_type;
        if ($product_type == "XOXO") {
            //echo "1";
            if (has_term("egifts", "product_cat", $product_id)) {
                //echo "s";
                $prdids_api = get_field("rwd_product_api_id", $product_id);
                $prd_quantity = $item->get_quantity();
                // $order_phone = $reward_products[$rp_key]['prdphone'];
                $ro_ponumber = $order_get_id . "-" . $order_itr;
                $ro_email = $item->get_meta("_tchknwdev_rwdemail");
                $ro_phone = $item->get_meta("_tchknwdev_rwdnumv");
                $ro_phone1 = $item->get_meta("_tchknwdev_rwdnumv_num");
                $denom_evaluate = explode(
                    "_",
                    $item->get_meta("_tchknwdev_rwdprice")
                );
                $ro_denomination = $denom_evaluate[0];

                $xoxo_access_token = get_field("access_token", "option");

                $curl = curl_init();

                $api_url_temp = get_field("api_url", "option");
                $api_url = $api_url_temp . "/v1/oauth/api";

                curl_setopt_array($curl, [
                    CURLOPT_URL => $api_url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS =>
                        '{
                    "query": "plumProAPI.mutation.placeOrder",
                    "tag": "plumProAPI",
                    "variables": {
                        "data":{
                            "productId":"'.$prdids_api.'",
                            "quantity": "'.$prd_quantity.'",
                            "denomination": "'.$ro_denomination.'", 
                            "email":"'.$ro_email.'",
                            "contact":"+'.$ro_phone1.'-'.$ro_phone.'",
                            "tag":"XOXO",
                            "notifyReceiverEmail":"1",
                            "poNumber":"'.$ro_ponumber.'"
                        }
                    }
                }',
                    CURLOPT_HTTPHEADER => [
                        "Content-Type: application/json",
                        "Authorization: Bearer " . $xoxo_access_token . " ",
                    ],
                ]);

                $response = curl_exec($curl);
                $response = json_decode($response);
                 //echo "<pre>";
                   // print_r($response);
                   // echo "</pre>";
                            
                curl_close($curl);
                //TwilioSender($billing_phone);
                $xoxocode =
                 $response->data->placeOrder->data->vouchers[0]->voucherCode;
                 //echo $xoxocode;

                $xoxopin = $response->data->placeOrder->data->vouchers[0]->pin;
                //echo $xoxopin;
                $xoxotrans = $response->data->placeOrder->data->orderId;
                // echo $xoxotrans;
                $xoxocat = "Plumpro";
                $xoxosts = "successful";
                $xoxoamnt = $response->data->placeOrder->data->amountCharged;
                //echo $xoxoamnt;
                //add order and voucher detail
                 
                     
                 
                global $wpdb;
                $tx = time();
                $cr_date = date("Y-m-d H:i:s", $tx);
                $sqlxoxo = $wpdb->insert("vouchercards", [
                    "created_at" => $cr_date,
                    "transaction_id" => $xoxotrans,
                    "api_name" => $xoxocat,
                    "redeem_pin" => $xoxopin,
                    "redeem_code" => $xoxocode,
                    "order_status" => $xoxosts,
                    "amountv" => $xoxoamnt,
                    "brandv" => " ",
                ]);

                $wpdb->query($sqlxoxo);
                //TwilioSender($billing_phone);
           // }
                 
                update_field("reward_api_run", "yes", $order_get_id);
                //update_field( 'product_type', 'XOXO', $order_get_id );
                if ($response->code) {
                    echo "error";
                    $delv_er_mk = $response->error;
                    $er_message_apireturn =
                        $response->errorInfo . " - " . $response->error;
                    $delv_status =
                    $response->data->placeOrder->data->deliveryStatus ;
                    $api_statuses[] = "error: " . $er_message_apireturn;
                    $delivery_statuses[] = "api Error";
                    $po_numbers[] = "api Error";
                    $delivery_statuses_str = implode(",", $delivery_statuses);
                    wc_update_order_item_meta(
                        $item_id,
                        "_tchknwdev_deliverystatus",
                        $delv_er_mk
                    );
                } else {
                    //echo "sucess";
                    $delv_status =
                        $response->data->placeOrder->data->deliveryStatus;
                    //echo $delv_status;
                    $delv_er_mk = $response->error;
                    //echo $delv_er_mk;
                    $api_statuses[] = "success";
                    $delivery_statuses[] = $delv_status;
                    $po_numbers[] = $ro_ponumber;
                    wc_update_order_item_meta(
                        $item_id,
                        "_tchknwdev_deliverystatus",
                        $delv_status
                    );
                    if ($delv_status == "pending") {
                        $pending = 1;
                    }
                }

                //content for log files
                $order_log_message = ["Reward Order Status", $response];
                $log_file_content .= print_r($order_log_message, true);
                $log_file_content .=
                    '{
                    "query": "plumProAPI.mutation.placeOrder",
                    "tag": "plumProAPI",
                    "variables": {
                        "data":{
                            "productId":"' .
                    $prdids_api .
                    '",
                            "quantity": "' .
                    $prd_quantity .
                    '",
                            "denomination": "' .
                    $ro_denomination .
                    '", 
                            "email":"' .
                    $ro_email .
                    '",
                            "contact": "+' .
                    $ro_phone1 .
                    "-" .
                    $ro_phone .
                    '",
                            
                            
                            "tag":"XOXO",
                            "notifyReceiverEmail":"1",
                            "poNumber":"' .
                    $ro_ponumber .
                    '"
                                
                        }
                    }
                }';
                $log_file_content .=
                    "________________________________________________________";
            }
            if ($pending) {
                update_field("delayed_product", "yes", $order_get_id);
            }
            $api_statuses_str = implode(",", $api_statuses);
            update_field("reward_api_status", $api_statuses_str, $order_get_id);

            $delivery_statuses_str = implode(",", $delivery_statuses);
            update_field(
                "order_delivery_status",
                $delivery_statuses_str,
                $order_get_id
            );

            $po_numbers_str = implode(",", $po_numbers);
            update_field("order_po_number", $po_numbers_str, $order_get_id);
        }

        if ($product_type == "Ding Api") {
            if (has_term("egifts-plus", "product_cat", $product_id)) {
                $prdids_api = get_field("rwd_product_api_id", $product_id);

                if (have_rows("skus", $product_id)):
                    // loop through the rows of data
                    while (have_rows("skus", $product_id)):
                        the_row();

                        // display a sub field value
                        //  the_sub_field('sub_field_name');
                        $dindsndvalue = get_sub_field("min_sku", $product_id);
                    endwhile;
                else:
                endif;
                $crncy = get_field("rwd_product_currency", $product_id);

                //$accnumbr=get_field('AccountNumber',$product_id)
                $prd_quantity = $item->get_quantity();
                $order_phone = $ding_products[$rp_key]["prdphone"];
                $ro_number = $order_get_id . "-" . $order_itr;
                $ro_mail = $item->get_meta("_tchknwdev_rwdemail");
                $ro_phone = $item->get_meta("_tchknwdev_rwdnumv");
                $ro_phone1 = $item->get_meta("_tchknwdev_rwdnumv_num");
                $ro_cntry = $item->get_meta("_tchknwdev_rwdnumv_cntry");
                $redmtype = get_field("redemptionmechanism", $product_id);
                //echo $redmtype;
                if ($redmtype == "Immediate") {
                    $dng_numail = $item->get_meta("_tchknwdev_rwdnumv");
                    echo $dng_numail;
                } elseif ($redmtype == "ReadReceipt") {
                    $dng_numail = "0000000000";
                    //echo $dng_numail;die(1);
                }
                // $ro_phone = $dng_numail;
                $denom_evaluates = explode(
                    "_",
                    $item->get_meta("_tchknwdev_rwdprice")
                );
                $ro_denominations = $denom_evaluates[0];

                function secure_random_string($length)
                {
                    $random_string = "";
                    for ($i = 0; $i < $length; $i++) {
                        $number = random_int(0, 36);
                        $character = base_convert($number, 10, 36);
                        $random_string .= $character;
                    }

                    return $random_string;
                }
                $randomNumber = secure_random_string(5);
                $randomname = secure_random_string(10, 17);
                $randvalue = secure_random_string(9, 19);

                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://api.dingconnect.com/api/V1/SendTransfer",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS =>
                        '{
                        "SkuCode": "' .
                        $prdids_api .
                        '",
                        "SendValue": "' .
                        $dindsndvalue .
                        '",
                        "SendCurrencyIso": "' .
                        $crncy .
                        '",
                        "AccountNumber":"' .
                        $dng_numail .
                        '",
                        "DistributorRef": "' .
                        $randomNumber .
                        '",
                        "Settings": [
                        {
                        "Name": "' .
                        $randomname .
                        '",
                        "Value": "' .
                        $randvalue .
                        '"
                        }
                        ],
                        "ValidateOnly": false,
                        "BillRef": "string"
                      }',
                    CURLOPT_HTTPHEADER => [
                        "api_key: KJIE4QYvKk95YVUTqCzl9v",
                        "Content-Type: application/json",
                        "Cookie: visid_incap_1694192=/GFjcyk9QCOLEPJazG6zavnZz2IAAAAAQUIPAAAAAADIZLCa+SmmK+YX1cP7z8uY; __cf_bm=NENhxw8Dz_o3s1CCaYoNGV60ss1HMBeRw_cbeopBbNA-1660728577-0-AQmZ+LQmh8QbJO/h7FElz5ZM/oQKglzjJCp4u6kfAGai6FlJ5EIt+vptq4yQ9/XqpXmUNsjzzhd726rzw7CrGyM=",
                    ],
                ]);

                $response = curl_exec($curl);
                $response = json_decode($response, true);
                //echo "<pre>";
                //print_r($response);
                //echo "</pre>";
              
                //$err = curl_error($curl);
                curl_close($curl);
                 $pin = $response["TransferRecord"]["ReceiptParams"]["pin"];
                // echo $pin;
                $transidding =
                    $response["TransferRecord"]["TransferId"]["TransferRef"];
                    //echo $transidding;
               $statusd = "successful";
               $provider = "Ding";
               $dingamnt =
               $response["TransferRecord"]["Price"]["SendValue"];
                //echo $dingamnt;
                 $dingamnt1 =
                $response["TransferRecord"]["TransferId"]["Price"]["SendValue"];
                //echo $dingamnt1;
                global $wpdb;
                $td = time();
                $c_date = date("Y-m-d H:i:s", $td);
                $sqld = $wpdb->insert("vouchercards", [
                   
                    "transaction_id" => $transidding,
                    "created_at" => $c_date,
                     "order_status" => $statusd,
                    "api_name" => $provider,
                    "redeem_code"=>'',
                    "redeem_pin" => $pin,
                    "brandv" => "",
                    "amountv" => $dingamnt,
                   
                    
                ]);

                $wpdb->query($sqld);

                //echo $pin;
                if ($pin) {
                    //$pin = "1234567";
                    $phoneNumber = $ro_phone;
                    $phoneCode = $ro_phone1;
                    $to = $ro_mail; //sendto@example.com
                   $subject = 'Gifto:Gifting made better-Your reward code is here';
                    $message =' <body style="margin:0;background-color: #f7f7f7;box-sizing: border-box;padding:0;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px auto;width:640px;max-width: 100%;font-family:Montserrat, sans-serif;">
            <tr>
                <td style="text-align: center;">
                <img src="https://gifto.co/wp-content/uploads/2023/01/gifto_mail_logo.png" style="text-align:center;">
            </td>
            </tr>
                <tbody>
                <tr>
                    <td>
                        <!-- header table start -->
                        <table class="header-email" style="width: 100%;padding:0px;background:#ffffff;border-spacing:0px;margin: 25px 0 0;border: 1px solid #dfdfdf;">
                            <tbody>
                                <tr>
                                    <td align="left" style="width: 100%;width: 100%;background: #8054b3;text-align: left;padding: 30px;">
                                        <h1 style="color: #fff;font-size: 28px;font-weight: 400; text-align: center;">your voucher code here</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="width: 100%;width: 100%;background: #fff;text-align: left;padding: 30px;">
                                        <p>Hi there!</p>
                                        <p>Thanks for ordering. Please find below your unique code for redemption.
                                            We hope you will enjoy using it or share it with those who wish to gift it.</p>
                                        <p class="code_class" style ="color:red;"><strong>Your voucher Code:</strong> '.$pin.' </p>
                                        <p>Please check our FAQs, Help section online, or the terms & conditions of usage for this voucher. </p>
                                        <p>If you have any feedback, we would love to hear from you.</p>
                                        <p>Our friendly team is here to help. Reach out via email or chat or by filling in the contact form on our site.</p>
                                        <p>Best!</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <div style="max-width: 602px;margin: auto;padding: 5px 0px 20px 0;">
                            <p style=" text-align:center; border-radius:6px;border:0;color:#8a8a8a;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:0 0 0 0;margin:0;" >
                                *Terms & Conditions apply . Please check <a href="http://www.gifto.co"> http://www.gifto.co </a>for the respective gift card/brand voucher for usage terms and policies.
                            </p>
                            <p style=" text-align:center; border-radius:6px;border:0;color:#8a8a8a;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:0;margin:0;" >
                                Gifto: Gifting made better
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>';
                    
                    $headers = array('Content-Type: text/html; charset=UTF-8');

                    smsTwilio($phoneNumber, $pin, $phoneCode);
                    //TwilioSender($billing_phone);
                    wp_mail($to, $subject, $message, $headers);
                    
                }

                update_field("reward_api_run", "yes", $order_get_id);
                //update_field( 'product_type', 'Ding Api', $order_get_id );
                $status = $response["TransferRecord"]["ProcessingState"];
                //echo $status;
                $prd_errer = $response["ErrorCodes"][0]["Code"];
                if ($status == "failed") {
                    //echo "failed";
                    //$prd_errer = $response['ErrorCodes'][0]['Code'];
                    //echo $prd_errer;
                    $del_status =
                        $response["TransferRecord"]["ProcessingState"];
                    $ding_message_apireturn =
                        $response["ErrorCodes"][0]["Code"] .
                        " - " .
                        $response["ErrorCodes"];
                    $api_statuses[] = "error: " . $ding_message_apireturn;
                    $ding_delivery_sts[] = "api Error";
                    $po_numbers[] = "api Error";
                    $ding_prdct_err[] =
                        $product_id . "error type:" . $prd_errer;
                } else {
                    //  echo "succes";
                    $tpty = $response["Items"]["RedemptionMechanism"];
                    //echo $tpty;
                    $del_status =
                        $response["TransferRecord"]["ProcessingState"];
                    //  echo $del_status;
                    $api_statuses[] = "success";
                    $ding_type_prd[] = "type" . $tpty;
                    $ding_delivery_sts[] = $product_id . "-" . $del_status;
                    $po_numbers[] = $ro_number;
                    $complt = "complete";
                    if ($prd_errer) {
                        $ding_prdct_err[] = $product_id . "-" . $prd_errer;
                    } else {
                        $ding_prdct_err[] = $product_id . "-" . $complt;
                    }
                    wc_update_order_item_meta(
                        $item_id,
                        "_tchknwdev_deliverystatus",
                        $del_status
                    );
                    if ($del_status == "pending") {
                        $pending = 1;
                    }
                }

                //content for log files
                $order_log_message = ["Ding Order Status", $response];
                $log_file_content .= print_r($order_log_message, true);
                $log_file_content .=
                    "________________________________________________________";
                $log_file_content .=
                    '{
                        "SkuCode": "' .
                    $prdids_api .
                    '",
                        "SendValue": ' .
                    $dindsndvalue .
                    ',
                        "SendCurrencyIso": "' .
                    $crncy .
                    '",
                        "AccountNumber":"' .
                    $dng_numail .
                    '",
                        "DistributorRef": "' .
                    $randomNumber .
                    '",
                        "Settings": [
                        {
                        "Name": "' .
                    $randomname .
                    '",
                        "Value": "' .
                    $randvalue .
                    '"
                        }
                        ],
                        "ValidateOnly": false,
                        "BillRef": "string"
                      }';
                $ding_delivery_sts_str = implode(",", $ding_delivery_sts);
                update_field(
                    "devivery_status",
                    $ding_delivery_sts_str,
                    $order_get_id
                );
                $ding_prdct_err_str = implode(",", $ding_prdct_err);
                update_field("error", $ding_prdct_err_str, $order_get_id);
            }
        }

        // SMS and Mail Functionality After order for a
        if ($product_type == "reloadly") {
            if (has_term("gifto", "product_cat", $product_id)) {
                $prdids_api = get_field("rwd_product_api_id", $product_id);

                if (have_rows("skus", $product_id)):
                    // loop through the rows of data
                    while (have_rows("skus", $product_id)):
                        the_row();

                        // display a sub field value
                        //  the_sub_field('sub_field_name');
                        $dindsndvalue = get_sub_field("min_sku", $product_id);
                    endwhile;
                else:
                endif;
                $crncy = get_field("rwd_product_currency", $product_id);

                //$accnumbr=get_field('AccountNumber',$product_id)
                $prd_quantity = $item->get_quantity();
                $order_phone = $echo_products[$rp_key]["prdphone"];
                $ro_number = $order_get_id . "-" . $order_itr;
                $ro_mail = $item->get_meta("_tchknwdev_rwdemail");
                $ro_phone = $item->get_meta("_tchknwdev_rwdnumv");
                $ro_phone1 = $item->get_meta("_tchknwdev_rwdnumv_num");
                $ro_cntry = $item->get_meta("_tchknwdev_rwdnumv_cntry");
                //$unit =$prd_info_array['minRecipientDenomination'];
                //$redmtype =get_field('redemptionmechanism', $product_id);

                //echo $redmtype;
                if ($redmtype == "Immediate") {
                    $dng_numail = $item->get_meta("_tchknwdev_rwdnumv");
                    //echo $dng_numail;
                } elseif ($redmtype == "ReadReceipt") {
                    $dng_numail = "0000000000";
                    //echo $dng_numail;die(1);
                }
                // $ro_phone = $dng_numail;
                $denom_evaluates = explode(
                    "_",
                    $item->get_meta("_tchknwdev_rwdprice")
                );
                $ro_denominations = $denom_evaluates[0];

                function secure_random_string($length)
                {
                    $random_string = "";
                    for ($i = 0; $i < $length; $i++) {
                        $number = random_int(0, 36);
                        $character = base_convert($number, 10, 36);
                        $random_string .= $character;
                    }

                    return $random_string;
                }
                $randomNumber = secure_random_string(5);
                $randomname = secure_random_string(10, 17);
                $randvalue = secure_random_string(9, 19);
                
                
                

                $gacess_token1 = get_field("gaccess_token", "option");
                $curl = curl_init();

                $gapi_url_temp1 = get_field("gapi_url", "option");
                $gapi_url1 = $gapi_url_temp1 . "/orders";
                
                curl_setopt_array($curl, [
                    CURLOPT_URL => $gapi_url1,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS =>
                        '{
        "productId": "'.$prdids_api.'",
        "countryCode": "'.$crncy.'",
        "quantity": "'.$prd_quantity.'",
         "unitPrice": "'.$ro_denominations.'",
         "recipientEmail": "'.$ro_mail.'",
         "recipientPhoneDetails": {
          "countryCode": "'.$ro_cntry.'",
          "phoneNumber": "+'.$ro_phone1.$ro_phone.',"
        }
    
       }',
                    CURLOPT_HTTPHEADER => [
                        "Authorization: Bearer ".$gacess_token1." ",
                        "Content-Type: application/json",
                    ],
                ]);

                $response = curl_exec($curl);
                //TwilioSender($billing_phone);
               //echo '<pre>';
               // print_r($response);
               //echo '</pre>';
                
               $transaction_id = json_decode($response, true)["transactionId"];

                $prodnme = json_decode($response, true)["product"][
                    "productName"
                ];
                 $patsts = json_decode($response, true)["status"];
                //echo $patsts;
                $mailsts = "pending";
                $mailing1 = json_decode($response, true)["recipientEmail"];
               $tran_created_time = json_decode($response, true)[
                    "transactionCreatedTime"
                ];

                //echo $mailing1;
                $ttlprc = json_decode($response, true)["product"]["totalPrice"];
                //echo $ttlprc;
               $curncy = json_decode($response, true)["product"][
                    "currencyCode"
                ];
                $brand = json_decode($response, true)["product"]["brand"][
                    "brandName"
                ];
                $amountaed = json_decode($response, true)["amount"];
                //echo $curncy;

                curl_close($curl);
                //TwilioSender($billing_phone);
                global $wpdb;

                $sql12 = $wpdb->insert("transaction_status", [
                    "transaction_time" => $tran_created_time,
                    "transaction_id" => $transaction_id,
                    "product_name" => $prodnme,
                    "currency" => $curncy,
                    "price" => $ttlprc,
                    "payment_status" => $patsts,
                    "mail_status" => $mailsts,
                    "receivedmail" => $mailing1,
                    "brandname" => $brand,
                    "amount" => $amountaed,
                ]);
                $wpdb->query($sql12);
            }
            
        }
        
        $order_itr++;
         
        
    }
       //$billing_phone = $order->get_billing_phone();
        // print_r("gfhfhfhg");
        //print_r($billing_phone);
//TwilioSender($billing_phone);
   // TwilioSender($billing_phone);
    fwrite($created_reward_order, $log_file_content);
    fclose($created_reward_order);
    
}

add_action("woocommerce_thankyou", "action_woocommerce_thankyou", 10, 1);

///End SMS and  Mail For Reloadly
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//for csutom price of reward products
// Step 1: Adding Custom Field for Product
add_action(
    "woocommerce_before_add_to_cart_button",
    "tchknwdev_add_custom_fields"
);
function tchknwdev_add_custom_fields()
{
    global $product;
    ob_start();

    global $product;
    ?>
    <?php
 $product_type = get_field("fromproduct_type", $product->id);
 if ($product_type == "XOXO") {

     $deliverytype = get_field("delivery_type", $product->id);
     if ($deliverytype == "delayed") { ?>
            <div class="delivery-type">
                <p><strong>NOTE: </strong>This is a delayed Product. This Product Will be Delivered after <?php the_field(
        "deliverytime",
        $product->id
    ); ?> Days of purchasing.</p>
            </div>
        <?php }
     ?>
    <div class="custom-price-buttons"> 
        <p>The prices below are in <strong><?php the_field('rwd_product_currency', $product->id) ?></strong>. 
            <?php 
                $prd_curr = get_field('rwd_product_currency', $product->id);
                if($prd_curr!="AED"): ?>
                    The Prices will get converted to equivalent value in <strong>AED</strong> at checkout.
                <?php endif; ?>
        </p>
        <p>Please select one of the below prices for your gift.</p>
        <p class="rwd-common-error rwd-error"></p>
        <?php if (have_rows("skus", $product->id)):
      // Loop through rows.
      while (have_rows("skus", $product->id)):
          the_row();
          $min_sku = get_sub_field("min_sku");
          $max_sku = get_sub_field("max_sku");
          if ($min_sku == $max_sku) { ?>
                    <button data-range="0"><?php echo $min_sku; ?></button>
                <?php } else { ?>
                    <button data-range="1"><?php echo $min_sku . "-" . $max_sku; ?></button>
                <?php }
      endwhile;
  endif; ?>
    </div>
        <div class="tchknwdev-custom-fields for-rwdprice" style="display: none;">
            <label>Enter the selected price range</label>
            <p class="rwd-range-error rwd-error"></p>
            <input type="text" name="tchknwdev_rwdprice" required>
        </div>
        <div class="tchknwdev-custom-fields for-rwdemail">
            <label>Enter email ID of the person you want to gift to:</label>
            <p class="rwd-email-error rwd-error"></p>
            <input type="text" name="tchknwdev_rwdemail" required>
        </div>
        <div class="tchknwdev-custom-fields for-rwdnumv">
        <label>Enter mobile number of the person you want to gift to:</label>
            <p class="rwd-phone-error rwd-error"></p>
            
        <input id="phone" type="tel" name="tchknwdev_rwdnumv" >
        <input type="hidden" name="tchknwdev_rwdnumv_num" id="code" >
        <input type="hidden" name="tchknwdev_rwdnumv_cntry" id="country" />
            
            </div>      
        <div class="tchknwdev-custom-fields for-rwdorgcurrency">
            <input type="hidden" name="tchknwdev_rwdorgcurrency" value="<?php the_field(
                "rwd_product_currency",
                $product->id
            ); ?>">
        </div>
        <div class="clear"></div>

    <?php
    $content = ob_get_contents();
    ob_end_flush();
    return $content;

 }
 if ($product_type == "reloadly") {

     $deliverytype = get_field("delivery_type", $product->id);
     if ($deliverytype == "delayed") { ?>
            <div class="delivery-type">
                <p><strong>NOTE: </strong>This is a delayed Product. This Product Will be Delivered after <?php the_field(
        "deliverytime",
        $product->id
    ); ?> Days of purchasing.</p>
            </div>
        <?php }
     ?>
    
    <div class="custom-price-buttons"> 
        <p>The prices below are in <strong><?php the_field('rwd_product_currency', $product->id) ?></strong>. 
            <?php 
                $prd_curr = get_field('rwd_product_currency', $product->id);
                if($prd_curr!="AED"): ?>
                    The Prices will get converted to equivalent value in <strong>AED</strong> at checkout.
                <?php endif; ?>
        </p>
        <p>Please select one of the below prices for your gift.</p>
        <p class="rwd-common-error rwd-error"></p>
        <?php if (have_rows("skus", $product->id)):
      // Loop through rows.
      while (have_rows("skus", $product->id)):
          the_row();
          $min_sku = get_sub_field("min_sku");
          $max_sku = get_sub_field("max_sku");
          if ($min_sku == $max_sku) { ?>
                    <button data-range="0"><?php echo $min_sku; ?></button>
                <?php } else { ?>
                    <button data-range="1"><?php echo $min_sku . "-" . $max_sku; ?></button>
                <?php }
      endwhile;
  endif; ?>
    </div>
        <div class="tchknwdev-custom-fields for-rwdprice" style="display: none;">
            <label>Enter the selected price range</label>
            <p class="rwd-range-error rwd-error"></p>
            <input type="text" name="tchknwdev_rwdprice">
        </div>
        <div class="tchknwdev-custom-fields for-rwdemail">
            <label>Enter email ID of the person you want to gift to:</label>
            <p class="rwd-email-error rwd-error"></p>
            <input type="text" name="tchknwdev_rwdemail" required>
        </div>
        <div class="tchknwdev-custom-fields for-rwdnumv">
        <label>Enter mobile number of the person you want to gift to:</label>
            <p class="rwd-phone-error rwd-error"></p>
            
        <input id="phone" type="tel" name="tchknwdev_rwdnumv" >
        <input type="hidden" name="tchknwdev_rwdnumv_num" id="code" />
        <input type="hidden" name="tchknwdev_rwdnumv_cntry" id="country" />
            
            </div>      
        <div class="tchknwdev-custom-fields for-rwdorgcurrency">
            <input type="hidden" name="tchknwdev_rwdorgcurrency" value="<?php the_field(
                "rwd_product_currency",
                $product->id
            ); ?>">
        </div>
        <div class="clear"></div>

    <?php
    $content = ob_get_contents();
    ob_end_flush();
    return $content;

 }

 if ($product_type == "Ding Api") {

     $deliverytype = get_field("delivery_type", $product->id);
     if ($deliverytype == "delayed") { ?>
            <div class="delivery-type">
                <p><strong>NOTE: </strong>This is a delayed Product. This Product Will be Delivered after <?php the_field(
        "deliverytime",
        $product->id
    ); ?> Days of purchasing.</p>
            </div>
        <?php }
     ?>
    <div class="custom-price-buttons"> 
        <p>The prices below are in <strong><?php the_field('rwd_product_currency', $product->id) ?></strong>. 
            <?php 
                $prd_curr = get_field('rwd_product_currency', $product->id);
                if($prd_curr!="AED"): ?>
                    The Prices will get converted to equivalent value in <strong>AED</strong> at checkout.
                <?php endif; ?>
        </p>
        <p>Please select one of the below prices for your gift.</p>
        <p class="rwd-common-error rwd-error"></p>
        <?php if (have_rows("skus", $product->id)):
      // Loop through rows.
      while (have_rows("skus", $product->id)):
          the_row();
          $min_sku = get_sub_field("min_sku");
          $max_sku = get_sub_field("max_sku");
          if ($min_sku == $max_sku) { ?>
                    <button data-range="0"><?php echo $min_sku; ?></button>
                <?php } else { ?>
                    <button data-range="1"><?php echo $min_sku . "-" . $max_sku; ?></button>
                <?php }
      endwhile;
  endif; ?>
    </div>
        <div class="tchknwdev-custom-fields for-rwdprice" style="display: none;">
            <label>Enter the selected price range</label>
            <p class="rwd-range-error rwd-error"></p>
            <input type="text" name="tchknwdev_rwdprice">
        </div>
        <?php $product_type = get_field("redemptionmechanism");
     //if($product_type == 'ReadReceipt'){
     ?>
        <div class="tchknwdev-custom-fields for-rwdemail">
            <label>Enter email ID of the person you want to gift to:</label>
            <p class="rwd-email-error rwd-error"></p>
            <input type="text" name="tchknwdev_rwdemail"  required>
        </div>
        <? //}else if($product_type == 'Immediate'){?>
        <div class="tchknwdev-custom-fields for-rwdnumv">
            <label>Enter mobile number of the person you want to gift to:</label>
            <p class="rwd-phone-error rwd-error"></p>
            <input id="phone" type="tel" name="tchknwdev_rwdnumv" >
         <input type="hidden" name="tchknwdev_rwdnumv_num" id="code" />
        <input type="hidden" name="tchknwdev_rwdnumv_cntry" id="country" />
        
        </div>
        <? // } ?>
        <div class="tchknwdev-custom-fields for-rwdorgcurrency">
            <input type="hidden" name="tchknwdev_rwdorgcurrency" value="<?php the_field(
                "rwd_product_currency",
                $product->id
            ); ?>">
        </div>
        <div class="clear"></div>
     
    <?php
    $content = ob_get_contents();
    ob_end_flush();
    return $content;

 }
}
// Step 2: Add Customer Data to WooCommerce Cart
add_filter("woocommerce_add_cart_item_data", "tchknwdev_add_item_data", 10, 3);
function tchknwdev_add_item_data($cart_item_data, $product_id, $variation_id)
{
    if (isset($_REQUEST["tchknwdev_rwdprice"])) {
        $cart_item_data["tchknwdev_rwdprice"] = sanitize_text_field(
            $_REQUEST["tchknwdev_rwdprice"]
        );
    }

    if (isset($_REQUEST["tchknwdev_rwdemail"])) {
        $cart_item_data["tchknwdev_rwdemail"] = sanitize_text_field(
            $_REQUEST["tchknwdev_rwdemail"]
        );
    }
    if (isset($_REQUEST["tchknwdev_rwdnumv"])) {
        $cart_item_data["tchknwdev_rwdnumv"] = sanitize_text_field(
            $_REQUEST["tchknwdev_rwdnumv"]
        );
    }

    if (isset($_REQUEST["tchknwdev_rwdnumv_num"])) {
        $cart_item_data["tchknwdev_rwdnumv_num"] = sanitize_text_field(
            $_REQUEST["tchknwdev_rwdnumv_num"]
        );
    }

    if (isset($_REQUEST["tchknwdev_rwdnumv_cntry"])) {
        $cart_item_data["tchknwdev_rwdnumv_cntry"] = sanitize_text_field(
            $_REQUEST["tchknwdev_rwdnumv_cntry"]
        );
    }
    if (isset($_REQUEST["tchknwdev_rwdorgcurrency"])) {
        $cart_item_data["tchknwdev_rwdorgcurrency"] = sanitize_text_field(
            $_REQUEST["tchknwdev_rwdorgcurrency"]
        );
    }

    return $cart_item_data;
}

//Step Custom: Custom Step to update the price
function set_reward_product_price($cart_object)
{
    // if( !WC()->session->__isset( "reload_checkout" )) {
    /* Gift wrap price */

    foreach ($cart_object->cart_contents as $key => $value) {
        if (isset($value["tchknwdev_rwdprice"])) {
            $reward_price = $value["tchknwdev_rwdprice"];
            $org_currency = $value["tchknwdev_rwdorgcurrency"];

            $org_currency = explode(",", $org_currency);
            $user_currency_code = getLocationInfoByIp();
            $user_currency_code = $user_currency_code["currencyCode"];
            if (!in_array($user_currency_code, $org_currency)) {
                $user_currency_code = $org_currency[0];
            }

            $converted_price1 = convertCurrency(
                $reward_price,
                $user_currency_code,
                "AED"
            );
            $converted_price = $converted_price1;

            $prd_id = $value["product_id"];
            
            if (get_field("custom_discount", $prd_id)) {
                $discount_amount = get_field("custom_discount", $prd_id);
                $converted_price =
                    $converted_price -
                    $converted_price * ($discount_amount / 100);
            } elseif (get_field("product_discount", $prd_id)) {
                $discount_amount = get_field("product_discount", $prd_id);
                $converted_price =
                    $converted_price -
                    $converted_price * ($discount_amount / 100);
            }

            $value["data"]->set_price($converted_price);
        }
    }
    // }
}
add_action(
    "woocommerce_before_calculate_totals",
    "set_reward_product_price",
    99
);

// Step 3: Display Details as Meta in Cart
add_filter("woocommerce_get_item_data", "wdm_add_item_meta", 10, 2);
function wdm_add_item_meta($item_data, $cart_item)
{
    if (array_key_exists("tchknwdev_rwdprice", $cart_item)) {
        $custom_details = $cart_item["tchknwdev_rwdprice"];

        $ro_orgcurrency = explode(",", $cart_item["tchknwdev_rwdorgcurrency"]);
        $user_currency_code = getLocationInfoByIp();
        $user_currency_code = $user_currency_code["currencyCode"];
        if (!in_array($user_currency_code, $ro_orgcurrency)) {
            $user_currency_code = $ro_orgcurrency[0];
        }

        $item_data[] = [
            "key" => "Reward Price",
            "value" => $custom_details . "_" . $user_currency_code,
        ];
    }

    if (array_key_exists("tchknwdev_rwdemail", $cart_item)) {
        $custom_details = $cart_item["tchknwdev_rwdemail"];

        $item_data[] = [
            "key" => "Reward Sent to: ",
            "value" => $custom_details,
        ];
    }
    // else
    if (array_key_exists("tchknwdev_rwdnumv", $cart_item)) {
        $custom_details = $cart_item["tchknwdev_rwdnumv"];

        $item_data[] = [
            "key" => "Reward Sent to: ",
            "value" => $custom_details,
        ];
    }
    return $item_data;
}

//Step4: step 3 for displaying the data on cart page skipped
//  this step will add the data that is the meta data to the order
add_action(
    "woocommerce_checkout_create_order_line_item",
    "tchknwdev_add_custom_order_line_item_meta",
    10,
    4
);
function tchknwdev_add_custom_order_line_item_meta(
    $item,
    $cart_item_key,
    $values,
    $order
) {
    if (array_key_exists("tchknwdev_rwdprice", $values)) {
        $ro_orgcurrency = explode(",", $values["tchknwdev_rwdorgcurrency"]);
        $user_currency_code = getLocationInfoByIp();
        $user_currency_code = $user_currency_code["currencyCode"];
        if (!in_array($user_currency_code, $ro_orgcurrency)) {
            $user_currency_code = $ro_orgcurrency[0];
        }

        $item->add_meta_data(
            "_tchknwdev_rwdprice",
            $values["tchknwdev_rwdprice"] . "_" . $user_currency_code
        );
    }

    //echo $ro_orgcurrency;

    if (array_key_exists("tchknwdev_rwdemail", $values)) {
        $item->add_meta_data(
            "_tchknwdev_rwdemail",
            $values["tchknwdev_rwdemail"]
        );
    }

    // else
    if (array_key_exists("tchknwdev_rwdnumv", $values)) {
        $item->add_meta_data(
            "_tchknwdev_rwdnumv",
            $values["tchknwdev_rwdnumv"]
        );
    }
    if (array_key_exists("tchknwdev_rwdnumv_num", $values)) {
        $item->add_meta_data(
            "_tchknwdev_rwdnumv_num",
            $values["tchknwdev_rwdnumv_num"]
        );
    }
    if (array_key_exists("tchknwdev_rwdnumv_cntry", $values)) {
        $item->add_meta_data(
            "_tchknwdev_rwdnumv_cntry",
            $values["tchknwdev_rwdnumv_cntry"]
        );
    }
    $item->add_meta_data("_tchknwdev_deliverystatus", "error");
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

function convertCurrency($amount, $from_currency, $to_currency)
{
    $apikey = "b855209fdc4cc5bee0d6";

    $from_Currency = strtoupper(urlencode($from_currency));
    $to_Currency = strtoupper(urlencode($to_currency));
    $today_date = date("Y-m-d", strtotime("-1 days"));
    $url =
        "https://api.currencyapi.com/v3/convert?currencies=" .
        $to_Currency .
        "&apikey=xqxPPQNhCrGgjuK8ILkQl3AaA3ase3Y9VwwGjS4L&base_currency=" .
        $from_Currency .
        "&date=" .
        $today_date .
        "&value=" .
        $amount;
    // echo $url;

    // echo "https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}";
    // die();
    // change to the free URL if you're using the free version
    $json = file_get_contents($url);

    $obj = json_decode($json, true);

    $val = floatval($obj["data"]["AED"]["value"]);

    $total = $val;
    // $total = 55;
    return number_format($total, 2, ".", "");
}

//to get all the unique meta field with key
function _get_all_meta_values($key)
{
    global $wpdb;
    $result = $wpdb->get_col(
        $wpdb->prepare(
            "
            SELECT DISTINCT pm.meta_value FROM {$wpdb->postmeta} pm
            LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
            WHERE pm.meta_key = '%s' 
            AND p.post_status = 'publish'
            ORDER BY pm.meta_value",
            $key
        )
    );

    return $result;
}

function get_unique_countries($key = "", $type = "post", $status = "publish")
{
    global $wpdb;

    if (empty($key)) {
        return;
    }

    $r = $wpdb->get_col(
        $wpdb->prepare(
            "
        SELECT DISTINCT pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = %s 
        AND p.post_status = %s 
        AND p.post_type = %s
    ",
            $key,
            $status,
            $type
        )
    );

    return $r;
}

function get_countries($country_code = "")
{
    $code = strtoupper($code);

    $countryList = [
        "AC" => "Ascension Island",
        "AF" => "Afghanistan",
        "AX" => "Aland Islands",
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AS" => "American Samoa",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AQ" => "Antarctica",
        "AG" => "Antigua and Barbuda",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AW" => "Aruba",
        "AU" => "Australia",
        "AT" => "Austria",
        "AZ" => "Azerbaijan",
        "BS" => "Bahamas the",
        "BH" => "Bahrain",
        "BD" => "Bangladesh",
        "BB" => "Barbados",
        "BY" => "Belarus",
        "BE" => "Belgium",
        "BZ" => "Belize",
        "BJ" => "Benin",
        "BM" => "Bermuda",
        "BT" => "Bhutan",
        "BO" => "Bolivia",
        "BA" => "Bosnia and Herzegovina",
        "BW" => "Botswana",
        "BV" => "Bouvet Island (Bouvetoya)",
        "BR" => "Brazil",
        "IO" => "British Indian Ocean Territory (Chagos Archipelago)",
        "VG" => "British Virgin Islands",
        "BN" => "Brunei Darussalam",
        "BG" => "Bulgaria",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "KH" => "Cambodia",
        "CM" => "Cameroon",
        "CA" => "Canada",
        "CV" => "Cape Verde",
        "KY" => "Cayman Islands",
        "CF" => "Central African Republic",
        "TD" => "Chad",
        "CL" => "Chile",
        "CN" => "China",
        "CX" => "Christmas Island",
        "CC" => "Cocos (Keeling) Islands",
        "CO" => "Colombia",
        "KM" => "Comoros the",
        "CD" => "Congo",
        "CG" => "Congo the",
        "CK" => "Cook Islands",
        "CR" => "Costa Rica",
        "CI" => 'Cote d\'Ivoire',
        "HR" => "Croatia",
        "CU" => "Cuba",
        "CY" => "Cyprus",
        "CZ" => "Czech Republic",
        "DK" => "Denmark",
        "DJ" => "Djibouti",
        "DM" => "Dominica",
        "DO" => "Dominican Republic",
        "EC" => "Ecuador",
        "EG" => "Egypt",
        "SV" => "El Salvador",
        "GQ" => "Equatorial Guinea",
        "ER" => "Eritrea",
        "EE" => "Estonia",
        "ET" => "Ethiopia",
        "FO" => "Faroe Islands",
        "FK" => "Falkland Islands (Malvinas)",
        "FJ" => "Fiji the Fiji Islands",
        "FI" => "Finland",
        "FR" => "France, French Republic",
        "GF" => "French Guiana",
        "PF" => "French Polynesia",
        "TF" => "French Southern Territories",
        "GA" => "Gabon",
        "GM" => "Gambia the",
        "GE" => "Georgia",
        "DE" => "Germany",
        "GH" => "Ghana",
        "GI" => "Gibraltar",
        "GR" => "Greece",
        "GL" => "Greenland",
        "GD" => "Grenada",
        "GP" => "Guadeloupe",
        "GU" => "Guam",
        "GT" => "Guatemala",
        "GG" => "Guernsey",
        "GN" => "Guinea",
        "GW" => "Guinea-Bissau",
        "GY" => "Guyana",
        "HT" => "Haiti",
        "HM" => "Heard Island and McDonald Islands",
        "VA" => "Holy See (Vatican City State)",
        "HN" => "Honduras",
        "HK" => "Hong Kong",
        "HU" => "Hungary",
        "IS" => "Iceland",
        "IN" => "India",
        "ID" => "Indonesia",
        "IR" => "Iran",
        "IQ" => "Iraq",
        "IE" => "Ireland",
        "IM" => "Isle of Man",
        "IL" => "Israel",
        "IT" => "Italy",
        "JM" => "Jamaica",
        "JP" => "Japan",
        "JE" => "Jersey",
        "JO" => "Jordan",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KI" => "Kiribati",
        "KP" => "Korea",
        "KR" => "Korea",
        "KW" => "Kuwait",
        "KG" => "Kyrgyz Republic",
        "LA" => "Lao",
        "LV" => "Latvia",
        "LB" => "Lebanon",
        "LS" => "Lesotho",
        "LR" => "Liberia",
        "LY" => "Libyan Arab Jamahiriya",
        "LI" => "Liechtenstein",
        "LT" => "Lithuania",
        "LU" => "Luxembourg",
        "MO" => "Macao",
        "MK" => "Macedonia",
        "MG" => "Madagascar",
        "MW" => "Malawi",
        "MY" => "Malaysia",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malta",
        "MH" => "Marshall Islands",
        "MQ" => "Martinique",
        "MR" => "Mauritania",
        "MU" => "Mauritius",
        "YT" => "Mayotte",
        "MX" => "Mexico",
        "FM" => "Micronesia",
        "MD" => "Moldova",
        "MC" => "Monaco",
        "MN" => "Mongolia",
        "ME" => "Montenegro",
        "MS" => "Montserrat",
        "MA" => "Morocco",
        "MZ" => "Mozambique",
        "MM" => "Myanmar",
        "NA" => "Namibia",
        "NR" => "Nauru",
        "NP" => "Nepal",
        "AN" => "Netherlands Antilles",
        "NL" => "Netherlands the",
        "NC" => "New Caledonia",
        "NZ" => "New Zealand",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigeria",
        "NU" => "Niue",
        "NF" => "Norfolk Island",
        "MP" => "Northern Mariana Islands",
        "NO" => "Norway",
        "OM" => "Oman",
        "PK" => "Pakistan",
        "PW" => "Palau",
        "PS" => "Palestinian Territory",
        "PA" => "Panama",
        "PG" => "Papua New Guinea",
        "PY" => "Paraguay",
        "PE" => "Peru",
        "PH" => "Philippines",
        "PN" => "Pitcairn Islands",
        "PL" => "Poland",
        "PT" => "Portugal, Portuguese Republic",
        "PR" => "Puerto Rico",
        "QA" => "Qatar",
        "RE" => "Reunion",
        "RO" => "Romania",
        "RU" => "Russian Federation",
        "RW" => "Rwanda",
        "BL" => "Saint Barthelemy",
        "SH" => "Saint Helena",
        "KN" => "Saint Kitts and Nevis",
        "LC" => "Saint Lucia",
        "MF" => "Saint Martin",
        "PM" => "Saint Pierre and Miquelon",
        "VC" => "Saint Vincent and the Grenadines",
        "WS" => "Samoa",
        "SM" => "San Marino",
        "ST" => "Sao Tome and Principe",
        "SA" => "Saudi Arabia",
        "SN" => "Senegal",
        "RS" => "Serbia",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapore",
        "SK" => "Slovakia (Slovak Republic)",
        "SI" => "Slovenia",
        "SB" => "Solomon Islands",
        "SO" => "Somalia, Somali Republic",
        "ZA" => "South Africa",
        "GS" => "South Georgia and the South Sandwich Islands",
        "ES" => "Spain",
        "LK" => "Sri Lanka",
        "SD" => "Sudan",
        "SR" => "Suriname",
        "SJ" => "Svalbard & Jan Mayen Islands",
        "SZ" => "Swaziland",
        "SE" => "Sweden",
        "CH" => "Switzerland, Swiss Confederation",
        "SY" => "Syrian Arab Republic",
        "TW" => "Taiwan",
        "TJ" => "Tajikistan",
        "TZ" => "Tanzania",
        "TH" => "Thailand",
        "TL" => "Timor-Leste",
        "TG" => "Togo",
        "TK" => "Tokelau",
        "TO" => "Tonga",
        "TT" => "Trinidad and Tobago",
        "TN" => "Tunisia",
        "TR" => "Turkey",
        "TM" => "Turkmenistan",
        "TC" => "Turks and Caicos Islands",
        "TV" => "Tuvalu",
        "UG" => "Uganda",
        "UA" => "Ukraine",
        "AE" => "United Arab Emirates",
        "GB" => "United Kingdom",
        "US" => "United States of America",
        "UM" => "United States Minor Outlying Islands",
        "VI" => "United States Virgin Islands",
        "UY" => "Uruguay, Eastern Republic of",
        "UZ" => "Uzbekistan",
        "VU" => "Vanuatu",
        "VE" => "Venezuela",
        "VN" => "Vietnam",
        "WF" => "Wallis and Futuna",
        "EH" => "Western Sahara",
        "YE" => "Yemen",
        "ZM" => "Zambia",
        "ZW" => "Zimbabwe",
    ];

    if ($country_code) {
        $upper_case_cc = strtoupper($country_code);
        if (array_key_exists($upper_case_cc, $countryList)) {
            return ["success" => 1, "country" => $countryList[$upper_case_cc]];
        } else {
            return ["success" => 0];
        }
    }

    return $countryList;

    if ($countries_ret = "get_countries") {
        return $countryList;
    } elseif (!$countryList[$code]) {
        return $code;
    } else {
        return $countryList[$code];
    }
}

function getLocationInfoByIp()
{
    $client = @$_SERVER["HTTP_CLIENT_IP"];
    $forward = @$_SERVER["HTTP_X_FORWARDED_FOR"];
    $remote = @$_SERVER["REMOTE_ADDR"];
    $result = ["country" => "", "city" => ""];
    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    $ip_data = @json_decode(
        file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip)
    );
    if ($ip_data && $ip_data->geoplugin_countryName != null) {
        $result["country"] = $ip_data->geoplugin_countryCode;
        $result["city"] = $ip_data->geoplugin_city;
        $result["currencyCode"] = $ip_data->geoplugin_currencyCode;
    }
    return $result;
}

function wpsites_register_woo_widget()
{
    register_sidebar([
        "name" => "Before Products Widget",
        "id" => "before-products",
        "before_widget" => "<div>",
        "after_widget" => "</div>",
    ]);
}

add_action("widgets_init", "wpsites_register_woo_widget");

add_filter("woocommerce_sidebar", "before_products_widget", 25);

function before_products_widget()
{
    // if ( is_product() && is_active_sidebar( 'before-products' ) ) {
    dynamic_sidebar("before-products", [
        "before" => '<div class="before-products">',
        "after" => "</div>",
    ]);

    // }
}
//option page for Reloadly giftcards API Token

add_action("acf/init", "my_acf_op_init_gift");
function my_acf_op_init_gift()
{
    // Check function exists.
    if (function_exists("acf_add_options_page")) {
        //  Register options page.
        $option_page = acf_add_options_page([
            "page_title" => __("Giftcards API Tokens"),
            "menu_title" => __("Giftcards API Tokens"),
            "menu_slug" => "giftcards-api-tokens",
            "capability" => "edit_posts",
            "redirect" => false,
        ]);
    }
}

// end option page for Reloadly giftcards API Token

//Option page for XOXO API TOken
add_action("acf/init", "my_acf_op_init");
function my_acf_op_init()
{
    // Check function exists.
    if (function_exists("acf_add_options_page")) {
        // Register options page.
        $option_page = acf_add_options_page([
            "page_title" => __("XOXO API Tokens"),
            "menu_title" => __("XOXO API Tokens"),
            "menu_slug" => "xoxo-api-tokens",
            "capability" => "edit_posts",
            "redirect" => false,
        ]);
    }
}

// end Option page for XOXO API TOken
function country_filter_dropdown_function()
{
    $shop_page_url = get_permalink(wc_get_page_id("shop"));

    $country_output =
        '<form action="' . $shop_page_url . '" method="get" id="filters-form">';

    $countries = get_countries("rwd_product_country", "ASC");

    $countries_array = [];

    // $countries_array[] = get_countries('in');
    // $countries_array[] = get_countries('us');
    // print_r($countries_array);

    $unique_countries = get_unique_countries("rwd_product_country", "product");
    foreach ($unique_countries as $unique_countrie) {
        $temp_country = get_countries($unique_countrie);

        if ($temp_country["success"]) {
            $countries_array[strtoupper($unique_countrie)] =
                $temp_country["country"];
        }
    }

    if (!empty($countries)):
        $country_output .=
            '<select name="filterc_country" onchange="this.form.submit()">';
        $country_output .= '<option value="">Select Country</option>';
        $country_output .= '<option value="">Show All countries</option>';

        if (
            isset($_GET["filterc_country"]) &&
            $_GET["filterc_country"] == "global"
        ) {
            $selected_gb = 'selected="selected"';
        }
        $countries_data = [];
        foreach ($countries_array as $country_key => $country_val) {
            $countries_data[$country_key] = $country_val;
        } //print_r($countries_data);
        asort($countries_data);
        // $country_output.= '<option value="global" '.$selected_gb.'>Global</option>';
        foreach ($countries_data as $country_key => $country_val) {
            $selected = "";
            if (
                isset($_GET["filterc_country"]) &&
                $_GET["filterc_country"] == $country_key
            ) {
                $selected = 'selected="selected"';
            }

            $country_output .=
                '<option value="' .
                esc_attr($country_key) .
                '" ' .
                $selected .
                '>
                        ' .
                $country_val .
                "</option>";
        }
        $country_output .= "</select>";
    endif;

    $country_output .= "</form>";
    return $country_output;
}
// register shortcode
add_shortcode("country_filter_dropdown", "country_filter_dropdown_function");

//removing billing address fields
add_filter("woocommerce_billing_fields", "remove_checkout_fields", 100);
function remove_checkout_fields($fields)
{
    //unset( $fields['billing_company'] );
    unset($fields["billing_city"]);
    unset($fields["billing_postcode"]);
    // unset( $fields['billing_country'] );
    unset($fields["billing_state"]);
    unset($fields["billing_address_1"]);
    unset($fields["billing_address_2"]);
    return $fields;
}

add_filter("woocommerce_checkout_fields", "order_fields", 120);
function order_fields($fields)
{
    $fields["billing"]["billing_company"]["priority"] = 120;
    return $fields;
}

//to hide spotii when coutnry changed to other than UAE
/*add_filter( 'woocommerce_available_payment_gateways', 'payment_gateway_disable_country' );  
function payment_gateway_disable_country( $available_gateways ) {
    if ( is_admin() ) return $available_gateways;
    if ( WC()->customer->get_billing_country() <> 'AE' ) {
        unset( $available_gateways['spotii_shop_now_pay_later'] );
        unset( $available_gateways['spotii_pay_now'] );
    } 
    return $available_gateways;
}
*/
//to show custom text below total in checkout page.
add_filter(
    "woocommerce_review_order_after_order_total",
    "custom_total_message_html",
    10,
    1
);
function custom_total_message_html($value)
{
    if (!in_array(WC()->customer->get_shipping_country(), ["AE"])) {
        echo '<div class="total-below-checkout-text">' .
            __(
                "The Payment Gateway will automatically charged you in UAE Dhirams."
            ) .
            "</div>";
    }
    // return $value;
}

// function that runs when shortcode is called
function get_product_catgs()
{
    $html = "";
    $args = [
        "taxonomy" => "product_cat",
        "orderby" => "name",
        "order" => "ASC",
        "hide_empty" => true,
    ];

    $categories_array = get_categories($args);

    $filled_catgs = [];

    foreach ($categories_array as $val_catg):
        if ($val_catg->count > 0) {
            $filled_catgs[] = $val_catg;
        }
    endforeach;

    // echo "<pre>";

    $chunks_catgs = array_chunk($filled_catgs, 8);
    $html .= "<div class='catalogue-mega-menu'>";
    foreach ($chunks_catgs as $chunk) {
        $html .= "<div class=\"item\">\n";
        $html .= "<ul>";
        foreach ($chunk as $chunk_sub):
            if ($chunk_sub->term_id != 354 && $chunk_sub->term_id != 16) {
                $html .=
                    "<li><a href='" .
                    site_url(
                        "/shop/?filtering=1&filter_product_cat=" .
                            $chunk_sub->term_id
                    ) .
                    "'>" .
                    $chunk_sub->name .
                    "</a></li>";
            }
        endforeach;
        $html .= "</ul>";
        $html .= "</div>\n";
    }
    $html .= "</div>";

    return $html;
}
// register shortcode
add_shortcode("product_catgs_megamenu", "get_product_catgs");

// Add tax for Swiss country
add_action(
    "woocommerce_cart_calculate_fees",
    "custom_tax_surcharge_for_swiss",
    10,
    1
);
function custom_tax_surcharge_for_swiss($cart)
{
    if (is_admin() && !defined("DOING_AJAX")) {
        return;
    }

    // Only for Swiss country (if not we exit)
    // if ( 'CH' != WC()->customer->get_shipping_country() ) return;

    $percent = 5;
    # $taxes = array_sum( $cart->taxes ); // <=== This is not used in your function
    $round_five_percent =
        (($cart->cart_contents_total + $cart->shipping_total) * $percent) /
            100 +
        1;

    // Calculation
    $surcharge = ($round_five_percent * $percent) / 100;

    // Add the fee (tax third argument disabled: false)
    $cart->add_fee(
        __("Service Fee", "woocommerce") . " ($percent%) + 1 AED",
        $round_five_percent,
        false
    );
    $cart->add_fee(__("+ VAT", "woocommerce"), $surcharge, false);
}
function country_gifts_dropdown_mk()
{
    $shop_page_url = get_permalink(wc_get_page_id("shop"));

    $country_output =
        '<form action="' .
        $shop_page_url .
        '" method="get" id="filters-gifts-form" class="filters-gifts-form">';

    $countries = get_countries("rwd_product_country");

    $countries_array = [];

    $unique_countries = get_unique_countries("rwd_product_country", "product");
    foreach ($unique_countries as $unique_countrie) {
        $temp_country = get_countries($unique_countrie);

        if ($temp_country["success"]) {
            $countries_array[strtoupper($unique_countrie)] =
                $temp_country["country"];
        }
    }

    if (!empty($countries)):
        $country_output .=
            '<select name="filterc_country"  id="mk_filter" class="cntry_srch_mk">';
        // $country_output.= '<option value="">Select Country</option>';
        $country_output .= '<option value="">Show All countries</option>';

        if (
            isset($_GET["filterc_country"]) &&
            $_GET["filterc_country"] == "global"
        ) {
            $selected_gb = 'selected="selected"';
        }
        $countries_data = [];
        foreach ($countries_array as $country_key => $country_val) {
            $countries_data[$country_key] = $country_val;
        } //print_r($countries_data);
        asort($countries_data);

        // $country_output.= '<option value="global" '.$selected_gb.'>Global</option>';
        foreach ($countries_data as $country_key => $country_val) {
            $selected = "";
            if (
                isset($_GET["filterc_country"]) &&
                $_GET["filterc_country"] == $country_key
            ) {
                $selected = 'selected="selected"';
            }

            $country_output .=
                '<option value="' .
                esc_attr($country_key) .
                '" ' .
                $selected .
                '>
                        ' .
                $country_val .
                "</option>";
        }
        $country_output .= "</select>";
    endif;

    $country_output .= "</form>";

    return $country_output;
}
// register shortcode
add_shortcode("country_gifts_mk_dropdown", "country_gifts_dropdown_mk");
function country_giftfilter_dropdown_function()
{
    $shop_page_url = get_permalink(wc_get_page_id("shop"));

    $country_output =
        '<form action="' .
        $shop_page_url .
        '" method="get" id="filters-gifts-form" class="filters-gifts-form">';

    $countries = get_countries("rwd_product_country");

    $countries_array = [];

    // $countries_array[] = get_countries('in');
    // $countries_array[] = get_countries('us');
    // print_r($countries_array);

    $unique_countries = get_unique_countries("rwd_product_country", "product");
    foreach ($unique_countries as $unique_countrie) {
        $temp_country = get_countries($unique_countrie);

        if ($temp_country["success"]) {
            $countries_array[strtoupper($unique_countrie)] =
                $temp_country["country"];
        }
    }

    if (!empty($countries)):
        $country_output .=
            '<select name="filterc_country" id="filterc_country" class="filterc_country new_mk_country_filter">';
        // $country_output.= '<option value="">Select Country</option>';
        $country_output .= '<option value="">Show All countries</option>';

        if (
            isset($_GET["filterc_country"]) &&
            $_GET["filterc_country"] == "global"
        ) {
            $selected_gb = 'selected="selected"';
        }
        //sorting array by Asc order
        $countries_data = [];
        foreach ($countries_array as $country_key => $country_val) {
            $countries_data[$country_key] = $country_val;
        } //print_r($countries_data);
        asort($countries_data);
        //print_r($countries_data);

        //$sorti_cntries = wp_list_sort($countries_data, 'ASC', true );
        // $country_output.= '<option value="global" '.$selected_gb.'>Global</option>';
        foreach ($countries_data as $country_key => $country_val) {
            $selected = "";
            if (
                isset($_GET["filterc_country"]) &&
                $_GET["filterc_country"] == $country_key
            ) {
                $selected = 'selected="selected"';
            }

            $country_output .=
                '<option value="' .
                esc_attr($country_key) .
                '" ' .
                $selected .
                '>
                        ' .
                $country_val .
                "</option>";
        }
        $country_output .= "</select>";
    endif;

    $country_output .= "</form>";

    return $country_output;
}
// register shortcode
add_shortcode(
    "country_giftfilter_dropdown",
    "country_giftfilter_dropdown_function"
);
function country_filter_dd()
{
    $shop_page_url = get_permalink(wc_get_page_id("shop"));
    $country_output =
        '<form action="' . $shop_page_url . '" method="get" id="filters-form">';
    $countries = get_countries("rwd_product_country");
    $countries_array = [];

    $unique_countries = get_unique_countries("rwd_product_country", "product");
    foreach ($unique_countries as $unique_countrie) {
        $temp_country = get_countries($unique_countrie);

        if ($temp_country["success"]) {
            $countries_array[strtoupper($unique_countrie)] =
                $temp_country["country"];
        }
    }

    if (!empty($countries)):
        $country_output .=
            '<select name="filterc_country"  class="cntry_srch_mk" onchange="this.form.submit()">';
        // $country_output.= '<option value="">Select Country</option>';
        $country_output .= '<option value="">Change Country</option>';
        if (
            isset($_GET["filterc_country"]) &&
            $_GET["filterc_country"] == "global"
        ) {
            $selected_gb = 'selected="selected"';
        }
        $countries_data = [];
        foreach ($countries_array as $country_key => $country_val) {
            $countries_data[$country_key] = $country_val;
        } //print_r($countries_data);
        asort($countries_data);

        // $country_output.= '<option value="global" '.$selected_gb.'>Global</option>';
        foreach ($countries_data as $country_key => $rs_srt_dta) {
            $selected = "";
            if (
                isset($_GET["filterc_country"]) &&
                $_GET["filterc_country"] == $country_key
            ) {
                $selected = 'selected="selected"';
            }
            $country_output .=
                '<option value="' .
                esc_attr($country_key) .
                '" ' .
                $selected .
                '>
                        ' .
                $rs_srt_dta .
                "</option>";
        }
        $country_output .= "</select>";
    endif;
    $country_output .= "</form>";
    return $country_output;
}
// register shortcode
add_shortcode("country_dropdown_mk", "country_filter_dd");

/*** To get country based on input ****/

function Get_Product_Descriptions()
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.dingconnect.com/api/V1/GetProductDescriptions",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "api_key: KJIE4QYvKk95YVUTqCzl9v",
            "Cookie: visid_incap_1694192=AzZQD89yRL+NsTN+ODkOv3C712IAAAAAQUIPAAAAAACclhmVXgs41FSyW1Uz/ZyV; __cf_bm=vZkhSammK3OkkB7gdBXcebDkniWnhyBPH7baMFsn8kg-1663931914-0-AQ5bKslx7yVDeSvhh4yptDnfjP2Qz4VslSK15gLWZztoVtUU+3eqSQC7PmDdu0D9vr8ART2UOL7t8+OC5cfOcHc=",
        ],
    ]);

    $response = curl_exec($curl);
    $response = json_decode($response);
    curl_close($curl);


    return $response;
}

function send_ajax_response($code, $message)
{
    echo json_encode(["success" => $code, "message" => $message]);
    //wp_die();
}

function get_providers($number, $providerCodes = true)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL =>
            "https://api.dingconnect.com/api/V1/GetProviders?accountNumber=" .
            $number .
            "&providerCodes=" .
            $providerCodes,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "api_key: KJIE4QYvKk95YVUTqCzl9v",
            "Cookie: visid_incap_1694192=AzZQD89yRL+NsTN+ODkOv3C712IAAAAAQUIPAAAAAACclhmVXgs41FSyW1Uz/ZyV; __cf_bm=EL__l.JlA4bqWUs7CIvX1PYFgk3qd7ndu7C5ecLVUWo-1664261331-0-AdTg0xFeqYMooe5dk1C2tSBlw5ITguH3tG47JicZnzpRtBXXGUoidGmKPNojVqW+tQkohcVg3NP3igWxQJim0c8=",
        ],
    ]);

    $response = curl_exec($curl);
    $response = json_decode($response);
    curl_close($curl);
    return $response;
}

function get_products($mobile_number, $ProviderCode)
{
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL =>
            "https://api.dingconnect.com/api/V1/GetProducts?AccountNumber=" .
            $mobile_number .
            "&providerCodes=" .
            $ProviderCode,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "api_key: KJIE4QYvKk95YVUTqCzl9v",
            "Accept: */*",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Content-Type: application/json",
        ],
    ]);

    $response = curl_exec($curl);
    $response = json_decode($response);
    curl_close($curl);
    return $response;
}

/*------------------------Get Recharge Plans----------------------------*/
add_action("wc_ajax_get_recharge_plans", "get_recharge_plans");
add_action("wp_ajax_nopriv_get_recharge_plans", "get_recharge_plans");

function get_recharge_plans()
{
    $operator_name = $operator_logo = "";

    $Get_Product_Descriptions = Get_Product_Descriptions();
    $pro_des_items = $Get_Product_Descriptions->Items;
    $pro_des_items_array = json_decode(json_encode($pro_des_items), true);

    if (!empty($_POST["search_input"])) {
        $mobile_number = $_POST["search_input"];
        $ProviderCode = $_POST["ProviderCode"];

        $mobile_number = str_replace("+", "", $mobile_number);

        if (empty($ProviderCode)) {
            $get_mobile_number_plan = get_products($mobile_number, "");
            /*  echo 'before';      
    print_r($get_mobile_number_plan);
    echo 'after'; */
            if ($get_mobile_number_plan->ResultCode == 1) {
                $Items = $get_mobile_number_plan->Items;
                $Items_array = json_decode(json_encode($Items), true);
                if (!empty($Items_array)) {
                    $operators_array = [];
                    foreach ($Items_array as $key => $print) {
                        if ($print["RedemptionMechanism"] == "Immediate") {
                            $operators_array[] = $print["ProviderCode"];
                        }
                    }
                    $operators_array = array_unique($operators_array);
                    $ProviderCode = current($operators_array);
                }
            }
        }

        $response = get_products($mobile_number, $ProviderCode);

        /* print_r($response); */

        $immediate_providers = [];
        $all_Benefits_array = [];
        if ($response->ResultCode == 1) {
            $Items = $response->Items;
            $Items_array = json_decode(json_encode($Items), true);

            if (!empty($Items_array)) {
                foreach ($Items_array as $key => $print) {
                    /* if($print['RedemptionMechanism']=='Immediate'){   */

                    //echo $print['ProviderCode'];
                    $Benefits_array = $print["Benefits"];
                    $all_Benefits_array = array_merge(
                        $all_Benefits_array,
                        $Benefits_array
                    );
                    if (!empty($print["SkuCode"])) {
                        //echo $print['SkuCode'];
                        //echo '<br>';
                        //echo $print['SkuCode'];

                        if (!empty($pro_des_items_array)) {
                            foreach (
                                $pro_des_items_array
                                as $index => $result
                            ) {
                                if (
                                    $result["LocalizationKey"] ==
                                    $print["SkuCode"]
                                ) {
                                    $Items_array[$key][
                                        "product_description"
                                    ] = $result;
                                }
                            }
                        } else {
                            $code = 400;
                            $message = "We do not recognise the number.";
                            send_ajax_response($code, $message);
                        }
                    }

                    $immediate_providers[] = $print;
                    /*  }  */
                }

                $all_Benefits_array = array_unique($all_Benefits_array);

                $get_providers = get_providers($mobile_number, "");
                $get_providers_array = json_decode(
                    json_encode($get_providers),
                    true
                );

                $get_providers_by_code = get_providers(
                    $mobile_number,
                    $ProviderCode
                );
                $get_providers_by_code_array = json_decode(
                    json_encode($get_providers_by_code),
                    true
                );

                //print_r($get_providers_array);
                if ($get_providers_by_code_array["ResultCode"] == 1) {
                    $provider_Items = $get_providers_by_code_array["Items"];
                    $provider_Items_end_array = current(
                        $get_providers_by_code_array["Items"]
                    );
                    $operator_name = $provider_Items_end_array["Name"];
                    $operator_logo = $provider_Items_end_array["LogoUrl"];
                    if (empty($ProviderCode)) {
                        $ProviderCode =
                            $provider_Items_end_array["ProviderCode"];
                    }
                }

                /* print_r($Items_array);
                 die(); */
                /*          if(in_array("Mobile", $all_Benefits_array) || in_array("Data", $all_Benefits_array) || in_array("Minutes", $all_Benefits_array)){ */
                if (
                    in_array("Data", $all_Benefits_array) ||
                    in_array("Minutes", $all_Benefits_array)
                ) {
                } else {
                    $code = 400;
                    $message = "We do not recognise the number";
                    send_ajax_response($code, $message);
                }
            } else {
                $code = 400;
                $message = "We do not recognise the number.";
                send_ajax_response($code, $message);
            }
        }

        //echo '<pre>';
        //print_r($Items_array);

        ob_start();
        get_template_part(
            "template-parts/search-mobile-plans/search-mobile-plans",
            null,
            [
                "immediate_providers" => $immediate_providers,
                "all_Benefits_array" => $all_Benefits_array,
                "response" => $Items_array,
            ]
        );
        $search_result = ob_get_contents();
        ob_end_clean();

        ob_start();
        get_template_part(
            "template-parts/search-mobile-plans/mobile-operators",
            null,
            ["get_providers_array" => $get_providers_array]
        );
        $operators_data = ob_get_contents();
        ob_end_clean();

        $total_operators = 0;
        if ($get_providers_array["ResultCode"] == 1) {
            $total_operators = count($get_providers_array["Items"]);
        }

        //print_r($get_providers_array);
        echo json_encode([
            "success" => 200,
            "search_result" => $search_result,
            "operators_data" => $operators_data,
            "operator_name" => $operator_name,
            "operator_logo" => $operator_logo,
            "total_operators" => $total_operators,
        ]);
        wp_die();
    }
}

function send_transfer_recharge($number, $SkuCode, $send_value)
{
    $curl = curl_init();
    $random = rand(10, 100000);
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.dingconnect.com/api/V1/SendTransfer",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>
            '{
    "SkuCode": "' .
            $SkuCode .
            '",
    "SendValue": ' .
            $send_value .
            ',
    "SendCurrencyIso": "AED",
    "AccountNumber":' .
            $number .
            ',
    "DistributorRef":' .
            $random .
            ',
    "Settings": [
        {
            "Name": "pqvaydbmab",
            "Value": "kjzzv0qh3"
        }
    ],
    "ValidateOnly": false,
    "BillRef": "string"
}',
        CURLOPT_HTTPHEADER => [
            "api_key: KJIE4QYvKk95YVUTqCzl9v",
            "Content-Type: application/json",
            "Cookie: visid_incap_1694192=AzZQD89yRL+NsTN+ODkOv3C712IAAAAAQUIPAAAAAACclhmVXgs41FSyW1Uz/ZyV; __cf_bm=XvpOXO40v8dbA9O7sQdd6_QU6Lsvbz0vBlP7QSlvMoA-1664184884-0-AZbqRXVUF81rj1P6HMeayOcxbuEM9XEfHbgnVOx4HpaWOmxEuUkXxOoidgwUwYlAUB2+YuBLTMWWs2qc7EJYcqg=",
        ],
    ]);

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}

function get_mobile_number_plan($mobile_number = true, $skuCodes)
{
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL =>
            "https://api.dingconnect.com/api/V1/GetProducts?AccountNumber=" .
            $mobile_number .
            "&skuCodes=" .
            $skuCodes,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "api_key: KJIE4QYvKk95YVUTqCzl9v",
            "Accept: */*",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Content-Type: application/json",
        ],
    ]);

    $response = curl_exec($curl);
    $response = json_decode($response);
    curl_close($curl);
    return $response;
}



/*------------------------mamopay_payment_breakup----------------------------*/
add_action("wc_ajax_get_payment_breakup", "get_payment_breakup");
add_action("wp_ajax_nopriv_get_payment_breakup", "get_payment_breakup");

function get_payment_breakup()
{
    $message = "";

    if (!empty($_POST["skuCodes"])) {
        $mobile_number = $_POST["mobile_number"];
        $skuCodes = $_POST["skuCodes"];
        $mobile_number = str_replace("+", "", $mobile_number);

        $response = get_mobile_number_plan($mobile_number, $skuCodes);
        $immediate_providers = [];

        if ($response->ResultCode == 1) {
            $Items = $response->Items;
            $Items_array = json_decode(json_encode($Items), true);
            if (!empty($Items_array)) {
                $max_ReceiveValue = $Items_array[0]["Maximum"]["ReceiveValue"];
                $max_SendValue = $Items_array[0]["Maximum"]["SendValue"];
                $SkuCode = $Items_array[0]["SkuCode"];

                ob_start();
                get_template_part(
                    "template-parts/search-mobile-plans/payment-breakup",
                    null,
                    ["Items_array" => $Items_array]
                );
                $search_result = ob_get_contents();
                ob_end_clean();
                echo json_encode([
                    "success" => 200,
                    "search_result" => $search_result,
                ]);
                wp_die();
            }
        }

        /* echo json_encode(array('success' => $success, 'message' => $message));   
    wp_die();
    exit; */
    }
}

/*------------------------Memopay_payment----------------------------*/

function mamopay($new_amnt)
{
    $message = "";
    $Get_Product_Descriptions = Get_Product_Descriptions();
    $pro_des_items = $Get_Product_Descriptions->Items;
    $pro_des_items_array = json_decode(json_encode($pro_des_items), true);

    if (!empty($_POST["search_input"])) {
        $mobile_number = $_POST["search_input"];
        //echo $mobile_number ;
        $skuCodes = $_POST["skuCodes"];

        $mobile_number = str_replace("+", "", $mobile_number);

        $response = get_mobile_number_plan($mobile_number, $skuCodes);
        $immediate_providers = [];

        if ($response->ResultCode == 1) {
            $Items = $response->Items;
            $Items_array = json_decode(json_encode($Items), true);
            if (!empty($Items_array)) {
                $max_ReceiveValue = $Items_array[0]["Maximum"]["ReceiveValue"];
                $ReceiveCurrencyIso =
                $Items_array[0]["Maximum"]["ReceiveCurrencyIso"];
                $max_SendValue = $Items_array[0]["Maximum"]["SendValue"];
                //echo $max_SendValue;
                $DefaultDisplayText = $Items_array[0]["DefaultDisplayText"];
                $SkuCode = $Items_array[0]["SkuCode"];
                //echo $SkuCode;
                $convenience_fee = ($max_ReceiveValue * 5) / 100;
                $status = "failed";
                $total_amount = $convenience_fee + $max_ReceiveValue;
                //$this->var = $total_amount ;
                $new_amnt = convertCurrency(
                    $total_amount,
                    $ReceiveCurrencyIso,
                    "AED"
                );
                global $wpdb;
                $t = time();
                $c_date = date("Y-m-d H:i:s", $t);
                $mobile_recharges_table = $wpdb->prefix . "topup_recharge";

                $user_name = $_POST["user_name"];
                //print_r($user_name);
                $user_email = $_POST["user_email"];
                $friend_email = $_POST["friend_email"];

                $sql = "INSERT INTO $mobile_recharges_table (created_at,user_name, user_email, friend_email, convenience_fee, status,mobile_number,plan_name,plan_sku_code,plan_amount,total_amount,amount_currency,max_send_value,total_amountr) VALUES ('$c_date','$user_name', '$user_email', '$friend_email', '$convenience_fee', '$status','$mobile_number','$DefaultDisplayText','$SkuCode','$max_ReceiveValue','$total_amount','$ReceiveCurrencyIso','$max_SendValue','$total_amount'
 )";

                $wpdb->query($sql);


                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://business.mamopay.com/manage_api/v1/links",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS =>
                        '{
           "name":"'.$DefaultDisplayText.'",
            "active": true,
             "return_url":"https://gifto.co/thank-you-for-recharge/",
            "amount":"' .
                        $new_amnt .
                        '",
           
            "enable_message": true,
            
            "enable_customer_details": false,
            "send_customer_receipt": true ,
            "enable_tips":false,
            "enable_qr_code":true
        }',
                    CURLOPT_HTTPHEADER => [
                        "Authorization: Bearer sk-33c56f7c-d0d4-48da-a897-546667303621",
                        "Content-Type: application/json",
                    ],
                ]);

                $response = curl_exec($curl);

                curl_close($curl);
                //echo $response;
                $result_data = json_decode($response, true);
                $trans = $result_data["transactionId"];
                print_r($result_data["payment_url"]);
                exit();
            }
        }
    }
}
add_action("wp_ajax_mamopay", "mamopay");
add_action("wp_ajax_nopriv_mamopay", "mamopay");

add_menu_page(
    "Topup Recharge",
    " Topup Recharge",
    "manage_options",
    " Topup Recharge",
    "buffercode_plugin",
    "dashicons-editor-ul",
    90
);
add_menu_page(
    "Voucher Cards",
    " Voucher Cards",
    "manage_options",
    " Voucher Cards",
    "voucher_code_plugin",
    "dashicons-editor-ul",
    100
);

function buffercode_plugin()
{
    //echo 'working';
    include_once "template-parts/search-mobile-plans/admin/recharge_topup_list.php";
}
function voucher_code_plugin()
{
    //echo 'working';
    include_once "template-parts/search-mobile-plans/admin/voucher-cards.php";
}

function wpse27856_set_content_type()
{
    return "text/html";
}
add_filter("wp_mail_content_type", "wpse27856_set_content_type");

//twilio SMS code for Ding products

/*
function smsTwilio($phoneNumber, $pin, $phoneCode)
{
    $account_sid = "ACd45d77cd83ba89a88fc3dae38fb9fc2c";
    $auth_token = "f213a44b9685082813c8b77a82afbe88";

    $twilio_number = "+16184378447";

    $client = new Twilio\Rest\Client($account_sid, $auth_token);
    $response = $client->messages->create("+" . $phoneCode . $phoneNumber, [
        "from" => $twilio_number,
        "body" => "Your voucher Code : " . $pin .''. "please use this to redeem",
    ]);
    //echo $client;
    return $response;
}



//send custom message to sender

function TwilioSender($billing_phone)
{
    $account_sid = "ACd45d77cd83ba89a88fc3dae38fb9fc2c";
    $auth_token = "f213a44b9685082813c8b77a82afbe88";

    $twilio_number = "+16184378447";

    $client = new Twilio\Rest\Client($account_sid, $auth_token);
    $response = $client->messages->create($billing_phone, [
        "from" => $twilio_number,
        "body" => "Hello! Your gift from Gifto.co is succesfully sent to the recpient. Thanks for using our service!",
    ]);
    //echo $client;
    return $response;
}
*/

// custom category wise filter products.
/*function search_category()
{
    echo do_shortcode("[aws_search_form]");
}
add_action("woocommerce_before_shop_loop", "search_category");
*/


//Display custom tip text before shop

function show_text()
{
    echo "<div class ='cust_txt'>" .
        "Tip: Want more choices?'show all countries' from filters." .
        "</div>";
}
add_action("woocommerce_before_shop_loop", "show_text");

////Sku on single product page
add_action("woocommerce_single_product_summary", "dev_designs_show_sku", 5);
function dev_designs_show_sku()
{
    global $product;
    echo "SKU: " . $product->get_sku();
}

//Edit billing fields
add_filter("woocommerce_checkout_fields", "misha_labels_placeholders", 9999);

function misha_labels_placeholders($f)
{
    $f["billing"]["billing_first_name"]["label"] = "Sender's First name";
    $f["billing"]["billing_last_name"]["label"] = "Sender's Last name";
    $f["billing"]["billing_country"]["label"] = "Sender's Country";
    $f["billing"]["billing_phone"]["label"] = "Sender's Phone <span class='tooltip'> (start from +country code)</span>";
    $f["billing"]["billing_email"]["label"] = "Sender's Email address ";

    return $f;
}

     
     

/* Edit placeholder for phone field on billing form */
/*add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );
 function override_billing_checkout_fields( $fields ) {
 

     
     $fields['billing']['billing_phone']['placeholder'] = 'Format: +911234567897';
     return $fields;
     }
     */

add_action('woocommerce_checkout_process', 'custom_checkout_validation');


  function custom_checkout_validation() {

    global $woocommerce;
 if($_POST['billing_phone']!= ''){
      // Check if set, if its not set add an error. This one is only requite for companies

    if ( ! (preg_match('/^\+(?:[0-9] ?){6,14}[0-9]$/', $_POST['billing_phone'] ))){

        wc_add_notice( '<strong>Incorrect Phone Number!</strong>  Please enter Number in valid format ','error' );

    }
 }

}






/// function for adding prefilled country code on billing form
/*
add_action( 'wp_footer', 'scripts_for_adding_country_prefix_on_billing_phone' );
function scripts_for_adding_country_prefix_on_billing_phone(){
    ?>
    <script type="text/javascript">
        ( function( $ ) {
            $( document.body ).on( 'updated_checkout', function(data) {
                var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>",
                country_code = $('#billing_country').val();
                var ajax_data = {
                    action: 'append_country_prefix_in_billing_phone',
                    country_code: $('#billing_country').val()
                };
                $.post( ajax_url, ajax_data, function( response ) { 
                    $('#billing_phone').val(response);
                });
            } );
        } )( jQuery );
    </script>
    <?php
}

add_action( 'wp_ajax_nopriv_append_country_prefix_in_billing_phone', 'country_prefix_in_billing_phone' );
add_action( 'wp_ajax_append_country_prefix_in_billing_phone', 'country_prefix_in_billing_phone' );
function country_prefix_in_billing_phone() {
    $calling_code = '';
    $country_code = isset( $_POST['country_code'] ) ? $_POST['country_code'] : '';
    if( $country_code ){
        $calling_code = WC()->countries->get_country_calling_code( $country_code );
        $calling_code = is_array( $calling_code ) ? $calling_code[0] : $calling_code;
    }
    echo $calling_code;
    die();
}

*/
add_filter("the_content", "add_image_dimensions");

function add_image_dimensions($content)
{
    preg_match_all("/<img[^>]+>/i", $content, $images);

    if (count($images) < 1) {
        return $content;
    }

    foreach ($images[0] as $image) {
        preg_match_all(
            '/(alt|title|src|width|class|id|height)=("[^"]*")/i',
            $image,
            $img
        );

        if (!in_array("src", $img[1])) {
            continue;
        }

        if (!in_array("width", $img[1]) || !in_array("height", $img[1])) {
            $src = $img[2][array_search("src", $img[1])];
            $alt = in_array("alt", $img[1])
                ? " alt=" . $img[2][array_search("alt", $img[1])]
                : "";
            $title = in_array("title", $img[1])
                ? " title=" . $img[2][array_search("title", $img[1])]
                : "";
            $class = in_array("class", $img[1])
                ? " class=" . $img[2][array_search("class", $img[1])]
                : "";
            $id = in_array("id", $img[1])
                ? " id=" . $img[2][array_search("id", $img[1])]
                : "";
            list($width, $height, $type, $attr) = getimagesize(
                str_replace("\"", "", $src)
            );

            $image_tag = sprintf(
                '<img src=%s%s%s%s%s width="%d" height="%d" />',
                $src,
                $alt,
                $title,
                $class,
                $id,
                $width,
                $height
            );
            $content = str_replace($image, $image_tag, $content);
        }
    }

    return $content;
}


/*
*
* Add country code selector to checkout phone
*
*/

add_action( 'wp_footer', 'scripts_for_adding_country_prefix_on_billing_phone' );
function scripts_for_adding_country_prefix_on_billing_phone(){
    ?>
    <script type="text/javascript">
        ( function( $ ) {
            $( document.body ).on( 'updated_checkout', function(data) {
                var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>",
                country_code = $('#billing_country').val();
                var ajax_data = {
                    action: 'append_country_prefix_in_billing_phone',
                    country_code: $('#billing_country').val()
                };
                $.post( ajax_url, ajax_data, function( response ) { 
                    $('#billing_phone').val(response);
                });
            } );
        } )( jQuery );
    </script>
    <?php
}

add_action( 'wp_ajax_nopriv_append_country_prefix_in_billing_phone', 'country_prefix_in_billing_phone' );
add_action( 'wp_ajax_append_country_prefix_in_billing_phone', 'country_prefix_in_billing_phone' );
function country_prefix_in_billing_phone() {
    $calling_code = '';
    $country_code = isset( $_POST['country_code'] ) ? $_POST['country_code'] : '';
    if( $country_code ){
        $calling_code = WC()->countries->get_country_calling_code( $country_code );
        $calling_code = is_array( $calling_code ) ? $calling_code[0] : $calling_code;
    }
    echo $calling_code;
    die();
}

function wpa_90820() {
    wp_enqueue_style('my-styles', get_stylesheet_directory_uri() .'/assets/css/customcssmini.css', array(), '1.7' );       
}

add_action('wp_enqueue_scripts', 'wpa_90820');


add_filter("retrieve_password_message", "mapp_custom_password_reset", 99, 4);

function mapp_custom_password_reset($message, $key, $user_login, $user_data )    {

    $message = "Someone has requested a password reset for the following account:

" . sprintf(__('%s'), $user_data->user_email) . "

If this was a mistake, just ignore this email and nothing will happen.

To reset your password, visit the following address:

" . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . "\r\n";


    return $message;

}
