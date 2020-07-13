<?php

namespace ProAc\Theme;

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

            register_rest_route( 'cv/v1', '/posts/', array(
              'methods' => 'GET',
              'callback' => [$this,'get_posts'],
            ) );

            register_rest_route( 'cv/v1', '/related/', array(
                'methods' => 'GET',
                'callback' => [$this,'get_related'],
              ) );

              register_rest_route( 'cv/v1', '/cookie/', array(
                'methods' => 'GET',
                'callback' => [$this,'get_cookie'],
              ) );

              register_rest_route( 'cv/v1', '/all/', array(
                'methods' => 'GET',
                'callback' => [$this,'get_all_posts'],
              ) );

              register_rest_route( 'cv/v1', '/srhr/', array(
                'methods' => 'GET',
                'callback' => [$this,'get_srhr_posts'],
              ) );


          } );

    }

    /**
     * Get the posts for read more button
     */
    public function get_posts(WP_REST_Request $request){

        $data = json_decode($request['data'],true);

        $args = [
            'posts_per_page'    => apply_filters( 'rest_homepage_posts_per_page', 8),
            'post_type'         => 'post',
            'post_status'       => 'publish',

        ];

        $counter = count($data['ids']) + 1;

        if( isset($data['ids']) ){
            $args['post__not_in'] = array_filter($data['ids'], 'is_numeric' );
        }

        if( isset($data['term_id']) && isset($data['tax']) ) {
            $args['posts_per_page'] = 9;
            $args['tax_query'] = [
                    [
                        'taxonomy'  => filter_var ( $data['tax'], FILTER_SANITIZE_STRING),
                        'field'     => 'term_id',
                        'terms'     => filter_var ($data['term_id'], FILTER_SANITIZE_NUMBER_INT)

                    ]
                ];
        }

        if(isset($data['author'])){
            $args['author'] =  filter_var ($data['author'], FILTER_SANITIZE_NUMBER_INT);
            $args['posts_per_page'] = 9;
        }

        $query = new WP_Query($args);

        $output['posts'] = [];
        $output['status'] = 'fail';

        if($query->have_posts()) :
            $output['status'] = 'success';
            while($query->have_posts()) : $query->the_post();

                $output['posts'][] =  [
                    'class'         => apply_filters("rest_loadmore_article_class", get_post_class('post-excerpt') ),
                    'id'            => get_the_ID(),
                    'title'         => get_the_title(),
                    'link'          => Links::get_relative_path( get_the_ID() ),
                    'excerpt'       => rnw_linkify_excerpt(get_the_excerpt()),
                    'subtitle'      => ThemeTags::get_subtitle_value(false),
                    'byline'        => ThemeTags::posted_by_and_on(false),
                    'cat'           => ThemeTags::terms_as_list( ThemeTags::terms('category', get_the_ID() ) ),
                    'comment_count' => get_comments_number(get_the_ID()),
                    'mobile'        => ( has_post_thumbnail() )? get_the_post_thumbnail(get_the_ID(),'preview-mobile'):'',
                    'large'         => ($args['posts_per_page'] == 8 &&  has_post_thumbnail() )? get_the_post_thumbnail(get_the_ID(),'preview-large'):false,
                    'counter'       => $counter
                ];
                $counter ++;
            endwhile;
        endif;

        $output['paginate'] = ( count($output['posts']) < $args['posts_per_page'] ) ? 'no' : 'yes' ;

        return $output;
    }

