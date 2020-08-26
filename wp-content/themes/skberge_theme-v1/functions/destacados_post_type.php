<?php

	// Register Custom Post Type
	function destacados_post_type() {

		$labels = array(
			'name'                  => _x( 'Destacados', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Destacados', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Destacados', 'text_domain' ),
			'name_admin_bar'        => __( 'Destacados', 'text_domain' ),
			'archives'              => __( 'Destacado Archives', 'text_domain' ),
			'attributes'            => __( 'Destacado Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Destacado:', 'text_domain' ),
			'all_items'             => __( 'All Destacado', 'text_domain' ),
			'add_new_item'          => __( 'Add New Destacados', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Destacado', 'text_domain' ),
			'edit_item'             => __( 'Edit Destacado', 'text_domain' ),
			'update_item'           => __( 'Update Destacado', 'text_domain' ),
			'view_item'             => __( 'View Destacado', 'text_domain' ),
			'view_items'            => __( 'View Destacados', 'text_domain' ),
			'search_items'          => __( 'Search Destacado', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Destacado', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Destacado', 'text_domain' ),
			'items_list'            => __( 'Destacados list', 'text_domain' ),
			'items_list_navigation' => __( 'Destacados list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Destacados list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Destacado', 'text_domain' ),
			'description'           => __( 'Las categorías de Destacado que puedes encontrar', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title','thumbnail','page-attributes'),
			'taxonomies'            => array( 'category' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 15,
			'menu_icon'             => 'dashicons-tag',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page'
		);
		register_post_type( 'destacados', $args );

	}
	add_action( 'init', 'Destacados_post_type', 0 );

 ?>
