<?php
header('Access-Control-Allow-Origin: *');
//header("Access-Control-Allow-Headers: X-API-KEY, Origin, Authorization,X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
// Encabezado de contenido de acuerdo a lo que se va a devolver
header("Content-type: application/json; charset=utf-8");
// Permite solo el método POST para evitar errores
header("Access-Control-Allow-Methods: POST");
header("Allow: POST");

$host='localhost';
 $username='ziodbu';
 $password='25012020'; 
 $db_name='apiss'; 

 $connect_db = mysqli_connect($host, $username, $password, $db_name);


 $json = null;
 $React_APP_Data = file_get_contents("php://input"); 
 $Decode_React_APP_Data = json_decode($React_APP_Data, true);

if(!$connect_db)
{
	echo json_encode("Connection to DB Failed");
}
 
//Define your host here.
//$HostName = "localhost";
 
//Define your database name here.
//$DatabaseName = "apiss";
 
//Define your database username here.
//$HostUser = "ziodbu";
 
//Define your database password here.
//$HostPass = "25012020";
 
?>