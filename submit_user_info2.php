<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, Authorization,X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
// Encabezado de contenido de acuerdo a lo que se va a devolver
header("Content-type: application/json; charset=utf-8");
// Permite solo el método POST para evitar errores
header("Access-Control-Allow-Methods: POST");
header("Allow: POST");
 
// Importing DBConfig.php file.
include 'DBConfig.php';

$method = $_SERVER['REQUEST_METHOD'];

if($method == "POST"){
$message = '';
$connection = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
if ($connection->connect_error)
{
    die("Connection failed: " . $connection->connect_error);
}
//$json = json_decode(file_get_contents('php://input') , true);

$encodedData = file_get_contents('php://input');  // take data from react native fetch API
$decodedData = json_decode($encodedData, true);

$UserName = $decodedData['name'];
$UserEmail = $decodedData['email'];
//$UserPW = md5($decodedData['Password']); 

//$query = "INSERT INTO citas (name, email) values('$json[name]', '$json[email]')";
$query = "INSERT INTO citas (name, email) values('$UserName', '$UserEmail')";
$query_result = $connection->query($query);
if ($query_result === true)
{
    $message = 'Success!';
}
else
{
    $message = 'Error! Try Again.';
}
$res[] = array("message" => $message);

echo json_encode($res);

//echo json_encode($message);
}
?>
