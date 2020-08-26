<?php
/*
Template Name: Marcas Single SSANGYONG
Template Post Type: post, marcas
*/
?>

<?php get_header() ?>

<?php 
	$argsMarcas = array(
		'post_type'      => 'banner',
		'category_name'  => 'ssangyong',
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
                <?php _e('<h3>ENCUENTRA EL ACCESORIO PARA TU SSANGYONG</h3>'); ?>
            </div>
        </div>
        <div class="row bottom-150 d-flex justify-content-left">
			<?php 
			
                $argsMarcas = array(
                    'post_type'      => 'accesorios-ssangyong',
                    'category_name'  => 'actyon_sports_dos',
                    
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
                            //             if(in_category('actyon_sports_dos')){
                            //                 if(has_term('', 'actyon_sports_dos')){
                            //                    $tax_terms = get_terms('actyon_sports_dos', array('hide_empty' => '0'));  
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
                    'post_type'      => 'accesorios-ssangyong',
                    'category_name'  => 'tivoli',
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
                            //             if(in_category('tivoli')){
                            //                 if(has_term('', 'tivoli')){
                            //                    $tax_terms = get_terms('tivoli', array('hide_empty' => '0'));  
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
                    'post_type'      => 'accesorios-ssangyong',
                    'category_name'  => 'korando',
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
                            //             if(in_category('korando')){
                            //                 if(has_term('', 'korando')){
                            //                    $tax_terms = get_terms('korando', array('hide_empty' => '0'));  
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
                    'post_type'      => 'accesorios-ssangyong',
                    'category_name'  => 'stavic',
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
                            //             if(in_category('stavic')){
                            //                 if(has_term('', 'stavic')){
                            //                    $tax_terms = get_terms('stavic', array('hide_empty' => '0'));  
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
                    'post_type'      => 'accesorios-ssangyong',
                    'category_name'  => 'rexton',
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
                            //             if(in_category('rexton')){
                            //                 if(has_term('', 'rexton')){
                            //                    $tax_terms = get_terms('rexton', array('hide_empty' => '0'));  
                            //                    foreach ( $tax_terms as $tax_term ):  
                            //                       echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';   
                            //                    endforeach;
                            //                 }
                            //             }
                            // echo '</select>';
                            // echo '</div>';
                            // echo '<div class="headerFooter">';
                            // echo '</div>';
                            echo '</article>';
                            echo '</div>';

                }
                endwhile;
                wp_reset_postdata();



                 $argsMarcas = array(
                    'post_type'      => 'accesorios-ssangyong',
                    'category_name'  => 'musso-corta',
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
                            //             if(in_category('musso-corta')){
                            //                 if(has_term('', 'musso_corta')){
                            //                    $tax_terms = get_terms('musso_corta', array('hide_empty' => '0'));  
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
                    'post_type'      => 'accesorios-ssangyong',
                    'category_name'  => 'musso-grand',
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
                            //             if(in_category('musso-grand')){
                            //                 if(has_term('', 'musso_grand')){
                            //                    $tax_terms = get_terms('musso_grand', array('hide_empty' => '0'));  
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
