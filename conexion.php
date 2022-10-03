<?php

class Conexion {
	
 public function getConexion(){
   $host = "localhost";  //127.0.0.1 0 localhost
   $db = "apiss";      //base de datos de mysql
   $user = "ziodbu";       // usuario de mysql
   $password = "25012020";       //contraseña de mysql

//conexion a la base datos utilizando pdo
 $db = new PDO("mysql:host=$host;dbname=$db;", $user, $password);

  return $db;
}

}

?>