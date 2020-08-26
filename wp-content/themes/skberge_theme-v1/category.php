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
  $accesorioMarca = loadBuscadorModelo($url);
  
  // echo "<pre>";
  // print_r($accesorioMarca);
  // echo "</pre>";

  $category_name = $accesorioMarca[0];
  $accesorios    = $accesorioMarca[1];
  $classCss      = $accesorioMarca[2];
  $tax_modelo    = $accesorioMarca[3];
  $modelo        = str_replace("-","_",$accesorioMarca[4]);
  $tax = "";

  // echo "<pre> MODELO GET URL = " . $modelo ."</pre>";

  $taxonomies = get_object_taxonomies($accesorios);
  // echo "<pre>METHOD get_object_taxonomies = </pre>";
  // echo "<pre>";
  // print_r($taxonomies);
  // echo "</pre>";
  foreach ($taxonomies as $key => $value) {
    // code...
    $pos = strpos($value, $modelo);
    if ($pos !== false) {
            $tax = $value;
    }
  }
  //echo $tax;


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

	include "category-base-buscador.php";

?>
<?php get_footer() ?>
