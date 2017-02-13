<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsEstado extends clsDatos{
private $acCodigo_estado;
private $acNombre;

//constructor de la clase		
public function __construct(){
$this->acCodigo_estado = "";
$this->acNombre = "";
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
$this->ejecutar("select * from estado where(codigo_estado = '$this->acCodigo_estado')");
if($laRow=$this->arreglo())
{		
$this->acCodigo_estado=$laRow['codigo_estado'];
$this->acNombre=$laRow['nombre'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from estado where((codigo_estado like '%$valor%') or (nombre like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acCodigo_estado=$laRow['codigo_estado'];
$this->acNombre=$laRow['nombre'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>Nombre</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNombre."</td>
					<td><a href='?txtcodigo_estado=".$laRow['codigo_estado']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into estado(codigo_estado,nombre)values('$this->acCodigo_estado','$this->acNombre')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update estado set codigo_estado = '$this->acCodigo_estado', nombre = '$this->acNombre' where(codigo_estado = '$this->acCodigo_estado')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from estado where(codigo_estado = '$this->acCodigo_estado')");
}
//fin clase
}?>