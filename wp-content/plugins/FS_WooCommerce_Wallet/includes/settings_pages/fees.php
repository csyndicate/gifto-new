<?php

if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

?>

<form action="<?php echo admin_url('options.php') ?>" method="post">

    <?php

    settings_fields('fsww_fees_options_group');
    do_settings_sections('fsww_fees_options_group');

    ?>

    <h3><?php echo __('Refunds', 'fsww'); ?>:</h3>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Fee Type', 'fsww'); ?></span>
        </div>

        <div class="input">
            <select class="input-field" name="fsww_fee_refund_type">

                <?php $load = get_option('fsww_fee_refund_type', 'percentage'); ?>

                <option value="percentage" <?php echo $load == 'percentage' ? 'selected' : '' ?>><?php _e('Percentage',
                        'fsww') ?></option>
                <option value="fixed" <?php echo $load == 'fixed' ? 'selected' : '' ?>><?php _e('Fixed Amount',
                        'fsww') ?></option>
            </select>
        </div>
    </div>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Fee Amount', 'fsww'); ?></span>
        </div>
        <div class="input">
            <?php
            $old_value = (int)get_option('fsww_refund_rate', '100');
            $new_value = get_option('fsww_fee_refund_amount', abs($old_value - 100));
            ?>
            <input
                    class="input-field"
                    name="fsww_fee_refund_amount"
                    id="fsww_fee_refund_amount"
                    type="number"
                    placeholder="100"
                    min="0"
                    step="any"
                    value="<?php echo $new_value; ?>"
            >
        </div>
    </div>

    <h3><?php echo __('Withdrawals', 'fsww'); ?>:</h3>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Fee Type', 'fsww'); ?></span>
        </div>

        <div class="input">
            <?php $load = get_option('fsww_fee_withdrawals_type', 'percentage'); ?>

            <select class="input-field" name="fsww_fee_withdrawals_type">
                <option value="percentage" <?php echo $load == 'percentage' ? 'selected' : '' ?>>
                    <?php _e('Percentage', 'fsww') ?>
                </option>
                <option value="fixed" <?php echo $load == 'fixed' ? 'selected' : '' ?>>
                    <?php _e('Fixed Amount', 'fsww') ?>
                </option>
            </select>
        </div>
    </div>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Fee Amount', 'fsww'); ?></span>
        </div>
        <div class="input">
            <?php $new_value = get_option('fsww_fee_withdrawals_amount', '0'); ?>
            <input
                    class="input-field"
                    name="fsww_fee_withdrawals_amount"
                    id="fsww_fee_withdrawals_amount"
                    type="number"
                    placeholder="100"
                    min="0"
                    step="any"
                    value="<?php echo $new_value; ?>"
            >
        </div>
    </div>

    <h3><?php echo __('User to User Transfers', 'fsww'); ?>:</h3>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Fee Type', 'fsww'); ?></span>
        </div>

        <div class="input">
            <?php $load = get_option('fsww_fee_transfers_type', 'percentage'); ?>

            <select class="input-field" name="fsww_fee_transfers_type">
                <option value="percentage" <?php echo $load == 'percentage' ? 'selected' : '' ?>>
                    <?php _e('Percentage', 'fsww') ?>
                </option>
                <option value="fixed" <?php echo $load == 'fixed' ? 'selected' : '' ?>>
                    <?php _e('Fixed Amount', 'fsww') ?>
                </option>
            </select>
        </div>
    </div>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Fee Amount', 'fsww'); ?></span>
        </div>
        <div class="input">
            <?php $new_value = get_option('fsww_fee_transfers_amount', '0'); ?>
            <input
                    class="input-field"
                    name="fsww_fee_transfers_amount"
                    id="fsww_fee_transfers_amount"
                    type="number"
                    placeholder="100"
                    min="0"
                    step="any"
                    value="<?php echo $new_value; ?>"
            >
        </div>
    </div>

    <h3><?php echo __('Topup Fee', 'fsww'); ?>:</h3>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Fee Type', 'fsww'); ?></span>
        </div>

        <div class="input">
            <?php $load = get_option('fsww_fee_topup_type', 'percentage'); ?>

            <select class="input-field" name="fsww_fee_topup_type">
                <option value="percentage" <?php echo $load == 'percentage' ? 'selected' : '' ?>>
                    <?php _e('Percentage', 'fsww') ?>
                </option>
                <option value="fixed" <?php echo $load == 'fixed' ? 'selected' : '' ?>>
                    <?php _e('Fixed Amount', 'fsww') ?>
                </option>
            </select>
        </div>
    </div>

    <div class="input-box">
        <div class="label">
            <span><?php echo __('Fee Amount', 'fsww'); ?></span>
        </div>
        <div class="input">
            <?php $new_value = get_option('fsww_fee_topup_amount', '0'); ?>
            <input
                    class="input-field"
                    name="fsww_fee_topup_amount"
                    id="fsww_fee_topup_amount"
                    type="number"
                    placeholder="100"
                    min="0"
                    step="any"
                    value="<?php echo $new_value; ?>"
            >
        </div>
    </div>

    <?php submit_button(); ?>

</form>

