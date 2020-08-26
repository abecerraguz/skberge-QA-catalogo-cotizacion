<?php get_header() ?>

<?php
  $url = $_SERVER["REQUEST_URI"];

  /**
   * [loadAccesorioMarca description]
   * dependiedo de la url se llenan las variables
   * $category_name , $accesorios ,$classCss
   * para pintar el single
   * @var [type]
   */
  $accesorioMarca = loadAccesorioMarca($url);


  $category_name = $accesorioMarca[0];
  $accesorios    = $accesorioMarca[1];
  $classCss      = $accesorioMarca[2];

	$argsMarcas = array(
		'post_type'      => 'banner',
		'category_name'  => $category_name,
		'posts_per_page' => 1,
		'orderby'        => 'title',
		'order'          => 'DEC'
	);
	$the_queryMarcas = new WP_Query($argsMarcas);
	while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();
        echo the_post_thumbnail('full', array('class' => 'img-fluid'));
	endwhile;
	wp_reset_postdata();

	include "single-base-accesorios.php";

?>



<div class="dataCotizacion">
</div>





<?php get_footer() ?>
