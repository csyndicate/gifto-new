<?php

namespace Searchanise\SmartWoocommerceSearch;

defined('ABSPATH') || exit;

class Cron
{
    const CRON_RESYNC_EVENT = 'se_cron_resync';
    const CRON_INDEX_EVENT  = 'se_index_resync';

    /**
     * Unregister cron jobs
     */
    public static function unregister()
    {
        wp_clear_scheduled_hook(self::CRON_INDEX_EVENT);
        wp_clear_scheduled_hook(self::CRON_RESYNC_EVENT);
    }

    /**
     * Adds custom intervals
     */
    public static function addIntervals($schedules)
    {
        $schedules['every_minute'] = array(
            'interval' => 60,
            'display'  => 'Every minute'
        );

        return $schedules;
    }

    /**
     * Register cron jobs
     */
    public static function activate()
    {
        if (!wp_next_scheduled(self::CRON_INDEX_EVENT)) {
            wp_schedule_event(time(), ApiSe::getInstance()->getIndexInterval(), self::CRON_INDEX_EVENT);
        }

        if (!wp_next_scheduled(self::CRON_RESYNC_EVENT)) {
            wp_schedule_event(time(), ApiSe::getInstance()->getResyncInterval(), self::CRON_RESYNC_EVENT);
        }
    }

    /**
     * Indexer action
     */
    public static function indexer()
    {
        if (defined('DOING_CRON') && DOING_CRON && ApiSe::getInstance()->checkCronAsyncEnabled()) {
            if (ApiSe::getInstance()->checkStartAsync()) {
                Async::getInstance()->async();
            }
        }
    }

    /**
     * Re-importer action
     */
    public static function reimporter()
    {
        if (defined('DOING_CRON') && DOING_CRON && ApiSe::getInstance()->isPeriodicSyncMode()) {
            ApiSe::getInstance()->queueImport(null, false);
        }
    }
}

