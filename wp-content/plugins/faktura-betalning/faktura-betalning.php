<?php
/*
Plugin name: faktura-betalning
Author: Sad Active
Description: Detta är en plugin som lägger faktura som en betalnings alternativ.
Version: 1.0
*/



add_filter( 'woocommerce_payment_gateways', 'sad_add_gateway_class' );
function sad_add_gateway_class( $gateways ) {
	$gateways[] = 'WC_sad_Gateway';
	return $gateways;
}

add_action( 'plugins_loaded', 'sad_init_gateway_class' );
function sad_init_gateway_class() {

	class WC_sad_Gateway extends WC_Payment_Gateway {

        public function __construct(){
            $this->id = 'sad_payments';
            $this->has_fields = 'true';
            $this->method_title = 'Faktura';
            $this->method_description = 'Detta är en faktura betalning.';
            
            
            $this->supports = array(
                'products'
            );

            $this->init_form_fields();
            $this->init_settings();
            $this->title = $this->get_option('title');
            $this->description = $this->get_option('decription');
            $this->enabled = $this->get_option('enabled');
            $this->testmode = 'yes' === $this->get_option('testmode');
            $this->private_key = $this->testmode ? $this->get_option('test_private_key') : $this->get_option('private_key');
            $this->publishable_key = $this->testmode ? $this->get_option( 'test_publishable_key' ) : $this->get_option( 'publishable_key' );
        
        
        
        
            add_action('woocommerce_update_options_payment_gateways_' . $this->id,array( $this, 'process_admin_options'));
            add_action('wp_enqueue_scripts', array($this, 'payment_scripts')); 
        }

        public function init_form_fields(){
            $this->form_fields = array(
                'enabled' => array(
                    'title' => 'Enable/Disable',
                    'label' => 'Enable Faktura',
                    'type' => 'checkbox',
                    'description' => 'Detta är en faktura betalning som sedan faktureras till din adress',
                    'default' =>'no'
                ),
                'title' => array(

                    'title' => 'Title',
                    'type' => 'text',
                    'description' => 'Detta är en faktura betalning som sedan faktureras till din adress',
                    'defualt' => 'Faktura',
                    'desc_tip' => true,

                ),
                'description' => array(
                    'title' => 'Description',
                    'type' => 'textarea',
                    'description' => 'Detta är en faktura betalning som sedan faktureras till din adress',
                    'default' => 'Betala inom 30 dagar annars kommer en påminnelseavgift på 300kr',
                
                )
            );    
        }

        public function payment_fields(){

     
                $this->description .='Betala inom 30 dagar annars kommer en påminnelseavgift på 300kr.  Detta är en test så ta det lugnt det kommer ingen faktura till dig. ELLER ??';
                $this->description  = trim( $this->description );
        
            echo wpautop( wp_kses_post( $this->description ) );

            echo '<fieldset id="faktura-cc-form" class="wc-faktura-form wc-payment-form">';

            do_action('woocommerce_faktura_form_start', $this->id);

            echo '<p class="form-row form-row-wide">';

            echo '<label for="faktura-payer-alias">' . '<span class="required">Personnummer*</span></label>';

            echo '<input id="faktura-payer-alias" class="input-text wc-faktura-form-payer-alias" type="number" autocomplete="off" name="faktura-payer-alias" placeholder="ÅÅMMDDNNNN" data-maxlength="10" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" />';

            echo '</p>';

            do_action('woocommerce_faktura_form_end', $this->id);

            echo '<div class="clear"></div>';

            echo '</fieldset>';
        }

        public function validate_fields(){

            if( empty( $_POST[ 'faktura-payer-alias' ]) ) {

                wc_add_notice(  'Personnummer är inte ifyllt!', 'error' );
                return false;
            }
        
            $pnr = $_POST[ 'faktura-payer-alias' ];
            
            
            if (strlen($pnr) != 10) {
            wc_add_notice(  'Ogiltigt personnummer!', 'error' );
            return false;
            
            }
            $n = 2;
            
            for ($i=0; $i<9; $i++) 
            {
            $tmp = $pnr[$i] * $n;
            ($tmp > 9) ? $sum += 1 + ($tmp % 10) : $sum += $tmp;
            ($n == 2) ? $n = 1 : $n = 2;
            }
            
            
            $pnr = !(($sum + $pnr[9]) % 10);
            
            
            if ($pnr != 1) {
            wc_add_notice( 'Ogiltigt personnummer!'  , 'error' );
            return false;
            }

            
            
            return true;
        }   

        public function process_payment( $order_id ) {

            global $woocommerce;

            $order = wc_get_order( $order_id );
            $order->payment_complete();
            $order->add_order_note( 'Hej ditt order är nu mottagen, En faktura är nu ivägskickad ', true );

            $woocommerce->cart->empty_cart();

            return array(

                'result' => 'success',

                'redirect' => $this->get_return_url( $order )
            );
        }
    }
}

?>