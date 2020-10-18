<?php
namespace ProAc\Taxonomies;
class Range{
    static public function init(){
        add_action('init',[__CLASS__,'register']);
    }
    static public function register(){
        $args = array(
            'labels' => array(
                'name' => _x('Ranges','taxonomy general name','proac' ),
                'singular_name' => _x('Range','taxonomy singular name','proac'),
                'search_items' => _x('Search Ranges','taxonomy naming','proac'),
                'popular_items' => _x('Popular Ranges','taxonomy naming','proac'),
                'all_items' => _x('All Ranges','taxonomy naming','proac'),
                'edit_item' => _x('Edit Range','taxonomy naming','proac'),
                'edit_item' => _x('Edit Range','taxonomy naming','proac'),
                'update_item' => _x('Update Range','taxonomy naming','proac'),
                'add_new_item' => _x('Add New Range','taxonomy naming','proac'),
                'new_item_name' => _x('New Range Name','taxonomy naming','proac'),
                'separate_items_with_commas' => _x('Seperate Ranges with Commas','taxonomy naming','proac'),
                'add_or_remove_items' => _x('Add or Remove Ranges','taxonomy naming','proac'),
                'choose_from_most_used' => _x('Choose from Most Used Ranges','taxonomy naming','proac')
            ),
            'hierarchical' => true,
            'query_var' => false,
            'public' => false,
            'publicly_queryable' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => false,
            'show_in_rest' => true,
            'show_tagcloud' => false
        );
        register_taxonomy('range',['product'],$args);
    }
}
