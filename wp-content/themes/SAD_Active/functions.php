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

// flyttar på shortDesc
function delete_shortDesc(){

    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

}
add_action('init', 'delete_shortDesc');

function move_shortDesc(){

    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 30 );
}
add_action('init', 'move_shortDesc');


// Lägg till länk till varukorgen under "Beställning"
function go_to_cart(){
    ?>
    <div class="orderButtons flex">
        <a class="changeCart" href="<?php echo wc_get_cart_url(); ?>">Ändra varukorg</a> 
        <div class="continue">Fortsätt</div>
    </div>
    <br>
    <h3>Välj betalningsmetod</h3>
    
    <?php
}


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

?>
    <div class="support"><?php dynamic_sidebar('supporTextCheckOut') ?> </div> 
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
        'name' => 'hero-products',
        'id' => 'hero-products',
        'description' => 'hero-products',
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
    register_sidebar( array(
        'name' => 'supporTextCheckOut',
        'id' => 'supporTextCheckOut',
        'description' => 'supporTextCheckOut'
    ));
    register_sidebar( array(
        'name' => 'rea',
        'id' => 'rea',
        'description' => 'rea'
    ));

    register_sidebar( array(
        'name' => 'trust_logos',
        'id' => 'trust_logos',
        'description' => 'trust_logos'
    ));


}

add_action( 'widgets_init', 'my_register_sidebars' );



function trustLogos() {

 dynamic_sidebar('trust_logos'); 
 
}

add_action('woocommerce_review_order_after_submit', 'trustLogos');



// Hookar
function newSettingsHooks() {
    
    add_action('storefront_before_content', 'addHeroProdCat', 2); // Lägger till Hero på kategorier
    add_action('storefront_before_content', 'addHeroShop', 2); // Lägger till Hero på "produkter"-sidan

    if(is_front_page()) {
        add_action('storefront_before_content', 'addHeroSlider', 2);
    }

    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

    if(is_product_category() || is_shop()) {
        remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
        remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
        remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
        remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
    }
 
}

add_action('wp', 'newSettingsHooks');


// Karusell till startsidan
function addHeroSlider() {
?>
    <div class="slideshow-container fade">

        <div class="Containers fade">
            <?php dynamic_sidebar('carousel_pic_1') ?>
        </div>
    
        <div class="Containers fade">
            <?php dynamic_sidebar('carousel_pic_2') ?>
        </div>
    
        <div class="Containers fade">
            <?php dynamic_sidebar('carousel_pic_3') ?>
        </div>

        <a class="Back" onclick="plusSlides(-1)">&#10094;</a>
        <a class="forward" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    
    <div style="text-align:center">
        <span class="dots" onclick="currentSlide(1)"></span>
        <span class="dots" onclick="currentSlide(2)"></span>
        <span class="dots" onclick="currentSlide(3)"></span>
    </div> 

  <?php
}




// Lägger till hero på kategorier dynamiskt. 
function addHeroProdCat() {
   
    $categories = get_terms( ['taxonomy' => 'product_cat'] );

    foreach ($categories as $cat => $value) {

         $thumbnail_id = get_term_meta( $value->term_id, 'thumbnail_id', true );
         $image_url = wp_get_attachment_url( $thumbnail_id ); 

         $slug = $value->slug;

        if(is_product_category($slug)) {
            ?>
                <div class="heroCatCont">
                    <?php if($image_url) {

                        ?>
                        <img class= "image-<?php echo $slug ?>" src="<?php echo $image_url?>">
                        <h1><?php echo $value->name ?></h1>
                        <?php

                    } 
                    else {
                        wp_enqueue_style('imageExist');
                        ?><h1><?php echo $value->name ?></h1><?php
                    }
                    ?>
                    
                </div>
            <?php
        }  
    }
}





// lägger till sidebar (i detta fall hero) på "produkter"
function addHeroShop() {


    if (is_shop()) {
        dynamic_sidebar('hero-products');
        wp_enqueue_style('allProducts'); // Lyckades inte få in den i enqueue.php. får ligga här sålänge.
    }  
    else if (is_page('rea')) {
        dynamic_sidebar('rea');
    }
    
}



// Om man är på kassasidan
function removeStorefront() {

    if(is_checkout()) {

        // Tar bort allt i headern
        remove_action( 'storefront_header', 'storefront_header_container', 0 );
        remove_action( 'storefront_header', 'storefront_skip_links', 5 );
        remove_action( 'storefront_header', 'storefront_site_branding', 20 );
        remove_action( 'storefront_header', 'storefront_secondary_navigation', 30 );
        remove_action( 'storefront_header', 'storefront_header_container_close', 41 ); 
        remove_all_actions('storefront_header'); 

        remove_all_actions('storefront_footer'); // Tar bort allt i footern

        remove_action('storefront_before_content', 'woocommerce_breadcrumb', 10);  // Tar bort breadcrumbs 

        remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); // Tar bort rabattkoden däruppe
        add_action('woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); // Lägger till rabattkoden där nere istället
        


        // Tar bort onödiga fält 
        add_filter('woocommerce_checkout_fields', 'ams_overwrite_checkout_fields');

        function ams_overwrite_checkout_fields($fields) {

            unset(
                $fields['order']['order_comments'], // Tar bort orderkommentarer / Anteckningar (valfritt)
                $fields['billing']['billing_address_2'],  // Tar bort addressrad 2 på faktureringsadress
                $fields['shipping']['shipping_address_2'], // Tar bort addressrad 2 på leveransadress
                $fields['shipping']['shipping_company'],  // Tar bort företagsnamn-raden på leveransadress
                $fields['billing']['billing_company'], // Tar bort Företagsnamn-raden på faktureringsadress
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





// Gardin på kategorier 
function selectproductCategory() {

    if(is_product_category()|| is_shop() || is_page('rea')) {
        ?>
        <div class="categorySelection">
            <div class="chooseCategory">
                <select onchange="window.location.href=this.value" name="selectCategory" id="selectCategory">
                    <option value="" disabled selected>Kategorier</option>
                    <?php     
                        $categories = get_terms( ['taxonomy' => 'product_cat'] );
    
                        foreach ($categories as $cat => $value) {
    
                            $link = get_term_link($value->slug, 'product_cat' );
    
                           ?> <option value="<?php echo $link; ?>" ><?php echo $value->name; ?></option> <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <?php
    }
}




add_action('woocommerce_before_main_content', 'selectproductCategory', 1); 


?>