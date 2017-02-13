<?php
require_once("../modelos/clsConfiguracion.php");
$lobjConfiguracion = new clsConfiguracion();

$lobjConfiguracion->acPrecio_dolar=$_REQUEST['txtprecio_dolar'];
$lobjConfiguracion->acComision_paypal=$_POST['txtcomision_paypal'];
$lobjConfiguracion->acComision_plataforma=$_POST['txtcomision_plataforma'];
$lobjConfiguracion->acUltima_actualizacion=$_POST['txtultima_actualizacion'];
$lcVarTem = $_POST["txtvar_tem"];
$lcOperacion=$_REQUEST["txtoperacion"];


switch($lcOperacion){

	case "incluir":
	
		if($lobjConfiguracion->buscar()){
			$lcListo = 0;
		}else{
			$lcListo = 1;
			$lobjConfiguracion->incluir();  
		}
	
	break;
	
	case "buscar":
	
		if($lobjConfiguracion->buscar()){
			$lcPrecio_dolar=$lobjConfiguracion->acPrecio_dolar;
$lcComision_paypal=$lobjConfiguracion->acComision_paypal;
$lcComision_plataforma=$lobjConfiguracion->acComision_plataforma;
$lcUltima_actualizacion=$lobjConfiguracion->acUltima_actualizacion; 
			$lcListo = 1;
		}else{
			$lcListo = 0;
		}
	
	break;
	
	case "modificar":
	
		if($lobjConfiguracion->modificar($lcVarTem)>=1){
		$lcListo = 1;
		}else{
		$lcListo = 0;
		}
	
	break;
	
	case "eliminar":
	
		if($lobjConfiguracion->eliminar()>=1){   
		$lcListo = 1;	
		}else{
		$lcListo = 0;
		}
		
	break;
}

?>