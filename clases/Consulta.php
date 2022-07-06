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

class ConsultaGenerica
{
  protected $tabla;
  protected $sql=null;

  function __construct($tabla=null)
  {
    $this->tabla = $tabla;
  }

  public function listar($conexion)
  {
    $this->sql= $conexion->prepare("SELECT * FROM {$this->tabla}");
    $this->sql->execute();
    $ver=$this->sql->fetchAll(PDO::FETCH_ASSOC);
    return $ver;
  }

  public function crear($conexion,$obj)
  {
    $campos = implode(",", array_keys($obj));
    $valores = ":".implode(", :", array_keys($obj));
    $this->sql= $conexion->prepare( "INSERT INTO {$this->tabla} ({$campos}) VALUES ({$valores}) ");

    foreach ($obj as $llave => $valor) {
      //$this->sql->bindValue(":$llave", $valor);
      $tipo=gettype($valor);

      if ($tipo=="integer") {
        $this->sql->bindValue(":$llave", $valor, PDO::PARAM_INT);
      } else {
        $this->sql->bindValue(":$llave", $valor, PDO::PARAM_STR);
      }

    }
    $this->sql->execute();
    $correcto=$this->sql->rowCount();
    return $correcto;
  }

  public function actualizar($conexion,$obj,$id)
  {
    $campos="";
    foreach ($obj as $llave => $valor) {
      $campos .= "$llave=:$llave,";
    }
    $campos= rtrim($campos, ",");
    $this->sql= $conexion->prepare( "UPDATE {$this->tabla} SET $campos  WHERE id = :id");
    $this->sql->bindValue(":id", $id, PDO::PARAM_INT);
    foreach ($obj as $llave => $valor) {
      $tipo=gettype($valor);

      if ($tipo=="integer") {
        $this->sql->bindValue(":$llave", $valor, PDO::PARAM_INT);
      } else {
        $this->sql->bindValue(":$llave", $valor, PDO::PARAM_STR);
      }

    }
    $this->sql->execute();
    $correcto=$this->sql->rowCount();
    return $correcto;
  }

  public function eliminar($conexion,$id)
  {
    $this->sql= $conexion->prepare("DELETE FROM {$this->tabla} WHERE id = :id");
    $this->sql->bindValue(":id", $id, PDO::PARAM_INT);
    $this->sql->execute();
    $correcto=$this->sql->rowCount();
    return $correcto;
  }
}

 ?>
