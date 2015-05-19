<?php
	// Register Custom Taxonomy
	function register_speaker_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Speakers', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Speaker', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Speakers', 'text_domain' ),
			'all_items'                  => __( 'All Speakers', 'text_domain' ),
			'parent_item'                => __( 'Parent Speaker', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Speaker:', 'text_domain' ),
			'new_item_name'              => __( 'New Speaker', 'text_domain' ),
			'add_new_item'               => __( 'Add New Speaker', 'text_domain' ),
			'edit_item'                  => __( 'Edit Speaker', 'text_domain' ),
			'update_item'                => __( 'Update Speaker', 'text_domain' ),
			'view_item'                  => __( 'View Speaker', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove speakers', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used speakers', 'text_domain' ),
			'popular_items'              => __( 'Popular Speakers', 'text_domain' ),
			'search_items'               => __( 'Search Speakers', 'text_domain' ),
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
		register_taxonomy( 'speaker', array( 'sermon' ), $args );
	
	}
