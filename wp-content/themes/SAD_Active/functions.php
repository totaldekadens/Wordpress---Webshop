<?php

use Symfony\Component\CssSelector\Node\FunctionNode;

include 'enqueue.php';



// Lägger till olika temasupports
add_theme_support('post-thumbnails');
add_theme_support('category-thumbnails');
add_theme_support('menus'); 
add_theme_support('widgets'); 
add_theme_support('custom-logo');
add_theme_support('woocommerce');


// gör så att produkt bilderna blir mer responsiva
function remove_new_wc_features() {
	remove_theme_support( 'wc-product-gallery-zoom' );
	remove_theme_support( 'wc-product-gallery-slider' );
    
}
add_filter( 'after_setup_theme', 'remove_new_wc_features', 99 );


//stänger av produkt pagination
add_filter( 'theme_mod_storefront_product_pagination', '__return_false', 11 );

// Lägg till länk till varukorgen under "Slutför köp"

function go_to_cart(){
    ?>
    <a class="changeCart" href="<?php echo wc_get_cart_url(); ?>">Ändra varukorg</a> 
    <br>
    <h3>Välj betalningsmetod</h3>
    
    <?php
}


/* add_action('woocommerce_review_order_before_submit','go_to_cart'); */
add_action('woocommerce_review_order_before_payment','go_to_cart');

// lägger till en nästa knapp i cart
function next_cart(){
    ?>
    <span class="errorText">*Fyll i dina uppgifter först!</span>
    <div class="nasta">Nästa</div> 
    <?php

}

add_action('woocommerce_review_order_after_payment','support_checkOut');

function support_checkOut() {

    $page = get_page_by_title( 'kontakt' );
?>
    <div class="support">Behöver du hjälp med ditt köp? Kontakta oss på +46-73 612 54 11 eller via vår <a href="<?php echo $page->guid?>">kontaktsida</a> </div> 
    <?php
}

add_action('woocommerce_checkout_after_customer_details', 'next_cart');




// Registrerar och lägger till menyer
function registrera_meny() {

    register_nav_menu('header-store-right', 'header-store-right');
    register_nav_menu('header-store-left', 'header-store-left');

}

add_action('after_setup_theme', 'registrera_meny');


// Lägger till och registrerar widgets (sidebars)
function my_register_sidebars() {
    
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

    register_sidebar( array(
        'name' => 'hero-top',
        'id' => 'hero-top',
        'description' => 'Hero-top',
    ));
    register_sidebar( array(
        'name' => 'hero-tights',
        'id' => 'hero-tights',
        'description' => 'Hero-tights',
    ));
    register_sidebar( array(
        'name' => 'hero-jacket',
        'id' => 'hero-jacket',
        'description' => 'Hero-jacket',
    ));
    register_sidebar( array(
        'name' => 'hero-products',
        'id' => 'hero-products',
        'description' => 'hero-products',
    ));
    register_sidebar( array(
        'name' => 'usp',
        'id' => 'usp',
        'description' => 'usp',
    ));
    register_sidebar( array(
        'name' => 'searchbar',
        'id' => 'searchbar',
        'description' => 'searchbar',
    ));
    register_sidebar( array(
        'name' => 'carousel_pic_1',
        'id' => 'carousel_pic_1',
        'description' => 'First picture in the carousel'
    ));
    register_sidebar( array(
        'name' => 'carousel_pic_2',
        'id' => 'carousel_pic_2',
        'description' => 'Second picture in the carousel'
    ));
    register_sidebar( array(
        'name' => 'carousel_pic_3',
        'id' => 'carousel_pic_3',
        'description' => 'Third picture in the carousel'
    ));


}

add_action( 'widgets_init', 'my_register_sidebars' );



// Hookar
function newSettingsHooks() {
    
    add_action('storefront_before_content', 'addUsp', 1); // Lägger till usp
    add_action('storefront_before_content', 'addHero', 2); // Lägger till Hero

    if(is_front_page()) {
        add_action('storefront_before_content', 'addHeroSlider', 2);
    }

    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
    remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );

}

add_action('wp', 'newSettingsHooks');


function addUsp() {

    ?><div class="usp">

        <?php dynamic_sidebar('usp') ?>

    </div><?php

}


// Heroslider till startsidan
function addHeroSlider() {
?>
    <div class="slideshow-container fade">

    <!-- Full images with numbers and message Info -->
    <div class="Containers fade">
          <?php dynamic_sidebar('carousel_pic_1') ?>
    </div>
  
    <div class="Containers fade">
          <?php dynamic_sidebar('carousel_pic_2') ?>
    </div>
  
    <div class="Containers fade">
          <?php dynamic_sidebar('carousel_pic_3') ?>
    </div>
  
    <!-- Back and forward buttons -->
    <a class="Back" onclick="plusSlides(-1)">&#10094;</a>
    <a class="forward" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <!-- The circles/dots -->
  <div style="text-align:center">
    <span class="dots" onclick="currentSlide(1)"></span>
    <span class="dots" onclick="currentSlide(2)"></span>
    <span class="dots" onclick="currentSlide(3)"></span>
  </div> 

  <?php
}




// lägger till sidebar (i detta fall hero) beroende på vilken sida du är inne på.
function addHero() {

    if(is_product_category('tights')) {
        dynamic_sidebar('hero-tights');
    } 
    else if (is_product_category('jacket')) {
        dynamic_sidebar('hero-jacket');
    } 
    else if(is_product_category('top')) {
        dynamic_sidebar('hero-top');
    }
    else if (is_shop()) {
        dynamic_sidebar('hero-products');
    }  
}




// om man är på kassasidan. Ta bort header, footer och olika fält 
function removeStorefront() {

    if(is_checkout()) {

        remove_action( 'storefront_header', 'storefront_header_container', 0 );
        remove_action( 'storefront_header', 'storefront_skip_links', 5 );
        remove_action( 'storefront_header', 'storefront_site_branding', 20 );
        remove_action( 'storefront_header', 'storefront_secondary_navigation', 30 );
        remove_action( 'storefront_header', 'storefront_header_container_close', 41 ); 

        remove_all_actions('storefront_header'); // Tar bort allt i headern
        remove_all_actions('storefront_footer'); // Tar bort allt i footern
        remove_action('storefront_before_content', 'woocommerce_breadcrumb', 10);  // Tar bort breadcrumbs 
        remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); // Tar bort rabattkoden däruppe

        add_action('woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); // Lägger till rabattkoden där nere istället
        


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




// Lägger till vår egen header
function customizedHeader() { ?>
<div class="headerTop">
    <div class="logo"><?php the_custom_logo() ?></div>
</div>

<div class="navigationHeader">

    <div class="searchbar">
        <?php dynamic_sidebar('searchbar'); ?>
    </div>

</div>

<?php
}

add_action( 'storefront_header', 'customizedHeader', 45 );



?>