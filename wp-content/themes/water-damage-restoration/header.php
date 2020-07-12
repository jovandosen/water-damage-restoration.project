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
            <?php

                $sql = array('post_type' => 'info_bars', 'posts_per_page' => 1);
                $query = new WP_Query($sql);

                $results = [];

                if($query->have_posts()){
                    while($query->have_posts()){
                        $query->the_post();
                        $obj = new stdClass();
                        $obj->content = get_the_content();
                        $results[] = $obj;
                    }
                }

            ?>
            <p>
                <?php echo $results[0]->content; ?>
            </p>
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
            <div id="toggle-nav-links" style="display: none;">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>