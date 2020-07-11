<?php

class AboutUs
{
    public function __construct()
    {
        add_action('init', array($this, 'aboutUsSettings'));
    }

    public function aboutUsSettings()
    {
        $labels = array(
            'name'                => _x( 'About Us', 'Post Type General Name', 'water-damage-restoration' ),
            'singular_name'       => _x( 'About Us', 'Post Type Singular Name', 'water-damage-restoration' ),
            'menu_name'           => __( 'About Us', 'water-damage-restoration' ),
            'parent_item_colon'   => __( 'Parent About Us', 'water-damage-restoration' ),
            'all_items'           => __( 'All About Us', 'water-damage-restoration' ),
            'view_item'           => __( 'View About Us', 'water-damage-restoration' ),
            'add_new_item'        => __( 'Add New About Us', 'water-damage-restoration' ),
            'add_new'             => __( 'Add New', 'water-damage-restoration' ),
            'edit_item'           => __( 'Edit About Us', 'water-damage-restoration' ),
            'update_item'         => __( 'Update About Us', 'water-damage-restoration' ),
            'search_items'        => __( 'Search About Us', 'water-damage-restoration' ),
            'not_found'           => __( 'Not Found', 'water-damage-restoration' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'water-damage-restoration' ),
        );

        $args = array(
            'label'               => __( 'about_us', 'water-damage-restoration' ),
            'description'         => __( 'About Us news and reviews', 'water-damage-restoration' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail', ),
            'taxonomies'          => array(),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 120,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'rewrite' => array('slug' => 'about-us','with_front' => false),
        );

        register_post_type( 'about_us', $args );
    }
}

?>