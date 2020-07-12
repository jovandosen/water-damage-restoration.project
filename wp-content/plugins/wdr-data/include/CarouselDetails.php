<?php

class CarouselDetails
{
    public function __construct()
    {
        add_action('init', array($this, 'carouselDetailsSettings'));
    }

    public function carouselDetailsSettings()
    {
        $labels = array(
            'name'                => _x( 'Carousel Details', 'Post Type General Name', 'water-damage-restoration' ),
            'singular_name'       => _x( 'Carousel Detail', 'Post Type Singular Name', 'water-damage-restoration' ),
            'menu_name'           => __( 'Carousel Details', 'water-damage-restoration' ),
            'parent_item_colon'   => __( 'Parent Carousel Detail', 'water-damage-restoration' ),
            'all_items'           => __( 'All Carousel Details', 'water-damage-restoration' ),
            'view_item'           => __( 'View Carousel Detail', 'water-damage-restoration' ),
            'add_new_item'        => __( 'Add New Carousel Detail', 'water-damage-restoration' ),
            'add_new'             => __( 'Add New', 'water-damage-restoration' ),
            'edit_item'           => __( 'Edit Carousel Detail', 'water-damage-restoration' ),
            'update_item'         => __( 'Update Carousel Detail', 'water-damage-restoration' ),
            'search_items'        => __( 'Search Carousel Detail', 'water-damage-restoration' ),
            'not_found'           => __( 'Not Found', 'water-damage-restoration' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'water-damage-restoration' ),
        );

        $args = array(
            'label'               => __( 'carousel_details', 'water-damage-restoration' ),
            'description'         => __( 'Carousel Details news and reviews', 'water-damage-restoration' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail', ),
            'taxonomies'          => array(),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 110,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'rewrite' => array('slug' => 'carousel-details','with_front' => false),
        );

        register_post_type( 'carousel_details', $args );
    }
}

?>