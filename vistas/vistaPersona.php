<?php
require_once('../modelos/clsFunciones.php'); //Funciones PreInstaladas
require_once('../controladores/corPersona.php');
$objFunciones = new clsFunciones;
$operacion = $lcOperacion;
$listo = $lcListo;
if(($operacion!='buscar' && $listo!=1) || ($operacion!='buscar' && $listo==1))
{
$id = 'no';
}else{
	$combo_municipios = $objFunciones->combo_segun_combo("municipio","codigo_municipio","nombre","codigo_estado",$lcCodigo_municipio,$estado);
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Gestion Persona</title>
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
<h1>Persona</h1>
<table border='1' class='datos' align='center'>
<tr >
<td align='right'><span class='rojo'>*</span> Cedula:</td>
<td><input type='text' disabled='disabled' maxlength='9' name='txtcedula' value='<?php print($lcCedula);?>' id='txtcedula' class='validate[required],custom[integer],maxSize[9],minSize[7]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Nacionalidad:</td>
<td>V <input type='radio' name='txtnacionaliad' checked="checked" value='V'/> E <input type='radio' <?php if($lcNacionaliad == "E"){ print "checked='checked'"; } ?> name='txtnacionaliad' value='E'/> </td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Nombres:</td>
<td><input type='text' disabled='disabled' name='txtnombres' value='<?php print($lcNombres);?>' id='txtnombres' class='validate[required],custom[onlyLetterSp]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Apellidos:</td>
<td><input type='text' disabled='disabled' name='txtapellidos' value='<?php print($lcApellidos);?>' id='txtapellidos' class='validate[required],custom[onlyLetterSp]'/></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Sexo:</td>
<td>M <input type='radio' name='txtsexo' checked="checked" value='M'/> F <input type='radio' <?php if($lcSexo == "F"){ print "checked='checked'"; }?> name='txtsexo' value='F'/> </td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Estado:</td>
<td><select name='txtcodigo_estado' disabled='disabled' id='txtcodigo_estado' operacion="listar_municipios" load_data="txtcodigo_municipio" class='validate[required] select_change'>
<option value=''>Seleccione</option>
<?php print $objFunciones->crear_combo("estado","codigo_estado","nombre",$estado); ?>
</select></td>
<tr>
<td align='right'><span class='rojo'>*</span> Municipio:</td>
<td><select name='txtcodigo_municipio' disabled='disabled' id='txtcodigo_municipio' class='validate[required]'>
<option value=''>Seleccione</option>
<?php print $combo_municipios; ?>
</select></td>
</tr>
<tr>
<td align='right'><span class='rojo'>*</span> Direccion:</td>
<td><textarea name='txtdireccion_detalla' maxlength='' disabled='disabled' id='txtdireccion_detalla' class='validate[required]'><?php print($lcDireccion_detalla);?></textarea></td>
</tr>

<input type='hidden' name='txtoperacion' value='des'>
<input type='hidden' name='txtvar_tem' value='<?php print($lcCedula); ?>'>
</table>
<?php $objFunciones->botonera_general('Persona','total',$id); ?>
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