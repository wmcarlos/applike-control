<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsConfiguracion extends clsDatos{
private $acPrecio_dolar;
private $acComision_paypal;
private $acComision_plataforma;
private $acUltima_actualizacion;

//constructor de la clase		
public function __construct(){
$this->acPrecio_dolar = "";
$this->acComision_paypal = "";
$this->acComision_plataforma = "";
$this->acUltima_actualizacion = "";
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
$this->ejecutar("select * from configuracion where( = '$this->ac')");
if($laRow=$this->arreglo())
{		
$this->acPrecio_dolar=$laRow['precio_dolar'];
$this->acComision_paypal=$laRow['comision_paypal'];
$this->acComision_plataforma=$laRow['comision_plataforma'];
$this->acUltima_actualizacion=$laRow['ultima_actualizacion'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from configuracion where((precio_dolar like '%$valor%') or (comision_paypal like '%$valor%') or (comision_plataforma like '%$valor%') or (ultima_actualizacion like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acPrecio_dolar=$laRow['precio_dolar'];
$this->acComision_paypal=$laRow['comision_paypal'];
$this->acComision_plataforma=$laRow['comision_plataforma'];
$this->acUltima_actualizacion=$laRow['ultima_actualizacion'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>precio_dolar</td>
<td style='font-weight:bold; font-size:20px;'>comision_paypal</td>
<td style='font-weight:bold; font-size:20px;'>comision_plataforma</td>
<td style='font-weight:bold; font-size:20px;'>ultima_actualizacion</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acPrecio_dolar."</td>
<td>".$this->acComision_paypal."</td>
<td>".$this->acComision_plataforma."</td>
<td>".$this->acUltima_actualizacion."</td>
					<td><a href='?txtprecio_dolar=".$laRow['precio_dolar']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into configuracion(precio_dolar,comision_paypal,comision_plataforma,ultima_actualizacion)values('$this->acPrecio_dolar','$this->acComision_paypal','$this->acComision_plataforma','$this->acUltima_actualizacion')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update configuracion set precio_dolar = '$this->acPrecio_dolar', comision_paypal = '$this->acComision_paypal', comision_plataforma = '$this->acComision_plataforma', ultima_actualizacion = '$this->acUltima_actualizacion' where( = '$this->ac')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from configuracion where( = '$this->ac')");
}
//fin clase
}?>