<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, Authorization,X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Content-type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Allow: POST");

$host='localhost';
 $username='ziodbu';
 $password='25012020'; 
 $db_name='apiss'; 

 $connect_db = mysqli_connect($host, $username, $password, $db_name);


 $json = file_get_contents('php://input');
 $obj = json_decode($json, true);

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