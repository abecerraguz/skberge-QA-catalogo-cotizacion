<?php

// Register Custom Post Type
function banner_post_type() {

	$labels = array(
		'name'                  => _x( 'Banners', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Banner', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Banners internos', 'text_domain' ),
		'name_admin_bar'        => __( 'Banners', 'text_domain' ),
		'archives'              => __( 'Banner Archives', 'text_domain' ),
		'attributes'            => __( 'Banner Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Banner:', 'text_domain' ),
		'all_items'             => __( 'All Banner', 'text_domain' ),
		'add_new_item'          => __( 'Add New Banners', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Banner', 'text_domain' ),
		'edit_item'             => __( 'Edit Banner', 'text_domain' ),
		'update_item'           => __( 'Update Banner', 'text_domain' ),
		'view_item'             => __( 'View Banner', 'text_domain' ),
		'view_items'            => __( 'View Banners', 'text_domain' ),
		'search_items'          => __( 'Search Banner', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Banner', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Banner', 'text_domain' ),
		'items_list'            => __( 'Banners list', 'text_domain' ),
		'items_list_navigation' => __( 'Banners list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Banners list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Banner', 'text_domain' ),
		'description'           => __( 'Las categorías de Banner que puedes encontrar', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 13,
		'menu_icon'             => 'dashicons-format-image',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'banner', $args );

}
add_action( 'init', 'banner_post_type', 0 );

 ?>
