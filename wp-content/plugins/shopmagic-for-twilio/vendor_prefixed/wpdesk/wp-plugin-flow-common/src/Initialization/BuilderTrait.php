<?php

namespace ShopMagicTwilioVendor\WPDesk\Plugin\Flow\Initialization;

use ShopMagicTwilioVendor\WPDesk\PluginBuilder\Plugin\Activateable;
use ShopMagicTwilioVendor\WPDesk\PluginBuilder\Plugin\Deactivateable;
use ShopMagicTwilioVendor\WPDesk\PluginBuilder\Plugin\SlimPlugin;
use ShopMagicTwilioVendor\WPDesk\PluginBuilder\Storage\StorageFactory;
/**
 * Helps with plugin building concepts.
 *
 * @package WPDesk\Plugin\Flow\Initialization
 */
trait BuilderTrait
{
    /**
     * Build plugin from info.
     *
     * @param \WPDesk_Plugin_Info $plugin_info
     *
     * @return SlimPlugin
     */
    private function build_plugin(\ShopMagicTwilioVendor\WPDesk_Plugin_Info $plugin_info)
    {
        $class_name = \apply_filters('wp_builder_plugin_class', $plugin_info->get_class_name());
        /** @var SlimPlugin $plugin */
        $plugin = new $class_name($plugin_info);
        return $plugin;
    }
    /**
     * Initialize WP register hooks that have to be fire before any other.
     *
     * @param \WPDesk_Plugin_Info $plugin_info
     * @param SlimPlugin $plugin
     *
     * @return SlimPlugin
     */
    private function init_register_hooks(\ShopMagicTwilioVendor\WPDesk_Plugin_Info $plugin_info, \ShopMagicTwilioVendor\WPDesk\PluginBuilder\Plugin\SlimPlugin $plugin)
    {
        if ($plugin instanceof \ShopMagicTwilioVendor\WPDesk\PluginBuilder\Plugin\Activateable) {
            \register_activation_hook($plugin_info->get_plugin_file_name(), [$plugin, 'activate']);
        }
        if ($plugin instanceof \ShopMagicTwilioVendor\WPDesk\PluginBuilder\Plugin\Deactivateable) {
            \register_deactivation_hook($plugin_info->get_plugin_file_name(), [$plugin, 'deactivate']);
        }
        return $plugin;
    }
    /**
     * Store plugin for others to use.
     *
     * @param SlimPlugin $plugin
     */
    private function store_plugin(\ShopMagicTwilioVendor\WPDesk\PluginBuilder\Plugin\SlimPlugin $plugin)
    {
        $storageFactory = new \ShopMagicTwilioVendor\WPDesk\PluginBuilder\Storage\StorageFactory();
        $storageFactory->create_storage()->add_to_storage(\get_class($plugin), $plugin);
    }
    /**
     * Init integration layer of the plugin.
     *
     * @param SlimPlugin $plugin
     */
    private function init_plugin(\ShopMagicTwilioVendor\WPDesk\PluginBuilder\Plugin\SlimPlugin $plugin)
    {
        \do_action('wp_builder_before_plugin_init', $plugin);
        $plugin->init();
        \do_action('wp_builder_before_init', $plugin);
    }
}
