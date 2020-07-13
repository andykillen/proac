<?php

namespace ProAc;

use \ProAc\Customizer\Theme;
use \ProAc\Theme\ScriptsStyles;


class ThemeSetup {

    /**
    * Call this init method from the functions.php
    */
    static function init(){

		// load customizer defaults
		$custom = new Theme();
		$custom-> init();

		// initialize all the scripts and styles. Be that Admin, Login or Frontend.
		
		// add action for things like text domain and thumbnails. Needs to be loaded before child theme.
		add_action( 'after_setup_theme', [__CLASS__, 'after_theme_setup' ] );
		// load widgets area
		add_action( 'widgets_init', [__CLASS__, 'register_widget_area' ] );
		// after turning on the theme do this
		add_action( 'after_switch_theme', [__CLASS__, 'after_switch_theme' ] );
    }


    /**
    * Add the text domain to the theme (look for po files)
    *
    * The system first looks for the existance of the wp-content/languages/rnw_THEME_DIR_NAME
    * directory and then loads the files from there if it exists
    *
    *
    * @return void
    */
    static public function after_theme_setup(){
        if(file_exists(WP_CONTENT_DIR."/languages/". TRAINING_THEME_DIR_NAME)){
            load_theme_textdomain( 'proac', WP_CONTENT_DIR."/languages/".TRAINING_THEME_DIR_NAME );
        } else {
            load_theme_textdomain( 'proac', get_template_directory() . '/languages' );
        }

        add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-formats',  [ 'video', 'audio']  );

		add_theme_support( 'post-thumbnails', ['courses', 'post', 'page']);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		] );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html_x( 'Primary','admin screen setting', 'proac' ),
			'footer-menu' => esc_html_x( 'Footer','admin screen setting', 'proac' ),
		) );

	}
	
	static public function register_widget_area(){
		$areas = [
			[
				'name' => 'Homepage : Above Content',
				'description' => 'On the homepage above the main content grid',
				'id' => 'homepage-above',
				'tag' => 'div',
				'class' => '',
			],
			[
				'name' => 'Homepage : below Content',
				'description' => 'On the homepage below the main content grid and loadmore',
				'id' => 'homepage-below',
				'tag' => 'div',
				'class' => '',
			],
			[
				'name' => 'Post : Above Content',
				'description' => 'On posts page between the heading and the article body',
				'id' => 'post-above',
				'tag' => 'aside',
				'class' => '',
			],
			[
				'name' => 'Post : below Content',
				'description' => 'On posts page between the article body and the tag and comments',
				'id' => 'post-below',
				'tag' => 'aside',
				'class' => '',
			],
			[
				'name' => 'Blog listing : Above Content',
				'description' => 'On the blog above the main content',
				'id' => 'blog-above',
				'tag' => 'div',
				'class' => '',
			],
			[
				'name' => 'Blog listing : below Content',
				'description' => 'On the blog below the main content',
				'id' => 'blog-below',
				'tag' => 'div',
				'class' => '',
			],
			[
				'name' => 'Blog listing : sidebar',
				'description' => 'On the blog to the side of the main content',
				'id' => 'blog-aside',
				'tag' => 'div',
				'class' => '',
			],
		];

		foreach ( $areas as $widgetinfo){
			register_sidebar( [
				'name' => $widgetinfo['name'],
				'id' => $widgetinfo['id'],
				'description' => $widgetinfo['description'],
				'before_widget' => '<'.$widgetinfo['tag'].' id="%1$s" class="widget '.$widgetinfo['class'].' widget-area-'.$widgetinfo['id'].' %2$s">',
				'after_widget'  => '</'.$widgetinfo['tag'].'>',
				'before_title'  => '<span class="widget-title">',
				'after_title'   => '</span>',
			 ] );
		}
	}

	/**
	 * Runs after theme has been changed to a Citizens Voice theme
	 *
	 * @return void
	 */
	static public function after_switch_theme(){
		// Set the thumbnail to be 150x85
		update_option( 'thumbnail_size_w', 150 );
		update_option( 'thumbnail_size_h', 85 );
		// Set the medium image to be 300 x 169
		update_option( 'medium_size_w', 300 );
		update_option( 'medium_size_h', 169 );
	}

}