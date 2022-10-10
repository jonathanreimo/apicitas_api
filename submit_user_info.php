<?php

 
// Importing DBConfig.php file.
include ('DBConfig.php');


//$json = json_decode(file_get_contents('php://input'), true);



$First_Name = $Decode_React_APP_Data['First_Name'];
//$Last_Name = $Decode_React_APP_Data['Last_Name'];
$Email = $Decode_React_APP_Data['Email'];
//$Password = ($Decode_React_APP_Data['Password']); //password is un-hashed mean with no hacking capability(change to md5 for secure pass)


$query = "SELECT * FROM citas WHERE email = '$Email'";
$query_result = mysqli_query($connect_db, $query);

if (!mysqli_num_rows($query_result))
{
    $Reg_Query = "INSERT INTO citas (`name`, `email`) VALUES ('$First_Name', '$Email')";
    $Reg_Query_Result = mysqli_query($connect_db, $Reg_Query);

    if ($Reg_Query_Result) 
	{
        $Message = "Registered successfuly!";
    } else 
	{
        $Message = "Error - Try again";
    }
	
} else 
{
    $Message = "User Already Registered";
}

$response[] = array("Message" => $Message);

echo json_encode($response);


?>
