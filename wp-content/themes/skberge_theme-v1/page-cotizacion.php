<?php
/**
 * Template Name: Page Cotización
 * Template Post Type: page
*/
?>
<?php get_header() ?>
<section class="total fondo-gris-oscuro">
    <section class="container top-20 bottom-20">
        <div class="row text-left">
            <div class="col-md-12">
                <h2 class="blanco titulo-cotizacion top-40">DETALLE DEL CARRO <span class="icon-shopping1"></span></h2>
            </div>
        </div>
    </section>
</section>
<section class="total top-30 bottom-30 pageCotizacion">
    <section class="container">
        <div class="row">

            <div class="col-md-12 boxCotizacion">

                <div class="total">
                    <div class="row text-left">
                        <div class="col-md-1">
                            <h4>IMAGEN</h4>
                        </div>
                        <div class="col-md-3">
                            <h4>DETALLE DEL PRODUCTO</h4>
                        </div>
                        <div class="col-md-2">
                            <h4>ITEMS</h4>
                        </div>
                        <div class="col-md-3">
                            <h4>VALOR</h4>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                </div>

				<div id="dataCotizacion" class="dataCotizacion">

				</div>

                <div class="total totalCotizacion">
                    <div class="row text-left">
                        <div class="col-md-4">
                            <h4>TOTAL</h4>
                        </div>
                        <div class="col-md-2">
                            <h4><span class="negro quantityProduct"></span></h4>
                        </div>
                        <div class="col-md-5">
                            <h3><span class="negro totalPrice"></span></h3>
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>
                </div>



            </div><!-- COL-12 -->

            <div class="col md-12">
                <a href="index.php" class="btn btn-lg btn-linea-gris"><i class="fas fa-search"></i> <?php  _e('SEGUIR BUSCANDO ARTICULOS');?></a>
                <a href="<?php echo home_url( '/enviar-cotizacion' )?>" class="btn btn-lg btn-azul left-30"><i class="far fa-envelope"></i> IR A COTIZAR</a>
            </div>

        </div>
    </section>
</section>
<?php get_footer() ?>
