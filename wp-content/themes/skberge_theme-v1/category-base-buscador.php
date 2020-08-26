<section class="total top-30 bottom-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="site_url" value="<?php echo site_url() ?>"/>
                <h3 class="text-center">
                <?php _e('ENCUENTRA TU ACCESORIO PARA TU');?>

                <?php
                    //print_r(get_category_by_slug($accesorioMarca[0]));
                    $category = get_category_by_slug($accesorioMarca[0]);
                    // foreach ((get_the_category()) as $category) {
                    //     echo $category->cat_name;
                    // }
                    echo $category->cat_name
                ?>
                </h3>
                <!-- Inicio del form -->
                <form role="form" action="<?php echo site_url()?>/wp-admin/admin-ajax.php" method="POST" id="filter">
                    <div class="form-row">

                        <div class="col-md-4 mb-3">
                            <input type="hidden" name="accesorio_slug" value="<?php echo $accesorios;?>">
                            <input type="hidden" name="taxonomy_model" value="<?php echo $tax;?>">
                            <?php
                              // print_r($category);
                              // print_r(get_query_var($category));


                                $args = array(
                                    'show_option_none' => __( 'Todas las categorías', 'textdomain' ),
                                    'show_count'       => 0,
                                    'child_of'         => $category->term_id,
                                    'orderby'          => 'name',
                                    'echo'             => 0,
                                    'hide_empty'       => FALSE,
                                    'exclude'          => '1',
                                    'include'          => '',
                                    'hierarchical' => 1,
                                    'parent'       => get_query_var($category)
                                );

                                $select                = wp_dropdown_categories( $args );
                                $replace               = "<select id='filtrarCat' name='categoryfilter' class='form-control is-invalid show-tick' data-size='6' data-live-search='true' data-header='Buscar modelo'>";
                                $select                = preg_replace( '#<select([^>]*)>#', $replace, $select );
                                echo $select;
                             ?>
                        </div>





                        <div class="col-md-4 mb-3">

                            <select id="accesorioMarca" name="slugfilter_marca" class="form-control is-invalid accesorio show-tick" data-size="6" data-live-search='true' data-header='Buscar accesorio' >
                            <option value="-1" selected="">Todos los Accesorios</option>
                                <?php

                                        $tax_terms = get_terms( array(
                                            'taxonomy'   => $tax,
                                            'parent'     => 0,
                                            'hide_empty' => true,
                                        ) );

                                        foreach ( $tax_terms as $tax_term ):
                                          echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';
                                        endforeach;

                                ?>
                            </select>
                        </div>



                        <div class="col-md-4 mb-3">
                        <select name="abg_order_by" id="abg_order_by" class="form-control is-invalid">
                            <option value="date-DESC">Orden &darr;</option>
                            <option value="date-ASC">Orden &uarr;</option>
                        </select>
                        </div>

                        <div class="container">
                        <div class="text-center row d-flex justify-content-center mb-3">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <?php
                                echo '<a href="#" class="btn btn-lg inline-block '.$classCss["classBtnMarca"].'">Eliminar Filtros</a>';
                            ?>
                            <input type="hidden" name="action" value="abgfilter">
                        </div>
                        </div>
                        </div>



                    </div>
                </form>

            </div>

            <?php
              //echo $classCss["classBtnMarca"];
                $args = array(
                  'post_type' => $accesorios,
                  'posts_per_page'    => get_option('posts_per_page')
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    echo '<div class="col-md-12">';
                    echo '<div class="row" id="response">';
                    while ($query->have_posts()):$query->the_post();{

                    }
                endwhile;
                   echo '</div>';
                   echo '</div>';
                   wp_reset_postdata();
                if ($query->max_num_pages > 1):
                        echo '<div class="container">';
                        echo '<div class="text-center row d-flex justify-content-center">';
                        echo '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">';
                        echo '<a href="#" class="btn btn-lg  '.$classCss["classBtnMarca"].'" id="abgLoadmore"><i class="fas fa-arrow-down mr-2"></i>MAS PUBLICACIONES*</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                endif;

                }else{
                    echo '<div class="col-md-12">';
                    echo '<div class="alert alert-secondary" role="alert">';
                    echo "Lo sentimos no hay Repuestos de tractor publicados!!";
                    echo '</div>';
                    echo '</div>';
                }


            ?>


        </div>
    </div>
</section>
