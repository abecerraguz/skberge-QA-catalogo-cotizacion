$(function(){
filtrar();
// switch (window.location.pathname) {
// 	//INICIO MITSUBISHI/skberge/blog/category/fiat/fiat-argo/
// 	case '/skberge/blog/category/mitsubishi/eclipse-cross/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/mitsubishi/l200/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/mitsubishi/mirage/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/mitsubishi/montero-sport/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/mitsubishi/new-asx/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/mitsubishi/outlander/':
// 	filtrar()
// 	break;
// 	//CIERRE MITSUBISHI
//
// 	//INICIO FIAT
// 	case '/skberge/blog/category/fiat/fiat-500/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/fiat/fiat-argo/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/fiat/fiat-cronos/':
// 	filtrar()
// 	break;
//
// 	//INICIO JEEP
// 	case '/skberge/blog/category/jeep/cherokee/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/jeep/compass/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/jeep/grand-cherokee/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/jeep/renegade/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/jeep/wrangler/':
// 	filtrar()
// 	break;
//
// 	//INICIO SSANGYONG
// 	case '/skberge/blog/category/ssangyong/korando/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/ssangyong/musso-corta/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/ssangyong/musso-grand/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/ssangyong/new-rexton-g4/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/ssangyong/tivoli/':
// 	filtrar()
// 	break;
// 	case '/skberge/blog/category/ssangyong/stavic/':
// 	filtrar()
// 	break;
//  /**Se tuvo que agregar esta linea para un nuevo modelo **/
// 	case '/skberge/blog/category/ssangyong/actyon-sport-dos/':
// 	filtrar()
// 	break;
//
//
// default:
// }

var filtrarCat  = $('#filtrarCat')
var filtrarAcce = $('#accesorioMarca')
var abgOrder    = $('#abg_order_by')

filtrarCat.change(function(){
     filtrar()
     //console.log('Filtra categoría');
});

filtrarAcce.change(function(){
     filtrar()
     //console.log('Filtra accesorio');
});

abgOrder.change(function(){
     filtrar()
     console.log('Filtra ASC DEC');
});

filtrarCat.selectpicker();
filtrarAcce.selectpicker();
abgOrder.selectpicker();

$('.navbar-brand').click(function(){
	deleteStorage();
})


$("select.nombreAccesorio").change(function(){
	//console.log("*******");
	var dataSlug = [];
    var dataName = [];

	// GET VALUE SLUG
    var selectedOptionSlug = $(this).children("option:selected").val();
    dataSlug.push(selectedOptionSlug);
    alert("You have selected the country - " + dataSlug);
    localStorage.setItem('datos-slug', JSON.stringify(dataSlug));

    // GET TEXT NAME
    var selectedOptionName = $(this).children("option:selected").text();
    dataName.push(selectedOptionName);
    alert("You have selected the country - " + dataName);
    localStorage.setItem('datos-name', JSON.stringify(dataName));

    var id = $(this).attr('id');
    var marcaAccesorio = $('.marcaAccesorio-'+id);

    marcaAccesorio.removeAttr('disabled');
    marcaAccesorio.css({
    	'background':'#2c2c2c',
    	'color'     :'#fff'
    });

});


var guardadoSlug   = localStorage.getItem('datos-slug');
var datosParseSlug = JSON.parse(guardadoSlug);

var guardadoName   = localStorage.getItem('datos-name');
var datosParseName = JSON.parse(guardadoName);

$("#accesorioMarca option").each(function() {
	//console.log("dd"+ datosParseSlug);
	if(datosParseSlug[0] === this.value){
		$(this).attr("selected","selected");
	}
});


//Funcion borrar Storage
function deleteStorage(){
	localStorage.clear();
	//console.log('Storage Borrado')
}




function selectorAccesorio(mopdeloSlug){
	console.log(mopdeloSlug);
	//jQuery("select#filtrarCat").val();
}

// function filtrar(){
// 	console.log("Filtrar",abecerra_loadmore_params.ajaxurl);
// 	console.log($('#filter').serialize());
// 	console.log($('#filter'));
// 	$.ajax({
// 		url : abecerra_loadmore_params.ajaxurl,
// 		data : $('#filter').serialize(),
// 		dataType : 'json',
// 		type : 'POST',
// 		beforeSend : function(xhr){
// 			//$('#filter').find('button').text('Filtrando...');
// 		},
// 		success:function(data){
// 			//console.log(data);
// 			abecerra_loadmore_params.current_page = 1;
// 			abecerra_loadmore_params.posts = data.args;
// 			abecerra_loadmore_params.max_page = data.max_page;
// 			$(".bs-searchbox input.form-control").attr("placeholder", "Ingrese Nombre");
// 			//$('#filter').find('button').text('Filtrar');
// 			//$('#filter').find('button').prepend('<i class="fas fa-search mr-2"></i>');
// 			$('#filter').find('.eliminarFiltro').text('Eliminar Filtros');
// 			$('#response').html(data.content);
//
// 			if ( data.max_page < 2 ) {
// 				$('#abgLoadmore').hide();
// 			} else {
// 				$('#abgLoadmore').show();
// 			}
//
// 		},
// 		complete:function(data){
//
// 			$('.btn-cotizar').click(function(event){
// 				event.preventDefault();
// 				var category = $("#repName-" + $(this).attr("name")).text();
// 				var marca    = $("#repMarcName-" + $(this).attr("name")).text();
// 				$(".repCat").attr("value",category);
// 				$(".repMarc").attr("value",marca);
// 				$("#formm-" + $(this).attr("id")).addClass("carRepFormTop");
// 			});
//
// 			$('.cerrar').click(function(event){
// 				event.preventDefault();
// 				$("#formm-" + $(this).attr("id")).removeClass("carRepFormTop");
// 			});
//
// 			$('.eliminarFiltro').click(function(event){
// 				event.preventDefault();
// 				$('button[data-id="filtrarCat"] .filter-option-inner-inner').text('Todas las categorias');
// 				$('button[data-id="accesorioMarca"] .filter-option-inner-inner').text('Todos los accesorios');
// 				$("ul.dropdown-menu.inner.show li:first-child").addClass('selected active');
// 				$('#filtrarCat').val(-1);
// 				$('#accesorioMarca').val(-1);
// 				filtrar();
// 			});
//
// 			$( 'div.wpcf7 > form' ).each( function() {
// 			     var $form = $(this);
// 			     $form.submit(function (event) {
// 			         if (typeof window.FormData !== 'function') {
// 			             return;
// 			         }
// 			         wpcf7.submit($form);
// 			         event.preventDefault();
// 			         //console.log('funciona Mierda');
// 			     });
// 			     $( '.wpcf7-submit', $form ).after( '<span class="ajax-loader"></span>' );
// 			});
//
// 			switch (window.location.pathname) {
//
// 				//INICIO MITSUBISHI
// 				case '/skberge/blog/category/mitsubishi/eclipse-cross/':
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-mitsubishi');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-mitsubishi');
// 				break;
//
// 				case '/skberge/blog/category/mitsubishi/l200/':
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-mitsubishi');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-mitsubishi');
// 				break;
//
// 				case '/skberge/blog/category/mitsubishi/mirage/':
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-mitsubishi');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-mitsubishi');
// 				break;
//
// 				case '/skberge/blog/category/mitsubishi/montero-sport/':
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-mitsubishi');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-mitsubishi');
// 				break;
//
// 				case '/skberge/blog/category/mitsubishi/new-asx/':
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-mitsubishi');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-mitsubishi');
// 				break;
//
// 				case '/skberge/blog/category/mitsubishi/outlander/':
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-mitsubishi');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-mitsubishi');
// 				break;
// 				//CIERRE MITSUBISHI
//
//
// 				//INICIO FIAT
// 				case '/skberge/blog/category/fiat/fiat-500/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-fiat');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-fiat');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-fiat');
//
// 				break;
//
// 				case '/skberge/blog/category/fiat/fiat-argo/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-fiat');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-fiat');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-fiat');
// 				break;
//
// 				case '/skberge/blog/category/fiat/fiat-cronos/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-fiat');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-fiat');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-fiat');
// 				break;
//
// 				//INICIO JEEP
// 				case '/skberge/blog/category/jeep/cherokee/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-jeep');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-mitsubishi');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-jeep');
// 				break;
//
// 				case '/skberge/blog/category/jeep/compass/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-jeep');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-mitsubishi');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-jeep');
// 				break;
//
// 				case '/skberge/blog/category/jeep/grand-cherokee/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-jeep');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-mitsubishi');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-jeep');
// 				break;
//
// 				case '/skberge/blog/category/jeep/renegade/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-jeep');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-mitsubishi');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-jeep');
// 				break;
//
// 				case '/skberge/blog/category/jeep/wrangler/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-jeep');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-mitsubishi');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-jeep');
// 				break;
//
// 				//INICIO SSANGYONG
// 				case '/skberge/blog/category/ssangyong/korando/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-ssangyong');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-ssangyong');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-jeep');
// 				break;
//
// 				case '/skberge/blog/category/ssangyong/musso-corta/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-ssangyong');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-ssangyong');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-jeep');
// 				break;
//
// 				case '/skberge/blog/category/ssangyong/musso-grand/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-ssangyong');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-ssangyong');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-jeep');
// 				break;
//
// 				case '/skberge/blog/category/ssangyong/new-rexton-g4/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-ssangyong');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-ssangyong');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-jeep');
// 				break;
//
// 				case '/skberge/blog/category/ssangyong/tivoli/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-ssangyong');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-ssangyong');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-jeep');
// 				break;
//
// 				case '/skberge/blog/category/ssangyong/stavic/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-ssangyong');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-ssangyong');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-ssangyong');
// 				break;
// 				/***Se tuvo que agregar esta linea para crear un nuevo modelo ****/
// 				case '/skberge/blog/category/ssangyong/actyon-sport-dos/':
// 				$('a.eliminarFiltro').removeClass('eliminarFiltro').addClass('btn-ssangyong');
// 				$('a.bloque').removeClass('btn-cotizar-fiat').addClass('btn-cotizar-ssangyong');
// 				$('#abgLoadmore').removeClass('btn-cotizar').addClass('btn-ssangyong');
// 				break;
//
//
// 				default:
// 			}
//
//
//
// 		}}
// 	);
// 	return false;
// };




