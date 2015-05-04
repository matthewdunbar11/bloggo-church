<?php
/*
	Plugin Name: Bloggo Church
*/

include( 'content-types/sermons.php' );	
include( 'acf/acf.php' );

class Bloggo_Church {
	public function __construct() {	
		add_action( 'init', 'register_sermon_post_type', 0 );
		add_action( 'init', array( $this, 'init' ) );
	}
	
	function init() {
		
		include( 'fields/sermons.php' );		
	}	
	
}
new Bloggo_Church();