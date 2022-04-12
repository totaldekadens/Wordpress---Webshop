<?php 


include 'enqueue.php';



// Lägger till olika temasupports
add_theme_support('post-thumbnails');
add_theme_support('category-thumbnails');
add_theme_support('menus'); 
add_theme_support('widgets'); 
add_theme_support('custom-logo');



// Registrerar och lägger till menyer
function registrera_meny() {

    register_nav_menu('huvudmeny', 'Huvudmeny');
    register_nav_menu('header-right', 'header-right');
    register_nav_menu('header-left', 'header-left');

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

    register_sidebar( array( 
        'name' => 'header-right',
        'id' => 'header-right',
    ));

    register_sidebar( array( 
        'name' => 'header-left',
        'id' => 'header-left',
    ));

}

add_action( 'widgets_init', 'my_register_sidebars' );





?>