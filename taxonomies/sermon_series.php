<?php
	// Register Custom Taxonomy
	function register_sermon_series_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Sermon Series', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Sermon Series', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Sermon Series', 'text_domain' ),
			'all_items'                  => __( 'All Sermon Series', 'text_domain' ),
			'parent_item'                => __( 'Parent Sermon Series', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Sermon Series:', 'text_domain' ),
			'new_item_name'              => __( 'New Sermon Series', 'text_domain' ),
			'add_new_item'               => __( 'Add New Sermon Series', 'text_domain' ),
			'edit_item'                  => __( 'Edit Sermon Series', 'text_domain' ),
			'update_item'                => __( 'Update Sermon Series', 'text_domain' ),
			'view_item'                  => __( 'View Sermon Series', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove sermon series', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used sermon series', 'text_domain' ),
			'popular_items'              => __( 'Popular Sermon Series', 'text_domain' ),
			'search_items'               => __( 'Search Sermon Series', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'sermon_series', array( 'sermon' ), $args );
	
	}
