<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style type="text/css">
body{
    margin:0;
    padding:0;
    width:100%;
    height:100%;
    font-family: 'Roboto', sans-serif;
}

h4{
    font-family: 'Roboto', sans-serif;
    color:#ffffff;
    font-weight:500;
}

.header__fondo{
  /* background-image:url('https://abecerrafrontend.cl/skberge/wp-content/themes/skberge_theme-v1/assets/images/fondo.png'); */
    /* background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    background: #efedef;
    padding: 0 0 20px 0; */
    padding: 0 0 20px 0;
    width:100%;
    height:120px;
    margin:0;
    position: relative;
    border-bottom:5px solid #5a5a5c;
    background: #efedef;
}

.header__fondo img.fondo{
  position:absolute;
  width:100%;
  height:120px;
  z-index:0;
  top:0;
  left:0;
}

.header__logo{
    width: 234px;
    height: 60px;
    float: left;
    padding: 0 0 0 45px;
    position: absolute;
    bottom: 20px;
    left: 10px;
    z-index:1;
}

.header__filete{
    width: 100%;
    height: 45px;
    margin: 0;
    padding: 0 45px 0 0;
    background-color:#2f487d;
    display:block;
    text-align:right;
}

.footer__parent{
    position:relative;
    height:45px;
    width:100%;
    display:block;

}

.footer__price{
    width: 50%;
    height: 45px;
    margin: 0;
    padding: 0 10px 0 0;
    background-color:#2f487d;
    display:inline-block;
    text-align:right;
    position:absolute;
    right:0;
    top:0;
}

.header__info{
    width: 100%;
    height: auto;
    margin: 70px 0 0 0;
    padding: 0 45px 0 0;
    position:relative;
}

.header__info-box1{
    width: 50%;
    height: 100px;
    margin: 0;
    padding: 0 0 0 45px;
    box-sizing:border-box;
    position:absolute;
    left:0;
    text-align:left;
}

.header__info-box2{
    width: 50%;
    height: 100px;
    margin: 0;
    padding: 0 45px 0 0;
    box-sizing:border-box;
    position:absolute;
    right:0;
    text-align:right;
}

.footer__info{
    width: 100%;
    height: 300px;
    height: auto;
    margin: 70px 0 0 0;
    padding: 30px 45px 20px 0;
    border-left:5px solid #2f487d;
    position:absolute;
    bottom:0;
}

.footer__info-box1{
    width: 100%;
    height: auto;
    margin: 0;
    padding: 0 0 0 20px;
    box-sizing:border-box;
    text-align:left;
}

.footer__info-box2{
    width: 100%;
    height: auto;
    margin: 20px 0;
    padding: 0 0 0 20px;
    box-sizing:border-box;
    text-align:left;
}

.footer__info-box1 p{
    color:#5a5a5c;
    margin:0;
    padding:0;
    line-height:20px;
    text-align:left;
}

.footer__info-box2 p{
    color:#5a5a5c;
    margin:0;
    padding:0;
    line-height:20px;
    text-align:left;
}

table {
	border-collapse: collapse;
	margin:50px auto 0 auto;
}

table tr td .imagen{
    width:90px;
    height:60px;
    display:block;
    border:1px  solid  #efedef;
    background: grey;
}

table tr td .imagen img{
    max-width:100%;
    max-height:100%;
    width:100%;
    height:100%;
}

table thead tr{
    background:#706f6f;
    color:#fff;
}

table thead tr td{
   border:none;
   color:white;
}

/* Zebra striping */
tr:nth-of-type(odd) {
	background: #eee;
	}

th {
	background: #3498db;
	color: white;
	font-weight: bold;
	}

td, th {
	padding: 10px;
	/* border: 1px solid #ccc;  */
	text-align: left;
	font-size: 18px;
    color:#5a5a5c;
}

table tbody tr td{
    border-bottom:1px solid grey;
}


</style>
</head>

<body>

<div class="header__fondo">
    <img src="<?php echo get_site_url();?>/wp-content/themes/skberge_theme-v1/assets/images/fondo.png" class="fondo">
    <div class="header__logo">
        <img src="<?php echo get_site_url();?>/wp-content/themes/skberge_theme-v1/assets/images/logo.png" >
    </div>
</div>

<div class="header__filete">
        <span style="color:#ffffff;font-size:18px;margin-top:13px;">COTIZACIÓN ACCESORIOS</span>
</div>


<div class="header__info">

    <div class="header__info-box1">
        <span style="color:#5a5a5c;font-size:18px;line-height:30px;text-align:left;display:block;font-weight:bold">Datos del Cliente</span><br>
        <span style="color:#5a5a5c;font-size:16px;line-height:20px;text-align:left;display:block;"><?php echo $posted_data['name-client'];?></span><br>
        <span style="color:#5a5a5c;font-size:16px;line-height:20px;text-align:left;display:block;"><?php echo $posted_data['email-client'];?></span><br>
        <span style="color:#5a5a5c;font-size:16px;line-height:20px;text-align:left;display:block;"><?php echo $posted_data['phono-client'];?></span>
    </div>

    <div class="header__info-box2">
    <span style="color:#5a5a5c;font-size:18px;line-height:30px;text-align:left;display:block;font-weight:bold">Nº Cotización:00<?php echo $coorelativo; ?></span><br>
    <span style="color:#5a5a5c;font-size:16px;line-height:20px;text-align:left;display:block;">Fecha <?php echo $posted_data['date-now'];?></span>
    </div>

</div>


<table style="margin-top:120px">
  <thead>
  <tr>
    <td style="width:20%;color:#fff;">
        Imagen
    </td>
    <td style="width:48%;color:#fff;">
        Detalle del Producto
    </td>
    <td style="width:10%;color:#fff;">
        Items
    </td>
    <td style="width:16%;color:#fff;">
        Valor
    </td>
    </tr>
  </thead>
  <tbody>
    <?php foreach (json_decode(stripslashes($posted_data['productos'])) as $key => $value) { ?>
      <tr>
        <td>
          <div class="imagen">
            <img src="<?php echo $value->img;?>"/>
          </div>
        </td>
        <td>
        <?php echo $value->title;?>  <br>
  	    <?php echo $value->marca;?>
        </td>
        <td  style="text-align:center"><?php echo $value->quantity;?></td>
        <td>$<?php echo number_format($value->price * $value->quantity,false,false,"."); ?> IVA INC</td>
      </tr>
    <?php }?>

  </tbody>
</table>

<div class="footer__parent">
    <div class="footer__price">
            <span style="color:#ffffff;font-size:18px;margin-top:13px;">TOTAL : $ <?php echo $posted_data['total-product'];?> IVA INC</span>
    </div>
</div>


<div class="footer__info">
    <div class="footer__info-box1">
        <p><span style="font-weight:bold">Vendedor: </span><?php echo $posted_data['name-dealer'];?> / <?php echo $posted_data['email-dealer'];?></p>
        <p><span style="font-weight:bold">Sucursal: </span>Av. Américo Vespucio 1001, Huechuraba, Fono 22 899 9560</p>
    </div>

    <div class="footer__info-box2">
        <p><span style="font-weight:bold">Términos y condiciones: </span></p>
        <p>Esta cotización tiene una vigencia de 30 días desde la fecha de emisión.</p>
        <p>Los valores no incluyen instalación</p>
    </div>
</div>


</body>
</html>
