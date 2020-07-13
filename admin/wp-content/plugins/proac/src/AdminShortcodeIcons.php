<?php

namespace ProAc;

class AdminShortcodeIcons{

    static public function init(){
        add_action('admin_init', ['ProAc\AdminShortcodeIcons','register_buttons'] );
    }

    static public function register_buttons(){
        //Abort early if the user will never see TinyMCE
        if ( ! current_user_can('edit_posts') )
        return;

        //Add a callback to regiser our tinymce plugin   
        add_filter("mce_external_plugins",['ProAc\AdminShortcodeIcons', "register_editor_plugin_related"]); 

        // Add a callback to add our button to the TinyMCE toolbar
        add_filter('mce_buttons', ['ProAc\AdminShortcodeIcons','add_editor_button_related']);
    }    

    static public function register_editor_plugin_related($plugin_array){
        $plugin_array['related_button'] = get_template_directory_uri() . '/js/admin/related_shortcode.js';
        return $plugin_array;
    }

    static public function add_editor_button_related($buttons){
        $buttons[] = "wpse72394_button";
        return $buttons;
    }
    
}