<?php

class SocialMediaDetails
{
    public function __construct()
    {
        add_action('init', array($this, 'socialMediaDetailsSettings'));
    }

    public function socialMediaDetailsSettings()
    {
        $labels = array(
            'name'                => _x( 'Social Media Details', 'Post Type General Name', 'water-damage-restoration' ),
            'singular_name'       => _x( 'Social Media Detail', 'Post Type Singular Name', 'water-damage-restoration' ),
            'menu_name'           => __( 'Social Media Details', 'water-damage-restoration' ),
            'parent_item_colon'   => __( 'Parent Social Media Details', 'water-damage-restoration' ),
            'all_items'           => __( 'All Social Media Details', 'water-damage-restoration' ),
            'view_item'           => __( 'View Social Media Detail', 'water-damage-restoration' ),
            'add_new_item'        => __( 'Add New Social Media Detail', 'water-damage-restoration' ),
            'add_new'             => __( 'Add New', 'water-damage-restoration' ),
            'edit_item'           => __( 'Edit Social Media Detail', 'water-damage-restoration' ),
            'update_item'         => __( 'Update Social Media Detail', 'water-damage-restoration' ),
            'search_items'        => __( 'Search Social Media Detail', 'water-damage-restoration' ),
            'not_found'           => __( 'Not Found', 'water-damage-restoration' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'water-damage-restoration' ),
        );

        $args = array(
            'label'               => __( 'social_media_details', 'water-damage-restoration' ),
            'description'         => __( 'Social Media Details news and reviews', 'water-damage-restoration' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'thumbnail', ),
            'taxonomies'          => array(),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 145,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'rewrite' => array('slug' => 'social-media-details','with_front' => false),
        );

        register_post_type( 'social_media_details', $args );
    }
}

?>