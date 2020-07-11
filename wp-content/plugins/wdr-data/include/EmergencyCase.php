<?php

class EmergencyCase
{
    public function __construct()
    {
        add_action('init', array($this, 'emergencySettings'));
    }

    public function emergencySettings()
    {
        $labels = array(
            'name'                => _x( 'Emergencies', 'Post Type General Name', 'water-damage-restoration' ),
            'singular_name'       => _x( 'Emergency', 'Post Type Singular Name', 'water-damage-restoration' ),
            'menu_name'           => __( 'Emergencies', 'water-damage-restoration' ),
            'parent_item_colon'   => __( 'Parent Emergency', 'water-damage-restoration' ),
            'all_items'           => __( 'All Emergencies', 'water-damage-restoration' ),
            'view_item'           => __( 'View Emergency', 'water-damage-restoration' ),
            'add_new_item'        => __( 'Add New Emergency', 'water-damage-restoration' ),
            'add_new'             => __( 'Add New', 'water-damage-restoration' ),
            'edit_item'           => __( 'Edit Emergency', 'water-damage-restoration' ),
            'update_item'         => __( 'Update Emergency', 'water-damage-restoration' ),
            'search_items'        => __( 'Search Emergency', 'water-damage-restoration' ),
            'not_found'           => __( 'Not Found', 'water-damage-restoration' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'water-damage-restoration' ),
        );

        $args = array(
            'label'               => __( 'emergencies', 'water-damage-restoration' ),
            'description'         => __( 'Emergencies news and reviews', 'water-damage-restoration' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail', ),
            'taxonomies'          => array(),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 125,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'rewrite' => array('slug' => 'emergencies','with_front' => false),
        );

        register_post_type( 'emergencies', $args );
    }
}

?>