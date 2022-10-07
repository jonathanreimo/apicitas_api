<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: x-api-key, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
// Encabezado de contenido de acuerdo a lo que se va a devolver
header("Content-type: application/json; charset=utf-8");
// Permite solo el método POST para evitar errores
header("Access-Control-Allow-Methods: POST");
header("Allow: POST");
 
// Importing DBConfig.php file.
include 'DBConfig.php';

$message = '';
$connection = new mysqli($host_name, $host_user, $host_password, $database_name);
if ($connection->connect_error)
{
    die("Connection failed: " . $connection->connect_error);
}
$json = json_decode(file_get_contents('php://input') , true);
$query = "INSERT INTO citas(name, email) values('$json[name]', '$json[email]')";
$query_result = $connection->query($query);
if ($query_result === true)
{
    $message = 'Success!';
}
else
{
    $message = 'Error! Try Again.';
}
echo json_encode($message);
$connection->close();
?>
