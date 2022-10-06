<?php
 
// Importing DBConfig.php file.
include 'DBConfig.php';
 
// Creating connection.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 // Getting the received JSON into $json variable.
 $json = json_decode(file_get_contents('php://input') , true);
 // decoding the received JSON and store into $obj variable.
 //$obj = json_decode($json,true);
 
 // Populate name from JSON $obj array and store into $name.
//$name = $obj['name'];
 
// Populate email from JSON $obj array and store into $email.
//$email = $obj['email'];
 
// Populate phone number from JSON $obj array and store into $phone_number.
//$slot = $obj['slot'];
 
$query = "INSERT INTO citas (name, email, slot) values ('$json[name]', '$json[email]', '$json[slot]')";
 // Creating SQL query and insert the record into MySQL database table.
//$Sql_Query = "INSERT INTO citas (name, email, slot) values ('$name','$email','$slot')";


/*$sql = "SELECT * FROM slots WHERE slot='$json[slot]'";
 
$result = $con->query($sql);
 
 while($row[] = $result->fetch_assoc()) {
 
 //$tem = $row;
 $idsl = $row['id'];

 $Sql_Query2 = "DELETE FROM slots WHERE id='$idsl'";
 
 }*/


 
 
 if(mysqli_query($con, $sql, $query)){
 
    $message = 'Success!';
 // If the record inserted successfully then show the message.
//$MSG = 'Data Inserted Successfully into MySQL Database' ;
 
// Converting the message into JSON format.
//$json = json_encode($MSG);
 
// Echo the message.
 //echo $json ;
 
 }
 else{
 
    $message = 'Error! Try Again.';
 
 }
 echo json_encode($message);
 mysqli_close($con);
?>