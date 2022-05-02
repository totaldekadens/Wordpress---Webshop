<?php

/**
 * Woo_Swish_Helper class
 *
 * @class          Woo_Swish_Helper
 * @version        1.0.0
 * @package        Woocommerce_Swish/Classes
 * @category       Class
 * @author         BjornTech
 */

defined('ABSPATH') || exit;

class Woo_Swish_Helper
{

    /**
     * error_code function.
     *
     * @access public static
     * @param string $code
     * @return string $text
     */
    public static function error_code($code)
    {
        $codes = array(
            'PA01' => __('You have to use a "Swish Handel" account and select BjornTech as Technical Supplier in your Bank for the service to work', 'woo-swish-e-commerce'),
            'PA08' => __('Invalid age format', 'woo-swish-e-commerce'),
            'FF08' => __("PayeePaymentReference is invalid", 'woo-swish-e-commerce'),
            'RP03' => __("Callback URL is missing or does not use Https", 'woo-swish-e-commerce'),
            'BE18' => __("Payer alias is invalid", 'woo-swish-e-commerce'),
            'RP01' => __("Payee alias is missing or empty", 'woo-swish-e-commerce'),
            'PA02' => __("Amount value is missing or not a valid number", 'woo-swish-e-commerce'),
            'AM06' => __("Amount value is too low", 'woo-swish-e-commerce'),
            'AM02' => __("Amount value is too large", 'woo-swish-e-commerce'),
            'AM03' => __("Invalid or missing currency", 'woo-swish-e-commerce'),
            'RP02' => __("Wrong formatted message", 'woo-swish-e-commerce'),
            'RP06' => __("Another active request already exists for this swish number", 'woo-swish-e-commerce'),
            'ACMT03' => __("Payer not Enrolled", 'woo-swish-e-commerce'),
            'ACMT01' => __("Counterpart is not activated", 'woo-swish-e-commerce'),
            'ACMT07' => __("Payee not Enrolled", 'woo-swish-e-commerce'),
            'ACMT17' => __("Not a valid swish number", 'woo-swish-e-commerce'),
            'VR01' => __("The Swish-user does not meet the required age limit", 'woo-swish-e-commerce'),
            'VR02' => __("The payer alias in the request is not enroled in swish with the supplied ssn", 'woo-swish-e-commerce'),
            'WAITING' => __("Start your Swish-App and authorize the payment", 'woo-swish-e-commerce'),
            'PAID' => __('Thank you. Your order has been received.', 'woo-swish-e-commerce'),
            'DECLINED' => __("Payment declined", 'woo-swish-e-commerce'),
            'ERROR' => __("An error has occured", 'woo-swish-e-commerce'),
            'RF07' => __("Transaction declined", 'woo-swish-e-commerce'),
            'BANKIDCL' => __("Payer cancelled BankId signing", 'woo-swish-e-commerce'),
            'FF10' => __("Bank system processing error", 'woo-swish-e-commerce'),
            'TM01' => __("Swish timed out before the payment was started", 'woo-swish-e-commerce'),
            'RF07' => __("Check the payment with your Bank", 'woo-swish-e-commerce'),
            'RF02' => __("Original payment not found or original payment is more than than 13 months old", 'woo-swish-e-commerce'),
            'DS24' => __("Swish timed out waiting for an answer from the banks. Check with your bank about the status of this payment", 'woo-swish-e-commerce'),
            'BANKIDONGOING' => __("BankID already in use.", 'woo-swish-e-commerce'),
            'BANKIDUNKN' => __("BankID is not able to authorize the payment", 'woo-swish-e-commerce'),
        );
        return array_key_exists($code, $codes) ? $codes[$code] : __("Unknown error received from Swish", 'woo-swish-e-commerce');
    }

