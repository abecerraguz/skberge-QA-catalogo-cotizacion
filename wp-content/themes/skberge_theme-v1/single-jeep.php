<?php
/*
Template Name: Marcas Single JEEP
Template Post Type: post, marcas
*/
?>

<?php get_header() ?>

<?php 
	$argsMarcas = array(
		'post_type'      => 'banner',
		'category_name'  => 'jeep',
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
                <?php _e('<h3>ENCUENTRA EL ACCESORIO PARA TU JEEP</h3>'); ?>
            </div>
        </div>
        <div class="row bottom-150">
			<?php 

                // CHEROKEE
                $argsMarcas = array(
                    'post_type'      => 'accesorios-jeep',
                    'category_name'  => 'wrangler_jk_dos_puertas',
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
                            //             if(in_category('wrangler_jk_dos_puertas')){
                            //                 if(has_term('', 'wrangler_jk_dos_puertas')){
                            //                    $tax_terms = get_terms('wrangler_jk_dos_puertas', array('hide_empty' => '0'));  
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
                    'post_type'      => 'accesorios-jeep',
                    'category_name'  => 'wrangler_jk_cuatro_puertas',
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
                            //             if(in_category('wrangler_jk_cuatro_puertas')){
                            //                 if(has_term('', 'wrangler_jk_cuatro_puertas')){
                            //                    $tax_terms = get_terms('wrangler_jk_cuatro_puertas', array('hide_empty' => '0'));  
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
                    'post_type'      => 'accesorios-jeep',
                    'category_name'  => 'renegade',
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
                            //             if(in_category('renegade')){
                            //                 if(has_term('', 'renegade')){
                            //                    $tax_terms = get_terms('renegade', array('hide_empty' => '0'));  
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
                    'post_type'      => 'accesorios-jeep',
                    'category_name'  => 'grand_cherokee',
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
                            //             if(in_category('grand_cherokee')){
                            //                 if(has_term('', 'grand_cherokee')){
                            //                    $tax_terms = get_terms('grand_cherokee', array('hide_empty' => '0'));  
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
                    'post_type'      => 'accesorios-jeep',
                    'category_name'  => 'compass',
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
                            //             if(in_category('compass')){
                            //                 if(has_term('', 'compass')){
                            //                    $tax_terms = get_terms('compass', array('hide_empty' => '0'));  
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
                    'post_type'      => 'accesorios-jeep',
                    'category_name'  => 'cherokee',
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
                            //             if(in_category('cherokee')){
                            //                 if(has_term('', 'cherokee')){
                            //                    $tax_terms = get_terms('cherokee', array('hide_empty' => '0'));  
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
                    'post_type'      => 'accesorios-jeep',
                    'category_name'  => 'wrangler_jl_dos_puertas',
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
                            //             if(in_category('wrangler_jl_dos_puertas')){
                            //                 if(has_term('', 'wrangler_jl_dos_puertas')){
                            //                    $tax_terms = get_terms('wrangler_jl_dos_puertas', array('hide_empty' => '0'));  
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
                    'post_type'      => 'accesorios-jeep',
                    'category_name'  => 'wrangler_jl_cuatro_puertas',
                    'posts_per_page' => 1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                    'post__not_in' => array( 65,66,67,68,69,70)
                );
                $the_queryMarcas = new WP_Query($argsMarcas);

                while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();
                $id = get_the_ID();
                foreach((get_the_category()) as $category) { 

                            // echo '<h1>'.get_the_title().'</h1>';
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
                            //             if(in_category('wrangler_jl_cuatro_puertas')){
                            //                 if(has_term('', 'wrangler_jl_cuatro_puertas')){
                            //                    $tax_terms = get_terms('wrangler_jl_cuatro_puertas', array('hide_empty' => '0'));  
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
