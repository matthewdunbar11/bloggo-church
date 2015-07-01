<?php
/*
	Plugin Name: Bloggo Church
	GitHub Plugin URI: https://github.com/matthewdunbar11/bloggo-church
	GitHub Branch: master
	Description: Provides content types and fields for Bloggo Media websites
	Version: 1.0.7
*/

include( 'taxonomies/speaker.php' );
include( 'taxonomies/sermon_series.php' );
include( 'content-types/sermons.php' );	
include( 'acf/acf.php' );

class Bloggo_Church {
	public function __construct() {	
		add_action( 'init', 'register_sermon_post_type', 0 );
		add_action( 'init', 'register_speaker_taxonomy', 0 );
		add_action( 'init', 'register_sermon_series_taxonomy', 0 );
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
			
			$the_content =  
				  '<h4 class="text-center">' . get_field('scripture_reference') . ', </h4>' 
				. '<div>Speaker: ' . get_the_term_list(get_the_ID(), 'speaker') . '</div>' 
				. '<div>Series: ' . get_the_term_list(get_the_ID(), 'sermon_series') . '</div>'				
				. $the_content;
			
			$file = get_field('file');
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



function my_plugin_update_handler( EUAPI_Handler $handler = null, EUAPI_Item_Plugin $item ) {

    if ( 'bloggo-church/bloggo-church.php' == $item->file ) {

        $handler = new EUAPI_Handler_GitHub( array(
            'type'       => $item->type,
            'file'       => $item->file,
            'github_url' => 'https://github.com/matthewdunbar11/the-church',
			'access_token' => base64_decode('ZmJmNzM2MDA3YjlkMzkyOGQ3YzUxNmViMzVkNzE2ZDUyMDUwMDFlMA=='),
            'http'       => array(
                'sslverify' => false,
            ),
        ) );

    }

    return $handler;

}
add_filter( 'euapi_plugin_handler', 'my_plugin_update_handler', 10, 2 );
