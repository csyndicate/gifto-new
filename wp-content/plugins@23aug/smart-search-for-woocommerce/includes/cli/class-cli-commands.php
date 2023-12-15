<?php

namespace Searchanise\SmartWoocommerceSearch;

defined('ABSPATH') || exit;

class CliCommands
{
    public function __construct()
    {
        \WP_CLI::add_command('searchanise:signup', array($this, 'signup'));
        \WP_CLI::add_command('searchanise:cleanup', array($this, 'deleteKeys'));
        \WP_CLI::add_command('searchanise:reimport', array($this, 'reimport'));
    }

    public function signup()
    {
        if (ApiSe::getInstance()->signup(null, false) && ApiSe::getInstance()->queueImport(null, false)) {
            \WP_CLI::success("OK");
        } else {
            \WP_CLI::error("Error");
        }
    }

    public function deleteKeys()
    {
        if (ApiSe::getInstance()->cleanup()) {
            \WP_CLI::success("OK");
        } else {
            \WP_CLI::error("Error");
        }
    }

    public function reimport()
    {
        if (ApiSe::getInstance()->queueImport(null, false)) {
            \WP_CLI::success("OK");
        } else {
            \WP_CLI::error("Error");
        }
    }
}
