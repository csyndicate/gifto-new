<?php


if (!defined('ABSPATH')) {
    exit;
}


function fsww_update_251_add_column_action_performed_by() {
    global $wpdb;

    if((int)get_option('fsww_db_version', '250') < 251) {

        $table_name = $wpdb->prefix . 'fswcwallet_transaction';
        if ( $table_name === $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) && !$wpdb->get_var( "SHOW COLUMNS FROM `{$table_name}` LIKE 'action_performed_by';" ) ) {
            $wpdb->query("ALTER TABLE {$wpdb->prefix}fswcwallet_transaction ADD action_performed_by INT(11) NULL");
        }

        if(!add_option('fsww_db_version', '251')){
            update_option('fsww_db_version', '251');
        }

        //error_log("db updated 251");
    }
}

function fsww_update_252_add_column_transaction_description() {
    global $wpdb;

    if((int)get_option('fsww_db_version', '251') < 252) {

        $table_name = $wpdb->prefix . 'fswcwallet_transaction';
        if ( $table_name === $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) && !$wpdb->get_var( "SHOW COLUMNS FROM `{$table_name}` LIKE 'transaction_description';" ) ) {
            $wpdb->query("ALTER TABLE {$wpdb->prefix}fswcwallet_transaction ADD transaction_description TEXT NULL");
        }

        if(!add_option('fsww_db_version', '252')){
            update_option('fsww_db_version', '252');
        }

        //error_log("db updated 252");
    }
}

function fslm_update_266_db_encoding() {
    global $wpdb;

    if(get_option('fsww_version_266_backup_confirmation', '') == 'confirmed') {
        if((int)get_option('fsww_db_version', '252') < 266) {

            $wpdb->query("ALTER TABLE {$wpdb->prefix}fswcwallet_transaction CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci");
            $wpdb->query("ALTER TABLE {$wpdb->prefix}fswcwallet CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci");
            $wpdb->query("ALTER TABLE {$wpdb->prefix}fswcwallet_requests CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci");
            $wpdb->query("ALTER TABLE {$wpdb->prefix}fswcwallet_withdrawal_requests CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci");

            if(!add_option('fsww_db_version', '266')){
                update_option('fsww_db_version', '266');
            }
        }
    }

}

function fsww_update_290() {
    global $wpdb;

    if((int)get_option('fsww_db_version', '252') < 290) {

        $table_name = $wpdb->prefix . 'fswcwallet_requests';
        if ( $table_name === $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) && !$wpdb->get_var( "SHOW COLUMNS FROM `{$table_name}` LIKE 'reason';" ) ) {
            $wpdb->query("ALTER TABLE {$wpdb->prefix}fswcwallet_requests ADD reason TEXT NULL");
        }

        if(!add_option('fsww_db_version', '290')){
            update_option('fsww_db_version', '290');
        }

    }
}

function fsww_update_293() {
    global $wpdb;

    if((int)get_option('fsww_db_version', '290') < 295) {

        $table_name = $wpdb->prefix . 'fswcwallet';
        if ( $table_name === $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) && !$wpdb->get_var( "SHOW COLUMNS FROM `{$table_name}` LIKE 'unavailable_funds';" ) ) {
            $wpdb->query("ALTER TABLE $table_name ADD unavailable_funds TEXT NULL");
        }

        $table_name = $wpdb->prefix . 'fswcwallet_withdrawal_requests';
        if ( $table_name === $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) && !$wpdb->get_var( "SHOW COLUMNS FROM `{$table_name}` LIKE 'fee';" ) ) {
            $wpdb->query("ALTER TABLE $table_name ADD fee TEXT NULL");
        }

        if(!add_option('fsww_db_version', '294')){
            update_option('fsww_db_version', '294');
        }

    }
}


fsww_update_251_add_column_action_performed_by();
fsww_update_252_add_column_transaction_description();
fslm_update_266_db_encoding();
fsww_update_290();
fsww_update_293();
