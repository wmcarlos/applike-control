<?php
//Cantidad de Atributos y clase
require_once("../modelos/clsFunciones.php");
$clase = "cls".$_POST['clase'];
$operacion = $_POST['operacion'];
$datos = $_POST['datos'];
if(!isset($operacion)){
require_once("../modelos/".$clase.".php");
$obj = new $clase();
print($obj->busqueda_ajax($datos));
}else{
	$objFunciones = new clsFunciones();
	//Otra Manera
	switch($operacion){
		case "listar_municipios":
			print "<option value=''>Seleccione</option>".$objFunciones->combo_segun_combo("municipio","codigo_municipio","nombre","codigo_estado",$datos,"");
		break;
	}	
}
?>