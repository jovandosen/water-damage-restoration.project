<?php

function loadAssets()
{
    wp_enqueue_style( 'appcss', get_template_directory_uri() . '/assets/css/app.css', array(), '1.1', 'all');
    wp_enqueue_script( 'appjs', get_template_directory_uri() . '/assets/js/app.js', array ( 'jquery' ), 1.1, true);
}

add_action('wp_enqueue_scripts', 'loadAssets');

function homepageTitle($title)
{
    if(empty($title) && (is_home() || is_front_page())){
        $title = __('Homepage', 'water-damage-restoration');
    }
    return $title;
}

add_filter('wp_title', 'homepageTitle');

function themeSettings()
{
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'themeSettings');

?>