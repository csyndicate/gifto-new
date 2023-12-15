<?php

if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

global $wpdb;


$user_id = get_current_user_id();
$query = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}fswcwallet_withdrawal_requests WHERE user_id='$user_id' ORDER BY request_id DESC");

?>


    <style>

        #paypal-option,
        #swift-option,
        #bitcoin-option,
        #bank_turkey-option,
        #bank-ita-option,
        #bank-bacs-option,
        #bank-option {
            display: none;
        }

        .center {
            text-align: center;
        }

    </style>

    <div class="fsww-meke-deposit-sc">
        <h4><?php _e('Withdrawal Requests', 'fsww') ?></h4>

        <?php echo "<div class=\"fsww-balance-tr\"><strong>" . __("Your current balance is: ", "fsww") . "</strong>" . do_shortcode("[fsww_balance]") . "</div><br>"; ?>


        <?php

        $lock_status = Wallet::lock_status(get_current_user_id());

        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if ($lock_status['status'] == 'locked') { ?>

            <div class="woocommerce-error" role="alert">
                <?php echo __('Your wallet is locked; you can\'t send withdrawal requests.', 'fsww') ?>
            </div>

        <?php } else {

        if (isset($_GET['amount'])) {

            echo "<div class=\"woocommerce-Message woocommerce-Message--error woocommerce-error\">" . __("Invalid amount.", "fsww") . "</div>";

        }

        if (isset($_GET['success'])) {

            echo "<div class=\"woocommerce-message\">" . __("Withdrawal request sent.", "fsww") . "</div>";

        }

        ?>

        <form id="send_money" method="post">

            <input type="hidden" value="fsww" name="fsww-request-withrawal">

            <input type="hidden" value="<?php echo $actual_link; ?>" name="fsww-rdr">

            <p class="form-row form-row-wide">

                <label for="amount" class=""><?php _e('Amount', 'fsww') ?></label>
                <input
                        type="number"
                        class="input-text fsww-input"
                        name="amount"
                        id="amount"
                        placeholder="<?php echo esc_attr(get_option('fsww_withdrawal_input_min', '1')); ?>"
                        min="<?php echo esc_attr(get_option('fsww_withdrawal_input_min', '1')); ?>"
                        max="<?php echo esc_attr(get_option('fsww_withdrawal_input_max', '10000')); ?>"
                        step="any"
                        required
                >

            </p>

            <p class="form-row form-row-wide">

                <label for="method" class=""><?php _e('Select Payment Method', 'fsww') ?></label>
                <select name="method" class="input-select" id="fsww-payment-method" required>
                    <option value=""><?php _e("Select Payment Method", "fsww") ?></option>
                    <?php if (get_option('fsww_withdrawals_paypal', 'on') == 'on') { ?>
                        <option value="paypal"><?php _e("PayPal", "fsww") ?></option>
                        <?php
                    }

                    if (get_option('fsww_withdrawals_bitcoin', 'off') == 'on') { ?>
                        <option value="bitcoin"><?php _e("Bitcoin", "fsww") ?></option>

                    <?php }

                    if (get_option('fsww_withdrawals_swift', 'off') == 'on') { ?>
                        <option value="swift"><?php _e("SWIFT", "fsww") ?></option>
                    <?php }

                    if (get_option('fsww_withdrawals_bank_transfer', 'off') == 'on') { ?>
                        <option value="bank"><?php _e("Bank Transfer", "fsww") ?></option>
                    <?php }

                    if (get_option('fsww_withdrawals_bank_ita_transfer', 'off') == 'on') { ?>
                        <option value="bank-ita"><?php _e("Bonifico Bancario ", "fsww") ?></option>
                    <?php }

                    if (get_option('fsww_withdrawals_bank_transfer_turkey', 'off') == 'on') { ?>
                        <option value="bank_turkey"><?php _e("Bank Transfer (Turkey)", "fsww") ?></option>
                    <?php }

                    if (get_option('fsww_withdrawals_bank_transfer_bacs', 'off') == 'on') { ?>
                        <option value="bank-bacs"><?php _e("Bank Transfer (BACS)", "fsww") ?></option>
                    <?php } ?>
                </select>

            </p>

            <div id="paypal-option">

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('PayPal Address', 'fsww') ?></label>
                    <input type="email" class="input-text fsww-input fsww-required" name="paypal-address" id="address"
                           value="">

                </p>

            </div>


            <div id="bitcoin-option">

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Bitcoin Address', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bitcoin-address" id="address"
                           value="">

                </p>

            </div>

            <div id="swift-option">

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Full Name *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="swift[fn]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Billing Address Line 1 *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="swift[bal1]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Billing Address Line 2', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="swift[bal2]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Billing Address Line 3', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="swift[bal3]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('City *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="swift[city]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('State', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="swift[state]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Postcode *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="swift[pc]" value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Country *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="swift[country]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Bank Account Holder\'s Name *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="swift[bahn]" value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Bank Account Number/IBAN *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="swift[iban]" value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('SWIFT Code *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="swift[swift]" value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Bank Name in Full *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="swift[bfn]" value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Bank Branch City *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="swift[bbcity]" value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Bank Branch Country *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="swift[bbcountry]" value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Intermediary Bank - Bank Code', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input" name="swift[ibbc]" value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Intermediary Bank - Name', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input" name="swift[ibn]" value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Intermediary Bank - City', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input" name="swift[ibcity]" value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Intermediary Bank - Country', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input" name="swift[ibcountry]" value="">

                </p>

            </div>


            <div id="bank-option">

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Owner Name *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank[fn]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Bank Name *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank[bn]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Bank Agency Number *', 'fsww') ?></label>
                    <input type="number" class="input-text fsww-input fsww-required" name="bank[ban]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Bank Account Number *', 'fsww') ?></label>
                    <input type="number" class="input-text fsww-input fsww-required" name="bank[bacn]" value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('CPF *', 'fsww') ?></label>
                    <input type="number" class="input-text fsww-input fsww-required" name="bank[cpf]" value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Account Type *', 'fsww') ?></label>
                    <select name="bank[type]" class="input-text fsww-input fsww-required">
                        <option label="<?php _e('Checking Account', 'fsww') ?>"><?php _e('Checking Account *',
                                'fsww') ?></option>
                        <option label="<?php _e('Savings  Account', 'fsww') ?>"><?php _e('Savings  Account *',
                                'fsww') ?></option>
                    </select>

                </p>


            </div>


            <div id="bank-ita-option">

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Nome *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-ita[Nome]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Cognome *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-ita[Cognome]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Codice fiscale *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-ita[Codice fiscale]"
                           value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Sesso *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-ita[Sesso]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Numero di telefono *', 'fsww') ?></label>
                    <input type="tel" class="input-text fsww-input fsww-required" name="bank-ita[Numero di telefono]"
                           value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Via/Piazza e numero *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-ita[Via/Piazza e numero]"
                           value="">

                </p>


                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Codice postale *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-ita[Codice postale]"
                           value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Città *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-ita[Città]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Provincia *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-ita[Provincia]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Paese *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-ita[Paese]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Nome di banca *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-ita[Nome di banca]"
                           value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('IBAN *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-ita[IBAN]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('BIC/SWIFT *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-ita[BIC/SWIFT]" value="">

                </p>


            </div>







            <div id="bank-bacs-option">

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('First Name', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-bacs[First Name]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Last Name', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-bacs[Last Name]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Bank Name', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-bacs[Bank Name]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Account Number', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-bacs[Account Number]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Sort Code', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank-bacs[Sort Code]" value="">

                </p>

            </div>





            <div id="bank_turkey-option">

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Owner Name *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank_turkey[fn]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Bank Name *', 'fsww') ?></label>
                    <input type="text" class="input-text fsww-input fsww-required" name="bank_turkey[bn]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('IBAN *', 'fsww') ?></label>
                    <input type="number" class="input-text fsww-input fsww-required" name="bank_turkey[ban]" value="">

                </p>

                <p class="form-row form-row-wide">

                    <label for="address" class=""><?php _e('Bank Account Number *', 'fsww') ?></label>
                    <input type="number" class="input-text fsww-input fsww-required" name="bank_turkey[bacn]" value="">

                </p>


            </div>


            <input type="submit" class="button" value="<?php _e('Send Request', 'fsww') ?>">

        </form>
    </div>

<br>

    <table class="fsww-request-table woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">

        <thead>

        <tr>

            <th><?php _e("ID", "fsww") ?></th>
            <th><?php _e("Amount", "fsww") ?></th>
            <th><?php _e("Method", "fsww") ?></th>
            <th><?php _e("Address", "fsww") ?></th>
            <th><?php _e("Status", "fsww") ?></th>

        </tr>

        </thead>

        <tbody>

        <?php

        if ($query) {

            foreach ($query as $request) {

                $request_id = $request->request_id;
                $amount = fsww_price($request->amount);
                $status = $request->status;

                $method = $request->payment_method;
                $address = $request->address;

                if ($method == "SWIFT") {

                    $json_value = json_decode($request->address);

                    $address = "<strong>" . __('Full Name', 'fsww') . "</strong>: " . $json_value->fn . "<br>";
                    $address .= "<strong>" . __('Billing Address Line 1',
                            'fsww') . "</strong>: " . $json_value->bal1 . "<br>";
                    $address .= "<strong>" . __('Billing Address Line 2',
                            'fsww') . "</strong>: " . $json_value->bal2 . "<br>";
                    $address .= "<strong>" . __('Billing Address Line 3',
                            'fsww') . "</strong>: " . $json_value->bal3 . "<br>";
                    $address .= "<strong>" . __('City', 'fsww') . "</strong>: " . $json_value->city . "<br>";
                    $address .= "<strong>" . __('State', 'fsww') . "</strong>: " . $json_value->state . "<br>";
                    $address .= "<strong>" . __('Postcode', 'fsww') . "</strong>: " . $json_value->pc . "<br>";
                    $address .= "<strong>" . __('Country', 'fsww') . "</strong>: " . $json_value->country . "<br>";
                    $address .= "<strong>" . __('Bank Account Holder\'s Name',
                            'fsww') . "</strong>: " . $json_value->bahn . "<br>";
                    $address .= "<strong>" . __('Bank Account Number/IBAN',
                            'fsww') . "</strong>: " . $json_value->iban . "<br>";
                    $address .= "<strong>" . __('SWIFT Code', 'fsww') . "</strong>: " . $json_value->swift . "<br>";
                    $address .= "<strong>" . __('Bank Name in Full',
                            'fsww') . "</strong>: " . $json_value->bfn . "<br>";
                    $address .= "<strong>" . __('Bank Branch City',
                            'fsww') . "</strong>: " . $json_value->bbcity . "<br>";
                    $address .= "<strong>" . __('Bank Branch Country',
                            'fsww') . "</strong>: " . $json_value->bbcountry . "<br>";
                    $address .= "<strong>" . __('Intermediary Bank - Bank Code',
                            'fsww') . "</strong>: " . $json_value->ibbc . "<br>";
                    $address .= "<strong>" . __('Intermediary Bank - Name',
                            'fsww') . "</strong>: " . $json_value->ibn . "<br>";
                    $address .= "<strong>" . __('Intermediary Bank - City',
                            'fsww') . "</strong>: " . $json_value->ibcity . "<br>";
                    $address .= "<strong>" . __('Intermediary Bank - Country',
                            'fsww') . "</strong>: " . $json_value->ibcountry . "<br>";

                } else {
                    if ($method == "Bank Transfer") {

                        $json_value = json_decode($request->address);

                        $address = "<strong>" . __('Owner Name', 'fsww') . "</strong>: " . $json_value->fn . "<br>";
                        $address .= "<strong>" . __('Bank Name', 'fsww') . "</strong>: " . $json_value->bn . "<br>";
                        $address .= "<strong>" . __('Bank Agency Number',
                                'fsww') . "</strong>: " . $json_value->ban . "<br>";
                        $address .= "<strong>" . __('Bank Account Number',
                                'fsww') . "</strong>: " . $json_value->bacn . "<br>";
                        $address .= "<strong>" . __('CPF', 'fsww') . "</strong>: " . $json_value->cpf . "<br>";
                        $address .= "<strong>" . __('Account Type',
                                'fsww') . "</strong>: " . $json_value->type . "<br>";

                    } else {
                        if ($method == "Bank Transfer (Turkey)") {

                            $json_value = json_decode($request->address);

                            $address = "<strong>" . __('Owner Name', 'fsww') . "</strong>: " . $json_value->fn . "<br>";
                            $address .= "<strong>" . __('Bank Name', 'fsww') . "</strong>: " . $json_value->bn . "<br>";
                            $address .= "<strong>" . __('Bank Agency Number',
                                    'fsww') . "</strong>: " . $json_value->ban . "<br>";
                            $address .= "<strong>" . __('Bank Account Number',
                                    'fsww') . "</strong>: " . $json_value->bacn . "<br>";

                        } else {
                            if ($method == "Bank Transfer (Italy)") {

                                $json_value = json_decode($request->address, true);

                                $address = '';
                                foreach ($json_value as $key => $value) {
                                    if (trim($value) != '') {
                                        $address .= "<strong>" . $key . "</strong>: " . $value . "<br>";
                                    }
                                }

                            } else {
                                if ($method == "Bank Transfer (BACS)") {

                                    $json_value = json_decode($request->address, true);

                                    $address = '';
                                    foreach ($json_value as $key => $value) {
                                        if (trim($value) != '') {
                                            $address .= "<strong>" . $key . "</strong>: " . $value . "<br>";
                                        }
                                    }

                                }
                            }
                        }
                    }
                }

                if ($status == 'under_review') {

                    $status = __("Under Review", "fsww");

                } elseif ($status == 'accepted') {

                    $status = __("Request Accepted", "fsww");

                } elseif ($status == 'rejected') {

                    $status = __("Request Rejected", "fsww");

                }


                ?>

                <tr>

                    <td data-title="<?php echo __('ID', 'fsww') ?>"><?php echo $request_id ?></td>
                    <td data-title="<?php echo __('Amount', 'fsww') ?>"><?php echo $amount ?></td>
                    <td data-title="<?php echo __('Method', 'fsww') ?>"><?php echo __($method, "fsww") ?></td>
                    <td data-title="<?php echo __('Address', 'fsww') ?>"><?php echo $address ?></td>
                    <td data-title="<?php echo __('Status', 'fsww') ?>"><?php echo $status ?></td>

                </tr>

                <?php

            }

        } else {

            ?>

            <tr>

                <td class="center" colspan="5"><?php _e("There is no requests", "fsww") ?></td>

            </tr>

        <?php } ?>

        </tbody>

    </table>


    <script type="text/javascript">

        (function () {

            "use strict";

            jQuery(function ($) {

                jQuery("#fsww-payment-method").on("change", function () {

                    fsww_hide_all_payment_options();

                    var payment_option = jQuery("#fsww-payment-method").val();

                    jQuery("#" + payment_option + "-option").show();
                    jQuery("#" + payment_option + "-option .fsww-required").prop('required', true);

                });

            });

            function fsww_hide_all_payment_options() {

                jQuery("#paypal-option").hide();
                jQuery("#bitcoin-option").hide();
                jQuery("#swift-option").hide();
                jQuery("#bank-option").hide();
                jQuery("#bank_turkey-option").hide();
                jQuery("#bank-ita-option").hide();

                jQuery(".fsww-required").prop('required', false);

            }

        })();

    </script>
<?php } ?>