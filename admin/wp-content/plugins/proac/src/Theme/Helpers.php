<?php

namespace ProAc\Theme;

class Helpers {
    static public function get_depth_parent_and_highest_parent(){
        $output = [ ];
        $output['current'] = get_the_ID();
        global $wp_query;
        $object = $wp_query->get_queried_object();
        
        $parent_id  = $object->post_parent;
        $output['parent'] = $parent_id;
        $depth = 0;
        while($parent_id > 0){
            $page = get_page($parent_id);
            $parent_id = $page->post_parent;
            $output['highest'] = $page->ID;
            $depth++;
        }
        $output['depth'] = $depth;
        
        return $output;
    }
}