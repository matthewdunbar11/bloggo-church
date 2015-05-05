<?php
	
function register_sermon_post_type() {
	$labels = array(
		'name'                => _x( 'Sermons', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Sermon', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Sermon', 'text_domain' ),
		'name_admin_bar'      => __( 'Sermon', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Sermon:', 'text_domain' ),
		'all_items'           => __( 'All Sermons', 'text_domain' ),
		'add_new_item'        => __( 'Add New Sermon', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Sermon', 'text_domain' ),
		'edit_item'           => __( 'Edit Sermon', 'text_domain' ),
		'update_item'         => __( 'Update Sermon', 'text_domain' ),
		'view_item'           => __( 'View Sermon', 'text_domain' ),
		'search_items'        => __( 'Search Sermon', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'sermon', 'text_domain' ),
		'description'         => __( 'Sermon', 'text_domain' ),
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-video-alt3',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'sermon', $args );

}