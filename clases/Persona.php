<?php
class Persona{

    private $nombre;
    private $apellido;
    private $email;
    private $edad;
    private $id;

    public function __construct($nombre,$apellido,$email,$edad,$id=0){

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->edad = $edad;
        $this->id = $id;
    }
    //Getters

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function getId(){
        return $this->id;
    }

    //Setters

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setEdad($edad){
        $this->edad = $edad;
    }
    public function setId($id){
        $this->id = $id;
    }

}

/*$persona= new Persona('pedro','perez','asd',1);
$nombre=$persona->getNombre();
$id=$persona->getId();
echo "$nombre"."$id";*/

 ?>
