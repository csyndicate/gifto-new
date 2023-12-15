<?php

if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

?>

<form action="<?php echo admin_url('options.php') ?>" method="post">

    <?php

    settings_fields('fsww_general_options_group');
    do_settings_sections('fsww_general_options_group');

    ?>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Number of Rows Per Page for Tables', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input class="input-field" name="fsww_rows_per_page" id="fsww_rows_per_page" type="number" placeholder="100"
                   min="10" value="<?php echo esc_attr(get_option('fsww_rows_per_page', '10')); ?>">
        </div>
    </div>


    <div class="input-box">
        <div class="label">
            <span><?php echo __('Order Status After Purchase', 'fsww'); ?></span>
        </div>

        <div class="input">
            <select class="input-field" name="fsww_order_status">

                <?php

                $order_status = get_option('fsww_order_status', 'completed');

                require_once(dirname(FSWW_FILE) . '/includes/classes/FS_WC_Wallet.php');

                $order_statuses = (array)FS_WC_Wallet::get_terms('shop_order_status',
                    array('hide_empty' => 0, 'orderby' => 'id'));

                if ($order_statuses && !is_wp_error($order_statuses)) {
                    foreach ($order_statuses as $s) {

                        if (version_compare(WOOCOMMERCE_VERSION, '2.2', '>=')) {

                            $s->slug = str_replace('wc-', '', $s->slug);

                        }

                        $selected = ($order_status == $s->slug) ? 'selected' : '';

                        ?>

                        <option value="<?php echo($s->slug) ?>" <?php echo($selected) ?>><?php echo($s->name) ?></option>

                        <?php

                    }

                }

                ?>


            </select>
        </div>
    </div>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Top up user wallet on order status:', 'fsww'); ?></span>
        </div>

        <div class="input">
            <select class="input-field" name="fsww_load_wallet_on">

                <?php $load = get_option('fsww_load_wallet_on', 'completed'); ?>

                <option value="processing" <?php echo $load == 'processing' ? 'selected' : '' ?>><?php _e('Processing',
                        'fsww') ?></option>
                <option value="completed" <?php echo $load == 'completed' ? 'selected' : '' ?>><?php _e('Completed',
                        'fsww') ?></option>
                <option value="all" <?php echo $load == 'all' ? 'selected' : '' ?>><?php _e('Processing and Completed',
                        'fsww') ?></option>
            </select>
        </div>
    </div>


    <div class="input-box">
        <div class="label">
            <span><?php echo __('Disable for discounted products.', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input type="checkbox" name="fsww_disable_on_sale" <?php echo esc_attr(get_option('fsww_disable_on_sale',
                'off')) == 'on' ? 'checked' : '' ?>>
        </div>
    </div>

    <blockquote>
        <p class="description">
            <?php echo __('Disable the wallet if the cart contains products on sale.', 'fsww'); ?>
        </p>
    </blockquote>


    <div class="input-box">
        <div class="label">
            <span><?php echo __('Partial Payments', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input type="checkbox" name="fsww_partial_payments" <?php echo esc_attr(get_option('fsww_partial_payments',
                'on')) == 'on' ? 'checked' : '' ?>>
            <div class="helper">?
                <div class="tip">
                    <?php echo __('If account balance is not enough discount the available funds from the accounts balance and pay the rest using a different payment gateway.',
                        'fsww'); ?>
                </div>
            </div>
        </div>
    </div>


    <div class="input-box">
        <div class="label">
            <span><?php echo __('Disable all the other payment methods if there is enough funds in the wallet:',
                    'fsww'); ?></span>
        </div>
        <div class="input">
            <input type="checkbox"
                   name="fsww_disable_payment_methods" <?php echo esc_attr(get_option('fsww_disable_payment_methods',
                '')) == 'on' ? 'checked' : '' ?>>
        </div>
    </div>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Disable all the other payment methods except for top-ups:',
                    'fsww'); ?></span>
        </div>
        <div class="input">
            <input type="checkbox"
                   name="fsww_disable_payment_methods_except_for_top_up" <?php echo esc_attr(get_option('fsww_disable_payment_methods_except_for_top_up',
                '')) == 'on' ? 'checked' : '' ?>>
        </div>
    </div>

    <blockquote>
        <p class="description">
            <?php echo __('Force users to checkout using the wallet if there is enough funds in it.', 'fsww'); ?>
        </p>
    </blockquote>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Show all users in the wallet dashboard:', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input type="checkbox" name="fsww_show_all_users" <?php echo esc_attr(get_option('fsww_show_all_users',
                '')) == 'on' ? 'checked' : '' ?>>
        </div>
    </div>

    <blockquote>
        <p class="description">
            <?php echo __('Show users that never had a transaction using the wallet.', 'fsww'); ?>
        </p>
    </blockquote>


    <h3><?php echo __('Top Up/Add Funds:', 'fsww'); ?></h3>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Show make a deposit page in my account page', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input type="checkbox" name="fsww_deposit" <?php echo esc_attr(get_option('fsww_deposit',
                'on')) == 'on' ? 'checked' : '' ?>>
        </div>
    </div>

    <h3><?php echo __('User To User Transfers:', 'fsww'); ?></h3>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Enable user to user transfers', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input type="checkbox" name="fsww_transfers" <?php echo esc_attr(get_option('fsww_transfers',
                'off')) == 'on' ? 'checked' : '' ?>>
        </div>
    </div>

    <h3><?php echo __('Transactions:', 'fsww'); ?></h3>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Show transactions in my account page', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input type="checkbox" name="fsww_transactions" <?php echo esc_attr(get_option('fsww_transactions',
                'on')) == 'on' ? 'checked' : '' ?>>
        </div>
    </div>

    <h3><?php echo __('Refund Requests:', 'fsww'); ?></h3>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Enable refund requests', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input type="checkbox" name="fsww_refunds" <?php echo esc_attr(get_option('fsww_refunds',
                'on')) == 'on' ? 'checked' : '' ?>>
        </div>
    </div>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Request refund button position', 'fsww'); ?></span>
        </div>

        <div class="input">
            <select class="input-field" name="fsww_refunds_button_position">

                <?php $load = get_option('fsww_refunds_button_position', 'table'); ?>

                <option value="table" <?php echo $load == 'table' ? 'selected' : '' ?>><?php _e('Orders Table',
                        'fsww') ?></option>
                <option value="order_details" <?php echo $load == 'order_details' ? 'selected' : '' ?>><?php _e('Inside the order details page',
                        'fsww') ?></option>
            </select>
        </div>
    </div>

    <h3><?php echo __('Show the wallet balance in the menu:', 'fsww'); ?></h3>

    <?php

    $menu_locations = get_nav_menu_locations();
    foreach ($menu_locations as $key => $location) { ?>

        <div class="input-box">
            <div class="label">
                <span>&emsp;&mdash; <?php echo ucfirst($key) ?></span>
            </div>
            <div class="input">
                <input type="checkbox"
                       name="fsww_show_balance_in_menu_<?php echo $key ?>" <?php echo esc_attr(get_option('fsww_show_balance_in_menu_' . $key,
                    '')) == 'on' ? 'checked' : '' ?>>
            </div>
        </div>

    <?php } ?>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Show the balance to the right of the menu', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input type="checkbox"
                   name="fsww_show_balance_in_menu_right" <?php echo esc_attr(get_option('fsww_show_balance_in_menu_right',
                '')) == 'on' ? 'checked' : '' ?>>
        </div>
    </div>

    <h3><?php echo __('Custom deposit amounts:', 'fsww'); ?></h3>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Allow the customer to enter a custom deposit amount instead of selecting one of the pre-made values:',
                    'fsww'); ?></span>
        </div>
        <div class="input">
            <input type="checkbox" name="fsww_deposit_input" <?php echo esc_attr(get_option('fsww_deposit_input',
                '')) == 'on' ? 'checked' : '' ?>>
        </div>
    </div>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Minimum deposit:', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input class="input-field" name="fsww_deposit_input_min" id="fsww_deposit_input_min" type="number"
                   placeholder="0" min="0" step="any"
                   value="<?php echo esc_attr(get_option('fsww_deposit_input_min', '0')); ?>">
        </div>
    </div>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Maximum deposit:', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input class="input-field" name="fsww_deposit_input_max" id="fsww_deposit_input_max" type="number"
                   placeholder="1000" step="any" min="1000"
                   value="<?php echo esc_attr(get_option('fsww_deposit_input_max', '1000')); ?>">
        </div>
    </div>

    <blockquote>
        <p class="description">
            <?php echo __('Instead of a drop down with predefined amounts that you set by creating credit products the plugin will show an input box where the user can enter the amounts they want.',
                'fsww'); ?><br>
            <?php echo __('The minimum and maximum does not affect the predefined values.', 'fsww'); ?>
        </p>
    </blockquote>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Show both options, pre-made packages and custom inputs',
                    'fsww'); ?></span>
        </div>
        <div class="input">
            <input type="checkbox"
                   name="fsww_show_both_options" <?php echo esc_attr(get_option('fsww_show_both_options',
                '')) == 'on' ? 'checked' : '' ?>>
        </div>
    </div>


    <h3><?php echo __('Withdrawals:', 'fsww'); ?></h3>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Enable withdrawal requests', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input type="checkbox" name="fsww_withdrawals" <?php echo esc_attr(get_option('fsww_withdrawals',
                'off')) == 'on' ? 'checked' : '' ?>>
        </div>

        <br><br>

        <div class="input-box">
            <div class="label">
                <span>&emsp;&mdash; <?php echo __('PayPal', 'fsww'); ?></span>
            </div>
            <div class="input">
                <input type="checkbox"
                       name="fsww_withdrawals_paypal" <?php echo esc_attr(get_option('fsww_withdrawals_paypal',
                    'on')) == 'on' ? 'checked' : '' ?>>
            </div>
        </div>
        <br>

        <div class="input-box">
            <div class="label">
                <span>&emsp;&mdash; <?php echo __('SWIFT bank transfer', 'fsww'); ?></span>
            </div>
            <div class="input">
                <input type="checkbox"
                       name="fsww_withdrawals_swift" <?php echo esc_attr(get_option('fsww_withdrawals_swift',
                    'off')) == 'on' ? 'checked' : '' ?>>
            </div>
        </div>
        <br>

        <div class="input-box">
            <div class="label">
                <span>&emsp;&mdash; <?php echo __('Bitcoin', 'fsww'); ?></span>
            </div>
            <div class="input">
                <input type="checkbox"
                       name="fsww_withdrawals_bitcoin" <?php echo esc_attr(get_option('fsww_withdrawals_bitcoin',
                    'off')) == 'on' ? 'checked' : '' ?>>
            </div>
        </div>
        <br>

        <div class="input-box">
            <div class="label">
                <span>&emsp;&mdash; <?php echo __('Bank Transfer (Brazil)', 'fsww'); ?></span>
            </div>
            <div class="input">
                <input type="checkbox"
                       name="fsww_withdrawals_bank_transfer" <?php echo esc_attr(get_option('fsww_withdrawals_bank_transfer',
                    'off')) == 'on' ? 'checked' : '' ?>>
            </div>
        </div>
        <br>

        <div class="input-box">
            <div class="label">
                <span>&emsp;&mdash; <?php echo __('Bank Transfer (Turkey)', 'fsww'); ?></span>
            </div>
            <div class="input">
                <input type="checkbox"
                       name="fsww_withdrawals_bank_transfer_turkey" <?php echo esc_attr(get_option('fsww_withdrawals_bank_transfer_turkey',
                    'off')) == 'on' ? 'checked' : '' ?>>
            </div>
        </div>
        <br>


        <div class="input-box">
            <div class="label">
                <span>&emsp;&mdash; <?php echo __('Bank Transfer (Italy)', 'fsww'); ?></span>
            </div>
            <div class="input">
                <input type="checkbox"
                       name="fsww_withdrawals_bank_ita_transfer" <?php echo esc_attr(get_option('fsww_withdrawals_bank_ita_transfer',
                    'off')) == 'on' ? 'checked' : '' ?>>
            </div>
        </div>
        <br>


        <div class="input-box">
            <div class="label">
                <span>&emsp;&mdash; <?php echo __('Bank Transfer (BACS)', 'fsww'); ?></span>
            </div>
            <div class="input">
                <input type="checkbox"
                       name="fsww_withdrawals_bank_transfer_bacs" <?php echo esc_attr(get_option('fsww_withdrawals_bank_transfer_bacs',
                    'off')) == 'on' ? 'checked' : '' ?>>
            </div>
        </div>

    </div>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Minimum Amount:', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input class="input-field" name="fsww_withdrawal_input_min" id="fsww_withdrawal_input_min" type="number"
                   placeholder="1" min="0" step="any"
                   value="<?php echo esc_attr(get_option('fsww_withdrawal_input_min', '1')); ?>">
        </div>
    </div>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Maximum Amount:', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input class="input-field" name="fsww_withdrawal_input_max" id="fsww_withdrawal_input_max" type="number"
                   placeholder="10000" min="10000" step="any"
                   value="<?php echo esc_attr(get_option('fsww_withdrawal_input_max', '10000')); ?>">
        </div>
    </div>

    <h3><?php echo __('Registration Reward:', 'fsww'); ?></h3>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Amount:', 'fsww'); ?></span>
        </div>
        <div class="input">
            <input class="input-field" name="fsww_registration_reward" id="fsww_registration_reward" type="number"
                   placeholder="0" min="0" step="any"
                   value="<?php echo esc_attr(get_option('fsww_registration_reward', '0')); ?>">
        </div>
    </div>

    <?php submit_button(); ?>

</form>
