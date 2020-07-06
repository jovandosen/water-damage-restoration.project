<?php

function loadAssets()
{
    wp_enqueue_style( 'appcss', get_template_directory_uri() . '/assets/css/app.css', array(), '1.1', 'all');
    wp_enqueue_style( 'servicescss', get_template_directory_uri() . '/assets/css/services.css', array(), '1.1', 'all');
    wp_enqueue_script( 'appjs', get_template_directory_uri() . '/assets/js/app.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'carouseljs', get_template_directory_uri() . '/assets/js/carousel.js', array ( 'jquery' ), 1.1, true);
    $templateDetails = array('templateUrl' => get_template_directory_uri());
    wp_localize_script('carouseljs', 'themeData', $templateDetails);
}

add_action('wp_enqueue_scripts', 'loadAssets');

function homepageTitle($title)
{
    if(empty($title) && (is_home() || is_front_page())){
        $title = __('Home', 'water-damage-restoration');
    }
    return $title;
}

add_filter('wp_title', 'homepageTitle');

function themeSettings()
{
    add_theme_support('title-tag');

    $logoDefaultSettings = array(
        'height' => 50,
        'width' => 50,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    );

    add_theme_support('custom-logo', $logoDefaultSettings);
}

add_action('after_setup_theme', 'themeSettings');

function registerNavigationMenus()
{
    register_nav_menus(array(
        'navigation-menu' => __('Navigation Menu')
    ));
}

add_action('init', 'registerNavigationMenus');

?>