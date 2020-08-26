<?php get_header('sesion') ?>
	<?php the_post() ?>

	<main class="w-100" style="margin-bottom:220px;">
		<div class="container">
			<div class="row d-flex justify-content-center my-5">
				<div class="col-md-4">
					<h3 class="mb-2"><?php the_title() ?></h3>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</main>

<?php get_footer('sesion') ?>
