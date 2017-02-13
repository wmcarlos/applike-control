<?php
require_once("../modelos/clsMunicipio.php");
$lobjMunicipio = new clsMunicipio();

$lobjMunicipio->acCodigo_municipio=$_REQUEST['txtcodigo_municipio'];
$lobjMunicipio->acNombre=$_POST['txtnombre'];
$lobjMunicipio->acCodigo_estado=$_POST['txtcodigo_estado'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjMunicipio->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjMunicipio->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjMunicipio->buscar()){
			$lcCodigo_municipio=$lobjMunicipio->acCodigo_municipio;
			$lcNombre=$lobjMunicipio->acNombre;
			$lcCodigo_estado=$lobjMunicipio->acCodigo_estado; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjMunicipio->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjMunicipio->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>