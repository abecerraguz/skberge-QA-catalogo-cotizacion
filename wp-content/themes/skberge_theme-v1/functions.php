<?php

/**
 * Import functions folder
 * Imports all the files inside the functions folder
 * and adds them into functions file
 *
 * @return  void
 * @since   1.0
 * @version 1.3
 */
require_once get_template_directory() . '/functions/__get_files_from.php';
$files = get_files_from( $theme_options['functions'] );

foreach($files as $file) {
	require_once $file;
}


/**
 * Check Minimum WP version
 * This theme only works in WordPress 4.8 or later.
 *
 * @return  void
 * @since   1.0
 */
if ( version_compare( $GLOBALS['wp_version'], $theme_options['wp_min_version'], '<' ) ) {
	require get_template_directory() . '/functions/back-compat.php';
	return;
}


/**
 * Avoid "Notice: ob_end_flush()" Error
 * Uncomment in case of needed
 *
 * @return  void
 * @since   1.6.0
 * @version 1.0
 */
// remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
    function post_is_in_descendant_category( $cats, $_post = null ) {
        foreach ( (array) $cats as $cat ) {
            // get_term_children() accepts integer ID only
            $descendants = get_term_children( (int) $cat, 'category' );
            if ( $descendants && in_category( $descendants, $_post ) )
                return true;
        }
        return false;
    }
}

/**
 * Add REST API support to an already registered post type.
 */
add_filter( 'register_post_type_args', 'my_post_type_args', 10, 2 );

function my_post_type_args( $args, $post_type ) {

    if ( 'accesorios-mmc' === $post_type ) {
        $args['show_in_rest'] = true;

        // Optionally customize the rest_base or rest_controller_class
        $args['rest_base']             = 'accesorios-mmc';
        $args['rest_controller_class'] = 'WP_REST_Posts_Controller';
    }

    if ( 'accesorios-fiat' === $post_type ) {
        $args['show_in_rest'] = true;

        // Optionally customize the rest_base or rest_controller_class
        $args['rest_base']             = 'accesorios-fiat';
        $args['rest_controller_class'] = 'WP_REST_Posts_Controller';
    }

    return $args;
}
/**
 * Redirigir a usuarios no logueados
 */
function intranet_wp_skberge()
{
	//echo "HOLA " . is_front_page();
	if(is_front_page() && !is_user_logged_in())
		{
				wp_redirect(wp_login_url());
				exit;
		}

}

/**
 * Si el usuario no es administrador no muestra el menu top
 * @return [type] [description]
 */
function hide_admin_bar() {

	if ( ! current_user_can('administrator') ) {
			return false;
	}
	return true;
}

/**
 * Al logearse al wp , si el usuario no es admin. Se redirige al home
 * @param  [type] $location [description]
 * @param  [type] $request  [description]
 * @param  [type] $user     [description]
 * @return [type]           [description]
 */
function send_subscribers_home( $location, $request, $user ) {

		if ( ! current_user_can('administrator') ) {
				return home_url();
		}
}

// Block Access to /wp-admin for non admins.
function custom_blockusers_init() {
  if ( is_user_logged_in() && is_admin() && !current_user_can( 'administrator' ) ) {
    wp_redirect( home_url() );
    exit;
  }
}

add_filter( 'show_admin_bar', 'hide_admin_bar' );

add_action( 'template_redirect', 'intranet_wp_skberge' );

add_filter( 'login_redirect', 'send_subscribers_home', 10, 3 );


add_action( 'wpcf7_before_send_mail', 'wpcf7_add_text_to_mail_body',9);

function wpcf7_add_text_to_mail_body($contact_form){
    $mail = $contact_form->prop( 'mail' );
    $wpcf7      = WPCF7_ContactForm::get_current();
    $submission = WPCF7_Submission::get_instance();
		if ($submission) {
         $posted_data = $submission->get_posted_data();
    }

		$email_client = $posted_data['email-client'];
		$pathPDF =  createPdf($email_client,$posted_data);
		$posted_data['number-cotizacion'] = $pathPDF['coorelativo'] ;
		$mail['body'] = str_replace("[table-product]" ,$posted_data['table-product'],$mail['body']);
		$mail['body'] = str_replace("[number-cotizacion]" ,$pathPDF['coorelativo'],$mail['body']);

    $contact_form->set_properties( array( 'mail' => $mail ) );
		$submission->add_uploaded_file('submission_pdf', $pathPDF['name']);

}


