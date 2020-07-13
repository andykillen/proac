<?php
namespace ProAc\Taxonomies;
class DealerType{
    static public function init(){
        add_action('init',[__CLASS__,'register']);
    }
    static public function register(){
        $args = array(
            'labels' => array(
                'name' => _x('Dealer Types','taxonomy general name','proac' ),
                'singular_name' => _x('Dealer Type','taxonomy singular name','proac'),
                'search_items' => _x('Search Dealer Types','taxonomy naming','proac'),
                'popular_items' => _x('Popular Dealer Types','taxonomy naming','proac'),
                'all_items' => _x('All Dealer Types','taxonomy naming','proac'),
                'edit_item' => _x('Edit Dealer Type','taxonomy naming','proac'),
                'edit_item' => _x('Edit Dealer Type','taxonomy naming','proac'),
                'update_item' => _x('Update Dealer Type','taxonomy naming','proac'),
                'add_new_item' => _x('Add New Dealer Type','taxonomy naming','proac'),
                'new_item_name' => _x('New Dealer Type Name','taxonomy naming','proac'),
                'separate_items_with_commas' => _x('Seperate Dealer Types with Commas','taxonomy naming','proac'),
                'add_or_remove_items' => _x('Add or Remove Dealer Types','taxonomy naming','proac'),
                'choose_from_most_used' => _x('Choose from Most Used Dealer Types','taxonomy naming','proac')
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
        register_taxonomy('dealertype',['dealers'],$args);
    }
}