$('#filter').submit(function(){
		$.ajax({
			url : abecerra_loadmore_params.ajaxurl,
			data : $('#filter').serialize(),
			dataType : 'json',
			type : 'POST',
			beforeSend : function(xhr){
				$('#filter').find('button').text('Filtrando...');
			},
			success:function(data){
				abecerra_loadmore_params.current_page = 1;
				abecerra_loadmore_params.posts = data.posts;
				abecerra_loadmore_params.max_page = data.max_page;
				$('#filter').find('button').text('Filtrar');
				$('#filter').find('button').prepend('<i class="fas fa-search mr-2"></i>');
				$('#response').html(data.content);

				if ( data.max_page < 2 ) {
					$('#abgLoadmore').hide();
				} else {
					$('#abgLoadmore').show();
				}
			},
			complete:function(data){
				$('.btn-cotizar').click(function(event){
					event.preventDefault();
					var category = $("#repName-" + $(this).attr("name")).text();
					var marca    = $("#repMarcName-" + $(this).attr("name")).text();
					$(".repCat").attr("value",category);
					$(".repMarc").attr("value",marca);
					$("#formm-" + $(this).attr("id")).addClass("carRepFormTop");
				});

				$('.cerrar').click(function(event){
					event.preventDefault();
					$("#formm-" + $(this).attr("id")).removeClass("carRepFormTop");
				});

				$('.eliminarFiltro').click(function(event){
					event.preventDefault();
					$('#tipoPublicacion').val(-1);
					$('#areaPublicacion').val(-1);
					$('#abg_posts_per_page').val(0);
					filtrar();
				});

			$( 'div.wpcf7 > form' ).each( function() {
			     var $form = $(this);
			     $form.submit(function (event) {
			         if (typeof window.FormData !== 'function') {
			             return;
			         }
			         wpcf7.submit($form);
			         event.preventDefault();
			         //console.log('funciona Mierda');
			     });
			     $( '.wpcf7-submit', $form ).after( '<span class="ajax-loader"></span>' );
			});


			}}
		);
		return false;
	});







});

