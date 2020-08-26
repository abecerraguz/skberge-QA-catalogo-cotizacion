<!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-azul d-flex align-items-center">
        <h4 class="modal-title text-white" id="exampleModalLabel">Carro de accesorios</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<section class="pageCotizacion">
    
    <div class="boxCotizacion">

    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col" class="text-uppercase font-weight-bold">Imagen</th>
          <th scope="col" class="text-uppercase font-weight-bold">Detalle del producto</th>
          <th scope="col" class="text-uppercase font-weight-bold">Items</th>
          <th scope="col" class="text-uppercase font-weight-bold">Valor</th>
          <th scope="col" class="text-uppercase font-weight-bold">Acción</th>
        </tr>
      </thead>

      <tbody id="dataCotizacion" class="dataCotizacion">





      </tbody>
      <tfoot class="thead-light totalCotizacion">
        <tr>
          <th scope="col" class="text-uppercase">TOTAL</th>
          <th scope="col" class="text-uppercase"></th>
          <th scope="col" class="text-uppercase text-center"><span class="negro quantityProduct"></span></th>
          <th scope="col" class="text-uppercase"><span class="negro totalPrice"></span></th>
          <th scope="col" class="text-uppercase"></th>
        </tr>
      </tfoot>
    </table>
    </div>
</section>
<div class="col md-12">
    <a href="<?php bloginfo('url');?>" class="btn btn-lg btn-linea-gris"><i class="fas fa-search"></i> <?php  _e('SEGUIR BUSCANDO ARTICULOS');?></a>
    <a href="<?php echo home_url( '/enviar-cotizacion' )?>" class="btn btn-lg btn-azul left-30"><i class="far fa-envelope"></i> IR A COTIZAR</a>
</div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-azul" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
