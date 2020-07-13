<?php

namespace ProAc\Theme;

use ProAc\ScriptLocalizations;
use ProAc\ThemeIcons;

class ScriptsStyles {

    static public function init(){
        add_action( 'wp_enqueue_scripts', [__CLASS__,'frontend_scripts'] );
        add_action( 'wp_enqueue_scripts', [__CLASS__,'frontend_styles'] );
        add_action( 'wp_enqueue_scripts', [__CLASS__,'remove_frontend_styles'],100 );

        add_action( 'wp_footer', [__CLASS__,'frontend_remove_script'],1 );

        add_action( 'admin_enqueue_scripts', [__CLASS__,'admin_scripts'] );
        add_action( 'admin_enqueue_scripts', [__CLASS__,'admin_styles'] );

        add_action( 'login_enqueue_scripts', [__CLASS__,'login_scripts'], 1 );
        add_action( 'login_enqueue_scripts', [__CLASS__,'login_styles'], 10 );
    }

    /**
     * Load all scripts
     */

     /**
      * queue scripts for frontend only
      *
      * @return void
      */
    static public function frontend_scripts(){


        //Default always loaded scripts
        $scripts = [
            // script name          dependency
            'theme'             =>[],
            'ajax'              =>[],
            'cv-elements'       =>[],
            'cookie'            =>['ajax','theme','cv-elements'],
            'loadmore'          =>['ajax','theme','cv-elements'],
            'search'            =>['theme'],
           // 'consent'           =>['ajax','cookie','theme']
        ];

        //Loaded scripts for Posts only
        if(is_single()){
        }
        //Loaded for Posts or Pages
        if(is_singular()){
            $scripts['resize'] = [];
            $scripts['externallinks'] = [];
            $scripts['socialmedia'] = [];
        }

        if(is_404()){
            // Reducing to minimal
            $scripts = [
                // script name          dependency
                'theme'             =>[],
                'menu'              =>['theme'],
            ];
        }

        // If the GDPR plugin from RNW is installed remove the basic consent management
        if(get_theme_mod('gdpr_banner_background_color') && isset($scripts['consent'])){
            unset($scripts['consent']);
        }

        foreach($scripts as $script => $dependency){            
            if (wp_script_is( $script, 'registered' )) {
                wp_enqueue_script( $script);
            } else {
                wp_enqueue_script( 
                        $script,
                        get_template_directory_uri()."/js/{$script}.min.js",
                        $dependency,
                        self::cache_bust("/js/{$script}.min.js"),
                        true
                    );
            }


            
        }

        wp_localize_script( 'theme', 'theme', ScriptLocalizations::as_array() );

        if(is_singular()){
            wp_enqueue_script( 'comment-reply' );
        }

    }

    /**
     * remove scripts as needed from the front end.
     *
     * Relies on all scripts being loaded via the footer.
     *
     * @return void
     */
    static public function frontend_remove_script(){
        if( !is_singular() ){
            wp_dequeue_script('wp-embed');
        }
    }
     /**
      * queue scripts for login page only
      *
      * @return void
      */
    static public function login_scripts(){

    }

     /**
      * queue scripts for admin pages only
      *
      * @return void
      */
    static public function admin_scripts($hook){
        $scripts_array = [
            'vimeo-admin' => [],
        ];

        foreach($scripts_array as $script => $dependency ){
            wp_enqueue_script( "{$script}",
                get_template_directory_uri()."/js/admin/{$script}.js",
                $dependency,
                self::cache_bust("/js/admin/{$script}.js"),
                true
            );
        }



        if ( ! in_array( $hook, ['post.php', 'post-new.php'] ) ) {
            return;
        }

        wp_enqueue_script( 'page-template', get_template_directory_uri() . '/js/admin/page-template-fields.js', ['jquery'] );

    }

    /**
     * remove unneeded styles
     *
     * @return void
     */
    static public function remove_frontend_styles(){
        // remove WP blocks from none singular pages
        if(!is_singular()){
            wp_dequeue_style( 'wp-block-library' );
        }
    }

    /**
     * Load all styles
     */
    static public function frontend_styles(){

        // default to screen if nothing else is available
        $base_style = 'screen';
        // // show only homepage CSS when on homepage
        // if(is_home() || is_front_page() ){
        //     $base_style = 'homepage';
        // }
        // // Archive only CSS (Date, Author, Tag, Category)
        // if( is_archive() ){
        //     $base_style = 'archive';
        // }
        // // Post type only
        // if( is_single() ){
        //     $base_style = 'single';
        // }

        // wp_enqueue_style( 'google-fonts','https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,400;0,700;0,900;1,100;1,400&display=swap', [] );

        $styles[$base_style] = [
                        'dependency' => [],
                        'media' => 'all'
                    ];

        // $styles['print'] = [
        //                 'dependency' => [$base_style],
        //                 'media' => 'all'
        //             ];

            foreach($styles as $style => $linktings){
            wp_enqueue_style( "{$style}",
                           get_template_directory_uri()."/css/{$style}.min.css",
                           $linktings['dependency'],
                           self::cache_bust("/css/{$style}.min.css"),
                           $linktings['media']
                        );
        }

        
    }

    static public function login_styles(){

    }

    static public function admin_styles(){

        

        $admin_styles = [
            'video-admin'=>[
                'dependency' => [],
                'media' => 'all'
             ],
        ];

        foreach($admin_styles as $style => $linktings){
            wp_enqueue_style( "{$style}",
                           get_template_directory_uri()."/css/admin/{$style}.css",
                           $linktings['dependency'],
                           self::cache_bust("/css/admin/{$style}.css"),
                           $linktings['media']
                        );
        }

    }


    static public function cache_bust($path){
        if(file_exists(get_template_directory() . $path )){
            return filemtime(get_template_directory() . $path );
        }
        return null;
    }

}