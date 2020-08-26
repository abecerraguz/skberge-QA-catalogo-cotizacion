<!-- var post_type ,
    HTML
    classBackground
    classModelo
    classDetalleProducto
    classBtnMarca-->

<section class="total">
    <section class="container">
        <div class="row top-30 bottom-30">
            <div class="col-md-6">
                <div class="row">
                <!--Inicio Container XZOOM-->
                <div class="xzoom-container col-sm-12">

                <?php
                    $argsGaleria = array(
                        'post_type'      => $accesorios,
                        'posts_per_page' => 4,
                        'orderby'        => 'title',
                        'order'          => 'DEC',
                    );

                    $the_queryGaleria = new WP_Query($argsGaleria);


                    if (have_rows('galeria')) {
                        while (have_rows('galeria')): the_row();
                        {

                    $imagenUnoZoom     = get_sub_field('imagen_uno_zoom');
                    echo '<div class="containerPhoto">';
                    echo '<img class="xzoom imageProduct" id="xzoom-default" src="'.$imagenUnoZoom.'" title="The description goes here" xoriginal="'.$imagenUnoZoom.'"/>';
                    echo '</div>';

                    }
                        endwhile;
                    }
                    wp_reset_postdata();
                ;?>

                <div class="xzoom-thumbs mt-3">

                    <?php

                    if (have_rows('galeria')):
                    while (have_rows('galeria')): the_row();
                    if ($subfields = get_row()) {
                        ?>

                    <?php
                    foreach ($subfields as $key => $value) {
                        if (!empty($value)) {
                            $field = get_sub_field_object($key); ?>
                    <?php



                        echo '<a href="'.$field['value'].'">';
                            echo ' <img class="xzoom-gallery producto-interno" width="100" src="'.$field['value'].'" title="The description goes here">';
                            echo '</a>'; ?>
                    <?php
                        }
                    } ?>

                    <?php
                    }
                    endwhile;
                    endif;


                 ?>

                </div>
            </div>
            <!--Cierre Container XZOOM-->




            </div>

            </div>

            <div class="col-md-6">

                <?php

                if (have_posts()) {
                    while (have_posts()):the_post();
                    {
                    $nameAccesorio = get_field('nombre_accesorio');
                    $brand         = get_field('marca');
                    $modelo        = get_field('modelo');
                    $codigoSku     = get_field('sku');
                    $precio        = get_field('precio');
                    $descripcion   = get_field('descripcion');
                    $id            = get_the_ID();


                    echo '<div class="total padding-10 '.$classCss["classBackground"].'">';
                    echo '<h3 class="blanco no-space titleProduct">'.get_the_title().'<br><span class="'.$classCss["classModelo"].'">';
                    foreach ((get_the_category()) as $category) {
                        echo $category->cat_name;
                    }
                    echo '</span> </h3>';
                    echo '</div>';

                    echo '<div class="total padding-10 '.$classCss["classBackground"].' top-10 bottom-20">';
                    echo '<h2 class="blanco no-space priceProduct" data-precio="'.$precio.'">$'.$precio.'<span class="detalle-precio"> IVA e Instalación incl. </span> </h2>';
                    echo '</div>';

                    echo '<p class="destacado">'.$descripcion.'</p>';
                    echo '<p class="destacado"><span class="'.$classCss["classDetalleProducto"].'"><strong>Detalle del producto:</strong></span>';
                    echo '<ul class="list-group list-group-flush">';
                    if (have_rows('detalle_del_producto')) {
                        while (have_rows('detalle_del_producto')): the_row();
                        {
                            $subvalueTamano = get_sub_field('tamano');
                            $subvaluePeso   = get_sub_field('peso');
                            $subvalueColor  = get_sub_field('color');
                            echo '<li class="list-group-item font-weight-bold">Tamaño: '.$subvalueTamano.'</li>';
                            echo '<li class="list-group-item font-weight-bold">Peso: '.$subvaluePeso.'</li>';
                            echo '<li class="list-group-item font-weight-bold">Color: '.$subvalueColor.'</li>';
                            echo '<li class="list-group-item font-weight-bold sku">SKU: '.$codigoSku.'</li>';
                        }
                        endwhile;
                    } else {
                        echo '<h1>No hay publicacion</h1>';
                    }
                    echo '</ul>';
                    echo '<div class="row my-5">';
                    echo '<div class="col-md-6">';
                    echo '<form>';
                    echo '<label>Cantidad de Productos</label>';
                    echo '<select name="carro" class="carro">';
                    echo '</select>';
                    echo '</div>';
                    echo '<div class="col-md-6">';
                    echo '<a href="'.home_url().'/cotizacion/" id="'.$id.'"class="btn btn-lg '.$classCss["classBtnMarca"].' bloque agregarCarro" data-toggle="tooltip" data-placement="top" title="" data-delay=\'{"show":"200", "hide":"500"}\'><i class="fas fa-shopping-cart"></i>  AGREGAR AL CARRO</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</form>';


                    }
                    endwhile;
                    wp_reset_postdata();
                } else {
                    echo '<h1>Lo sentimos no hay publicaciones</h1>';
                }

                 ?>

                 <h1 class="datoNombre"></h1>
            </div>
        </div>
    </section>
</section>

<section class="total">
    <section class="container top-50 bottom-50">
        <div class="row d-flex justify-content-center">
        <div class="col-md-12">


        <h2 class="text-center">
            <?php _e('Accesorios sugeridos para tu'); ?>
            <?php 
                foreach ((get_the_category()) as $category) {
                    echo '<span class="'.$classCss["classModelo"].'">'.$category->cat_name.'</span></h2>';
                }
             ?>
        </div>



        <div class="row">
                <?php
                    $argsAccesoriosSugeridos = array(
                        'post_type'      => $accesorios,
                        'category_name'  => $category_name,
                        'posts_per_page' => 4,
                        'orderby'        => 'title',
                        'order'          => 'DEC',
                    );

                    $the_queryAccesoriosSugeridos = new WP_Query($argsAccesoriosSugeridos);
                    while( $the_queryAccesoriosSugeridos->have_posts()) : $the_queryAccesoriosSugeridos->the_post();



                            // $image = get_field('imagen');
                            // $size = 'sugeridos'; // (thumbnail, medium, large, full or custom size)
                            // if( $image ) {
                            //     echo wp_get_attachment_image( $image, $size );
                            // }


                            echo '<div class="col-md-3">';
                            echo '<a href="'.get_the_permalink().'" data-toggle="tooltip" data-placement="top" title="'.get_the_title().'">';
                            echo '<img src="'.get_field('imagen').'" class="'.$classCss["classSugeridos"].' img-fluid">';
                            echo '</a>';
                            echo '</div>';  
                    endwhile;
                    wp_reset_postdata();
                ;?>

        </div>
        </div>
    </section>
</section>
