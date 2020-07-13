<?php

namespace ProAc;

use ProAc\Icons\Svg;
use ProAc\Theme\Links;

class ThemeTags {

    static public function posted_on($echo = true) {

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'on %s', 'post date', 'proac' ),
			 self::time_string()
		);
        $output = '<span class="posted-on"> ' . $posted_on . '</span>'; // WPCS: XSS OK.
        if($echo){
            echo $output;
        }
		return $output;

    }

    static public function get_query_count(){
        global $wp_query;
        return $wp_query->post_count;
    }
    /**
	 * Prints HTML with meta information for the current author.
	 */
    static public function posted_by($echo = true) {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'proac' ),
			self::author_vcard()
		);


        $output = '<span class="byline">' . $byline . '</span>'; // WPCS: XSS OK.
        if($echo){
            echo $output;
        }
		return $output;
    }

    static public function author_vcard(){
        return '<span class="author vcard"><a class="url fn n" href="' . esc_url( Links::make_relative(  get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ). '" data-action="author_interaction" data-label="'.esc_url( Links::make_relative(  get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ).'" data-category="'.ThemeTags::page_type().'_author_click">' . esc_html( get_the_author() ) . '</a></span>';
    }

    static public function time_string(){
        /**
	    * Prints HTML with meta information for the current post-date/time.
	    */
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
        );

        return $time_string;
    }

    static public function posted_by_and_on($echo = true){


        $byline = sprintf(
			/* translators: %s: post author. */
            esc_html_x( 'By %1$s on %2$s', 'post author and date', 'proac' ),
            // the string that gets inserted for the author
            self::author_vcard(),
            // the string that get inserted for the date
            '<span class="posted-on"> ' . self::time_string() . '</span>'
		);


        $output = '<span class="byline">' . $byline . '</span>'; // WPCS: XSS OK.
        if($echo){
            echo $output;
        }
        return $output;


    }
	/**
	 * Shows the subtitle value
     *
     * The value can be adapted by filtering subtitle_value.
	 */
    static public function subtitle($post_type = false) {

        $subtitle = self::get_subtitle_value($post_type );

        if($subtitle != false) {
            echo '<span class="subtitle">' . $subtitle . '</span>';
        }
    }


    /**
     * shows the subtitle as a hashtag
     *
     * @return void
     */
    static public function subtitle_as_hashtag(){
        $subtitle = self::get_subtitle_value();

        if($subtitle != false) {

            $subtitle = ucwords($subtitle);
            $subtitle =  preg_replace('/\s+/', '', $subtitle);
            echo '<span class="subtitle hashtag">#' . $subtitle . '</span>';
        }
    }

    /**
     * Tries to print the subtitle value, if not defaults to the first available category, then nothing if none set at all.
     *
     * @return string
     */
    static public function get_subtitle_value($ignore_category = false ){
        $subtitle = get_post_meta(get_the_ID(), "subtitle", true);

        if($subtitle == false && $ignore_category == false){
            $category = get_the_category();
            $subtitle = ( isset( $category[0]->cat_name ) )? $category[0]->cat_name : false;
        } else if ($subtitle == false) {
            return false;
        }

        return apply_filters( 'subtitle_value', esc_html($subtitle) );
    }


    /**
	 * Print the title with subtitle
     *
     * 
	 */
    static public function title_and_subtitle($post_type = false) {

        $title = get_the_title();
        $subtitle = self::get_subtitle_value($post_type );

        if($title != '' && $subtitle != false) {
            echo '<span class="sub-t">' . $subtitle . ' </span>' . $title;
        } else {
            echo $title;

        }
    }



    /**
     * Echo categories as a list of links, with optional title
     *
     * @param boolean $title    true to show category title
     * @param boolean/int $id   id of the post to show categories for
     * @return void
     */
    static public function categories($title = false, $id = false){

        if($title == true ) {
            echo "<h3>". _x('Categories', 'category list title',  'proac') . "</h3>";
        }
        echo self::terms_as_list( self::terms('category', $id) );
    }

    /**
     * Echo tags as a list of links, with optional title
     *
     * @param boolean $title    true to show tag title
     * @param boolean/int $id   id of the post to show tags for
     * @return void
     */
    static public function tags($title = false, $id = false){
        if($title == true ) {
            echo "<h3>". _x('Tags', 'tag list title', 'proac') . "</h3>";
        }

        echo self::terms_as_list( self::terms('post_tag', $id) );
    }

    /**
     * Convert terms object into a good looking list with lots of possibilites to extend uppon
     *
     * Note: we are using relative paths on links to reduce HTML size
     *
     * @param [object] $terms
     * @return string
     */
    static public function terms_as_list($terms){

        if(!isset($terms[0]->taxonomy)){
            return;
        }
        $taxonomy_details = get_taxonomy( $terms[0]->taxonomy );

        ob_start();
        ?><ul class='term_list'><?php
        $count = count($terms);

        foreach($terms as $key => $term) {
            ?>
            <li class='term_list_item <?php echo $term->taxonomy ?> slug-<?php echo $term->slug ?>' >
                <a class='term_list_item_link <?php echo $term->taxonomy ?>-link slug-<?php echo $term->slug ?>-link'
                   href='<?php echo Links::make_relative( get_term_link( $term->term_id ) ) ?>'
                   data-tax='<?php echo $term->taxonomy ?>' data-term-slug='<?php echo $term->slug ?>'
                   data-term-id='<?php echo $term->term_id ?>' data-tax-slug='<?php echo $taxonomy_details->rewrite['slug'] ?>'
                   data-label='<?php echo Links::make_relative( get_term_link( $term->term_id ) ) ?>'
                   data-action='taxonomy_interaction'
                   data-category='article_<?php echo $term->taxonomy ?>_click'
                   ><?php
                 echo $term->name;
                 ?></a><?php
                $comma = ( $key < ($count - 1) )?", ": "";
                echo apply_filters( $term->taxonomy . '_comma', $comma );
                ?></li>
            <?php
        }
        ?></ul><?php
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }



    /**
     * Get a terms object from post ID and taxonomy name
     *
     * @param string $taxonomy
     * @param boolean/int $id
     * @return object
     */
    static public function terms($taxonomy = 'category', $id = false) {
        if($id == false ) {
            $id = get_the_ID();
        }

        return wp_get_post_terms( $id, $taxonomy );
    }

    /**
     * ### Added by Daan: Creates css class with the main category term id
     *
     * Needs work
     *
     * @param [object] $terms
     * @return string
     */
    static public function category_as_slugs(){
        $category = self::terms();
        $output = [];
        foreach($category as $term){
            $output [] = $term->slug;

            if ( $term->parent != 0 ) {
                $parent = get_term( $term->parent, 'category' );
                $output[] = $parent->slug;
            }
        }
        return $output;
    }


    static public function parent_category_slug(){
        $category = self::terms();
        $output = '';
        foreach($category as $term){
            if ( $term->parent != 0 ) {
                $parent = get_term( $term->parent, 'category' );
                $output = $parent->slug;
            } else {
                $output = $term->slug;
            }
        }
        return $output;
    }
    /**
     * ### Added by Daan: Return the name of the sub category without link
     *
     * Needs work
     *
     * @param [object] $terms
     * @return string
     */
    static public function category_name(){
        if(empty(self::terms())) {
            return;
        }
        $category = self::terms();
        $output = [];
        foreach($category as $term){
            $output [] = $term->name;
        }
        return $output[0];
    }

    /**
     * Show the comment link including SVG bubble
     *
     */
    static public function comment_link($id = false){
        if($id == false ) {
            $id = get_the_ID();
        }
        if(!comments_open($id)){
            return;
        }

        echo '<a href="' .  Links::get_relative_path( $id ) . '#comments" class="comment-count-holder" data-label="'.get_comments_number($id).'" data-category="'.ThemeTags::page_type().'_comment_bubble" data-action="comment_click" >';

        ThemeTags::comment_count();

        echo '</a>';
    }

    /**
     *
     */
    static public function comment_count($id = false){
        if($id == false ) {
            $id = get_the_ID();
        }

        if(!comments_open($id)){
            return;
        }

        $count = get_comments_number($id);
        echo '<span class="screen-reader-text">article comment count is: </span>
        <span class="comment-count spritefont spritefont-comment-fill count-'.$count.'" data-postid="'.$id.'">
        '.Svg::icons()['comment-fill'].'
        <span class="count">' . $count .'</span></span>';

    }

    static public function page_type(){
        if(is_home()){
            return 'home';
        } else if (is_archive()){
            return 'archive';
        } else if (is_singular()){
            return 'article';
        }
    }
 
    
}    