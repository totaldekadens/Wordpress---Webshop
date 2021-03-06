<?php


// Registrerar och köar css- och scriptfiler
function enqueueFiles() {

$uri = get_theme_file_uri();

// registrerar nya css-filer
 wp_register_style('style', $uri . '/style.css');
 wp_register_style('productCategory', $uri . '/css/productCategory.css');
 wp_register_style('kategorisida-jacket', $uri . '/css/kategorisida-jacket.css');
 wp_register_style('kategorisida-tights', $uri . '/css/kategorisida-tights.css');
 wp_register_style('kategorisida-top', $uri . '/css/kategorisida-top.css');
 wp_register_style('allProducts', $uri . '/css/allProducts.css');
 wp_register_style('produktsida', $uri . '/css/produktsida.css');
 wp_register_style('frontPage', $uri . '/css/frontPage.css');
 wp_register_style('home', $uri . '/css/home.css');
 wp_register_style('single', $uri . '/css/single.css');
 wp_register_style('cart', $uri . '/css/cart.css');
 wp_register_style('checkout', $uri . '/css/checkout.css');
 wp_register_style('kontakt', $uri . '/css/kontakt.css');
 wp_register_style('butik', $uri . '/css/singleButik.css');
 wp_register_style('rea', $uri . '/css/rea.css');

// Registrerar script-filer.

wp_register_script('logic', $uri . '/js/logic.js', [], false, true );
wp_register_script('productCategory', $uri . '/js/productCategory.js', [], false, true );
wp_register_script('product', $uri . '/js/product.js', [], false, true );
wp_register_script('product', $uri . '/js/product.js', [], false, true );
wp_register_script('popper', $uri . '/js/popper.min.js' );







// css- script-filer  som läggs här hamnar i alla php-filer
 wp_enqueue_style('style');



 if (is_page('rea')) {
    wp_enqueue_style('rea');
}

else if(is_cart() || is_checkout()) {
    wp_enqueue_style('cart');
    wp_enqueue_style('checkout');
    wp_enqueue_script('productCategory');
}
 // Är man på "page.php" då körs dessa filer
else if(is_page() && !is_front_page()) {
    wp_enqueue_style('productCategory');
    wp_enqueue_script('productCategory');
    

} 
else if (is_woocommerce() && is_single()) {
    wp_enqueue_style('produktsida');
} 

// Är man på "single.php" då körs dessa filer
else if (is_single()) {
    wp_enqueue_style('singleButik');
    wp_enqueue_script('product');
    wp_enqueue_style('singleButik');
    wp_enqueue_style('single'); // enstaka blogginlägg
} 

// Är man på "front-page.php" då körs dessa filer
else if (is_front_page()) {
    wp_enqueue_script('logic');
    wp_enqueue_style('frontPage');
}
else if(is_home() || is_archive()) {

    wp_enqueue_style('home');
    wp_enqueue_script('logic');
}

else if (is_shop()) {
    wp_enqueue_style('allProducts');
}  



}

add_action('wp_enqueue_scripts', 'enqueueFiles');

?>
