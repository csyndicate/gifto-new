<div class="fsww-modals">
    <div class="fsww-modals-container">
        <form id="fsww-refund-modal" class="fsww-refund-modal" method="post" >
            <h3><?php echo __('Refund Reason', 'fsww'); ?></h3>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <textarea class="woocommerce-Input woocommerce-Input--text textarea-field" name="fsww_refund_reason" required></textarea>
            </p>

            <button type="submit" class="woocommerce-Button button"><?php echo __('Request Refund', 'fsww'); ?></button>
            <button type="button" class="woocommerce-Button button" id="fsww-cancel-request"><?php echo __('Cancel', 'fsww'); ?></button>
        </form>
    </div>

</div>