function loadMore(){
	event.preventDefault();
	//console.log(abecerra_loadmore_params);
	//abecerra_loadmore_params.current_page = abecerra_loadmore_params.current_page + 1;
	//console.log(abecerra_loadmore_params.current_page);
	//console.log(abecerra_loadmore_params.posts);

	$.ajax({
		url : abecerra_loadmore_params.ajaxurl,
		data : {
			'action': 'loadmore',
			'query': abecerra_loadmore_params.posts,
			'page' : abecerra_loadmore_params.current_page
			// 'accesorio_slug' : jQuery("input[name=accesorio_slug]").val(),
			// 'taxonomy_model' : jQuery("input[name=taxonomy_model]").val()

		},
		type : 'POST',
		beforeSend : function (xhr) {
			$('#abgLoadmore').text('Cargando...');
			$('#abgLoadmore').prepend('<i class="fas fa-circle-notch fa-spin mr-3"></i>');
		},
		success : function(data){
			if( data ) {
				$('#abgLoadmore').text('MAS PUBLICACIONES');
				$('#abgLoadmore').prepend('<i class="fas fa-arrow-down mr-2"></i>');

				$('#response').append(data);
				//abecerra_loadmore_params.current_page = abecerra_loadmore_params.current_page + 1;
				abecerra_loadmore_params.current_page++;
				if ( abecerra_loadmore_params.current_page == abecerra_loadmore_params.max_page )
					$('#abgLoadmore').hide();
				} else {
					$('#abgLoadmore').hide();
				}
		},
		complete:function(data){

			$('.eliminarFiltro').click(function(event){
				event.preventDefault();
				$('#tipoPublicacion').val(-1);
				$('#areaPublicacion').val(-1);
				$('#abg_posts_per_page').val(0);
				filtrar();
			});

		}
	});
	return false;

}


