<?php get_header() ?>

<main class="w-100">
	<div class="container">
		<div class="row">
			<div class="col-md-8 px-5 py-3">

			<?php if (have_posts()) { ?>

				<h3 class="mb-5">Búsqueda: <?php echo esc_html( get_search_query( false ) ); ?></h3>

				<?php while ( have_posts() ) { the_post(); ?>

					<div class="row my-4">
					 <div class="col-6">
						 <?php the_post_thumbnail('lugares', array('class' => 'image w-100 h-auto')); ?>
					 </div>
					 <div class="col-6">
						 <h5><?php if (has_category('habitacion', $post->ID)) {
								 echo '<i class="fas fa-bed text-green"></i>';
							 } elseif (has_category('espacios-comunes', $post->ID)) {
									echo '<i class="fas fa-hotel text-green"></i>';
								} else {
									echo '<small>(Otro)</small>';
								} ;?>
								<?php the_category(' '); ?></h5>
						 <h4><?php the_title() ?></h4>
						 <p><?php the_tags( '', '<span class="text-green">•</span>', '' ); ?></p>
						 <p><?php the_excerpt(); ?></p>
						 <p><a class="btn btn-green" href="<?php the_permalink(); ?>">Ver detalle</a></p>
					 </div>
					</div>

				<?php }; ?>

			<?php } else { ?>

			<h3 class="mb-5">No hay lugares</h3>

			<?php } wp_reset_query(); ?>
			</div>
			<?php get_sidebar() ?>
		</div>
	</div>
<main>
<?php get_footer() ?>
