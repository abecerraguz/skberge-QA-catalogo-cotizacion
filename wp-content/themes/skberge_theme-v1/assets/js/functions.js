
(function($) {
// TABS HOME
// var tabs       = $('#v-pills-tab a:first-child');
// var contenTabs = $('#v-pills-tabContent div.show:first-child');
// tabs.addClass('active');
// contenTabs.addClass('active');
getUrlCotizacion();
//SELECT-BOOTASTRAP CATEGORY
$('.nombreAccesorio').selectpicker();


for (var i = 1; i <= 50; i++) {
    $('select.carro').append('<option value=' + i + '>' + i + '</option>');
}

jQuery('#staticBackdrop').on('shown.bs.modal', function (event) {


  let listProduct = getStorageJson();
  //console.log(listProduct);
  tplData(listProduct,event.target)

})

jQuery("section.pageCotizacion #dataCotizacion").on('click', '.deleteProduct', function(event) {
  event.preventDefault();
  /* Act on the event */
  // console.log(this.parentNode.parentNode.dataset.price);
  // console.log(this.parentNode.parentNode.dataset.quantity);
  //
  //console.log(jQuery(this).parents());

  jQuery(this.parentNode.parentNode).remove();
  deleteProducto(this.dataset.producto);


  let quantityElement = jQuery(".boxCotizacion .totalCotizacion .quantityProduct");
  let totalPriceElement = jQuery(".boxCotizacion .totalCotizacion .totalPrice");

  let totalPrice = jQuery(".boxCotizacion .totalCotizacion .totalPrice").attr('data-total');

  let quantity = parseInt(quantityElement.text()) - parseInt(this.parentNode.parentNode.dataset.quantity);
  totalPrice   = (parseInt(totalPrice) - parseInt(this.parentNode.parentNode.dataset.price));

  totalPriceElement.attr("data-total" ,totalPrice);


  quantityElement.text(quantity);

  totalPriceElement.text(numberWithCommas(totalPrice));


});



//minusQuantity
jQuery("section.pageCotizacion #dataCotizacion").on('click', '.minusQuantity', function(event) {
  event.preventDefault();
  /* Act on the event */
  let indexProduct = jQuery(event.target).closest('.productSingle').attr("data-producto");

  let listProduct = getStorageJson();

  if(listProduct[indexProduct].quantity > 0)
  {
      listProduct[indexProduct].quantity = listProduct[indexProduct].quantity - 1;
      addStorage(listProduct);
  }
  tplData(listProduct,jQuery("section.pageCotizacion"))
  //console.log("NUEVO VALOR" ,indexProduct);
  //updateLocalStorage(indexProduct,);

});

jQuery("section.pageCotizacion #dataCotizacion").on('click', '.addQuantity', function(event) {
  event.preventDefault();
  /* Act on the event */
  let indexProduct = jQuery(event.target).closest('.productSingle').attr("data-producto");

  let listProduct = getStorageJson();

  listProduct[indexProduct].quantity = listProduct[indexProduct].quantity + 1;
  addStorage(listProduct);
  tplData(listProduct,jQuery("section.pageCotizacion"))

});

jQuery("section.pageCotizacion #dataCotizacion").on('keyup', '.inputProduct', function(event) {
  event.preventDefault();
  let quantity = jQuery(event.target).val();
  let indexProduct = jQuery(event.target).closest('.productSingle').attr("data-producto");

  let listProduct = getStorageJson();
  if( (is_numeric(quantity)) && (quantity>0) )
  {
    listProduct[indexProduct].quantity = parseInt(quantity);
    addStorage(listProduct);
    tplData(listProduct,jQuery("section.pageCotizacion"))

  }else{
    jQuery(event.target).val(listProduct[indexProduct].quantity)
  }
  //console.log(jQuery(event.target).val())
    /* Act on the event */
});

// document.addEventListener( 'logout_now', function( event ) {
//      clearAllStorage();
// }, false );

document.addEventListener( 'wpcf7mailsent', function( event ) {
    clearAllStorage();
}, false );

function is_numeric(value) {
  return !isNaN(parseFloat(value)) && isFinite(value);
}

jQuery(".btn-linea-blanca").click(function(event) {
  /* Act on the event */
  event.preventDefault();
  clearAllStorage();

});





// $('.agregarCarro').click(function(event){
//  //event.preventDefault();
//     var ident = parseInt($(this).attr('id'));
//
// });

/*
================FUNCION addStorage()=======================
Funcion que da inicio a la carga de los
numeros de ID del JSON de WP en el LocalStorage.

forEach recorre el JSON , que previamente esta convertido
en array en la variable "arregloJson".

Luego se recorreo el la variable "arregloJson" con un forEach, para
guardar (push()) los datos en un array vacio "var items = []".

Luego "var items = []", se guarda en el LocalStorage

*/
//addStorage();

// function addStorage(){
//  var items = []
//     $.get('http://localhost:8080/skberge/wp-json/acf/v3/accesorios-fiat', function(response){
//      var arregloJson = Object.values(response);
//
//      arregloJson.forEach((element, index) => {
//        items.push(element.id)
//      });
//
//      if(true){
//      localStorage.setItem('todoData', JSON.stringify(items));
//      var guardado   = localStorage.getItem('todoData');
//      var datosParse = JSON.parse(guardado);
//    }
//
//     });
// }


/*
=======VARIABLES GLOBALES========================================
"var data", recupera del LocalStorage la información de los ID los
recupera como String, para volverlos a Array se parsean en la
variable "var dataParseada"
*/
// var data  = window.localStorage.getItem('todoData');
// var dataParseada = JSON.parse(data)

/*
=======USO DE LOOP FOR ====================================

Uso el for para recorrer el arreglo de la dataParseada,
se define una variable "var idPosr" se le asigna el valor
de dataParseada[i], este se le asigna por parametro a la función
persistencia(idPost), por lo que al recorrer toda la data parseada muetra todos
los accesorios

*/

// for (var i = 0; i < dataParseada.length; i++) {
//
//     var idPost = dataParseada[i];
//
//     //console.log(data[i]);
//     persistencia (idPost);
//
//     function persistencia (idPost){
//      $.get('http://localhost:8080/skberge/wp-json/acf/v3/accesorios-fiat', function(response){
//
//    var idPostActual = idPost;
//    // console.log('test'+idPostActual);
//    var arr = Object.values(response);
//
//    arr.forEach((element, index) => {
//
//      var accesorioId     = element.id
//          var accesorioNombre = element.acf.nombre_accesorio
//          var accesorioImg    = element.acf.imagen
//          var accesorioMarca  = element.acf.marca
//          var accesorioModelo = element.acf.modelo
//          var accesorioSku    = element.acf.sku
//          var accesorioPrecio = element.acf.precio
//
//
//
//          var dataPost = [accesorioId,accesorioNombre,accesorioImg,accesorioMarca,accesorioModelo,accesorioSku,accesorioPrecio];
//              localStorage.setItem('datosPost', JSON.stringify(dataPost));
//              var dataPostGuardada = localStorage.getItem('datosPost');
//              var dataPostParseada = JSON.parse(dataPostGuardada);
//
//
//
//             var loadData      = $('#dataPostselecionado');
//
//             //console.log('test '+accesorioId)
//
//      if(idPostActual === element.id){
//
//        //console.log('Este es el 199'+dataPostParseada[1]);
//        loadData = $('#dataPostselecionado').after(`<div class="total">
//                     <div class="row text-left">
//                         <div class="col-md-1">
//                             <img src="${dataPostParseada[2]}" class="img-fluid" alt="${dataPostParseada[4]}">
//                         </div>
//                         <div class="col-md-3">
//                             <p class="destacado no-space"><strong>${dataPostParseada[1]}</strong>
//                                 <br>${dataPostParseada[4]}
//                                 <br>SKU: ${dataPostParseada[5]}
//                             </p>
//                         </div>
//                         <div class="col-md-2">
//                          <form>
//                <select class="carro">
//                  <option>1</option>
//                  <option value="value2" selected="">2</option>
//                  <option>3</option>
//                  <option>4</option>
//                  <option>5</option>
//                  <option>6</option>
//                  <option>7</option>
//                  <option>8</option>
//                  <option>9</option>
//                  <option>10</option>
//                </select>
//                      </form>
//                         </div>
//
//                         <div class="col-md-3">
//                             <h3>$${dataPostParseada[6]} iva inc.</h3>
//                         </div>
//                         <div class="col-md-2">
//                             <a href="mitsubishi.php" class="btn btn-lg btn-verde">ELIMINAR</a>
//                         </div>
//                     </div>
//                     <div class="separador-gris"></div>
//                 </div>`);
//      }
//
//      });
//
//
//
//
//  });
//     }
// }




/*
function persistencia(idPost){

  $.get('http://localhost:8080/skberge/wp-json/acf/v3/accesorios-fiat', function(response){

    var idPostActual = idPost;
    //console.log(idPostActual);
    var arr = Object.values(response);

    arr.forEach((element, index) => {

      var accesorioId     = element.id
          var accesorioNombre = element.acf.nombre_accesorio
          var accesorioImg    = element.acf.imagen
          var accesorioMarca  = element.acf.marca
          var accesorioModelo = element.acf.modelo
          var accesorioSku    = element.acf.sku
          var accesorioPrecio = element.acf.precio

          var dataPost = [accesorioId,accesorioNombre,accesorioImg,accesorioMarca,accesorioModelo,accesorioSku,accesorioPrecio];
            localStorage.setItem('datosPost', JSON.stringify(dataPost));
            var dataPostGuardada = localStorage.getItem('datosPost');
            var dataPostParseada = JSON.parse(dataPostGuardada);
            var loadData     = $('#dataPostselecionado');

      if(idPostActual === element.id){

        //console.log('Este es el 199'+dataPostParseada[1]);
        loadData = $('#dataPostselecionado').after(`<div class="total">
                    <div class="row text-left">
                        <div class="col-md-1">
                            <img src="${dataPostParseada[2]}" class="img-fluid" alt="${dataPostParseada[4]}">
                        </div>
                        <div class="col-md-3">
                            <p class="destacado no-space"><strong>${dataPostParseada[1]}</strong>
                                <br>${dataPostParseada[4]}
                                <br>SKU: ${dataPostParseada[5]}
                            </p>
                        </div>
                        <div class="col-md-2">
                          <form>
                <select class="carro">
                  <option>1</option>
                  <option value="value2" selected="">2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                  <option>10</option>
                </select>
                      </form>
                        </div>

                        <div class="col-md-3">
                            <h3>$${dataPostParseada[6]} iva inc.</h3>
                        </div>
                        <div class="col-md-2">
                            <a href="mitsubishi.php" class="btn btn-lg btn-verde">ELIMINAR</a>
                        </div>
                    </div>
                    <div class="separador-gris"></div>
                </div>`);




      }
      });
  });
}
*/
var listProduct = [];

jQuery("section.total .agregarCarro").click(function(event) {

  event.preventDefault();
  //console.log(this.parentNode.parentNode.parentNode.parentNode);
  let producto = jQuery(this.parentNode.parentNode.parentNode.parentNode);

  // console.log(jQuery(producto).find("h3.titleProduct").html());
  // console.log(jQuery(producto).find("h3.titleProduct").text());
  // console.log(jQuery(producto).find("h3.titleProduct")[0].innerText.replace("\n","-"));
  // console.log(jQuery(producto).find("h3.titleProduct"));

  //return ;
  //
  let productMarca = jQuery(producto).find("h3.titleProduct")[0].innerText.replace("\n","-").split("-");

  let img = jQuery(producto).find("img.imageProduct").attr("src");
  //let title = jQuery(producto).find("h3.titleProduct").text();
  let title = productMarca[0];
  let marca  = productMarca[1];

  let price = jQuery(producto).find("h2.priceProduct").data('precio');
  let quantity = jQuery(producto).find("select.carro").val();
  let idProducto = jQuery(this).attr("id");
  let sku = jQuery(producto).find("li.sku").text();

  price = price.toString().replace(".","");


  //price = price.substringprice.indexOf("."));

  // console.log(jQuery(producto).find("img.imageProduct").attr("src"));
  // console.log(jQuery(producto).find("h3.titleProduct").text());
  // console.log(jQuery(producto).find("h2.priceProduct").data('precio'));
  // console.log(jQuery(producto).find("select.carro").val());
  let objProducto = {   "id"    : idProducto,
                        "img"   : img ,
                        "title" : title ,
                        "marca" : marca,
                        "sku"   : sku.replace("SKU: ",""),
                        "price" : parseInt(price) ,
                        "quantity" : parseInt(quantity)
                     };

  addProducto(objProducto);
  /* Act on the event */
});

function addProducto(producto){

  let isExist = false;
  listProduct = getStorageJson();
  if(listProduct.length > 0)
  {
      jQuery.each(listProduct, function( index, value )
      {
            if(value.id == producto.id)
            {
                isExist = true;
                value.quantity  = parseInt(producto.quantity);
            }
      });

      if(!isExist)
      {
          listProduct.push(producto);
      }

  }else{
      listProduct.push(producto);
  }

  addStorage(listProduct);


  jQuery('.agregarCarro').attr("data-original-title" , "Se agrego un producto");
  jQuery('.agregarCarro').tooltip('show')
  jQuery('.agregarCarro').on('hidden.bs.tooltip', function () {
  // do something…
    //console.log("activate");
    jQuery('.agregarCarro').attr('data-original-title',"")
    //jQuery('.agregarCarro').attr("title" , "");
  })


  //
  // jQuery('.agregarCarro').attr("title" , "");




}

function addStorage(listProduct){

  tplEnviarCotizacion(listProduct);
  localStorage.setItem('dataCart', JSON.stringify(listProduct));
  updateCounter(listProduct);

}

function getStorageJson(){

  let jsonStorage = [];
  //console.log(localStorage.getItem('dataCart'));
  if(localStorage.getItem('dataCart')){
        jsonStorage = JSON.parse(localStorage.getItem('dataCart'));
  }


  //console.log("getStorageJson()" ,jsonStorage);
  return jsonStorage;
}

function clearAllStorage(){
  localStorage.removeItem('dataCart');
  jQuery(".dataCotizacion").empty();
  jQuery(".totalCotizacion .quantityProduct").text(0);
  jQuery(".totalCotizacion .totalPrice").text(0);
  jQuery(".headCarro .quantityTotal").text(0);
  tplEnviarCotizacion([]);

}

function tplModalProducto(position,producto){

  let tpl =`<tr class="productSingle" data-price="${producto.price_}" data-quantity="${producto.quantity}" data-producto=${position}>
  <td><img src="${producto.img}" class="img-fluid" alt="${producto.title}" style="max-width:100px;max-height:100px"></td>
  <td>
      <ul class="detalleProducto">
          <li class="titulo">${producto.title}</li>
          <li class="marca">${producto.marca}</li>
          <li>SKU: ${producto.sku}</li>
      </ul>
  </td>
  <td>
  <!-- h4><input type="text" class="form-control" value="${producto.quantity}"></h4 -->

  <form class="incrementDecrement">
  <div class="value-button minusQuantity" id="decrease" value="Decrease Value">-</div>
    <input type="number" id="number" value="${producto.quantity}" />
  <div class="value-button addQuantity" id="increase" value="Increase Value">+</div>
  </form>


  </td>
  <td>${producto.price} IVA INC.</td>
  <td><a href="#" class="btn btn-lg btn-delete deleteProduct" data-producto=${position}><i class="far fa-trash-alt"></i></a></td>
</tr>`;

  return tpl;
}

function deleteProducto(position){

    let listProduct = getStorageJson();
    if(listProduct.length > 0)
    {
      listProduct.splice( position, 1 );
      addStorage(listProduct);
    }

}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ".");
}