// jQuery("section.total").on('click', '#abgLoadmore', function(event) {
// 	event.preventDefault();
// 	/* Act on the event */
// 	console.log('LoadMoreeeee 111');
// });
jQuery('#abgLoadmore').click(function(event) {
	event.preventDefault();
	console.log('LoadMoreeeee 111');
	loadMore();
});

jQuery("select#filtrarCat").change(function(event) {

	//console.log("select#filtrarCat");
	/* Act on the event */
	// console.log("-----------");
	// console.log(jQuery(this).val());
	// console.log(jQuery("input[name=accesorio_slug]").val());
	// console.log("-----------");
	let options = "";
  let url = jQuery("input[name=site_url]").val();
	$.ajax({
		url : url + '/wp-json/marca/taxonomia',
		data : {
			'id'             : jQuery(this).val(),
			'accesorioMarca' : jQuery("input[name=accesorio_slug]").val()
		},
		type : 'GET',
		beforeSend : function (xhr) {
			// $('#abgLoadmore').text('Cargando...');
			// $('#abgLoadmore').prepend('<i class="fas fa-circle-notch fa-spin mr-3"></i>');
		},
		success : function(data){
			//console.log(data);
			if( data ) {
				jQuery("#accesorioMarca").find("option").remove();

				options += `<option value="-1" selected="">Todos los Accesorios</option>`;
				jQuery.each(data.terms, function( index, value ) {
					options += `<option value="${value.slug}">${value.name}</option>`;
				});
				// console.log("TYPE " ,typeof(data.tax));
				// console.log("IS_ARRAY " ,Array.isArray(data.tax));
				if(typeof(data.tax) === "object" ){

						data.tax = -1;
				}
				jQuery("input[name=taxonomy_model]").val(data.tax);
				jQuery("#accesorioMarca").append(options);
				jQuery("#accesorioMarca").selectpicker('refresh');
				//console.log("cambiar --");
				jQuery("#response").hide();
				filtrar();
				jQuery("#response").show();


			}

		},
		complete:function(data){



		}
	});
	//https://abecerrafrontend.cl/skberge/wp-json/marca/taxonomia?id=47&accesorioMarca=accesorios-fiat
});

function filtrar(){

	if($('#filter').length == 0 ){
			return ;
	}
	// console.log("###############");
	// console.log("Filtrar",abecerra_loadmore_params.ajaxurl);
	// console.log($('#filter').serialize());
	// console.log($('#filter'));
	$.ajax({
		url : abecerra_loadmore_params.ajaxurl,
		data : $('#filter').serialize(),
		dataType : 'json',
		type : 'POST',
		beforeSend : function(xhr){
			//$('#filter').find('button').text('Filtrando...');
		},
		success:function(data){
			//console.log(data);
			abecerra_loadmore_params.current_page = 1;
			abecerra_loadmore_params.posts = data.args;
			abecerra_loadmore_params.max_page = data.max_page;
			$(".bs-searchbox input.form-control").attr("placeholder", "Ingrese Nombre");
			//$('#filter').find('button').text('Filtrar');
			//$('#filter').find('button').prepend('<i class="fas fa-search mr-2"></i>');
			$('#filter').find('.eliminarFiltro').text('Eliminar Filtros');
			$('#response').html(data.content);

			if ( data.max_page < 2 ) {
				$('#abgLoadmore').hide();
			} else {
				$('#abgLoadmore').show();
			}

		},
		complete:function(data){

			$('.btn-cotizar').click(function(event){
				event.preventDefault();
				var category = $("#repName-" + $(this).attr("name")).text();
				var marca    = $("#repMarcName-" + $(this).attr("name")).text();
				$(".repCat").attr("value",category);
				$(".repMarc").attr("value",marca);
				$("#formm-" + $(this).attr("id")).addClass("carRepFormTop");
			});

			$('.cerrar').click(function(event){
				event.preventDefault();
				$("#formm-" + $(this).attr("id")).removeClass("carRepFormTop");
			});



			$( 'div.wpcf7 > form' ).each( function() {
			     var $form = $(this);
			     $form.submit(function (event) {
			         if (typeof window.FormData !== 'function') {
			             return;
			         }
			         wpcf7.submit($form);
			         event.preventDefault();
			         //console.log('funciona Mierda');
			     });
			     $( '.wpcf7-submit', $form ).after( '<span class="ajax-loader"></span>' );
			});

		}}
	);
	return false;
};

$('#eliminarFiltro').click(function(event){
	event.preventDefault();
	$('button[data-id="filtrarCat"] .filter-option-inner-inner').text('Todas las categorias');
	$('button[data-id="accesorioMarca"] .filter-option-inner-inner').text('Todos los accesorios');
	$("ul.dropdown-menu.inner.show li:first-child").addClass('selected active');
	$('#filtrarCat').val(-1);
	$('#accesorioMarca').val(-1);
	filtrar();
});