add_filter( 'wpcf7_posted_data', 'action_wpcf7_posted_data', 10, 1 );
function action_wpcf7_posted_data($posted_data)	{

	//print_r($contact_form);

	//$submission = WPCF7_Submission::get_instance();
	//if ( $submission ) {

			//$posted_data = $submission->get_posted_data();
			//print_r($posted_data);

			if(!empty($posted_data['productos'])) {
					$listProducts  = json_decode(stripslashes($posted_data['productos']));
					$total = 0;
					$tpl = "";
					foreach ($listProducts as $key => $product) {
						// code...
						$total = $total + ($product->price * $product->quantity);
						$tpl  .=  tableProducts($product);


					}

					$posted_data["total-product"] = number_format($total,false,false,".");
					$posted_data["table-product"] = $tpl;
					$posted_data["date-now"] = date("d/m/Y");
					// print_r($posted_data);
					// die();
					return $posted_data;
					//$WPCF7_ContactForm->set_properties( array("mail" => $mail)) ;
			}
	//}
}

function tableProducts($product) {

		// $tplProducto  = " <tr class='order_item'>";
		// $tplProducto .= "<td class=\"td\" style=\"color: #8a8a8a; border: 1px solid #e5e5e5; padding: 12px; text-align: left; vertical-align: middle; font-family: Helvetica, Roboto, Arial, sans-serif; word-wrap: break-word;\">";
    // $tplProducto .=  $product->title .' - '. $product->marca;
    // $tplProducto .= "</td>";
		// $tplProducto .= "<td class=\"td\" style=\"color: #8a8a8a; border: 1px solid #e5e5e5; padding: 12px; text-align: left; vertical-align: middle; font-family: Helvetica, Roboto, Arial, sans-serif;\">";
    // $tplProducto .=  $product->quantity ;
    // $tplProducto .= "</td>";
    // $tplProducto .= "<td class=\"td\" style=\"color: #8a8a8a; border: 1px solid #e5e5e5; padding: 12px; text-align: left; vertical-align: middle; font-family: Helvetica, Roboto, Arial, sans-serif;\">";
    // $tplProducto .= "<span class=\"woocommerce-Price-amount amount\"><span class=\"woocommerce-Price-currencySymbol\">$</span>". ($product->price * $product->quantity) ."</span>";
    // $tplProducto .= "</td>";
    // $tplProducto .= "</tr> ";



		$tplProducto  = "<table role=\"presentation\" width=\"98%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-bottom:1px solid #706f6f;margin:10px auto;\">";
    $tplProducto  .= "<tr>";
    $tplProducto  .= "<td class=\"padding\" align=\"left\" width=\"10%\" style=\"display: table-cell; color: #5a5a5c;  font-family: Helvetica, arial, sans-serif; font-size: 16px;font-weight:bold;padding:15px\">";
    $tplProducto  .= "<img src=\"".$product->img."\" width=\"90\" height=\"60\" border=\"0\" alt=\"".$product->title."\" style=\"display: block; color: #666666;  font-family: Helvetica, arial, sans-serif; font-size: 16px;\" class=\"img-max\">";
    $tplProducto  .= "</td>";
    $tplProducto  .= "<td class=\"padding\" align=\"left\" width=\"60%\" style=\"display: table-cell; color: #5a5a5c;  font-family: Helvetica, arial, sans-serif; font-size: 16px;font-weight:bold;padding:15px\">";
    $tplProducto  .= $product->title ." ". $product->marca;
    $tplProducto  .= "</td>";
    $tplProducto  .= "<td class=\"padding\" align=\"left\" width=\"15%\" style=\"display: table-cell; color: #5a5a5c;  font-family: Helvetica, arial, sans-serif; font-size: 16px;font-weight:bold;padding:15px\">";
    $tplProducto  .= $product->quantity;
    $tplProducto  .= "</td>";
    $tplProducto  .= "<td class=\"padding\" align=\"left\" width=\"15%\" style=\"display: table-cell;  color: #5a5a5c;  font-family: Helvetica, arial, sans-serif; font-size: 16px;font-weight:bold;padding:15px;white-space:no-wrap;\">";
    $tplProducto  .= "$ ". number_format($product->price * $product->quantity,false,false,".") ." IVA INC";
    $tplProducto  .= "</td>";
    $tplProducto  .= "</tr>";
  	$tplProducto  .= "</table>";

		return stripslashes($tplProducto);

}

//add_action( 'init', 'custom_blockusers_init' );


