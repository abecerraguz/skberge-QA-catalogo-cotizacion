<?php

/**
 * Custom Images Names
 * Adds custom images sizes ready to use on administrator
 *
 * @return array
 * @since  1.0
 */
function dl_image_sizes( $sizes ) {

	$add_sizes = array(
		'marcas'	=> __( 'Tamaño de las marcas del Home' ),
		'accesorio'	=> __( 'Tamaño de las marcas de accesorio' ),
		'sugeridos'	=> __( 'Tamaño de los accesorios sugeridos' )
	);

	return array_merge( $sizes, $add_sizes );

}


/**
 * Custom Images Sizes
 * Adds custom images sizes on posts
 *
 * @return void
 * @since  1.0
 * @see    https://developer.wordpress.org/reference/functions/add_image_size/
 * @see    https://codex.wordpress.org/Plugin_API/Filter_Reference/image_size_names_choose
 */
if ( function_exists( 'add_theme_support' ) ) {

	add_image_size( 'marcas', 200, 200, true );
	add_image_size( 'accesorio', 199, 129, true );
	add_image_size( 'sugeridos', 160, 150, true );


	add_filter( 'image_size_names_choose', 'dl_image_sizes' );

}
