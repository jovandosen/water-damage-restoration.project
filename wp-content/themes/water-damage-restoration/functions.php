<?php

function loadAssets()
{
    wp_enqueue_style( 'appcss', get_template_directory_uri() . '/assets/css/app.css', array(), '1.1', 'all');
    wp_enqueue_script( 'appjs', get_template_directory_uri() . '/assets/js/app.js', array ( 'jquery' ), 1.1, true);
}

add_action('wp_enqueue_scripts', 'loadAssets');

?>