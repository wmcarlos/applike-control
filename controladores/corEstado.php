<?php
require_once("../modelos/clsEstado.php");
$lobjEstado = new clsEstado();

$lobjEstado->acCodigo_estado=$_REQUEST['txtcodigo_estado'];
$lobjEstado->acNombre=$_POST['txtnombre'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjEstado->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjEstado->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjEstado->buscar()){
			$lcCodigo_estado=$lobjEstado->acCodigo_estado;
$lcNombre=$lobjEstado->acNombre; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjEstado->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjEstado->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>