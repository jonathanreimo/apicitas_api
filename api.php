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
  $sql = "INSERT INTO librodos (nombre, edicion) VALUES (:nombre,:edicion)";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':nombre', $nombre);
  $consulta->bindParam(':edicion', $edicion);
  $consulta->execute();

  return '{"msg":"usuario agregado"}';
}


public function deleteLibro($id){
  $conexion = new Conexion();
  $db = $conexion->getConexion();
  $sql = "INSERT INTO librotres (fecha, hora) SELECT nombre, edicion FROM libro WHERE id=:id";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':id', $id);
  $consulta->execute();
  $sqldos = "DELETE FROM libro WHERE id=:id";
  $consultados = $db->prepare($sqldos);
  $consultados->bindParam(':id', $id);
  $consultados->execute();

  $sqltres = "SELECT * FROM librotres WHERE folio=:id";
  $consultatres = $db->prepare($sqltres);
  $consultatres->bindParam(':id', $id);
  $consultatres->execute();
  while($fila = $consultatres->fetch()) {
     $vector[] = array(
       "folio" => $fila['id']); }
  
  return '{"msg": "usuario eliminado";}'; $vector[0];
}

public function getLibro($id){
  $vector = array();
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