    /**
     * get_callback_url function
     *
     * Returns the order's main callback url
     *
     * @access public
     * @return string
     */
    public static function get_callback_url($order_id)
    {

        $args = array(
            'order_id' => $order_id,
        );

        if ('_service' == WC_SEC()->connection_type && wc_string_to_bool(WC_SEC()->get_option('swish_central_callback_enable'))) {
            $args['uuid'] = WC_SEC()->account_uuid;
            $url = 'https://' . trailingslashit(WC_SEC()->service_url) . 'webhook';
        } else {
            $url = get_rest_url(null, 'swish/callback');
        }

        return add_query_arg($args, $url);

    }

    public static function generate_production_id($swish_number)
    {

        return strtoupper(str_replace('-', '', SWISH_UUID::generate(SWISH_UUID::UUID_TIME, SWISH_UUID::FMT_STRING, dechex(strrev($swish_number)))));

    }

    public static function generate_test_id()
    {

        return strtoupper(str_replace('-', '', SWISH_UUID::generate(SWISH_UUID::UUID_RANDOM, SWISH_UUID::FMT_STRING)));

    }

    /**
     * get_transaction_status function
     *
     * If the order has a transaction order reference, we will return it. If no transaction order reference is set we
     * return FALSE.
     *
     * @access public
     * @return string
     */
    public static function get_transaction_status($order)
    {
        return $order->get_meta('_swish_transaction_status', true);
    }

    /**
     * set_transaction_status function
     *
     * Set the transaction status on an order
     *
     * @access public
     * @return void
     */
    public static function set_transaction_status($order, $transaction_status)
    {
        $order->update_meta_data('_swish_transaction_status', $transaction_status);
    }

    /**
     * set_transaction_location function
     *
     * Set the transaction location on an order
     *
     * @access public
     * @return void
     */
    public static function set_transaction_location($order, $transaction_location)
    {
        $order->update_meta_data('_swish_transaction_location', $transaction_location);
    }

    /**
     * get_transaction_location function
     *
     * Set the transaction location on an order
     *
     * @access public
     * @return void
     */
    public static function get_transaction_location($order)
    {
        return $order->get_meta('_swish_transaction_location', true);
    }

    /**
     * get_payment_uuid function
     *
     * If the order has a payment_uuid, we will return it. If no payment_uuid is set we
     * return FALSE.
     *
     * @access public
     * @return string
     */
    public static function get_payment_uuid($order)
    {
        return $order->get_meta('_swish_transaction_payment_uuid', true);
    }

    /**
     * set_payment_uuid function
     *
     * Set the transaction statis on an order
     *
     * @access public
     * @return void
     */
    public static function set_payment_uuid($order, $payment_uuid)
    {
        $order->update_meta_data('_swish_transaction_payment_uuid', $payment_uuid);
    }

    /**
     * note function.
     *
     * Adds a custom order note
     *
     * @access public
     * @return void
     */
    public static function note($order, $message)
    {
        if (isset($message)) {
            $order->add_order_note('Swish: ' . $message);
        }
    }

    /**
     * set_refund_payment_reference
     *
     * Set the transaction location on an order
     *
     * @access public
     * @return void
     */
    public static function set_refund_id($order, $refund_id)
    {
        $order->add_meta_data('_swish_refund_id', $refund_id);
    }

    /**
     * get_payment_reference function
     *
     * If the order has a payment_reference, we will return it. If no payment_reference is set we
     * return FALSE.
     *
     * @param bool $no_legacy set to true if no check of legacy storage (transaction_id) should be performed
     * @access public
     * @return string
     */
    public static function get_payment_reference($order, $no_legacy = false)
    {
        $meta_reference = $order->get_meta('_swish_payment_reference', true);

        if ($no_legacy === true) {
            return $meta_reference;
        }

        return $meta_reference ? $meta_reference : $order->get_transaction_id('edit');

    }

    /**
     * set_payment_reference function
     *
     * Set the payment_reference on an order
     *
     * @access public
     * @return void
     */
    public static function set_payment_reference($order, $payment_reference)
    {
        $order->update_meta_data('_swish_payment_reference', $payment_reference);
        $order->set_transaction_id($payment_reference);
    }

}
