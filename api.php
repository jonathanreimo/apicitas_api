<?php
 
class Api{

public function getLibros(){
     $vector = array();
     $conexion = new Conexion();
     $db = $conexion->getConexion();
     $sql = "SELECT * FROM libro";
     $consulta = $db->prepare($sql);
     $consulta->execute();
     while($fila = $consulta->fetch()) {
        $vector[] = array(
          "id" => $fila['id'],
          "nombre" => $fila['nombre'],
          "edicion" =>  $fila['edicion']); }

     return $vector;
}

public function addLibro($nombre, $edicion){
  
  $conexion = new Conexion();
  $db = $conexion->getConexion();
  $sql = "INSERT INTO libro (nombre, edicion) VALUES (:nombre,:edicion)";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':nombre', $nombre);
  $consulta->bindParam(':edicion', $edicion);
  $consulta->execute();

  return '{"msg":"usuario agregado"}';
}

public function deleteLibro($id){
  $conexion = new Conexion();
  $db = $conexion->getConexion();
  $sqldos = "SELECT id, nombre, edicion FROM libro WHERE id=:id";
  $consultados = $db->prepare($sqldos);
  if ($result->num_rows > 0) {
    // output data of each row
    while($filados = $result->fetch_assoc()) {
      $idtres = $filados["id"];
      $nombretres = $filados["nombre"];
      $ediciontres =  $filados["edicion"]; 
  }
  $sqltres = "INSERT INTO librodos (nombre, edicion) VALUES ('$nombretres', '$ediciontres')";
  $consultatres = $db->prepare($sqltres);
}
$sql = "DELETE FROM libro WHERE id=:id";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':id', $id); 
  $consulta->execute();

  return '{"msg":"usuario eliminado"}';
}

public function getLibro($id){
  $conexion = new Conexion();
  $db = $conexion->getConexion();
  $sql = "SELECT id, nombre, edicion FROM libro WHERE id=:id";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':id', $id);
  $consulta->execute();
  while($fila = $consulta->fetch()) {
     $vector[] = array(
       "id" => $fila['id'],
       "nombre" => $fila['nombre'],
       "edicion" =>  $fila['edicion']); }

  return $vector[0];
}

public function updateLibro($id, $nombre, $edicion){
  
  $conexion = new Conexion();
  $db = $conexion->getConexion();
  $sql = "UPDATE libro SET id=:id, nombre=:nombre, edicion=:edicion WHERE id=:id";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':id', $id);  
  $consulta->bindParam(':nombre', $nombre);
  $consulta->bindParam(':edicion', $edicion);
  $consulta->execute();

  return '{"msg":"usuario actualizado"}';
}



}
?>