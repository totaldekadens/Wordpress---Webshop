<?php 
/* 
Plugin name: Sad Drone Shipping  
Author:SAD-Active
Description: This is a plugin that adds drone as a shipping alternative.
Version 1.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {


    function drone_shipping_method_init(){
        if( class_exists( 'WC_Shipping_Method')){
            class wc_drone_shipping extends WC_Shipping_Method {

                public function __construct(){

                $this->id = 'wc_drone_shipping';
                $this->method_title = 'drone-shipping';
                $this->method_description = 'Custom shipping method for SAD_Active';
                $this->cities = array(
                    'north',
                    'mid',
                    'south',
                );
                $this->enabled = isset($this->settings['enabled']) ? $this->settings['enabled'] : 'yes';
                $this->title = 'Drone Shipping';
                $this->init();      
                }

                public function init(){
                    $this->init_form_fields();
                    $this->init_settings();

                    add_action('woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options'));
                }

                function init_form_fields(){
                    $this->form_fields = array(
                        'enabled' => array(
                        'title' => 'Enable', 'Drone Shipping',
                        'type' => 'checkbox',
                        'label' => 'Enable this shipping method',
                        'default' => 'yes'
                        ),
                        'price' => array(// lägger en till rad i options som man kan skriva in pris men går ej att justera priset just nu
                        'title'=> 'Price(kr) excl tax', 
                        'type'=> 'number',
                        'default' => $this->rate[2]// bör finna ett sätt att targeta priset i $rate
                        ),
                        'weight' => array(
                        'title' => 'Weight (kg)',
                        'type' => 'number',
                        'default' => 10
                        ),
                        'title' => array(
                        'title' => 'Title', 'Drone Shipping',
                        'type' => 'text',
                        'description' => ('Detta styra titeln som användaren ser i checkout.'),
                        'desc_tip' => true,
                        'default' => 'Drone Shipping', 'Drone Shipping'
                        
                        ),
                    );
                }

                public function calculate_shipping( $package = array() ) {
                    $rate = array(
                        'label' => $this->title,
                        'id' => $this->id,
                        'cost' => '400.00',
                        'calc_tax' => 'per_order'
                    );
                    
                    $this->add_rate($rate);
                    $weight = 0;
                    $cost = 0;
                    $cities = $package["destination"]["city"];
                    foreach ($package['contents'] as $item_id => $values) {
                    $_product = $values['data'];
                    $weight = $weight + $_product->get_weight() * $values['quantity'];
                    }
                    $weight = wc_get_weight($weight, 'kg');
                    if ($weight <= 1) {
                    $cost = 400.00;
                    } elseif ($weight <= 5) {
                    $cost = 800;
                    } elseif ($weight <= 10) {
                    $cost = 1200;
                    }

                    $countryZones = array(
                        'south' => 1,
                        'mid' => 2,
                        'north' => 3
                        );
                    $zonePrices = array(
                        2 => 100,
                        3 => 200
                        );
                    $zoneFromCountry = $countryZones[$cities];
                    $priceFromZone = $zonePrices[$zoneFromCountry];
                    $cost += $priceFromZone;

                }

                // public function process_admin_options() {
                //     if ( ! $this->instance_id ) {
                //         return parent::process_admin_options();
                //     }
            
                //     // Check we are processing the correct form for this instance.
                //     if ( ! isset( $_REQUEST['instance_id'] ) || absint( $_REQUEST['instance_id'] ) !== $this->instance_id ) { // WPCS: input var ok, CSRF ok.
                //         return false;
                //     }
            
                //     $this->init_instance_settings();
            
                //     $post_data = $this->get_post_data();
            
                //     foreach ( $this->get_instance_form_fields() as $key => $field ) {
                //         if ( 'title' !== $this->get_field_type( $field ) ) {
                //             try {
                //                 $this->instance_settings[ $key ] = $this->get_field_value( $key, $field, $post_data );
                //             } catch ( Exception $e ) {
                //                 $this->add_error( $e->getMessage() );
                //             }
                //         }
                //     }
            
                //     return update_option( $this->get_instance_option_key(), apply_filters( 'woocommerce_shipping_' . $this->id . '_instance_settings_values', $this->instance_settings, $this ), 'yes' );
                // }
            }
        }
    }  
    add_action('woocommerce_shipping_init', 'drone_shipping_method_init');
    
    function add_drone_shipping_method($methods) {

        $methods['drone_shipping'] = 'wc_drone_shipping';
        return $methods;
    }
    add_filter ('woocommerce_shipping_methods', 'add_drone_shipping_method');

    // function ds_validate_order($posted) {

    //     $packages = WC()->shipping->get_packages();
    //     $chosen_methods = WC()->session->get('chosen_shipping_methods');
    //     if (is_array($chosen_methods) && in_array('Drone Shipping', $chosen_methods)) {
    //         foreach ($packages as $i => $package) {
    //             if ($chosen_methods[$i] != "Drone Shipping") {
    //                 continue;
    //             }
    //                 $wc_drone_shipping = new wc_drone_shipping();
    //                 $weightLimit = (int)$wc_drone_shipping->settings['weight'];
    //                 $weight = 0;
    //                     foreach ($package['contents'] as $item_id => $values) {
    //                         $_product = $values['data'];
    //                         $weight = $weight + $_product->get_weight() * $values['quantity'];
    //                     }
    //                     $weight = wc_get_weight($weight, 'kg');
    //             if ($weight > $weightLimit) {
    //                 $message = sprintf(__('OOPS, %d kg increase the maximum weight of %d kg for %s', 'Drone Shipping'), $weight, $weightLimit, $wc_drone_shipping->title);
    //                 $messageType = "error";
    //                 if (!wc_has_notice($message, $messageType)) {
    //                 wc_add_notice($message, $messageType);
    //                 }
    //             }
    //         }
    //     }
    // }
    // add_action('woocommerce_review_order_before_cart_contents', 'DS_validate_order', 10);
    // add_action('woocommerce_after_checkout_validation', 'DS_validate_order', 10);


}
?>