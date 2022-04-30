<?php 
/* 
Plugin name: USP Field 
Author:SAD-Active
Description: This is a plugin that adds an USP field between your header and the content below. 
Version 1.0
*/


function addUsp() {

    ?><div class="usp">

        <?php dynamic_sidebar('usp') ?>

    </div><?php

}

function style() {
    
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'style',  $plugin_url . "style.css");
}

add_action( 'wp_enqueue_scripts', 'style' );


?>