<?php
	/*
	function accesorios_post_type() {

		$labels = array(
			'name'                  => _x( 'Accesorios', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Accesorios', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Accesorios', 'text_domain' ),
			'name_admin_bar'        => __( 'Accesorios', 'text_domain' ),
			'archives'              => __( 'Accesorio Archives', 'text_domain' ),
			'attributes'            => __( 'Accesorio Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Accesorio:', 'text_domain' ),
			'all_items'             => __( 'All Accesorio', 'text_domain' ),
			'add_new_item'          => __( 'Add New Accesorios', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Accesorio', 'text_domain' ),
			'edit_item'             => __( 'Edit Accesorio', 'text_domain' ),
			'update_item'           => __( 'Update Accesorio', 'text_domain' ),
			'view_item'             => __( 'View Accesorio', 'text_domain' ),
			'view_items'            => __( 'View Accesorios', 'text_domain' ),
			'search_items'          => __( 'Search Accesorio', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Accesorio', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Accesorio', 'text_domain' ),
			'items_list'            => __( 'Accesorios list', 'text_domain' ),
			'items_list_navigation' => __( 'Accesorios list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Accesorios list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Accesorio', 'text_domain' ),
			'description'           => __( 'Las categorías de Accesorio que puedes encontrar', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title','thumbnail','page-attributes'),
			'taxonomies'            => array( 'category' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-tag',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page'
		);
		register_post_type( 'accesorios', $args );

	}
	add_action( 'init', 'accesorios_post_type', 0 );
*/

	//ACCESORIOS FIAT
		function accesorios_fiat_post_type() {

		$labels = array(
			'name'                  => _x( 'Accesorios FIAT', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Accesorios FIAT', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Accesorios FIAT', 'text_domain' ),
			'name_admin_bar'        => __( 'Accesorios FIAT', 'text_domain' ),
			'archives'              => __( 'Accesorio FIAT Archives', 'text_domain' ),
			'attributes'            => __( 'Accesorio  FIAT Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Accesorio FIAT:', 'text_domain' ),
			'all_items'             => __( 'All Accesorio FIAT', 'text_domain' ),
			'add_new_item'          => __( 'Add New Accesorios FIAT', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Accesorio FIAT', 'text_domain' ),
			'edit_item'             => __( 'Edit Accesorio FIAT', 'text_domain' ),
			'update_item'           => __( 'Update Accesorio FIAT', 'text_domain' ),
			'view_item'             => __( 'View Accesorio FIAT', 'text_domain' ),
			'view_items'            => __( 'View Accesorios FIAT', 'text_domain' ),
			'search_items'          => __( 'Search Accesorio FIAT', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Accesorio FIAT', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Accesorio FIAT', 'text_domain' ),
			'items_list'            => __( 'Accesorios FIAT list', 'text_domain' ),
			'items_list_navigation' => __( 'Accesorios FIAT list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Accesorios FIAT list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Accesorio FIAT', 'text_domain' ),
			'description'           => __( 'Las categorías de Accesorio FIAT que puedes encontrar', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title','thumbnail','page-attributes'),
			'taxonomies'            => array( 'category' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 6,
			'menu_icon'             => 'dashicons-tag',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page'
		);
		register_post_type( 'accesorios-fiat', $args );

	}
	add_action( 'init', 'accesorios_fiat_post_type', 0 );

	//Accesorio DODGE
	function accesorios_dodge_post_type() {

		$labels = array(
			'name'                  => _x( 'Accesorios DODGE', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Accesorios DODGE', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Accesorios DODGE', 'text_domain' ),
			'name_admin_bar'        => __( 'Accesorios DODGE', 'text_domain' ),
			'archives'              => __( 'Accesorio DODGE Archives', 'text_domain' ),
			'attributes'            => __( 'Accesorio  FIAT Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Accesorio DODGE:', 'text_domain' ),
			'all_items'             => __( 'All Accesorio DODGE', 'text_domain' ),
			'add_new_item'          => __( 'Add New Accesorios DODGE', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Accesorio DODGE', 'text_domain' ),
			'edit_item'             => __( 'Edit Accesorio DODGE', 'text_domain' ),
			'update_item'           => __( 'Update Accesorio DODGE', 'text_domain' ),
			'view_item'             => __( 'View Accesorio DODGE', 'text_domain' ),
			'view_items'            => __( 'View Accesorios DODGE', 'text_domain' ),
			'search_items'          => __( 'Search Accesorio DODGE', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Accesorio DODGE', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Accesorio DODGE', 'text_domain' ),
			'items_list'            => __( 'Accesorios DODGE list', 'text_domain' ),
			'items_list_navigation' => __( 'Accesorios DODGE list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Accesorios DODGE list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Accesorio DODGE', 'text_domain' ),
			'description'           => __( 'Las categorías de Accesorio DODGE que puedes encontrar', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title','thumbnail','page-attributes'),
			'taxonomies'            => array( 'category' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 7,
			'menu_icon'             => 'dashicons-tag',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page'
		);
		register_post_type( 'accesorios-dodge', $args );

	}
	add_action( 'init', 'accesorios_dodge_post_type', 0 );

	//Accesorios JEEP
		function accesorios_jeep_post_type() {

		$labels = array(
			'name'                  => _x( 'Accesorios JEEP', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Accesorios JEEP', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Accesorios JEEP', 'text_domain' ),
			'name_admin_bar'        => __( 'Accesorios JEEP', 'text_domain' ),
			'archives'              => __( 'Accesorio JEEP Archives', 'text_domain' ),
			'attributes'            => __( 'Accesorio  FIAT Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Accesorio JEEP:', 'text_domain' ),
			'all_items'             => __( 'All Accesorio JEEP', 'text_domain' ),
			'add_new_item'          => __( 'Add New Accesorios JEEP', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Accesorio JEEP', 'text_domain' ),
			'edit_item'             => __( 'Edit Accesorio JEEP', 'text_domain' ),
			'update_item'           => __( 'Update Accesorio JEEP', 'text_domain' ),
			'view_item'             => __( 'View Accesorio JEEP', 'text_domain' ),
			'view_items'            => __( 'View Accesorios JEEP', 'text_domain' ),
			'search_items'          => __( 'Search Accesorio JEEP', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Accesorio JEEP', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Accesorio JEEP', 'text_domain' ),
			'items_list'            => __( 'Accesorios JEEP list', 'text_domain' ),
			'items_list_navigation' => __( 'Accesorios JEEP list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Accesorios JEEP list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Accesorio JEEP', 'text_domain' ),
			'description'           => __( 'Las categorías de Accesorio JEEP que puedes encontrar', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title','thumbnail','page-attributes'),
			'taxonomies'            => array( 'category' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 8,
			'menu_icon'             => 'dashicons-tag',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page'
		);
		register_post_type( 'accesorios-jeep', $args );

	}
	add_action( 'init', 'accesorios_jeep_post_type', 0 );

	// Accesorio MMC
	function accesorios_mmc_post_type() {

		$labels = array(
			'name'                  => _x( 'Accesorios MMC', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Accesorios MMC', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Accesorios MMC', 'text_domain' ),
			'name_admin_bar'        => __( 'Accesorios MMC', 'text_domain' ),
			'archives'              => __( 'Accesorio MMC Archives', 'text_domain' ),
			'attributes'            => __( 'Accesorio MMC Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Accesorio MMC:', 'text_domain' ),
			'all_items'             => __( 'All Accesorio MMC', 'text_domain' ),
			'add_new_item'          => __( 'Add New Accesorios MMC', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Accesorio MMC', 'text_domain' ),
			'edit_item'             => __( 'Edit Accesorio MMC', 'text_domain' ),
			'update_item'           => __( 'Update Accesorio MMC', 'text_domain' ),
			'view_item'             => __( 'View Accesorio MMC', 'text_domain' ),
			'view_items'            => __( 'View Accesorios MMC', 'text_domain' ),
			'search_items'          => __( 'Search Accesorio MMC', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Accesorio MMC', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Accesorio MMC', 'text_domain' ),
			'items_list'            => __( 'Accesorios MMC list', 'text_domain' ),
			'items_list_navigation' => __( 'Accesorios MMC list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Accesorios MMC list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Accesorio MMC', 'text_domain' ),
			'description'           => __( 'Las categorías de Accesorio MMC que puedes encontrar', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title','thumbnail','page-attributes'),
			'taxonomies'            => array( 'category' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 9,
			'menu_icon'             => 'dashicons-tag',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page'
		);
		register_post_type( 'accesorios-mmc', $args );

	}
	add_action( 'init', 'accesorios_mmc_post_type', 0 );


	// Accesorios RAM
	function accesorios_ram_post_type() {

		$labels = array(
			'name'                  => _x( 'Accesorios RAM', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Accesorios RAM', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Accesorios RAM', 'text_domain' ),
			'name_admin_bar'        => __( 'Accesorios RAM', 'text_domain' ),
			'archives'              => __( 'Accesorio RAM Archives', 'text_domain' ),
			'attributes'            => __( 'Accesorio RAM Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Accesorio RAM:', 'text_domain' ),
			'all_items'             => __( 'All Accesorio RAM', 'text_domain' ),
			'add_new_item'          => __( 'Add New Accesorios RAM', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Accesorio RAM', 'text_domain' ),
			'edit_item'             => __( 'Edit Accesorio RAM', 'text_domain' ),
			'update_item'           => __( 'Update Accesorio RAM', 'text_domain' ),
			'view_item'             => __( 'View Accesorio RAM', 'text_domain' ),
			'view_items'            => __( 'View Accesorios RAM', 'text_domain' ),
			'search_items'          => __( 'Search Accesorio RAM', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Accesorio RAM', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Accesorio RAM', 'text_domain' ),
			'items_list'            => __( 'Accesorios RAM list', 'text_domain' ),
			'items_list_navigation' => __( 'Accesorios RAM list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Accesorios RAM list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Accesorio RAM', 'text_domain' ),
			'description'           => __( 'Las categorías de Accesorio RAM que puedes encontrar', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title','thumbnail','page-attributes'),
			'taxonomies'            => array( 'category' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 10,
			'menu_icon'             => 'dashicons-tag',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page'
		);
		register_post_type( 'accesorios-ram', $args );

	}
	add_action( 'init', 'accesorios_ram_post_type', 0 );

	function accesorios_ssangyong_post_type() {

		$labels = array(
			'name'                  => _x( 'Accesorios SSANGYONG', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Accesorios SSANGYONG', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Accesorios SSANGYONG', 'text_domain' ),
			'name_admin_bar'        => __( 'Accesorios SSANGYONG', 'text_domain' ),
			'archives'              => __( 'Accesorio SSANGYONG Archives', 'text_domain' ),
			'attributes'            => __( 'Accesorio SSANGYONG Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Accesorio SSANGYONG:', 'text_domain' ),
			'all_items'             => __( 'All Accesorio SSANGYONG', 'text_domain' ),
			'add_new_item'          => __( 'Add New Accesorios SSANGYONG', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Accesorio SSANGYONG', 'text_domain' ),
			'edit_item'             => __( 'Edit Accesorio SSANGYONG', 'text_domain' ),
			'update_item'           => __( 'Update Accesorio SSANGYONG', 'text_domain' ),
			'view_item'             => __( 'View Accesorio SSANGYONG', 'text_domain' ),
			'view_items'            => __( 'View Accesorios SSANGYONG', 'text_domain' ),
			'search_items'          => __( 'Search Accesorio SSANGYONG', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Accesorio SSANGYONG', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Accesorio SSANGYONG', 'text_domain' ),
			'items_list'            => __( 'Accesorios SSANGYONG list', 'text_domain' ),
			'items_list_navigation' => __( 'Accesorios SSANGYONG list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Accesorios SSANGYONG list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Accesorio SSANGYONG', 'text_domain' ),
			'description'           => __( 'Las categorías de Accesorio SSANGYONG que puedes encontrar', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title','thumbnail','page-attributes'),
			'taxonomies'            => array( 'category' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 11,
			'menu_icon'             => 'dashicons-tag',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page'
		);
		register_post_type( 'accesorios-ssangyong', $args );

	}
	add_action( 'init', 'accesorios_ssangyong_post_type', 0 );


 ?>
