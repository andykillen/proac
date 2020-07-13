<?php

namespace ProAc\ContentTypes;

class Awards {
    
    static public function init() {
        add_action('init', [__CLASS__, 'register']);
    }

    static public function register() {
        $labels = [
            'name'                  => _x( 'Awards', 'Post type general name', 'proac' ),
            'singular_name'         => _x( 'Award', 'Post type singular name', 'proac' ),
            'menu_name'             => _x( 'Awards', 'Admin Menu text', 'proac' ),
            'name_admin_bar'        => _x( 'Award', 'Add New on Toolbar', 'proac' ),
            'add_new'               => __( 'Add New', 'proac' ),
            'add_new_item'          => __( 'Add New Award', 'proac' ),
            'new_item'              => __( 'New Award', 'proac' ),
            'edit_item'             => __( 'Edit Award', 'proac' ),
            'view_item'             => __( 'View Award', 'proac' ),
            'all_items'             => __( 'All Awards', 'proac' ),
            'search_items'          => __( 'Search Awards', 'proac' ),
            'parent_item_colon'     => __( 'Parent Awards:', 'proac' ),
            'not_found'             => __( 'No Award found.', 'proac' ),
            'not_found_in_trash'    => __( 'No Award found in Trash.', 'proac' ),
            'featured_image'        => _x( 'Award logo Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'proac' ),
            'set_featured_image'    => _x( 'Set logo image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'proac' ),
            'remove_featured_image' => _x( 'Remove logo image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'proac' ),
            'use_featured_image'    => _x( 'Use as logo image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'proac' ),
            'archives'              => _x( 'Award archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'proac' ),
            'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'proac' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'proac' ),
            'filter_items_list'     => _x( 'Filter Award list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'proac' ),
            'items_list_navigation' => _x( 'Awards list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'proac' ),
            'items_list'            => _x( 'Awards list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'proac' ),
        ];
     
        $args = [
            'labels'                => $labels,
            'public'                => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'awards' ),
            'capability_type'       => 'page',
            'has_archive'           => true,
            'hierarchical'          => true,
            'menu_position'         => 2,
            'supports'              => array( 'title', 'thumbnail', 'excerpt','editor'),
            'menu_icon'             => 'dashicons-welcome-learn-more'
        ];
     
        register_post_type( 'awards', $args );
    }

}