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