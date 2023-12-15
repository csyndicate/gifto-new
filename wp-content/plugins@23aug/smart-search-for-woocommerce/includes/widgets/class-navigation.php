<?php

namespace Searchanise\SmartWoocommerceSearch;

defined('ABSPATH') || exit;

class Navigation
{
    protected $lang_code;

    public function __construct($lang_code)
    {
        $this->lang_code = $lang_code;

        if (ApiSe::getInstance()->isNavigationEnabled($lang_code)) {
            $this->init();
        }
    }

    public function init()
    {
        if (defined('DOING_AJAX') && DOING_AJAX || defined('DOING_CRON') && DOING_CRON) {
            return;
        }

        add_filter('template_include', array($this, 'replaceTemplate'), 99);
        add_filter('body_class', array($this, 'addBodyClass'));
    }

    public function replaceTemplate($template)
    {
        if ($this->isNavigationPage()) {
            wc_enqueue_js(<<<SCRIPT
            (function(window, undefined) {
                var sXpos = 0, sIndex = 0, sTotalFrames = 12, sInterval = null;
        
                if (document.getElementById('snize_results').innerHTML != '') {
                    return;
                }
        
                document.getElementById('snize_results').innerHTML = '<div id="snize-preload-spinner"></div>';
                sInterval = setInterval(function()
                {
                    var spinner = document.getElementById('snize-preload-spinner');
                    if (spinner) {
                        document.getElementById('snize-preload-spinner').style.backgroundPosition = (- sXpos) + 'px center';
                    } else {
                        clearInterval(sInterval);
                    }
        
                    sXpos  += 32;
                    sIndex += 1;
        
                    if (sIndex >= 12) {
                        sXpos  = 0;
                        sIndex = 0;
                    }
                }, 30);
            }(window));
SCRIPT
            );

            return SE_TEMPLATES_PATH . 'smart-navigation.php';
        }

        return $template;
    }

    public function addBodyClass($classes)
    {
        if ($this->isNavigationPage()) {
            $classes[] = 'snize-navigation';
        }

        return $classes;
    }

    private function isNavigationPage()
    {
        return is_woocommerce() && is_product_category();
    }
}
