<?php

class HelpInfo
{
    public function __construct()
    {
        add_action('init', array($this, 'helpInfoSettings'));
    }

    public function helpInfoSettings()
    {
        $labels = array(
            'name'                => _x( 'Help Infos', 'Post Type General Name', 'water-damage-restoration' ),
            'singular_name'       => _x( 'Help Info', 'Post Type Singular Name', 'water-damage-restoration' ),
            'menu_name'           => __( 'Help Infos', 'water-damage-restoration' ),
            'parent_item_colon'   => __( 'Parent Help Info', 'water-damage-restoration' ),
            'all_items'           => __( 'All Help Infos', 'water-damage-restoration' ),
            'view_item'           => __( 'View Help Info', 'water-damage-restoration' ),
            'add_new_item'        => __( 'Add New Help Info', 'water-damage-restoration' ),
            'add_new'             => __( 'Add New', 'water-damage-restoration' ),
            'edit_item'           => __( 'Edit Help Info', 'water-damage-restoration' ),
            'update_item'         => __( 'Update Help Info', 'water-damage-restoration' ),
            'search_items'        => __( 'Search Help Info', 'water-damage-restoration' ),
            'not_found'           => __( 'Not Found', 'water-damage-restoration' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'water-damage-restoration' ),
        );

        $args = array(
            'label'               => __( 'help_infos', 'water-damage-restoration' ),
            'description'         => __( 'Help Infos news and reviews', 'water-damage-restoration' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail', ),
            'taxonomies'          => array(),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 130,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'rewrite' => array('slug' => 'help-infos','with_front' => false),
        );

        register_post_type( 'help_infos', $args );
    }
}

?>