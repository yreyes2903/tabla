<?php

class Consulta

{

 public function listar($conexion)
 {
   $sql = $conexion->prepare("SELECT id,nombre,apellido,email,edad FROM alumnos");
   $sql->execute();
   $ver=$sql->fetchAll(PDO::FETCH_ASSOC);
   return $ver;
 }
 public function crear($conexion,$persona)
 {
   $sql=$conexion->prepare("INSERT into alumnos (nombre,apellido,email,edad)
                               values (?,?,?,?)");
   $sql->bindParam(1, $persona->getNombre(), PDO::PARAM_STR);
   $sql->bindParam(2, $persona->getApellido(), PDO::PARAM_STR);
   $sql->bindParam(3, $persona->getEmail(), PDO::PARAM_STR);
   $sql->bindParam(4, $persona->getEdad(), PDO::PARAM_INT);
   $sql->execute();
   $correcto=$sql->rowCount();
   return $correcto;
 }
 public function actualizar($conexion,$persona)
 {
   $sql = $conexion->prepare("UPDATE alumnos SET nombre = :nombre, apellido= :apellido, email= :email, edad= :edad
     WHERE id = :id");
   $sql->execute(array(
                   ':id'   => $persona->getId(),
                   ':nombre' => $persona->getNombre(),
                   ':apellido' => $persona->getApellido(),
                   ':email' => $persona->getEmail(),
                   ':edad' => $persona->getEdad()
                 ));
  $correcto=$sql->rowCount();
  return $correcto;

 }

 public function eliminar($conexion,$id)
 {
   $sql= $conexion->prepare("DELETE FROM alumnos WHERE id=?");
   $sql->execute([$id]);
   $correcto=$sql->rowCount();
   return $correcto;
 }

}


 ?>
