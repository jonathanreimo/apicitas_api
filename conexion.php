<?php

class Conexion {
	
 public function getConexion(){
   $host = "127.0.0.1";  //127.0.0.1 0 localhost
   $db = "backend_inertia";      //base de datos de mysql
   $user = "sail";       // usuario de mysql
   $password = "password";       //contraseña de mysql

//conexion a la base datos utilizando pdo
 $db = new PDO("mysql:host=$host;dbname=$db;", $user, $password);

  return $db;
}

}

?>