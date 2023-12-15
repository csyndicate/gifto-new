<?php
$forminator_forms = SA_Forminator::get_forminator_forms();
if (! empty($forminator_forms) ) {
    ?>
<div class="cvt-accordion">
    <div class="accordion-section">
    <?php foreach ( $forminator_forms as $ks => $vs ) { ?>
        <a class="cvt-accordion-body-title" href="javascript:void(0)" data-href="#accordion_<?php echo esc_attr($ks); ?>">
            <input type="checkbox" name="smsalert_forminator_general[forminator_admin_notification_<?php echo esc_attr($ks); ?>]" id="smsalert_forminator_general[forminator_admin_notification_<?php echo esc_attr($ks); ?>]" class="notify_box" <?php echo ( ( smsalert_get_option('forminator_admin_notification_' . $ks, 'smsalert_forminator_general', 'on') === 'on' ) ? "checked='checked'" : '' ); ?>/><label><?php echo esc_html(ucwords(str_replace('-', ' ', $vs))); ?></label>
            <span class="expand_btn"></span>
        </a>
        <div id="accordion_<?php echo esc_attr($ks); ?>" class="cvt-accordion-body-content">
            <table class="form-table">
                <tr valign="top" style="position:relative">
                <td>
                <a href="admin.php?page=forminator-cform-wizard&id=<?php echo $ks;?>" title="Edit Form" target="_blank" class="alignright"><small><?php esc_html_e('Edit Form', 'sms-alert')?></small></a>
                <div class="smsalert_tokens">
        <?php
        $fields = SA_Forminator::get_forminator_variables($ks);
        foreach ( $fields as $key=>$value ) {
            echo  "<a href='#' data-val='[" . esc_attr($key) . "]'>".esc_attr($value)."</a> | ";
        }
        ?>
                </div>                
                <textarea data-parent_id="smsalert_forminator_general[forminator_admin_notification_<?php echo esc_attr($ks); ?>]" name="smsalert_forminator_message[forminator_admin_sms_body_<?php echo esc_attr($ks); ?>]" id="smsalert_forminator_message[forminator_admin_sms_body_<?php echo esc_attr($ks); ?>]" <?php echo( ( smsalert_get_option('forminator_admin_notification_' . esc_attr($ks), 'smsalert_forminator_general', 'on') === 'on' ) ? '' : "readonly='readonly'" ); ?> class="token-area"><?php echo esc_textarea(smsalert_get_option('forminator_admin_sms_body_' . $ks, 'smsalert_forminator_message', SmsAlertMessages::showMessage('DEFAULT_CONTACT_FORM_ADMIN_MESSAGE'))); ?></textarea>
                <div id="menu_forminator_admin_<?php echo esc_attr($ks); ?>" class="sa-menu-token" role="listbox"></div>
                </td>
                </tr>
            </table>
        </div>
    <?php } ?>
    </div>
</div>
    <?php
} else {
    echo '<h3>No Form(s) published</h3>';
}
?>
