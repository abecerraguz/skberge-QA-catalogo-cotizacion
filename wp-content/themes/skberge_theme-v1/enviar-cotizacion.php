<?php
// createPdf("dd@q.cl");
// exit();
/**
 * Template Name: Page Enviar Cotización
 * Template Post Type: page
*/
?>
<?php get_header() ?>
<input type="hidden" id="envio_cotizacion" value="1"/>
<section class="total fondo-gris-oscuro">
    <section class="container top-20 bottom-20">
        <div class="row text-left">
            <div class="col-md-12">
                <h2 class="blanco titulo-cotizacion top-40">ENVIAR TU COTIZACIÓN</h2>
            </div>
        </div>
    </section>
</section>

<section class="total top-30 bottom-30">
    <section class="container enviar-cotizacion">
        <div class="row">

            <div class="col-md-12">

                <div class="total">
                    <div class="row text-left">
                        <div class="col-md-5">
                            <h5><i class="fas fa-shopping-cart"></i> RESUMEN DEL CARRO</h5>
                        </div>
                        <div class="col-md-2">
                            <h5>ITEMS</h5>
                        </div>
                        <div class="col-md-2">
                            <h5><i class="fas fa-dollar-sign"></i>  VALOR</h5>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                </div>

                <div class="total">
                    <div class="row text-left">
                        <div class="col-md-5">
                            <ul class="big productName">
	                            <!-- <li> Kit delantero parachoque - Wrangler - Jeep </li>	                             -->
                            </ul>
                        </div>
                        <div class="col-md-2">
							              <ul class="big productQuantity">
	                            <!-- <li> 1</li> -->
                            </ul>
                            </div>
                        <div class="col-md-2">
                            <ul class="big productPrice">
	                            <!-- <li> <strong>$99.000 iva inc.</strong></li> -->
                            </ul>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                </div>

                <div class="total top-10 fondo-gris-claro">
                    <div class="row text-left">
                        <div class="col-md-5">
                            <h5 class="no-space top-10 bottom-10">TOTAL</h5>
                        </div>
                        <div class="col-md-2">
                            <h5 class="no-space top-10 bottom-10 totalQuantity"></h5>
                        </div>
                        <div class="col-md-2">
                            <h5 class="no-space top-10 bottom-10 totalPrice"></h5>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                </div>

            </div><!-- COL-12 -->


			<div class="col-md-12 top-40">
                <div class="total">
                    <div class="row text-left">
                        <div class="col" style="display:none">
                        	 <form>
	                        	 <h4><i class="fas fa-user"></i> DATOS DEL CLIENTE</h4>


	                        	 <input type="text" placeholder="NOMBRE CLIENTE">
	                        	 <input type="tel" placeholder="TELÉFONO">
	                        	 <input type="email" placeholder="MAIL">
	                        	 <div class="separador-gris"></div>
                             <?php if(is_user_logged_in()){ ?>
	                        	 <h4><i class="fas fa-user"></i> DATOS DEL VENDEDOR</h4>
	                        	 <input type="text" placeholder="NOMBRE VENDEDOR" value="<?php echo wp_get_current_user()->display_name?>">
	                        	 <input type="tel" placeholder="TELÉFONO">
	                        	 <input type="email" placeholder="MAIL" value="<?php echo wp_get_current_user()->user_email;?>">
	                        	 <input type="email" placeholder="OTRO DATO">
	                        	 <input type="email" placeholder="OTRO DATO">
	                        	 <input type="email" placeholder="OTRO DATO">
	                        	 <a href="#" class="btn btn-lg btn-azul"> <i class="far fa-file-alt"></i> GENERAR COTIZACIÓN</a>
                           <?php }else{?>
                             <h3>Para enviar una cotización debes acceder con tu usuario</h3>
                             <a href="<?php echo wp_login_url(); ?>"class="btn btn-lg btn-azul">Iniciar Sessión</a>
                            <?php }?>
                        	 </form>
                        </div>

                        <div class="col">
                        	 <?php //echo do_shortcode('[contact-form-7 id="249" title="Formulario de contacto 1_copy"]');?>
                           <?php echo do_shortcode('[contact-form-7 id="250" title="Formulario de contacto 1_copy_copy"]');?>

                        </div>

                        <div class="col">
                        </div>

                    </div>
                    <div class="separador-gris"></div>
                </div>
			</div><!-- COL-12 -->


            <div class="col md-12">
                <a href="<?php bloginfo('url') ?>" class="btn btn-lg btn-linea-gris left-50"> <span class="icon-search1"></span> SEGUIR BUSCANDO ARTICULOS</a>

            </div>

        </div>
    </section>
</section>


<?php get_footer() ?>
