<?php 


include 'enqueue.php';



// Lägger till olika temasupports
add_theme_support('post-thumbnails');
add_theme_support('category-thumbnails');
add_theme_support('menus'); 
add_theme_support('widgets'); 
add_theme_support('custom-logo');
add_theme_support('woocommerce');



// Registrerar och lägger till menyer
function registrera_meny() {

    register_nav_menu('huvudmeny', 'Huvudmeny');
    register_nav_menu('header-right', 'header-right');
    register_nav_menu('header-left', 'header-left');
    register_nav_menu('dropdown', 'dropdown');
    register_nav_menu('dropdown-center-top', 'dropdown-center-top');
    register_nav_menu('dropdown-center-down', 'dropdown-center-down');
    register_nav_menu('dropdown-right-top', 'dropdown-right-top');
    register_nav_menu('dropdown-left-top', 'dropdown-left-top');
    register_nav_menu('dropdown-right-down', 'dropdown-right-down');
}

add_action('after_setup_theme', 'registrera_meny');


// Lägger till och registrerar widgets (sidebars)
function my_register_sidebars() {
   
    /* Exempel */
    register_sidebar( array(
        'name' => 'huvudmeny',
        'id' => 'huvudmeny',
    ));

    register_sidebar( array( 
        'name' => 'searchbar',
        'id' => 'searchbar',
    ));

/*     register_sidebar( array( 
        'name' => 'header-right',
        'id' => 'header-right',
    ));

    register_sidebar( array( 
        'name' => 'header-left',
        'id' => 'header-left',
    )); */

    register_sidebar( array( 
        'name' => 'dropdown-right',
        'id' => 'dropdown-right',
    ));

    register_sidebar( array( 
        'name' => 'dropdown-left',
        'id' => 'dropdown-left',
    ));

    register_sidebar( array( 
        'name' => 'dropdown-center',
        'id' => 'dropdown-center',
    ));
    
    // footer
    register_sidebar( array(
        'name' => 'footerSidebar1',
        'id' => 'footerSidebar1',
        'description' => 'help and info'
    ));
    register_sidebar( array(
        'name' => 'footerSidebar2',
        'id' => 'footerSidebar2',
        'description' => 'socialmedia',
    ));

}

add_action( 'widgets_init', 'my_register_sidebars' );



// Hookar

function newSettingsHooks() {
    
    add_action( 'storefront_header', 'headerContainerLogo', 1 );
    add_action( 'storefront_header', 'headerContainerLogoClose', 3 );
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

    if(is_product_category()) {

        remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
        remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
        remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
        remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
      
    }
    
}

add_action('wp', 'newSettingsHooks');



// Lägger till nya taggar i header

if ( ! function_exists('headerContainerLogo') ) {


	function headerContainerLogo() {
		 echo '<div class="headerContainerLogo">';
	}

}

if ( ! function_exists('headerContainerLogoClose') ) {


	function headerContainerLogoClose() {
		 echo '</div>';
	}

}




// om man är på kassasidan. Ta bort header, footer och olika fält 

function removeStorefront() {

    if(is_checkout()) {

        remove_all_actions('storefront_header'); // TA bort allt i headern
        remove_all_actions('storefront_footer'); // TA bort allt i footern
        remove_action('storefront_before_content', 'woocommerce_breadcrumb', 10);  // Ta bort breadcrumbs 
        remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); // Ta bort rabattkoden däruppe

        add_action('woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); // Lägger till rabattkoden där nere istället
        

        // Ta bort fält i checkout
        add_filter('woocommerce_checkout_fields', 'ams_overwrite_checkout_fields');

        function ams_overwrite_checkout_fields($fields) {

            unset(
                $fields['order']['order_comments'], // Tar bort orderkommentarer / Anteckningar (valfritt)
                $fields['billing']['billing_address_2'],  // Tar bort addressrad 2
                $fields['shipping']['shipping_address_2'],
                $fields['shipping']['shipping_company'],  
                $fields['billing']['billing_company'], // Tar bort Företagsnamn (valfritt)
            );

            return $fields;

        }
    }
}

add_action('wp', 'removeStorefront');

?>