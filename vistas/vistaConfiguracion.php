<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corConfiguracion.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = 'no';
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Configuración</title>
<?php print($objFunciones->librerias_generales); ?>
<script>
function cargar()
{
	var operacion = '<?php print($operacion);?>';
	var listo = '<?php print($listo);?>';
	mensajes(operacion,listo);
	cargar_select(operacion,listo);
}
</script>
</head>
<body onload='cargar();'>
<?php print($objFunciones->cuadro_busqueda); ?>
<!--
	Codigo
	Antes del
	Formulario
	antes_form.php
-->
<?php @include('antes_form.php'); ?>
<div id='mensajes_sistema'></div><br />
<center>Todos los campos con <span class='rojo'>*</span> son Obligatorios</center>
</br>
<form name='form1' id='form1' autocomplete='off' method='post'/>
<div class='cont_frame'>
<h1>Configuración</h1>
<table border='1' class='datos' align='center'>
<tr>
<td align='right'><span class='rojo'>*</span> Precio del Dolar:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtprecio_dolar' value='<?php print($lcPrecio_dolar);?>' id='txtprecio_dolar' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Comisión Paypal:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcomision_paypal' value='<?php print($lcComision_paypal);?>' id='txtcomision_paypal' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Comision Plataforma:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcomision_plataforma' value='<?php print($lcComision_plataforma);?>' id='txtcomision_plataforma' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Ultima Actualizacion:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtultima_actualizacion' value='<?php print($lcUltima_actualizacion);?>' id='txtultima_actualizacion' class=''/></td>
</tr>

<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcPrecio_dolar); ?>'>
</table>
<?php $objFunciones->botonera_general('Configuracion','total',$id); ?>
</div>
</form>
<!--
	Codigo
	Despues del
	Formulario
	despues_form.php
-->
<?php @include('despues_form.php'); ?>
</body>
</html>