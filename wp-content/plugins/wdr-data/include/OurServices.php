<?php

class OurServices
{
    public function __construct()
    {
        add_action('init', array($this, 'ourServicesSettings'));
    }

    public function ourServicesSettings()
    {
        $labels = array(
            'name'                => _x( 'Our Services', 'Post Type General Name', 'water-damage-restoration' ),
            'singular_name'       => _x( 'Our Service', 'Post Type Singular Name', 'water-damage-restoration' ),
            'menu_name'           => __( 'Our Services', 'water-damage-restoration' ),
            'parent_item_colon'   => __( 'Parent Our Service', 'water-damage-restoration' ),
            'all_items'           => __( 'All Our Services', 'water-damage-restoration' ),
            'view_item'           => __( 'View Our Service', 'water-damage-restoration' ),
            'add_new_item'        => __( 'Add New Our Service', 'water-damage-restoration' ),
            'add_new'             => __( 'Add New', 'water-damage-restoration' ),
            'edit_item'           => __( 'Edit Our Service', 'water-damage-restoration' ),
            'update_item'         => __( 'Update Our Service', 'water-damage-restoration' ),
            'search_items'        => __( 'Search Our Service', 'water-damage-restoration' ),
            'not_found'           => __( 'Not Found', 'water-damage-restoration' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'water-damage-restoration' ),
        );

        $args = array(
            'label'               => __( 'our_services', 'water-damage-restoration' ),
            'description'         => __( 'Our Services news and reviews', 'water-damage-restoration' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail', ),
            'taxonomies'          => array(),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 115,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'rewrite' => array('slug' => 'our-services','with_front' => false),
        );

        register_post_type( 'our_services', $args );
    }
}

?>