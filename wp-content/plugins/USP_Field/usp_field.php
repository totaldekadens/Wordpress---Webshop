<?php 
/* 
Plugin name: USP Field 
Author:SAD-Active
Description: This is a plugin that adds an USP field between your header and the content below. 
Version 1.0
*/

function regSidebar() {

    register_sidebar( array(
        'name' => 'usp',
        'id' => 'usp',
        'description' => 'usp',
    ));
}

add_action( 'widgets_init', 'regSidebar' );

function addUsp() {

    

    ?><div class="usp">

        <?php dynamic_sidebar('usp') ?>

    </div><?php

}

add_action('storefront_before_content', 'addUsp', 1); 

function style() {
    
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'style',  $plugin_url . "style.css");
}

add_action( 'wp_enqueue_scripts', 'style' );


?>