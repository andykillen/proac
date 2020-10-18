<?php

namespace ProductImport;

use \WP_REST_Request;
use \WP_Query;
use ProAc\ThemeTags;
use ProAc\Theme\Links;

/**
 * Class to manage all extra JSON requests
 *
 *  URL's sent are currently relative paths.
 */
class Rest {

    protected $make_relative = true;

    public function init(){

        add_action( 'rest_api_init', function () {

            register_rest_route( 'proac/v1', '/import/', array(
              'methods' => 'post',
              'callback' => [$this,'import'],
            ) );

            // register_rest_route( 'cv/v1', '/related/', array(
            //     'methods' => 'GET',
            //     'callback' => [$this,'get_related'],
            //   ) );

            //   register_rest_route( 'cv/v1', '/cookie/', array(
            //     'methods' => 'GET',
            //     'callback' => [$this,'get_cookie'],
            //   ) );

            //   register_rest_route( 'cv/v1', '/all/', array(
            //     'methods' => 'GET',
            //     'callback' => [$this,'get_all_posts'],
            //   ) );

            //   register_rest_route( 'cv/v1', '/srhr/', array(
            //     'methods' => 'GET',
            //     'callback' => [$this,'get_srhr_posts'],
            //   ) );


          } );

    }

    /**
     * Get the posts for read more button
     */
    public function import(WP_REST_Request $request){
      require_once(ABSPATH . 'wp-admin/includes/media.php');
      require_once(ABSPATH . 'wp-admin/includes/file.php');
      require_once(ABSPATH . 'wp-admin/includes/image.php');

      $json = $request->get_json_params();

      $post = [
        'post_title' => $json['title'],
        'post_content' => $json['content'],
        'post_type' => 'product',
        'post_status' => 'publish'
      ];
      $resp = wp_insert_post( $post , $wp_error  );

      if(is_wp_error( $resp )){
        return ['failed'];
      } 

      wp_set_object_terms($resp, "Speakers", "product_cat");

      wp_set_object_terms( $resp,$json['range'], 'range' );

      foreach($json['specification'] as $set){
        if($set['title']  == 'finishes'){
          foreach($set['value'] as $value) {
            error_log('adding . ' .  $value);
            wp_set_object_terms( $resp,  ucfirst($set['title']), $value );
          }
          
        } else {
          update_post_meta($resp, $json['title'],$json['value'], true );
        }
      }
      $attachment = media_sideload_image($json['featured'], $resp, 'id');
      error_log(print_r($attachment, true));
      set_post_thumbnail( $resp, $attachment );
    }


}