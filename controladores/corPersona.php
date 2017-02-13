<?php
require_once("../modelos/clsPersona.php");
$lobjPersona = new clsPersona();

$lobjPersona->acCedula=$_REQUEST['txtcedula'];
$lobjPersona->acNacionaliad=$_POST['txtnacionaliad'];
$lobjPersona->acNombres=$_POST['txtnombres'];
$lobjPersona->acApellidos=$_POST['txtapellidos'];
$lobjPersona->acSexo=$_POST['txtsexo'];
$lobjPersona->acCodigo_municipio=$_POST['txtcodigo_municipio'];
$lobjPersona->acDireccion_detalla=$_POST['txtdireccion_detalla'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjPersona->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjPersona->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjPersona->buscar()){
			$lcCedula=$lobjPersona->acCedula;
			$lcNacionaliad=$lobjPersona->acNacionaliad;
			$lcNombres=$lobjPersona->acNombres;
			$lcApellidos=$lobjPersona->acApellidos;
			$lcSexo=$lobjPersona->acSexo;
			$lcCodigo_municipio=$lobjPersona->acCodigo_municipio;
			$lcDireccion_detalla=$lobjPersona->acDireccion_detalla;
			$estado = $lobjPersona->estado;
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjPersona->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjPersona->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>