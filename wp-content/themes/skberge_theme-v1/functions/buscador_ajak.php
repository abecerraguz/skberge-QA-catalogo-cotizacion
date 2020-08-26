<?php

add_action( 'wp_footer', 'abg_script' );

function abg_script(){
    // $args = array(
    //     //'post_type'         => array( 'accesorios-mmc', 'accesorios-fiat', 'accesorios-dodge', 'accesorios-jeep', 'accesorios-ram', 'accesorios-ssangyong'),
    //     'post_type'         => 'accesorios-ssangyong',
    //     'orderby'           => 'date',
    //     'category_name'     => '',
    //     'posts_per_page'    => 1
    // );
    //print_r($query);
    //die();


    global $wp_query;
    wp_register_script( 'abecerra_scripts', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), time() );
    wp_localize_script( 'abecerra_scripts', 'abecerra_loadmore_params', array(
        'ajaxurl'       => site_url() . '/wp-admin/admin-ajax.php',
        'posts'         => $wp_query->query_vars,
        'current_page'  => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
        'max_page'      => $wp_query->max_num_pages,
        'a' => $wp_query
    ) );
    wp_enqueue_script( 'abecerra_scripts' );
}




add_action('wp_ajax_loadmore', 'abg_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'abg_loadmore_ajax_handler');


function abg_loadmore_ajax_handler(){
    $argsFiat = json_decode( stripslashes( $_POST['query'] ), true );

    $argsFiat['paged']       = $_POST['page'] + 1;
    $argsFiat['post_status'] = 'publish';

    query_posts( $argsFiat );

    if( have_posts() ) :
        while( have_posts() ): the_post();

            $categories  = get_the_category();
            $id          = get_the_ID();
            $marca = $marcas[0];

            $nameAccesorio = get_field('nombre_accesorio');
            $brand         = get_field('marca');
            $modelo        = get_field('modelo');
            $codigoSku     = get_field('sku');
            $precio        = get_field('precio');


            echo '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">';
            echo '<article class="contenCard">';
            echo '<div class="headerCard">';
            echo '<img src="'.get_field('imagen').'" class="img-fluid">';
            echo '</div>';
            echo '<div class="headerBody">';
            echo '<ul class="list-group list-group-flush text-black-50 datos">';
            echo '<li class="list-group-item nameAccesorio text-uppercase font-weight-bold text-dark" id="'.'nombre-'.$id.'">'.$nameAccesorio.'</li>';
            echo '<li class="list-group-item marcaAcceso text-uppercase" id="'.'marca-'.$id.'">'.$brand.'</li>';

            $args = array(
                'template'      => '%2$l',
                'term_template' => '%2$s',
                'post'   => 0,
                'before' => '<li class=list-group-item id="taxAccesorio">',
                'sep'    => ' : ',
                'after'  => '</li>',
            );
            the_taxonomies( $args );

            // echo '<li class="list-group-item modeloAccesorio" id="'.'modelo-'.$id.'">'.$modelo.'</li>';
            echo '<li class="list-group-item skuAccesorio" id="'.'detalle-'.$id.'">SKU: <span class="text-dark">'.$codigoSku.'</span></li>';
            echo '</ul>';
            echo '<span class="precioAccesorio" id="'.'precio-'.$id.'"><h3 class="my-2">$ '.$precio.'</h3></span>';
            echo '</div>';
            echo '<div class="headerFooter">';
            echo ' <a class="btn btn-lg btn-cotizar-'.strtolower($brand).' bloque" href="'.get_the_permalink().'" id="'.$id.'">COTIZAR</a>';
            echo '</div>';
            echo '</article>';
            echo '</div>';

        endwhile;
    endif;
    die;

}





add_action('wp_ajax_abgfilter', 'filter_function');
add_action('wp_ajax_nopriv_abgfilter', 'filter_function');

function filter_function(){

    $order = explode( '-', $_POST['abg_order_by'] );
    $accesorio_slug = $_POST['accesorio_slug'];

    // echo $accesorio_slug;
    // die();

    $args = array(
        'post_type'      => $accesorio_slug,
        //'post_type'      => array( 'accesorios-mmc', 'accesorios-fiat', 'accesorios-dodge', 'accesorios-jeep', 'accesorios-ram', 'accesorios-ssangyong'),
        //'posts_per_page' => get_option('posts_per_page'),
        'posts_per_page' => get_option('posts_per_page'),
        'order'          => $order[0],
        'orderby'        => 'ID',
        'paged'          => 1

    );

    if(isset( $_POST['categoryfilter']) && ($_POST['categoryfilter'] != '-1') && ($_POST['categoryfilter'] != '')) {
          $args['tax_query'][] = array(
              'relation' => 'AND',
              array(
                  'taxonomy'  => 'category',
                  'terms'     => $_POST['categoryfilter'],
                  'operator'  => 'IN'
              )
      );


          $pos = strpos($_POST['taxonomy_model'], str_replace("-","_",get_category($_POST['categoryfilter'])->slug));
          if ($pos === false) {
            $_POST['taxonomy_model'] = str_replace("-","_",get_category($_POST['categoryfilter'])->slug);
            $_POST['slugfilter_marca'] = -1;
          }

          // if($_POST['taxonomy_model'] != str_replace("-","_",get_category($_POST['categoryfilter'])->slug) ){
          //   $_POST['taxonomy_model'] = str_replace("-","_",get_category($_POST['categoryfilter'])->slug);
          //   $_POST['slugfilter_marca'] = -1;
          // }

    }


   if(isset( $_POST['slugfilter_marca']) && ($_POST['slugfilter_marca'] != '-1') && ($_POST['slugfilter_marca'] != ''))
   {
     // echo $_POST['slugfilter_marca'];
     // echo $_POST['taxonomy_model'];
     $tax = $_POST['taxonomy_model'];

       if($tax == -1 || $tax == "-1")
       {
             $taxonomies = get_object_taxonomies($accesorio_slug);
             if (($key = array_search("category", $taxonomies)) !== false) {
               unset($taxonomies[$key]);
             }
             $tax = $taxonomies;

             $args['tax_query'] = array('relation' => 'OR');
             foreach ($taxonomies as $key => $tax_)
             {
                $args['tax_query'][] =  array(
                                 'taxonomy'  => $tax_,
                                 'terms'     => $_POST['slugfilter_marca'],
                                 'field'     => 'slug',
                                 'operator'  => 'IN'
                               );

             }

       }else{
             $args['tax_query'][] = array(
                 'relation' => 'AND',
                 array(
                   'taxonomy'  => $tax,
                   'terms'     => $_POST['slugfilter_marca'],
                   'field'     => 'slug',
                   'operator'  => 'IN'
                 )
          );
       }
   }
    // print_r($_POST);
    // echo "----";
    // print_r($args);


    query_posts($args);

    global $wp_query;

    if( have_posts() ) :
        ob_start();
        while( have_posts() ): the_post();
            $categories  = get_the_category();
            $id          = get_the_ID();
            $marca = $marcas[0];

            $nameAccesorio = get_field('nombre_accesorio');
            $brand         = get_field('marca');
            $modelo        = get_field('modelo');
            $codigoSku     = get_field('sku');
            $precio        = get_field('precio');


            echo '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">';
            echo '<article class="contenCard">';
            echo '<div class="headerCard">';
            echo '<img src="'.get_field('imagen').'" class="img-fluid">';
            echo '</div>';
            echo '<div class="headerBody">';
            echo '<ul class="list-group list-group-flush text-black-50 datos">';
            echo '<li class="list-group-item nameAccesorio text-uppercase font-weight-bold text-dark" id="'.'nombre-'.$id.'">'.$nameAccesorio .'</li>';
            echo '<li class="list-group-item marcaAcceso text-uppercase" id="'.'marca-'.$id.'">'.$brand.'</li>';

            /**PARA QUE ES ESTO ??????**/
            $args = array(
                'template'      => '%2$l',
                'term_template' => '%2$s',
                'post'   => 0,
                'before' => '<li class=list-group-item id="taxAccesorio">',
                'sep'    => ' : ',
                'after'  => '</li>',
            );
            the_taxonomies( $args );


            if($accesorio_slug == "accesorios-mmc")
            {
                    $accesorio_slug = "mitsubishi";
            }
            // echo '<li class="list-group-item modeloAccesorio" id="'.'modelo-'.$id.'">'.$modelo.'</li>';
            echo '<li class="list-group-item skuAccesorio" id="'.'detalle-'.$id.'">SKU: <span class="text-dark">'.$codigoSku.'</span></li>';
            echo '</ul>';
            echo '<span class="precioAccesorio" id="'.'precio-'.$id.'"><h3 class="my-2">$ '.$precio.'</h3></span>';
            echo '</div>';
            echo '<div class="headerFooter">';
            echo ' <a class="btn btn-lg btn-cotizar-'.str_replace("accesorios-" , "" ,$accesorio_slug).' bloque" href="'.get_the_permalink().'" id="'.$id.'">COTIZAR</a>';
            echo '</div>';
            echo '</article>';
            echo '</div>';

        endwhile;
        $content = ob_get_contents();
        ob_end_clean();
    endif;
    echo json_encode( array(
        'posts' => json_encode($wp_query->query_vars),
        'max_page' => $wp_query->max_num_pages,
        'found_posts' => $wp_query->found_posts,
        'content' => $content,
        'args' => json_encode($wp_query->query_vars)

    ) );

    die();
}



;?>