// add_filter( 'wpcf7_posted_data', 'action_wpcf7_posted_data', 10, 1 );
// function action_wpcf7_posted_data($posted_data)	{
//
//
// 			if(!empty($posted_data['productos'])) {
// 					$listProducts  = json_decode(stripslashes($posted_data['productos']));
// 					$total = 0;
// 					$tpl = "";
// 					foreach ($listProducts as $key => $product) {
// 						// code...
// 						$total = $total + ($product->price * $product->quantity);
// 						$tpl  .=  "PRODUCTO = " . $product->title . " - " .$product->marca. "\t\t";
// 						$tpl  .=  "CANTIDAD = " . $product->quantity. "\t\t";
// 						$tpl  .=  "VALOR    = " . $product->price * $product->quantity . "\t\t";
// 						$tpl  .=  "\n";
//
// 					}
//
// 					$posted_data["total-product"] = $total;
// 					$posted_data["table-product"] = $tpl;
//
//
// 					return $posted_data;
//
// 			}
//
// }
/**
 * [loadAccesorioMarca description]
 * Dependiendo de la url se evalua y se cargan categorias , accesorios y clases
 * de la marca propia. Si se llega a incorporar una marca , se debería agregar
 * a la fila
 * @param  [String] $url
 * @return [Array]  $category_name,$accesorios,$classCss
 */
function loadAccesorioMarca($url) {

	$urlArray = explode("/",$url);


	if(in_array("accesorios-fiat", $urlArray)) {

		$category_name = 'fiat';
		$accesorios    = "accesorios-fiat";
		$classCss      = array(

			"classBackground"      => "fondo-rojo-fiat",
			"classModelo"          => "gris-fiat",
			"classDetalleProducto" => "rojo-fiat",
			"classBtnMarca"        => "btn-fiat",
			"classSugeridos"       => "sugeridos-ssangyong"

		);

	}else if(in_array("accesorios-dodge", $urlArray)) {

		$category_name = 'dodge';
		$accesorios    = "accesorios-dodge";
		$classCss      = array(

			"classBackground"      => "fondo-negro",
			"classModelo"          => "rojo-mitsubishi",
			"classDetalleProducto" => "negro",
			"classBtnMarca"        => "btn-jeep",
			"classSugeridos"       => "sugeridos-mmc"

		);

	}else if(in_array("accesorios-jeep", $urlArray)) {

		$category_name = 'jeep';
		$accesorios    = "accesorios-jeep";
		$classCss      = array(

			"classBackground"      => "fondo-negro",
			"classModelo"          => "azul-mopar",
			"classDetalleProducto" => "negro",
			"classBtnMarca"        => "btn-jeep",
			"classSugeridos"       => "sugeridos-mmc"
		);

	}else if(in_array("accesorios-mmc", $urlArray)) {

		$category_name = 'mitsubishi';
		$accesorios    = "accesorios-mmc";
		$classCss      = array(

			"classBackground"      => "fondo-negro",
			"classModelo"          => "rojo-mitsubishi",
			"classDetalleProducto" => "rojo",
			"classBtnMarca"        => "btn-mitsubishi",
			"classSugeridos"       => "sugeridos-mmc"

		);

	}else if(in_array("accesorios-ram", $urlArray)) {

		$category_name = 'ram';
		$accesorios    = "accesorios-ram";
		$classCss      = array(

			"classBackground"      => "fondo-negro",
			"classModelo"          => "gris-ram",
			"classDetalleProducto" => "negro",
			"classBtnMarca"        => "btn-jeep",
			"classSugeridos"       => "sugeridos-mmc"

		);

	}else if(in_array("accesorios-ssangyong", $urlArray)) {

		$category_name = 'ssangyong';
		$accesorios    = "accesorios-ssangyong";
		$classCss      = array(

			"classBackground"      => "fondo-azul-ssangyong",
			"classModelo"          => "gris-ssangyong",
			"classDetalleProducto" => "azul",
			"classBtnMarca"        => "btn-ssangyong",
			"classSugeridos"       => "sugeridos-ssangyong"
		);

	}else{

		$category_name = 'fiat';
		$accesorios    = "accesorios-fiat";
		$classCss      = array(

			"classBackground"      => "fondo-rojo-fiat",
			"classModelo"          => "gris-fiat",
			"classDetalleProducto" => "rojo-fiat",
			"classBtnMarca"        => "btn-fiat",
			"classSugeridos"       => "sugeridos-ssangyong"
		);
	}

	return array($category_name,$accesorios,$classCss);
}


