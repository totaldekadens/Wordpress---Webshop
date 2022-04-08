<?php

function enqueueFiles() {

$uri = get_theme_file_uri();

 wp_register_style('kategorisida', $uri . '/css/kategorisida.css');
 wp_register_style('produktsida', $uri . '/css/produktsida.css');
 
 wp_enqueue_style('kategorisida');
 wp_enqueue_style('produktsida');
 wp_enqueue_style('style', $uri.'/style.css');



 wp_register_script('logic', $uri . '/js/logic.js', [], false, true );
 wp_enqueue_script('logic');


}
add_action('wp_enqueue_scripts', 'enqueueFiles');

?>