<?php
/*
Template Name: Marcas Single Mitsubishi
Template Post Type: post, marcas
*/
?>

<?php get_header() ?>

<?php 
	$argsMarcas = array(
		'post_type'      => 'banner',
		'category_name'  => 'mitsubishi',
		'posts_per_page' => 1,
		'orderby'        => 'title',
		'order'          => 'DEC'
	);
	$the_queryMarcas = new WP_Query($argsMarcas);
	while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();
        echo the_post_thumbnail('full', array('class' => 'img-fluid'));
	endwhile;
	wp_reset_postdata();
?> 
<section class="total">
    <section class="container top-30 bottom-30">
        <div class="row text-center">
            <div class="col-md-12">
                <?php _e('<h3>ENCUENTRA EL ACCESORIO PARA TU MITSUBISHI</h3>'); ?>
            </div>
        </div>
        <div class="row bottom-150">
			<?php 

           
                $argsMarcas = array(
                    'post_type'      => 'accesorios-mmc',
                    'category_name'  => 'l200',
                    'posts_per_page' => 1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'post__not_in' => array( 65,66,67,68,69,70)
                );
                $the_queryMarcas = new WP_Query($argsMarcas);

                while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();
                $id = get_the_ID();
                foreach((get_the_category()) as $category) { 
                            echo '<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-4">';
                            // echo '<form>';
                            echo '<article class="contenCard">';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="headerCardCategory"><i class="fas fa-chevron-down"></i> '.$category->cat_name.'</div>';
                            echo '<div class="headerCard-dos text-center">';
                            echo the_post_thumbnail('full', array('class' => 'img-fluid clearSt'));
                            echo '</div>';
                            echo '</a>';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="contentButton">';
                            echo '<button name="buscarAccesorio" class="marcaAccesorio-'.$id.'"><i class="fas fa-search mr-2"></i>Buscar accesorio</button>';
                            echo '</div>';
                            echo '</a>';

                            // echo '<div class="headerBody">';
                            // echo '<select id="'.$id.'" name="accesorios_mmc-'.$id.'" class="form-control is-invalid nombreAccesorio">';
                            // echo '<option value="-1" selected="">Seleccione Accesorio</option>';
                            //             if(in_category('l200')){
                            //                 if(has_term('', 'l200')){
                            //                    $tax_terms = get_terms('l200', array('hide_empty' => '0'));  
                            //                    foreach ( $tax_terms as $tax_term ):  
                            //                       echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';   
                            //                    endforeach;
                            //                 }
                            //             }
                            // echo '</select>';
                            // echo '</div>';
                            echo '<div class="headerFooter">';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>';

                }
                endwhile;
                wp_reset_postdata();


                 $argsMarcas = array(
                    'post_type'      => 'accesorios-mmc',
                    'category_name'  => 'new-l200',
                    'posts_per_page' => 1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'post__not_in' => array( 65,66,67,68,69,70)
                );
                $the_queryMarcas = new WP_Query($argsMarcas);

                while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();
                $id = get_the_ID();
                foreach((get_the_category()) as $category) { 
                            echo '<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-4">';
                            // echo '<form>';
                            echo '<article class="contenCard">';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="headerCardCategory"><i class="fas fa-chevron-down"></i> '.$category->cat_name.'</div>';
                            echo '<div class="headerCard-dos text-center">';
                            echo the_post_thumbnail('full', array('class' => 'img-fluid clearSt'));
                            echo '</div>';
                            echo '</a>';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="contentButton">';
                            echo '<button name="buscarAccesorio" class="marcaAccesorio-'.$id.'"><i class="fas fa-search mr-2"></i>Buscar accesorio</button>';
                            echo '</div>';
                            echo '</a>';

                            // echo '<div class="headerBody">';
                            // echo '<select id="'.$id.'" name="accesorios_mmc-'.$id.'" class="form-control is-invalid nombreAccesorio">';
                            // echo '<option value="-1" selected="">Seleccione Accesorio</option>';
                            //             if(in_category('new-l200')){
                            //                 if(has_term('', 'new_l200')){
                            //                    $tax_terms = get_terms('new_l200', array('hide_empty' => '0'));  
                            //                    foreach ( $tax_terms as $tax_term ):  
                            //                       echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';   
                            //                    endforeach;
                            //                 }
                            //             }
                            // echo '</select>';
                            // echo '</div>';
                            echo '<div class="headerFooter">';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>';

                }
                endwhile;
                wp_reset_postdata();


                 $argsMarcas = array(
                    'post_type'      => 'accesorios-mmc',
                    'category_name'  => 'outlander',
                    'posts_per_page' => 1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'post__not_in' => array( 65,66,67,68,69,70)
                );
                $the_queryMarcas = new WP_Query($argsMarcas);

                while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();
                $id = get_the_ID();
                foreach((get_the_category()) as $category) { 
                            echo '<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-4">';
                            // echo '<form>';
                            echo '<article class="contenCard">';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="headerCardCategory"><i class="fas fa-chevron-down"></i> '.$category->cat_name.'</div>';
                            echo '<div class="headerCard-dos text-center">';
                            echo the_post_thumbnail('full', array('class' => 'img-fluid clearSt'));
                            echo '</div>';
                            echo '</a>';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="contentButton">';
                            echo '<button name="buscarAccesorio" class="marcaAccesorio-'.$id.'"><i class="fas fa-search mr-2"></i>Buscar accesorio</button>';
                            echo '</div>';
                            echo '</a>';

                            // echo '<div class="headerBody">';
                            // echo '<select id="'.$id.'" name="accesorios_mmc-'.$id.'" class="form-control is-invalid nombreAccesorio">';
                            // echo '<option value="-1" selected="">Seleccione Accesorio</option>';
                            //             if(in_category('outlander')){
                            //                 if(has_term('', 'outlander')){
                            //                    $tax_terms = get_terms('outlander', array('hide_empty' => '0'));  
                            //                    foreach ( $tax_terms as $tax_term ):  
                            //                       echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';   
                            //                    endforeach;
                            //                 }
                            //             }
                            // echo '</select>';
                            // echo '</div>';
                            echo '<div class="headerFooter">';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>';

                }
                endwhile;
                wp_reset_postdata();


                 $argsMarcas = array(
                    'post_type'      => 'accesorios-mmc',
                    'category_name'  => 'montero-sport',
                    'posts_per_page' => 1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'post__not_in' => array( 65,66,67,68,69,70)
                );
                $the_queryMarcas = new WP_Query($argsMarcas);

                while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();
                $id = get_the_ID();
                foreach((get_the_category()) as $category) { 
                            echo '<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-4">';
                            // echo '<form>';
                            echo '<article class="contenCard">';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="headerCardCategory"><i class="fas fa-chevron-down"></i> '.$category->cat_name.'</div>';
                            echo '<div class="headerCard-dos text-center">';
                            echo the_post_thumbnail('full', array('class' => 'img-fluid clearSt'));
                            echo '</div>';
                            echo '</a>';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="contentButton">';
                            echo '<button name="buscarAccesorio" class="marcaAccesorio-'.$id.'"><i class="fas fa-search mr-2"></i>Buscar accesorio</button>';
                            echo '</div>';
                            echo '</a>';

                            // echo '<div class="headerBody">';
                            // echo '<select id="'.$id.'" name="accesorios_mmc-'.$id.'" class="form-control is-invalid nombreAccesorio">';
                            // echo '<option value="-1" selected="">Seleccione Accesorio</option>';
                            //             if(in_category('montero-sport')){
                            //                 if(has_term('', 'montero_sport')){
                            //                    $tax_terms = get_terms('montero_sport', array('hide_empty' => '0'));  
                            //                    foreach ( $tax_terms as $tax_term ):  
                            //                       echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';   
                            //                    endforeach;
                            //                 }
                            //             }
                            // echo '</select>';
                            // echo '</div>';
                            echo '<div class="headerFooter">';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>';

                }
                endwhile;
                wp_reset_postdata();


                 $argsMarcas = array(
                    'post_type'      => 'accesorios-mmc',
                    'category_name'  => 'new-montero-sport',
                    'posts_per_page' => 1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'post__not_in' => array( 65,66,67,68,69,70)
                );
                $the_queryMarcas = new WP_Query($argsMarcas);

                while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();
                $id = get_the_ID();
                foreach((get_the_category()) as $category) { 
                            echo '<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-4">';
                            // echo '<form>';
                            echo '<article class="contenCard">';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="headerCardCategory"><i class="fas fa-chevron-down"></i> '.$category->cat_name.'</div>';
                            echo '<div class="headerCard-dos text-center">';
                            echo the_post_thumbnail('full', array('class' => 'img-fluid clearSt'));
                            echo '</div>';
                            echo '</a>';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="contentButton">';
                            echo '<button name="buscarAccesorio" class="marcaAccesorio-'.$id.'"><i class="fas fa-search mr-2"></i>Buscar accesorio</button>';
                            echo '</div>';
                            echo '</a>';

                            // echo '<div class="headerBody">';
                            // echo '<select id="'.$id.'" name="accesorios_mmc-'.$id.'" class="form-control is-invalid nombreAccesorio">';
                            // echo '<option value="-1" selected="">Seleccione Accesorio</option>';
                            //             if(in_category('new-montero-sport')){
                            //                 if(has_term('', 'new_montero_sport')){
                            //                    $tax_terms = get_terms('new_montero_sport', array('hide_empty' => '0'));  
                            //                    foreach ( $tax_terms as $tax_term ):  
                            //                       echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';   
                            //                    endforeach;
                            //                 }
                            //             }
                            // echo '</select>';
                            // echo '</div>';
                            echo '<div class="headerFooter">';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>';

                }
                endwhile;
                wp_reset_postdata();

                 $argsMarcas = array(
                    'post_type'      => 'accesorios-mmc',
                    'category_name'  => 'montero-corto',
                    'posts_per_page' => 1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'post__not_in' => array( 65,66,67,68,69,70)
                );
                $the_queryMarcas = new WP_Query($argsMarcas);

                while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();
                $id = get_the_ID();
                foreach((get_the_category()) as $category) { 
                            echo '<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-4">';
                            // echo '<form>';
                            echo '<article class="contenCard">';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="headerCardCategory"><i class="fas fa-chevron-down"></i> '.$category->cat_name.'</div>';
                            echo '<div class="headerCard-dos text-center">';
                            echo the_post_thumbnail('full', array('class' => 'img-fluid clearSt'));
                            echo '</div>';
                            echo '</a>';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="contentButton">';
                            echo '<button name="buscarAccesorio" class="marcaAccesorio-'.$id.'"><i class="fas fa-search mr-2"></i>Buscar accesorio</button>';
                            echo '</div>';
                            echo '</a>';

                            // echo '<div class="headerBody">';
                            // echo '<select id="'.$id.'" name="accesorios_mmc-'.$id.'" class="form-control is-invalid nombreAccesorio">';
                            // echo '<option value="-1" selected="">Seleccione Accesorio</option>';
                            //             if(in_category('montero-corto')){
                            //                 if(has_term('', 'montero_corto')){
                            //                    $tax_terms = get_terms('montero_corto', array('hide_empty' => '0'));  
                            //                    foreach ( $tax_terms as $tax_term ):  
                            //                       echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';   
                            //                    endforeach;
                            //                 }
                            //             }
                            // echo '</select>';
                            // echo '</div>';
                            echo '<div class="headerFooter">';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>';

                }
                endwhile;
                wp_reset_postdata();


                 $argsMarcas = array(
                    'post_type'      => 'accesorios-mmc',
                    'category_name'  => 'montero-largo',
                    'posts_per_page' => 1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'post__not_in' => array( 65,66,67,68,69,70)
                );
                $the_queryMarcas = new WP_Query($argsMarcas);

                while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();
                $id = get_the_ID();
                foreach((get_the_category()) as $category) { 
                            echo '<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-4">';
                            // echo '<form>';
                            echo '<article class="contenCard">';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="headerCardCategory"><i class="fas fa-chevron-down"></i> '.$category->cat_name.'</div>';
                            echo '<div class="headerCard-dos text-center">';
                            echo the_post_thumbnail('full', array('class' => 'img-fluid clearSt'));
                            echo '</div>';
                            echo '</a>';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="contentButton">';
                            echo '<button name="buscarAccesorio" class="marcaAccesorio-'.$id.'"><i class="fas fa-search mr-2"></i>Buscar accesorio</button>';
                            echo '</div>';
                            echo '</a>';

                            // echo '<div class="headerBody">';
                            // echo '<select id="'.$id.'" name="accesorios_mmc-'.$id.'" class="form-control is-invalid nombreAccesorio">';
                            // echo '<option value="-1" selected="">Seleccione Accesorio</option>';
                            //             if(in_category('montero-largo')){
                            //                 if(has_term('', 'montero_largo')){
                            //                    $tax_terms = get_terms('montero_largo', array('hide_empty' => '0'));  
                            //                    foreach ( $tax_terms as $tax_term ):  
                            //                       echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';   
                            //                    endforeach;
                            //                 }
                            //             }
                            // echo '</select>';
                            // echo '</div>';
                            echo '<div class="headerFooter">';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>';

                }
                endwhile;
                wp_reset_postdata();


                 $argsMarcas = array(
                    'post_type'      => 'accesorios-mmc',
                    'category_name'  => 'asx',
                    'posts_per_page' => 1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'post__not_in' => array( 65,66,67,68,69,70)
                );
                $the_queryMarcas = new WP_Query($argsMarcas);

                while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();
                $id = get_the_ID();
                foreach((get_the_category()) as $category) { 
                            echo '<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-4">';
                            // echo '<form>';
                            echo '<article class="contenCard">';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="headerCardCategory"><i class="fas fa-chevron-down"></i> '.$category->cat_name.'</div>';
                            echo '<div class="headerCard-dos text-center">';
                            echo the_post_thumbnail('full', array('class' => 'img-fluid clearSt'));
                            echo '</div>';
                            echo '</a>';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="contentButton">';
                            echo '<button name="buscarAccesorio" class="marcaAccesorio-'.$id.'"><i class="fas fa-search mr-2"></i>Buscar accesorio</button>';
                            echo '</div>';
                            echo '</a>';

                            // echo '<div class="headerBody">';
                            // echo '<select id="'.$id.'" name="accesorios_mmc-'.$id.'" class="form-control is-invalid nombreAccesorio">';
                            // echo '<option value="-1" selected="">Seleccione Accesorio</option>';
                            //             if(in_category('asx')){
                            //                 if(has_term('', 'asx')){
                            //                    $tax_terms = get_terms('asx', array('hide_empty' => '0'));  
                            //                    foreach ( $tax_terms as $tax_term ):  
                            //                       echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';   
                            //                    endforeach;
                            //                 }
                            //             }
                            // echo '</select>';
                            // echo '</div>';
                            echo '<div class="headerFooter">';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>';

                }
                endwhile;
                wp_reset_postdata();


                 $argsMarcas = array(
                    'post_type'      => 'accesorios-mmc',
                    'category_name'  => 'new-asx',
                    'posts_per_page' => 1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'post__not_in' => array( 65,66,67,68,69,70)
                );
                $the_queryMarcas = new WP_Query($argsMarcas);

                while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();
                $id = get_the_ID();
                foreach((get_the_category()) as $category) { 
                            echo '<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-4">';
                            // echo '<form>';
                            echo '<article class="contenCard">';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="headerCardCategory"><i class="fas fa-chevron-down"></i> '.$category->cat_name.'</div>';
                            echo '<div class="headerCard-dos text-center">';
                            echo the_post_thumbnail('full', array('class' => 'img-fluid clearSt'));
                            echo '</div>';
                            echo '</a>';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="contentButton">';
                            echo '<button name="buscarAccesorio" class="marcaAccesorio-'.$id.'"><i class="fas fa-search mr-2"></i>Buscar accesorio</button>';
                            echo '</div>';
                            echo '</a>';

                            // echo '<div class="headerBody">';
                            // echo '<select id="'.$id.'" name="accesorios_mmc-'.$id.'" class="form-control is-invalid nombreAccesorio">';
                            // echo '<option value="-1" selected="">Seleccione Accesorio</option>';
                            //             if(in_category('new-asx')){
                            //                 if(has_term('', 'new_asx')){
                            //                    $tax_terms = get_terms('new_asx', array('hide_empty' => '0'));  
                            //                    foreach ( $tax_terms as $tax_term ):  
                            //                       echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';   
                            //                    endforeach;
                            //                 }
                            //             }
                            // echo '</select>';
                            // echo '</div>';
                            echo '<div class="headerFooter">';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>';

                }
                endwhile;
                wp_reset_postdata();


                 $argsMarcas = array(
                    'post_type'      => 'accesorios-mmc',
                    'category_name'  => 'eclipse',
                    'posts_per_page' => 1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'post__not_in' => array( 65,66,67,68,69,70)
                );
                $the_queryMarcas = new WP_Query($argsMarcas);

                while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();
                $id = get_the_ID();
                foreach((get_the_category()) as $category) { 
                            echo '<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-4">';
                            // echo '<form>';
                            echo '<article class="contenCard">';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="headerCardCategory"><i class="fas fa-chevron-down"></i> '.$category->cat_name.'</div>';
                            echo '<div class="headerCard-dos text-center">';
                            echo the_post_thumbnail('full', array('class' => 'img-fluid clearSt'));
                            echo '</div>';
                            echo '</a>';

                            echo '<a href="'.get_category_link($category->cat_ID).'">';
                            echo '<div class="contentButton">';
                            echo '<button name="buscarAccesorio" class="marcaAccesorio-'.$id.'"><i class="fas fa-search mr-2"></i>Buscar accesorio</button>';
                            echo '</div>';
                            echo '</a>';

                            // echo '<div class="headerBody">';
                            // echo '<select id="'.$id.'" name="accesorios_mmc-'.$id.'" class="form-control is-invalid nombreAccesorio">';
                            // echo '<option value="-1" selected="">Seleccione Accesorio</option>';
                            //             if(in_category('eclipse')){
                            //                 if(has_term('', 'eclipse')){
                            //                    $tax_terms = get_terms('eclipse', array('hide_empty' => '0'));  
                            //                    foreach ( $tax_terms as $tax_term ):  
                            //                       echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';   
                            //                    endforeach;
                            //                 }
                            //             }
                            // echo '</select>';
                            // echo '</div>';
                            echo '<div class="headerFooter">';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>';

                }
                endwhile;
                wp_reset_postdata();

               
        ?>  


        </div>
    </section>
</section>
<?php get_footer() ?>
