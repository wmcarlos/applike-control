<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corCuenta.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = $objFunciones->ultimo_id_plus1('cuenta','codigo_cuenta');
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Cuenta</title>
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
<h1>Cuenta</h1>
<table border='1' class='datos' align='center'>
<tr style='display:none;'>
<td align='right'><span class='rojo'>*</span> codigo_cuenta:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcodigo_cuenta' value='<?php print($lcCodigo_cuenta);?>' id='txtcodigo_cuenta' class='validate[required]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Cedula:</td>
<td><select name='txtcedula' disabled='disabled' id='txtcedula' class='validate[required]'>
<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo("persona","cedula","CONCAT(nacionaliad,'-',cedula,' ',nombres,' ',apellidos)",$lcCedula); ?>
</select></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Correo AppLike:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcorreo_applike' value='<?php print($lcCorreo_applike);?>' id='txtcorreo_applike' class='validate[required],custom[email]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Correo Paypal:</td>
<td><input type='text' disabled='disabled' maxlength='' name='txtcorreo_paypal' value='<?php print($lcCorreo_paypal);?>' id='txtcorreo_paypal' class='validate[required],custom[email]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Tipo Dispositivo:</td>
<td><select name='txtcodigo_tipo_dispositivo' disabled='disabled' id='txtcodigo_tipo_dispositivo' class='validate[required]'>
<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo("tipo_dispositivo","codigo_tipo_dispositivo","nombre",$lcCodigo_tipo_dispositivo); ?>
</select></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Nro de Telefono:</td>
<td><input type='text' disabled='disabled' maxlength='11' name='txtnro_telefono' value='<?php print($lcNro_telefono);?>' id='txtnro_telefono' class='validate[required],custom[integer],maxSize[11],minSize[11]'/></td>
</tr>

<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcCodigo_cuenta); ?>'>
</table>
<?php $objFunciones->botonera_general('Cuenta','total',$id); ?>
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