function loadBuscadorModelo($url) {

	$urlArray = explode("/",$url);
	$model = $urlArray[count($urlArray)-2];
	//print_r($urlArray);
	if(in_array("fiat", $urlArray)) {

		$category_name = 'fiat';
		$accesorios = "accesorios-fiat";
		$classCss = array(

			"classBackground"      => "fondo-rojo-fiat",
			"classModelo"          => "gris-fiat",
			"classDetalleProducto" => "rojo-fiat",
			"classBtnMarca"        => "btn-fiat",
			"classSugeridos"       => "sugeridos-ssangyong",
			"classCotizar"         => "btn-cotizar-fiat"
		);


	}else if(in_array("dodge", $urlArray)) {

		$category_name = 'dodge';
		$accesorios = "accesorios-dodge";
		$classCss = array(

			"classBackground"      => "fondo-negro",
			"classModelo"          => "rojo-mitsubishi",
			"classDetalleProducto" => "negro",
			"classBtnMarca"        => "btn-dodge",
			"classSugeridos"       => "sugeridos-mmc",
			"classCotizar"         => "btn-cotizar-mitsubishi"

		);

	}else if(in_array("jeep", $urlArray)) {

		$category_name = 'jeep';
		$accesorios = "accesorios-jeep";
		$classCss = array(

			"classBackground"      => "fondo-negro",
			"classModelo"          => "azul-mopar",
			"classDetalleProducto" => "negro",
			"classBtnMarca"        => "btn-jeep",
			"classSugeridos"       => "sugeridos-mmc",
			"classCotizar"         => "btn-cotizar-mitsubishi"
		);
		// $tax_modelo = array(
		//
		// 	'grandCherokee'    => 'grand_cherokee',
		// 	'cherokee'         => 'tax_cherokee',
		// 	'compass'          => 'tax_compass',
		// 	'wrangler'         => 'tax_wrangler',
		// 	'renegade'         => 'tax_renegade'
		// );

	}else if(in_array("mitsubishi", $urlArray)) {

		$category_name = 'mitsubishi';
		$accesorios = "accesorios-mmc";
		$classCss = array(

			"classBackground"      => "fondo-negro",
			"classModelo"          => "rojo-mitsubishi",
			"classDetalleProducto" => "rojo",
			"classBtnMarca"        => "btn-mitsubishi",
			"classSugeridos"       => "sugeridos-mmc",
			"classCotizar"         => "btn-cotizar-mitsubishi"
		);
		// $tax_modelo = array(
		//
		// 	'eclipseCross'    => 'eclipse_cross',
		// 	'mirage'          => 'mirage_tax',
		// 	'monteroSport'    => 'montero_sport',
		// 	'newAsx'          => 'new_asx',
		// 	'l200'            => 'l_200',
		// 	'newOutlander'    => 'new-outlander'
		// );

	}else if(in_array("ram", $urlArray)) {

		$category_name = 'ram';
		$accesorios = "accesorios-ram";
		$classCss = array(

			"classBackground"      => "fondo-negro",
			"classModelo"          => "gris-ram",
			"classDetalleProducto" => "negro",
			"classBtnMarca"        => "btn-jeep",
			"classSugeridos"       => "sugeridos-mmc",
			"classCotizar"         => "btn-cotizar-mitsubishi"

		);

	}else if(in_array("ssangyong", $urlArray)) {

		$category_name = 'ssangyong';
		$accesorios    = "accesorios-ssangyong";
		$classCss      = array(

			"classBackground"      => "fondo-azul-ssangyong",
			"classModelo"          => "gris-ssangyong",
			"classDetalleProducto" => "azul",
			"classBtnMarca"        => "btn-ssangyong",
			"classSugeridos"       => "sugeridos-ssangyong",
			"classCotizar"         => "btn-cotizar-ssangyong"
		);
		// $tax_modelo = array(
		//
		// 	'actionSports'       => 'tax_action_sports',
		// 	'actionSports_dos'   => 'tax_action_sports_dos',
		// 	'korando'    		 => 'tax_korando',
		// 	'mussoCorta'         => 'tax_musso_corta',
		// 	'mussoGrand'         => 'tax_musso_grand',
		// 	'newRextong4'        => 'tax_new_rexton_g4',
		// 	'tivoli'       		 => 'tax_tivoli',
		// 	'stavic'             => 'tax_stavic'
		//
		// );

	}else{

		$category_name = 'fiat';
		$accesorios = "accesorios-fiat";
		$classCss = array(

			"classBackground"      => "fondo-rojo-fiat",
			"classModelo"          => "gris-fiat",
			"classDetalleProducto" => "rojo-fiat",
			"classBtnMarca"        => "btn-fiat"
		);
	}

	return array($category_name,$accesorios,$classCss,$model,$model);
}

