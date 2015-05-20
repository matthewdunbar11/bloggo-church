<?php
/*
	Plugin Name: Bloggo Church
	GitHub Plugin URI: https://github.com/matthewdunbar11/bloggo-church
	GitHub Branch: master
	Description: Provides content types and fields for Bloggo Media websites
	Version: 0.0.2 
*/

include( 'taxonomies/speaker.php' );
include( 'taxonomies/sermon_series.php' );
include( 'content-types/sermons.php' );	
include( 'acf/acf.php' );
include( 'widgets/latest_sermons.php' );

class Bloggo_Church {
	public function __construct() {	
		add_action( 'init', 'register_sermon_post_type', 0 );
		add_action( 'init', 'register_speaker_taxonomy', 0 );
		add_action( 'init', 'register_sermon_series_taxonomy', 0 );
		add_action( 'widgets_init', 'register_latest_sermons_widget' );
		add_action( 'init', array( $this, 'init' ) );
		add_filter( 'the_content', array( $this, 'the_content' ) );
		//add_filter( 'template_include', array($this, 'template_include' ) );
	}
	
	function init() {
		
		include( 'fields/sermons.php' );		
	}	
	
	function template_include($template) {
		if( is_single() && get_post_type() == 'sermon' && ( endsWith( $template, 'single.php' ) || endsWith( $template, 'index.php' ) ) ) {
			$template = plugin_dir_path(__FILE__) . 'templates/sermon.php';
		}
		
		echo $template;
		
		return $template;
	}
	
	function the_content( $the_content ) {
		if( is_single() && get_post_type() == 'sermon' ) {
			
			$the_content =  '<div>Speaker: ' . get_the_term_list(get_the_ID(), 'speaker') . '</div>' 
				. '<div>Sermon Series: ' . get_the_term_list(get_the_ID(), 'sermon_series') . '</div>'
				. '<div>Scripture Reference: ' . get_field('scripture_reference') . '</div>' 
				. $the_content;
			
			$file = get_field('file');
			$media_shortcode = '';
			if(substr($file['mime_type'], 0, 5) == 'audio') {
				$media_shortcode = '[audio src="' . $file['url'] . '"]';
			}
			else if(substr($file['mime_type'], 0, 5) == 'video') {
				$media_shortcode = '[video src="' . $file['url'] . '"]';
			}			
			$the_content .= $media_shortcode;
			
			if(get_field('video_url')) {
				$the_content .= '[video src="' . get_field('video_url') . '"]';
			}
		}
		return $the_content;
	}
}
new Bloggo_Church();


function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}