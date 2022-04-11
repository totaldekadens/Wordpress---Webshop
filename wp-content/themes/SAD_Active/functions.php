<?php 


include 'enqueue.php';



// Lägger till olika temasupports
add_theme_support('post-thumbnails');
add_theme_support('category-thumbnails');
add_theme_support('menus'); 
add_theme_support('widgets'); 



// Registrerar och lägger till menyer
function registrera_meny() {

    register_nav_menu('huvudmeny', 'Huvudmeny');

}

add_action('after_setup_theme', 'registrera_meny');


// Lägger till och registrerar widgets (sidebars)
function my_register_sidebars() {
   
    /* Exempel */
    register_sidebar( array(
        'name' => 'huvudmeny',
        'id' => 'huvudmeny',
    ));

}

add_action( 'widgets_init', 'my_register_sidebars' );



?>