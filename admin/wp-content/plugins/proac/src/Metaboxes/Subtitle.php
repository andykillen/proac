<?php

namespace ProAc\Metaboxes;
/**
 * Description of fields
 *
 * @author andykillen
 * 
 */

use ProAc\Metaboxes\Fields;

class subtitle {
        function init() {
            add_action('admin_menu', [$this,'meta_box'], 100); // show general meta
            add_action('save_post', [$this,'save_meta_data'], 1); // save general meta
        }
        /**
         * 
         */
        function return_load_here(){
            return  ['courses'];
        }
        
        /**
         * Call custom metabox creation
         *
         * @return void
         */
        function meta_box() {
            // creates meta box on the side and lower than all others
            add_meta_box('subtitle-meta-boxes', __('Subtitle', 'proac'), [$this,'custom_meta_boxes'], 'courses', 'side', 'low');
        }
        
        /**
         * Metabox fields shown on Posts
         *
         * @return void
         */
        function training_post_meta_boxes() {
            $meta_boxes = array(
                'subtitle' => array('name' => 'subtitle', 
                                 'title' => __('Subtitle','proac'), 
                                 'type' => 'textarea'),
            );
            return apply_filters('subtitle_meta_box', $meta_boxes);
        }
        
        
        /**
         * Divider is nto really a field so set here and not in the class
         *
         * @param [type] $array
         * @return void
         */
        function clear_divider($array) {
            foreach ($array as $key => $data) {
                if ($data['type'] == 'divider') {
                    unset($array[$key]);
                }
            }
            return $array;
        }
        
        
        /**
         * Function to save the content on the admin edit page
         *
         * @param [type] $post_id
         * @return void
         */
        function save_meta_data($post_id) {
        
            global $post;
            if (isset($post) && !empty($post)) {
                
                switch ($post->post_type) {
                    case 'courses':
                        $meta_boxes = $this->training_post_meta_boxes();
                        break;
                    default:
                        $meta_boxes = array();
                        break;
                }
        
                $meta_boxes = $this->clear_divider($meta_boxes); // needed or the save fails.
        
                foreach ($meta_boxes as $meta_box) :
                    if(empty($_POST[$meta_box['name'] . '_noncename'])){
                        return;
                    }
                    
                    if ( !wp_verify_nonce($_POST[$meta_box['name'] . '_noncename'], $meta_box['name'] . '_noncename')) {
                        
                        return $post_id;
                    }
                    
                    if ('page' == $_POST['post_type'] && !current_user_can('edit_page', $post_id)) {
                        return $post_id;
                    } elseif ('post' == $_POST['post_type'] && !current_user_can('edit_post', $post_id)) {
                        
                        return $post_id;
                    }
        
                    $data = stripslashes($_POST[$meta_box['name']]);
        
                    if (get_post_meta($post_id, $meta_box['name']) == '') {
                        add_post_meta($post_id, $meta_box['name'], $data, true);
                    }
        
                    elseif ($data != get_post_meta($post_id, $meta_box['name'], true)){
                        update_post_meta($post_id, $meta_box['name'], $data);
                    }
        
                    elseif ($data == '') {
                        delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
                    }
                endforeach;
            }
        }
        
        
        /**
         * Looks at the post type and loads the corispoinding meta box array
         *
         * @return void
         */
        function custom_meta_boxes() {
            global $post;
        
            switch ($post->post_type) {      
                case 'courses':
                    $meta_boxes = $this->training_post_meta_boxes();
                    break;  
                default:
                    $meta_boxes = array();
                    break;
            }
        
            $fields = new Fields();
        
            ?>
            <table class="form-table">
            <?php
        
            foreach ($meta_boxes as $meta) :
                $value = get_post_meta($post->ID, $meta['name'], true);
                switch ($meta['type']) {
                    case 'text':
                        $fields->get_meta_text_input($meta, $value);
                        break;
                    case 'textarea':
                        $fields->get_meta_textarea($meta, $value);
                        break;
                    case 'select':
                        $fields->get_meta_select($meta, $value);
                        break;
                    case 'checkbox':
                        $fields->get_meta_checkbox($meta, $value);
                        break;
                    case 'radio':
                        $fields->get_meta_radio($meta, $value);
                        break;
                    case 'media':
                        $fields->get_meta_media_upload($meta, $value);
                        break;
                    case 'divider':
                        $fields->get_divider();
                        break;
                    case 'post':
                        $fields->get_meta_posts_dropdown($meta, $value);
                        break;
                    case 'textinfo':
                         $fields->get_meta_textinfo($meta, $value);
                        break;
                }
            endforeach;
            ?>
            </table>
            <?php
        }
}