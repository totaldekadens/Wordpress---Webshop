<?php


// Registrerar och köar css- och scriptfiler
function enqueueFiles() {

$uri = get_theme_file_uri();

// registrerar nya css-filer
 wp_register_style('style', $uri . '/style.css');
 wp_register_style('productCategory', $uri . '/css/productCategory.css');
 wp_register_style('produktsida', $uri . '/css/produktsida.css');
 wp_register_style('frontPage', $uri . '/css/frontPage.css');

// Registrerar script-filer.
wp_register_script('logic', $uri . '/js/logic.js', [], false, true );
wp_register_script('productCategory', $uri . '/js/productCategory.js', [], false, true );
wp_register_script('product', $uri . '/js/product.js', [], false, true );







// css- script-filer  som läggs här hamnar i alla php-filer
 wp_enqueue_style('style');





 // Är man på "page.php" då körs dessa filer
if(is_page() && !is_front_page()) {
    wp_enqueue_style('productCategory');
    wp_enqueue_script('productCategory');
} 

// Är man på "single.php" då körs dessa filer
else if (is_single()) {
    wp_enqueue_style('produktsida');
    wp_enqueue_script('product');
} 

// Är man på "front-page.php" då körs dessa filer
else if (is_front_page()) {
    wp_enqueue_script('logic');
    wp_enqueue_style('frontPage');
}


}

add_action('wp_enqueue_scripts', 'enqueueFiles');

?>