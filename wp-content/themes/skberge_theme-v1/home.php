<?php get_header() ?>


<section class="total">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<?php

			$argsSlider = array(
			    'post_type'      => 'slider',
			    'posts_per_page' => -1,
			    'orderby'        => 'title',
			    'order'          => 'DEC',
			);
			$the_querySlider= new WP_Query($argsSlider);
			echo '<ol class="carousel-indicators">';
			while($the_querySlider->have_posts()) : $the_querySlider->the_post();

				if (have_rows('indicator')) {
					while (have_rows('indicator') ): the_row(); {

					    $subvalueOrden       = get_sub_field('orden');
					    $subvalueOrdenActivo = get_sub_field('orden_activo');

						echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$subvalueOrden.'" class="'.$subvalueOrdenActivo.'"></li>';
					}
					endwhile;
				}else{
					echo '<h1>No hay publicacion</h1>';
				}
			endwhile;
			wp_reset_postdata();
			echo '</ol>';

			echo '<div class="carousel-inner">';
			while($the_querySlider->have_posts()) : $the_querySlider->the_post();

				if (have_rows('slider')) {
					while (have_rows('slider') ): the_row(); {
					    $subvalueImagen = get_sub_field('imagen');
					    $subvalueActive = get_sub_field('active');
						echo '<div class="carousel-item '.$subvalueActive.'">';
						echo '<img class="d-block img-fluid w-100" src="'.$subvalueImagen['url'].'" alt="'.$subvalueImagen['alt'].'">';
						echo '</div>';
					}
					endwhile;
				}else{
					echo '<h1>No hay publicacion</h1>';
				}
			endwhile;
			wp_reset_postdata();
			echo '</div>';
		 ?>
    </div>
</section>

<section class="total">
	<div class="container">
		<div class="row">

		<div class="col-md-12 top-30">
				<h2 class="titulo-destacado"><?php _e('<span class="gris">ELIGE TU </span>MARCA')?></h2>
		</div>

		<?php
			$argsMarcas = array(
			    'post_type'      => 'marcas',
			    'posts_per_page' => 6,
			    'orderby'        => 'title',
			    'order'          => 'DEC',
			    // 'category_name'  => 'fiat,dodge,jeep,mitsubishi,ram,ssangyong',
			    'post__in' => array( 65,66,67,68,69,70)
			);

			$the_queryMarcas = new WP_Query($argsMarcas);
			while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();

					echo '<div class="col-md-2">';
					echo '<a href="'.get_the_permalink().'">';
					echo the_post_thumbnail('marcas', array('class' => 'img-fluid'));
					echo '</a>';
					echo '</div>';

			endwhile;
			wp_reset_postdata();
		?>



		</div>
	</div>
</section>


<section class="total top-30 bottom-30">
    <div class="container">

       <div class="row text-left top-10 bottom-10">
           <div class="col-md-12">
           	<?php _e('<h2 class="titulo-destacado"><span class="gris">ACCESORIOS</span>  DESTACADOS</h2>');?>
           </div>
       </div>

		<div class="row">
			<div class="col-3">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<?php 
					include "tabs.php";
				 ?>
				</div>
			</div>
			<div class="col-9">
				<div class="tab-content" id="v-pills-tabContent">
				<?php 
					include "content-tabs.php";
				 ?>
				</div>
			</div>
		</div>
</section>

<section class="total fondo-azul">
    <div class="container top-30 bottom-30">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
            	<?php _e('<h2 class=" blanco">¿NO ENCUENTRAS EL ACCESORIO QUE BUSCAS?</h2>'); ?>

                <hr class="total-fino">
                <?php _e('<h4 class="blanco"><strong>REVISA TODA NUESTRA LINEA DE ACCESORIOS POR MARCA.</strong> </h4>'); ?>
                <p class="destacado top-30">
				<?php
					$argsMarcas = array(
					    'post_type'      => 'marcas',
					    'posts_per_page' => 6,
					    'orderby'        => 'title',
					    'order'          => 'DEC',
					    'post__in' => array( 65,66,67,68,69,70)
					);
					$the_queryMarcas = new WP_Query($argsMarcas);
					while($the_queryMarcas->have_posts()) : $the_queryMarcas->the_post();
					    foreach((get_the_category()) as $category) {
							echo '<a href="'.get_the_permalink().'" class="btn btn-lg inline-block btn-ssangyong left-10 right-10">'.$category->cat_name.'</a>';
						}
					endwhile;
					wp_reset_postdata();
				?>
                </p>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ?>