function tplData(listProduct , element) {
  //console.log("tplData");
  let totalPrice = 0;
  let quantity = 0

  jQuery(element).find("#dataCotizacion").empty();
  if(listProduct.length > 0)
  {

    jQuery.each(listProduct, function( index, producto )
    {
          producto.price  = producto.quantity * producto.price;
          producto.price_ = producto.price;
          quantity = quantity + producto.quantity;
          totalPrice = totalPrice + producto.price;

          producto.price = numberWithCommas(producto.price);
          jQuery(element).find("#dataCotizacion").append(tplModalProducto(index,producto));

    });

    //totalPrice = numberWithCommas(totalPrice);
  }

  jQuery(element).find(".totalCotizacion .quantityProduct").text(quantity);

  jQuery(element).find(".totalCotizacion .totalPrice").attr('data-total', totalPrice);
  jQuery(element).find(".totalCotizacion .totalPrice").text(0);
  //console.log("=== > " , totalPrice);
  if(totalPrice > 0 ){
      jQuery(element).find(".totalCotizacion .totalPrice").text(numberWithCommas(totalPrice) + " Iva incluido");
  }

}

function updateCounter(listProduct){

  let total = 0;
  jQuery.each(listProduct, function( index, producto )
  {
      total = total + producto.quantity ;
  });

  jQuery(".headCarro .quantityTotal").text(total);
}

