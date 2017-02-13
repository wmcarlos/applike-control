<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTipo_dispositivo extends clsDatos{
private $acCodigo_tipo_dispositivo;
private $acNombre;

//constructor de la clase		
public function __construct(){
$this->acCodigo_tipo_dispositivo = "";
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
$this->ejecutar("select * from tipo_dispositivo where(codigo_tipo_dispositivo = '$this->acCodigo_tipo_dispositivo')");
if($laRow=$this->arreglo())
{		
$this->acCodigo_tipo_dispositivo=$laRow['codigo_tipo_dispositivo'];
$this->acNombre=$laRow['nombre'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tipo_dispositivo where((codigo_tipo_dispositivo like '%$valor%') or (nombre like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acCodigo_tipo_dispositivo=$laRow['codigo_tipo_dispositivo'];
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
					<td><a href='?txtcodigo_tipo_dispositivo=".$laRow['codigo_tipo_dispositivo']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tipo_dispositivo(codigo_tipo_dispositivo,nombre)values('$this->acCodigo_tipo_dispositivo','$this->acNombre')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tipo_dispositivo set codigo_tipo_dispositivo = '$this->acCodigo_tipo_dispositivo', nombre = '$this->acNombre' where(codigo_tipo_dispositivo = '$this->acCodigo_tipo_dispositivo')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tipo_dispositivo where(codigo_tipo_dispositivo = '$this->acCodigo_tipo_dispositivo')");
}
//fin clase
}?>