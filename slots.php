<?php


    //Define your host here.
$HostName = "localhost";
 
//Define your database name here.
$DatabaseName = "apiss";
 
//Define your database username here.
$HostUser = "ziodbu";
 
//Define your database password here.
$HostPass = "25012020";
 
// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
 
$sql = "SELECT * FROM slots";
 
$result = $conn->query($sql);
 
if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $tem = $row;
 
 $json = json_encode($tem);
 
 
 }
 
} else {
 echo "No Results Found.";
}
 echo $json;
$conn->close();
?>