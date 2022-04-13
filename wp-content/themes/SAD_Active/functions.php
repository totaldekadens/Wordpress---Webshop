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
    register_nav_menu('dropdown', 'dropdown');
    register_nav_menu('dropdown-center-top', 'dropdown-center-top');
    register_nav_menu('dropdown-center-down', 'dropdown-center-down');
    register_nav_menu('dropdown-right-top', 'dropdown-right-top');
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

}

add_action( 'widgets_init', 'my_register_sidebars' );





?>