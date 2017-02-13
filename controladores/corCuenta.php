<?php
require_once("../modelos/clsCuenta.php");
$lobjCuenta = new clsCuenta();

$lobjCuenta->acCodigo_cuenta=$_REQUEST['txtcodigo_cuenta'];
$lobjCuenta->acCedula=$_POST['txtcedula'];
$lobjCuenta->acCorreo_applike=$_POST['txtcorreo_applike'];
$lobjCuenta->acCorreo_paypal=$_POST['txtcorreo_paypal'];
$lobjCuenta->acCodigo_tipo_dispositivo=$_POST['txtcodigo_tipo_dispositivo'];
$lobjCuenta->acNro_telefono=$_POST['txtnro_telefono'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjCuenta->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjCuenta->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjCuenta->buscar()){
			$lcCodigo_cuenta=$lobjCuenta->acCodigo_cuenta;
$lcCedula=$lobjCuenta->acCedula;
$lcCorreo_applike=$lobjCuenta->acCorreo_applike;
$lcCorreo_paypal=$lobjCuenta->acCorreo_paypal;
$lcCodigo_tipo_dispositivo=$lobjCuenta->acCodigo_tipo_dispositivo;
$lcNro_telefono=$lobjCuenta->acNro_telefono; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjCuenta->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjCuenta->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>