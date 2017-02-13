<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsMunicipio extends clsDatos{
private $acCodigo_municipio;
private $acNombre;
private $acCodigo_estado;

//constructor de la clase		
public function __construct(){
$this->acCodigo_municipio = "";
$this->acNombre = "";
$this->acCodigo_estado = "";
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
$this->ejecutar("select * from municipio where(codigo_municipio = '$this->acCodigo_municipio')");
if($laRow=$this->arreglo())
{		
$this->acCodigo_municipio=$laRow['codigo_municipio'];
$this->acNombre=$laRow['nombre'];
$this->acCodigo_estado=$laRow['codigo_estado'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("
select 
mp.codigo_municipio,
ed.nombre as estado,
mp.codigo_estado,
mp.nombre
from municipio as mp
inner join estado as ed on (ed.codigo_estado = mp.codigo_estado)
where((mp.codigo_municipio like '%$valor%') or (mp.nombre like '%$valor%') or (mp.codigo_estado like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acCodigo_municipio=$laRow['codigo_municipio'];
$this->acNombre=$laRow['nombre'];
$this->acCodigo_estado=$laRow['codigo_estado'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
				<td style='font-weight:bold; font-size:20px;'>Nombre</td>
				<td style='font-weight:bold; font-size:20px;'>Estado al que Pertenece</td>
				<td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNombre."</td>
					<td>".$laRow['estado']."</td>
					<td><a href='?txtcodigo_municipio=".$laRow['codigo_municipio']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into municipio(codigo_municipio,nombre,codigo_estado)values('$this->acCodigo_municipio','$this->acNombre','$this->acCodigo_estado')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update municipio set codigo_municipio = '$this->acCodigo_municipio', nombre = '$this->acNombre', codigo_estado = '$this->acCodigo_estado' where(codigo_municipio = '$this->acCodigo_municipio')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from municipio where(codigo_municipio = '$this->acCodigo_municipio')");
}
//fin clase
}?>