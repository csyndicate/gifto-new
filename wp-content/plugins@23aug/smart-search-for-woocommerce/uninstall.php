<?php

// if uninstall.php is not called by WordPress, die
defined('WP_UNINSTALL_PLUGIN') || exit;

use Searchanise\SmartWoocommerceSearch\Queue;
use Searchanise\SmartWoocommerceSearch\Cron;
use Searchanise\SmartWoocommerceSearch\Installer;
use Searchanise\SmartWoocommerceSearch\ApiSe;

require_once dirname(__FILE__) . '/init.php';

$engines = ApiSe::getInstance()->getEngines(null, false, true);
foreach ($engines as $engine) {
    ApiSe::getInstance()->addonStatusRequest(ApiSe::ADDON_STATUS_DELETED, $engine['lang_code']);
    ApiSe::getInstance()->setExportStatus(ApiSe::EXPORT_STATUS_NONE, $engine['lang_code']);
}

Queue::getInstance()->clearActions();
Cron::unregister();
Installer::uninstall();
