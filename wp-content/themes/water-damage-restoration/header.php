<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
    <head>
        <title>
            <?php 
                wp_title('');
                echo ' | ';
                bloginfo('name'); 
            ?>
        </title>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
    </head>
    <body>
        <div id="top-info">
            <p>24/7 Local Response <strong>1-800-123-4567</strong></p>
        </div>
        <div id="header-content">
            <div id="logo-container">
                <?php if(function_exists('the_custom_logo')): ?>
                    <?php if(has_custom_logo()): ?>
                        <?php the_custom_logo(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div id="links-container">
                <?php 
                    wp_nav_menu(array(
                        'theme_location' => 'navigation-menu',
                        'container' => 'div',
                        'container_id' => 'navigation-links-container',
                        'container_class' => 'navigation-links-style',
                        'menu_id' => 'nav-menu',
                        'menu_class' => 'nav-menu-style',
                        'depth' => 0
                    )); 
                ?>
            </div>
        </div>