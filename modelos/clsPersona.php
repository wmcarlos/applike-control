<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsPersona extends clsDatos{
private $acCedula;
private $acNacionaliad;
private $acNombres;
private $acApellidos;
private $acSexo;
private $acCodigo_municipio;
private $acDireccion_detalla;
private $estado;

//constructor de la clase		
public function __construct(){
$this->acCedula = "";
$this->acNacionaliad = "";
$this->acNombres = "";
$this->acApellidos = "";
$this->acSexo = "";
$this->acCodigo_municipio = "";
$this->acDireccion_detalla = "";
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
$this->ejecutar("select 
pe.cedula,
pe.nacionaliad,
pe.nombres,
pe.apellidos,
pe.sexo,
pe.codigo_municipio,
pe.direccion_detalla,
es.codigo_estado as estado
from persona as pe
inner join municipio as mp on (mp.codigo_municipio = pe.codigo_municipio)
inner join estado as es on (es.codigo_estado = mp.codigo_estado)
where(pe.cedula = '$this->acCedula')");
if($laRow=$this->arreglo())
{		
$this->acCedula=$laRow['cedula'];
$this->acNacionaliad=$laRow['nacionaliad'];
$this->acNombres=$laRow['nombres'];
$this->acApellidos=$laRow['apellidos'];
$this->acSexo=$laRow['sexo'];
$this->acCodigo_municipio=$laRow['codigo_municipio'];
$this->acDireccion_detalla=$laRow['direccion_detalla'];	
$this->estado = $laRow["estado"];	
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from persona where((cedula like '%$valor%') or (nacionaliad like '%$valor%') or (nombres like '%$valor%') or (apellidos like '%$valor%') or (sexo like '%$valor%') or (codigo_municipio like '%$valor%') or (direccion_detalla like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acCedula=$laRow['cedula'];
$this->acNacionaliad=$laRow['nacionaliad'];
$this->acNombres=$laRow['nombres'];
$this->acApellidos=$laRow['apellidos'];
$this->acSexo=$laRow['sexo'];
$this->acCodigo_municipio=$laRow['codigo_municipio'];
$this->acDireccion_detalla=$laRow['direccion_detalla'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>Cedula</td>
				<td style='font-weight:bold; font-size:20px;'>Nombres</td>
				<td style='font-weight:bold; font-size:20px;'>Apellidos</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNacionaliad."-".$this->acCedula."</td>
					<td>".$this->acNombres."</td>
					<td>".$this->acApellidos."</td>
					<td><a href='?txtcedula=".$laRow['cedula']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into persona(cedula,nacionaliad,nombres,apellidos,sexo,codigo_municipio,direccion_detalla)values('$this->acCedula','$this->acNacionaliad','$this->acNombres','$this->acApellidos','$this->acSexo','$this->acCodigo_municipio','$this->acDireccion_detalla')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update persona set cedula = '$this->acCedula', nacionaliad = '$this->acNacionaliad', nombres = '$this->acNombres', apellidos = '$this->acApellidos', sexo = '$this->acSexo', codigo_municipio = '$this->acCodigo_municipio', direccion_detalla = '$this->acDireccion_detalla' where(cedula = '$this->acCedula')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from persona where(cedula = '$this->acCedula')");
}
//fin clase
}?>