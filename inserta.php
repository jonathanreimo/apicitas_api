<?php
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, Authorization,X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Content-type: application/json; charset=utf-8");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Allow: GET, POST, OPTIONS, PUT, DELETE");
        
    $CN = mysqli_connect("localhost", "ziodbu", "25012020");
    $DB = mysqli_select_db($CN, "apiss");

    $EncodedData = file_get_contents('php://input');
    $DecodedData = json_decode($EncodedData, true);

    $m_no = $DecodedData['m_no'];
    $m_name = $DecodedData['m_name'];
    $m_course = $DecodedData['PickerValueHolder'];

    $insertMemberData = "INSERT INTO citas (name, email, slot) values ('$m_no', '$m_name', '$m_course')";

    $conn = mysqli_connect("localhost", "ziodbu", "25012020", "apiss");

    $consulta = "SELECT * FROM slots WHERE slot='$m_course'";
    $result = mysqli_query($conn,$consulta);
    $row = mysqli_fetch_row($result);
    $ids = $row[id];

    $deleteMemberData = "DELETE FROM slots WHERE id=$ids";

    $register = mysqli_query($CN, $insertMemberData, $deleteMemberData);

    if ($register) 
        $Message = "Registro hecho";
    else 
        $Message = "Error";

    $Response[] = array("Message" => $Message);
    echo json_encode($Response);
    
?>