<?php

	// Register Custom Post Type
	function marcas_post_type() {

		$labels = array(
			'name'                  => _x( 'Marcas', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Marcas', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Marcas', 'text_domain' ),
			'name_admin_bar'        => __( 'Marcas', 'text_domain' ),
			'archives'              => __( 'Marca Archives', 'text_domain' ),
			'attributes'            => __( 'Marca Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Marca:', 'text_domain' ),
			'all_items'             => __( 'All Marca', 'text_domain' ),
			'add_new_item'          => __( 'Add New Marcas', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Marca', 'text_domain' ),
			'edit_item'             => __( 'Edit Marca', 'text_domain' ),
			'update_item'           => __( 'Update Marca', 'text_domain' ),
			'view_item'             => __( 'View Marca', 'text_domain' ),
			'view_items'            => __( 'View Marcas', 'text_domain' ),
			'search_items'          => __( 'Search Marca', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Marca', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Marca', 'text_domain' ),
			'items_list'            => __( 'Marcas list', 'text_domain' ),
			'items_list_navigation' => __( 'Marcas list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Marcas list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Marca', 'text_domain' ),
			'description'           => __( 'Las categorías de marca que puedes encontrar', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title','thumbnail','page-attributes'),
			'taxonomies'            => array( 'category' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 14,
			'menu_icon'             => 'dashicons-universal-access-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page'
		);
		register_post_type( 'marcas', $args );

	}
	add_action( 'init', 'marcas_post_type', 0 );

 ?>
