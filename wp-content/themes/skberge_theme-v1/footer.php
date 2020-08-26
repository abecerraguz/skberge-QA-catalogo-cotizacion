<footer>
	<section class="total fondo-gris-oscuro headCarro">
	    <div class="container top-30 bottom-30">
	        <div class="row">
				<?php if ( has_nav_menu( 'footer-menu' ) ) { ?>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'footer-menu' ) ); ?>
				<?php } ?>
	            <div class="col-md-6 text-left">
                    <p class="destacado blanco no-space">Todos los Derechos Reservados © 2020 - Accesorios SKBerge*</p>
	            </div> <!-- COL-4 -->

	            <div class="col-md-2">

	            </div>

	            <div class="col-md-4 text-right blanco no-space">
                    <!-- <p class="destacado no-space"> <a href="cotizacion.php" class="btn btn-linea-blanca"> <span class="icon-shopping1"></span> REVISAR EL CARRO</a>  </p>  -->
										<!-- <a href="cotizacion.php" class="btn btn-linea-blanca" data-toggle="modal" data-target="#staticBackdrop"> <span class="icon-shopping1"></span> REVISAR EL CARRO
		                <span class="badge badge-light quantityTotal"></span></a> -->
	            </div> <!-- COL-4 -->

	        </div>
	    </div>  <!-- CONTAINER -->
	</section> <!-- TOTAL -->
</footer>
</body>
</html>
<?php wp_footer();?>
</body>
</html>
