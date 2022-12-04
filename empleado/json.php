<?php 

$server = "localhost";
$user = "root";
$pass = "";
$bd = "nissaya";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT * FROM empleado";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$clientes = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
	$Id_Empleado=$row['Id_Empleado'];
    $curp=$row['curp'];
	$nombres=$row['nombres'];
	$apellidos=$row['apellidos'];
	$Telefono=$row['Telefono'];
	
	

	$empleado[] = array('Id_Empleado'=> $Id_Empleado,'curp'=> $curp,  'nombres'=> $nombres, 'apellidos'=> $apellidos,
						'Telefono'=> $Telefono);

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($empleado);
echo $json_string;

//Si queremos crear un archivo json
$file = 'empleado.json';
file_put_contents($file, $json_string);


?>