<?php
require_once("../modelos/clsTipo_dispositivo.php");
$lobjTipo_dispositivo = new clsTipo_dispositivo();

$lobjTipo_dispositivo->acCodigo_tipo_dispositivo=$_REQUEST['txtcodigo_tipo_dispositivo'];
$lobjTipo_dispositivo->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjTipo_dispositivo->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjTipo_dispositivo->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjTipo_dispositivo->buscar()){
			$lcCodigo_tipo_dispositivo=$lobjTipo_dispositivo->acCodigo_tipo_dispositivo;
$lcNombre=$lobjTipo_dispositivo->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjTipo_dispositivo->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjTipo_dispositivo->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>