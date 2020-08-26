<section class="total fondo-azul headCarro" id="barra-mensajes">
    <div class="container">
        <div class="row">

        <ul class="navbar-nav ml-md-auto d-flex flex-row">
	       		<li class="mr-3"> <a href="#" class="btn btn-linea-blanca">  X LIMPIAR EL CARRO</a></li>
				<li class="mr-3"> <a href="#" class="btn btn-carro" data-toggle="modal" data-target="#staticBackdrop"> <i class="fas fa-shopping-cart fa-lg mr-2"></i> REVISAR EL CARRO
                <span class="badge badge-light quantityTotal ml-2"></span></a>
                </li>

                <li class="d-flex align-items-center mr-3">
                <div class="text-white">
					<span class="d-flex align-items-center">
						<i class="far fa-user-circle fa-2x mr-2" aria-hidden="true"></i>
						<div class="font-weight-bold"><?php echo wp_get_current_user()->display_name; ?></div>
					</span>
				</div>

                </li>

				<li class="d-flex align-items-center">
					<a class="text-white" href="<?php echo wp_logout_url() ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo __("Log Out") ?>">
						<i class="fas fa-sign-out-alt fa-lg mr-1"></i>
					</a>
				</li>
		</ul>

        </div>
    </div>
</section>
<nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<!-- <a class="navbar-brand" href="<?php bloginfo('url') ?>"><?php get_template_part('_includes/logo', 'navbar') ?></a> -->
		<a class="navbar-brand" href="<?php bloginfo('url') ?>">
			<img src="<?php bloginfo('template_url');?>/assets/images/logo-skberge.png" alt="Logotipo Skbergé">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<?php if ( has_nav_menu( 'header-menu' ) ) { ?>
			<?php wp_nav_menu( array(
				'theme_location'	=> 'header-menu',
				'depth'				=> 0,
				'container'			=> false,
				'menu_class'		=> 'navbar-nav ml-md-auto',
				'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
				'walker'			=> new WP_Bootstrap_Navwalker(),
				'theme_location'  => '',
			) ); ?>
		<?php } ?>
		<?php if ( is_active_sidebar( 'menu-widget' ) ) { ?>
			<?php dynamic_sidebar( 'menu-widget' ); ?>
		<?php }; ?>
		</div>
	</div>
</nav>
