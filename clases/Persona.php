<?php
class Persona{

    private $nombre;
    private $apellido;
    private $email;
    private $edad;
    private $id;

    public function __construct($nombre=0,$apellido=0,$email=0,$edad=0,$id=0){

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->edad = $edad;
        $this->id = $id;
    }

    public function listar($conexion)
    {
      $sql = $conexion->prepare("SELECT id,nombre,apellido,email,edad FROM alumnos");
      $sql->execute();
      $ver=$sql->fetchAll(PDO::FETCH_ASSOC);
      return $ver;
    }
    public function crear($conexion)
    {
      $sql=$conexion->prepare("INSERT into alumnos (nombre,apellido,email,edad)
                                  values (?,?,?,?)");
      $sql->bindParam(1, $this->nombre, PDO::PARAM_STR);
      $sql->bindParam(2, $this->apellido, PDO::PARAM_STR);
      $sql->bindParam(3, $this->email, PDO::PARAM_STR);
      $sql->bindParam(4, $this->edad, PDO::PARAM_INT);
      $sql->execute();
      $correcto=$sql->rowCount();
      return $correcto;
    }
    public function actualizar($conexion)
    {
      $sql = $conexion->prepare("UPDATE alumnos SET nombre = :nombre, apellido= :apellido, email= :email, edad= :edad
        WHERE id = :id");
      $sql->execute(array(
                      ':id'   => $this->id,
                      ':nombre' => $this->nombre,
                      ':apellido' => $this->apellido,
                      ':email' => $this->email,
                      ':edad' => $this->edad
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

/*$persona= new Persona('pedro','perez','asd',1);
$nombre=$persona->getNombre();
$id=$persona->getId();
echo "$nombre"."$id";*/

 ?>
