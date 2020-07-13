<?php
/**
 * @package ProAc
 * @version 1.0.1
 */
/*
Plugin Name: ProAc theming and rest
Description: Does all the post types, taxonomies and REST for ProAc, headless with Sapper front end
Author: Andrew Killen
Version: 1.0.1
*/

if(!defined('ABSPATH')) {
    die('no no no no');
}

// define("RNW_THEMING_PLUGIN_PATH", plugin_dir_path( __FILE__ ) );
// define("RNW_THEMING_PLUGIN_URI", plugin_dir_url( __FILE__ ) );


require dirname(__FILE__) . "/vendor/autoload.php";

// Post Types
ProAc\ContentTypes\Dealers::init();
ProAc\ContentTypes\Awards::init();

/**
 * Taxonomies
 **/ 

// dealers
ProAc\Taxonomies\DealerType::init(); 
ProAc\Taxonomies\Countries::init();

// products
ProAc\Taxonomies\Finishes::init();
ProAc\Taxonomies\Range::init();

// Awards
ProAc\Taxonomies\Years::init();