function tplEnviarCotizacion(listProduct){
  //console.log("HOLA ME LLAMAN tplEnviarCotizacion");
  // div padre enviar-cotizacion
  // productName
  // productQuantity
  // productPrice
  //
  // totalQuantity
  // totalPrice

  let liProductName = "";
  let liProductQuantity =  "";
  let liProductPrice = "";

  let totalQuantity = 0;
  let totalPrice = 0;
  jQuery("ul.productName").empty();
  jQuery("ul.productQuantity").empty();
  jQuery("ul.productPrice").empty();
  //console.log(listProduct);


  jQuery.each(listProduct, function( index, producto )
  {
          liProductName     +=  `<li>${producto.title} - ${producto.marca}</li>`;
          liProductQuantity +=  `<li>${producto.quantity}</li>`;
          liProductPrice    +=  `<li><strong>$ ${numberWithCommas(producto.price * producto.quantity)} iva inc.</strong></li>`;

          totalQuantity = totalQuantity + producto.quantity;
          totalPrice = (producto.price * producto.quantity ) + totalPrice;


  });

  jQuery(".enviar-cotizacion ul.productName").append(liProductName);
  jQuery(".enviar-cotizacion ul.productQuantity").append(liProductQuantity);
  jQuery(".enviar-cotizacion ul.productPrice").append(liProductPrice);

  jQuery(".enviar-cotizacion .totalQuantity").text(totalQuantity);
  jQuery(".enviar-cotizacion .totalPrice").text("$ " +numberWithCommas(totalPrice) + " iva inc.");

}

function getUrlCotizacion(){
// console.log('Hola entre en getUrlCotizacion()');
// console.log(window.location.pathname);
// console.log('Holaaaaaaa'+window.location.pathname.indexOf("cotizacion"));
  //console.log("ZZZZZZZZZZZZZ");
  updateCounter(getStorageJson());
  let arraylink = window.location.pathname.split("/");

  for (var i = 0; i < arraylink.length; i++) {
    if(arraylink[i] == "enviar-cotizacion"){

      listProductToInputContactForm();
      tplEnviarCotizacion(getStorageJson());
      // jQuery("input[name='name-client']").val("Juan");
      // jQuery("input[name='phono-client']").val("1234");
      // jQuery("input[name='email-client']").val("t@t.cl");
      //
      // jQuery("input[name='phono-dealer']").val('2344');
      break;
    }else if(arraylink[i] == "cotizacion"){
      tplData(getStorageJson(),jQuery("section.container"));
      break;
    }
  }

}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

function listProductToInputContactForm(){

    //jQuery("#wpcf7-f249-o1 form input[name='productos']").val(localStorage.getItem('dataCart'));
    jQuery("#wpcf7-f250-o1 form input[name='productos']").val(localStorage.getItem('dataCart'));


}




})(window.jQuery);
