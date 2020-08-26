(function($) {
// TABS HOME
var tabs       = $('#v-pills-tab a:first-child');
var contenTabs = $('#v-pills-tabContent div.show:first-child');
tabs.addClass('active');
contenTabs.addClass('active');
//SELECT-BOOTASTRAP CATEGORY
$('.nombreAccesorio').selectpicker();


for (var i = 1; i <= 50; i++) {
    $('select.carro').append('<option value=' + i + '>' + i + '</option>');
}



$('.agregarCarro').click(function(event){
	event.preventDefault();
   
});

var accesorios = []

function guardarLocalStorage(){


	$.get('http://localhost:8080/skberge/wp-json/acf/v3/accesorios-fiat', function(response){
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

        });

	});

	accesorios.push(nuevoAccesorio);
	localStorageAccesorio(nuevoAccesorio);

}


})(window.jQuery);