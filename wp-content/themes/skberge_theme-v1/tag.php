<?php get_header() ?>

<main class="w-100">
	<div class="container">
		<div class="row">
			<div class="col-md-8 px-5 py-3">

			<?php if (have_posts()) { ?>

				<h3 class="mb-5">Etiqueta: <?php single_term_title(); ?></h3>

        <div class="row">
				<?php while ( have_posts() ) { the_post(); ?>
          <div class="col-4 my-3">
            <?php the_post_thumbnail('lugares', array('class' => 'image w-100 h-auto')); ?>
          </div>

				<?php }; ?>
        </div>
			<?php } else { ?>

			<h3 class="mb-5">No hay lugares</h3>

			<?php } wp_reset_query(); ?>
			</div>
			<?php get_sidebar() ?>
		</div>
	</div>
<main>
<?php get_footer() ?>