/**
     * Get the posts for read more button
     */
    public function get_srhr_posts(WP_REST_Request $request){

        $data = json_decode($request['data'],true);

        $args = [
            'posts_per_page'    => apply_filters( 'rest_homepage_posts_per_page', 8),
            'post_type'         => 'srhr',
            'post_status'       => 'publish',
        ];

        $counter = count($data['ids']) + 1;

        if( isset($data['ids']) ){
            $args['post__not_in'] = array_filter($data['ids'], 'is_numeric' );
        }

        if( (isset($data['term_id']) && !empty($data['term_id']) ) && (isset($data['tax']) && !empty($data['tax']) ) ) {
            $args['posts_per_page'] = 9;
            $args['tax_query'] = [
                    [
                        'taxonomy'  => filter_var ( $data['tax'], FILTER_SANITIZE_STRING),
                        'field'     => 'term_id',
                        'terms'     => filter_var ($data['term_id'], FILTER_SANITIZE_NUMBER_INT)

                    ]
                ];
        }

        if(isset($data['author'])){
            $args['author'] =  filter_var ($data['author'], FILTER_SANITIZE_NUMBER_INT);
            $args['posts_per_page'] = 9;
        }

        $query = new WP_Query($args);

        $output['posts'] = [];
        $output['status'] = 'fail';

        if($query->have_posts()) :
            $output['status'] = 'success';
            while($query->have_posts()) : $query->the_post();

                $output['posts'][] =  [
                    'class'         => apply_filters("rest_loadmore_article_class", get_post_class('post-excerpt') ),
                    'id'            => get_the_ID(),
                    'title'         => get_the_title(),
                    'link'          => Links::get_relative_path( get_the_ID() ),
                    'excerpt'       => rnw_linkify_excerpt(get_the_excerpt()),
                    'subtitle'      => ThemeTags::get_subtitle_value(false),
                    'byline'        => ThemeTags::posted_by_and_on(false),
                    'cat'           => ThemeTags::terms_as_list( ThemeTags::terms('category', get_the_ID() ) ),
                    'comment_count' => get_comments_number(get_the_ID()),
                    'mobile'        => ( has_post_thumbnail() )? get_the_post_thumbnail(get_the_ID(),'preview-mobile'):'',
                    'large'         => ($args['posts_per_page'] == 8 &&  has_post_thumbnail() )? get_the_post_thumbnail(get_the_ID(),'preview-large'):false,
                    'counter'       => $counter
                ];
                $counter ++;
            endwhile;
        endif;

        $output['paginate'] = ( count($output['posts']) < $args['posts_per_page'] ) ? 'no' : 'yes' ;

        return $output;
    }
    /**
     * Get the posts for read more button
     */
    public function get_all_posts(WP_REST_Request $request){

        $data = json_decode($request['data'],true);

        $args = [
            'posts_per_page'    => apply_filters( 'rest_homepage_posts_per_page', 8),
            'post_type'         => apply_filters( 'rest_taxonomy_posts_types', ['post']),
            'post_status'       => 'publish',

        ];

        $counter = count($data['ids']) + 1;

        if( isset($data['ids']) ){
            $args['post__not_in'] = array_filter($data['ids'], 'is_numeric' );
        }

        if( isset($data['term_id']) && isset($data['tax']) ) {
            $args['posts_per_page'] = 9;
            $args['tax_query'] = [
                    [
                        'taxonomy'  => filter_var ( $data['tax'], FILTER_SANITIZE_STRING),
                        'field'     => 'term_id',
                        'terms'     => filter_var ($data['term_id'], FILTER_SANITIZE_NUMBER_INT)

                    ]
                ];
        }

        if(isset($data['author'])){
            $args['author'] =  filter_var ($data['author'], FILTER_SANITIZE_NUMBER_INT);
            $args['posts_per_page'] = 9;
        }

        $query = new WP_Query($args);

        $output['posts'] = [];
        $output['status'] = 'fail';

        if($query->have_posts()) :
            $output['status'] = 'success';
            while($query->have_posts()) : $query->the_post();

                $output['posts'][] =  [
                    'class'         => apply_filters("rest_loadmore_article_class", get_post_class('post-excerpt') ),
                    'id'            => get_the_ID(),
                    'title'         => get_the_title(),
                    'link'          => Links::get_relative_path( get_the_ID() ),
                    'excerpt'       => rnw_linkify_excerpt(get_the_excerpt()),
                    'subtitle'      => ThemeTags::get_subtitle_value(false),
                    'byline'        => ThemeTags::posted_by_and_on(false),
                    'cat'           => ThemeTags::terms_as_list( ThemeTags::terms('category', get_the_ID() ) ),
                    'comment_count' => get_comments_number(get_the_ID()),
                    'mobile'        => ( has_post_thumbnail() )? get_the_post_thumbnail(get_the_ID(),'preview-mobile'):'',
                    'large'         => ($args['posts_per_page'] == 8 &&  has_post_thumbnail() )? get_the_post_thumbnail(get_the_ID(),'preview-large'):false,
                    'counter'       => $counter
                ];
                $counter ++;
            endwhile;
        endif;

        $output['paginate'] = ( count($output['posts']) < $args['posts_per_page'] ) ? 'no' : 'yes' ;

        return $output;
    }

    /**
     * get the related articles for the bottom of the post
     *
     */
    public function get_related(WP_REST_Request $request){

        $data = json_decode($request['data'],true);

        $args = [
            'posts_per_page'    => 5,
            'post_type'         => 'post',
            'post_status'       => 'publish',
            'category__in'      => filter_var ($data['term_id'], FILTER_SANITIZE_NUMBER_INT),
            'post__not_in'      => array_filter($data['ids'], 'is_numeric' ),
        ];

        $query = new WP_Query($args);

        $output['posts'] = [];
        $output['status'] = 'fail';

        if($query->have_posts()) :
            $output['status'] = 'success';
            while($query->have_posts()) : $query->the_post();

                $output['posts'][] =  [
                    'id'            => get_the_ID(),
                    'title'         => get_the_title(),
                    'link'          => Links::get_relative_path( get_the_ID() ),
                    'mobile'        => ( has_post_thumbnail() )? get_the_post_thumbnail(get_the_ID(),'thumbnail'):false,
                ];

            endwhile;
        endif;

        $output['paginate'] = ( count($output['posts']) < $args['posts_per_page'] ) ? 'no' : 'yes' ;

        return $output;
    }


    /**
     * get the cookie content
     */
    public function get_cookie(WP_REST_Request $request){
        $cookie_content = [];
        $cookie_content['title']        = esc_html_x('We use cookies to ensure that we give you the best experience on our website.', 'cookie policy title', 'proac');
        $cookie_content['content']      = esc_html_x("By continuing to use our website, you agree to our use of cookies. If you'd like to learn more about the cookies we use, please read our Cookie policy.", 'cookie policy content', 'proac');
        $cookie_content['agree']        = _x('I agree', 'cookie policy agree button', 'proac');
        $cookie_content['more_info']    = _x('Read the policy', 'cookie policy more info button', 'proac');
        $cookie_content['info_link']    = get_theme_mod('cv_cookie_info', '');
        $cookie_content['status']       = 'success';

        return $cookie_content;
    }


}