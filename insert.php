<?php
    $CN = mysqli_connect("localhost", "ziodbu", "25012020");
    $DB = mysqli_select_db($CN, "apiss");

    $EncodedData = file_get_contents('php://input');
    $DecodedData = json_decode($EncodedData, true);

    $m_no = $DecodedData['m_no'];
    $m_name = $DecodedData['m_name'];
    $m_course = $DecodedData['PickerValueHolder'];

    $insertMemberData = "INSERT INTO citas (name, email, slot) values ($m_no, '$m_name', '$m_course')";

    $register = mysqli_query($CN, $insertMemberData);

    if ($register) 
        $Message = "Registro hecho";
    else 
        $Message = "Error";

    $Response[] = array("Message" => $Message);
    echo json_encode($Response);
?>