//For changing message "You have been logged out because of inactivity."
add_filter('ina__logout_message', 'your_theme_function' );
function your_theme_function($msg) {
  //$msg = "You have been logged out because of inactivity. Please wait while we redirect you to a certain page. Since, this is a custom message";
	$msg = "Se ha cerrado la sesión por inactividad.";
  return $msg;
}

function createPdf($email_client,$posted_data)
{

	$uploads = wp_upload_dir();
	//define ('WPCF7_UPLOADS_TMP_DIR',$uploads['basedir'].'/cfdb7_uploads/');
	define ('PDF_MAIL',$uploads['basedir'].'/pdf-mail/');
	if (!file_exists(PDF_MAIL)) {
	    mkdir(PDF_MAIL, 0755);
	}
	require_once dirname(__FILE__).'/composer-packages/vendor/autoload.php';
	//$path = bloginfo('template_url');
	// ob_start();
	// include dirname(__FILE__).'/pdf-tpl.php';
	//
	// $content = ob_get_clean();
	// $html2pdf = new Spipu\Html2Pdf\Html2Pdf();
	// //$html2pdf->setDefaultFont('Arial');
	// $html2pdf->writeHTML($content);
	// $html2pdf->output(WPCF7_UPLOADS_TMP_DIR.'example08.pdf','F');
	// return WPCF7_UPLOADS_TMP_DIR.'example07.pdf';
	$coorelativo = insertOrUpdateCoorelative(get_current_user_id(),get_current_blog_id());
	//$coorelativo = "78";
	try {
		//$h = "VARIABLEEEEEEEEEEEEEEEEEEEE";
		ob_start();
		include dirname(__FILE__).'/pdf-cotizacion.php';

		$content = ob_get_clean();
		$html2pdf = new Spipu\Html2Pdf\Html2Pdf();

		$html2pdf->writeHTML($content);
		$html2pdf->output( PDF_MAIL."cot-".$coorelativo."-".$email_client.'.pdf','F');
		return array("name" => PDF_MAIL."cot-".$coorelativo."-".$email_client.'.pdf' , "coorelativo" => $coorelativo);

	} catch (Html2PdfException $e) {
	    $html2pdf->clean();

	    $formatter = new ExceptionFormatter($e);
	    echo $formatter->getHtmlMessage();
	}

}


function getCoorelativePdf($id_user,$id_blog)
{
	global $wpdb;
  $query = "SELECT correlative , id FROM wp_pdf_correlative where id_dealer = $id_user and id_blog = $id_blog";
  $results = $wpdb->get_row($query);

	return $results;
}


function insertOrUpdateCoorelative($id_user,$id_blog)
{
	global $wpdb;
	$table = "wp_pdf_correlative";
	$coorelativo = 1;
	$existCoorelative = getCoorelativePdf($id_user,$id_blog);
	if( empty($existCoorelative)) {
			$wpdb->insert($table,
										array( 'id_dealer'   => $id_user,
													 'id_blog'     => $id_blog,
												 	 'correlative' => $coorelativo ));
	}else{
			$coorelativo = $existCoorelative->correlative + 1;
			$wpdb->update($table,
										array(
													'correlative' => $coorelativo
										),
										array(
													'id' => $existCoorelative->id
										)
									);
	}

	return $coorelativo;

}

function events_endpoint() {
    register_rest_route( 'marca/', 'taxonomia', array(
        'methods'  => WP_REST_Server::READABLE,
        'callback' => 'get_taxonomias',
    ) );
}
add_action( 'rest_api_init', 'events_endpoint' );




function get_taxonomias( $request ) {


	$taxonomies = get_object_taxonomies($request['accesorioMarca']);

	$tax = $taxonomies;

	if (($key = array_search("category", $tax)) !== false) {
    unset($tax[$key]);
	}

	if($request['id'] != -1 || $request['id'] != "-1") {

		$category_slug = get_terms( array(
			'taxonomy'  => 'category',
			'term_taxonomy_id'     => $request['id'],
		) );

		$modelo        = str_replace("-","_",$category_slug[0]->slug);

	  foreach ($taxonomies as $key => $value) {
	    // code...
	    $pos = strpos($value, $modelo);
	    if ($pos !== false) {
	            $tax = $value;
	    }
	  }
	}

		$tax_terms = get_terms( array(
				'taxonomy'   => $tax,
				'parent'     => 0,
				'hide_empty' => true

		) );


		$filtered = array_filter($tax_terms, function($item) {
    static $counts = array();
    if(isset($counts[$item->slug])) {
        return false;
    }
		    $counts[$item->slug] = true;
		    return true;
		});


    return array("terms" => (object)$filtered,'tax' => $tax ,"a" => "s");
}
