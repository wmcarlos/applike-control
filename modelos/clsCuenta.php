<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsCuenta extends clsDatos{
private $acCodigo_cuenta;
private $acCedula;
private $acCorreo_applike;
private $acCorreo_paypal;
private $acCodigo_tipo_dispositivo;
private $acNro_telefono;

//constructor de la clase		
public function __construct(){
$this->acCodigo_cuenta = "";
$this->acCedula = "";
$this->acCorreo_applike = "";
$this->acCorreo_paypal = "";
$this->acCodigo_tipo_dispositivo = "";
$this->acNro_telefono = "";
}

//metodo magico set
public function __set($atributo, $valor){ $this->$atributo = strtoupper($valor);}		
//metodo get
public function __get($atributo){ return trim($this->$atributo); }
//destructor de la clase        
public function __destruct() { }
		
//funcion Buscar        
public function buscar()
{
$llEnc=false;
$this->ejecutar("select * from cuenta where(codigo_cuenta = '$this->acCodigo_cuenta')");
if($laRow=$this->arreglo())
{		
$this->acCodigo_cuenta=$laRow['codigo_cuenta'];
$this->acCedula=$laRow['cedula'];
$this->acCorreo_applike=$laRow['correo_applike'];
$this->acCorreo_paypal=$laRow['correo_paypal'];
$this->acCodigo_tipo_dispositivo=$laRow['codigo_tipo_dispositivo'];
$this->acNro_telefono=$laRow['nro_telefono'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from cuenta where((codigo_cuenta like '%$valor%') or (cedula like '%$valor%') or (correo_applike like '%$valor%') or (correo_paypal like '%$valor%') or (codigo_tipo_dispositivo like '%$valor%') or (nro_telefono like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acCodigo_cuenta=$laRow['codigo_cuenta'];
$this->acCedula=$laRow['cedula'];
$this->acCorreo_applike=$laRow['correo_applike'];
$this->acCorreo_paypal=$laRow['correo_paypal'];
$this->acCodigo_tipo_dispositivo=$laRow['codigo_tipo_dispositivo'];
$this->acNro_telefono=$laRow['nro_telefono'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>codigo_cuenta</td>
<td style='font-weight:bold; font-size:20px;'>cedula</td>
<td style='font-weight:bold; font-size:20px;'>correo_applike</td>
<td style='font-weight:bold; font-size:20px;'>correo_paypal</td>
<td style='font-weight:bold; font-size:20px;'>codigo_tipo_dispositivo</td>
<td style='font-weight:bold; font-size:20px;'>nro_telefono</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acCodigo_cuenta."</td>
<td>".$this->acCedula."</td>
<td>".$this->acCorreo_applike."</td>
<td>".$this->acCorreo_paypal."</td>
<td>".$this->acCodigo_tipo_dispositivo."</td>
<td>".$this->acNro_telefono."</td>
					<td><a href='?txtcodigo_cuenta=".$laRow['codigo_cuenta']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into cuenta(codigo_cuenta,cedula,correo_applike,correo_paypal,codigo_tipo_dispositivo,nro_telefono)values('$this->acCodigo_cuenta','$this->acCedula','$this->acCorreo_applike','$this->acCorreo_paypal','$this->acCodigo_tipo_dispositivo','$this->acNro_telefono')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update cuenta set codigo_cuenta = '$this->acCodigo_cuenta', cedula = '$this->acCedula', correo_applike = '$this->acCorreo_applike', correo_paypal = '$this->acCorreo_paypal', codigo_tipo_dispositivo = '$this->acCodigo_tipo_dispositivo', nro_telefono = '$this->acNro_telefono' where(codigo_cuenta = '$this->acCodigo_cuenta')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from cuenta where(codigo_cuenta = '$this->acCodigo_cuenta')");
}
//fin clase
}?>