<?php
class Persona{
   
    private $nombres;
    private $apellidos;
    private $email;
    private $password;
    

    public function __construct($nombres=null, $apellidos=null, $email=null, $password=null){

        
        $this->nombres=$nombres;
        $this->apellidos=$apellidos;
        $this->email=$email;
        $this->password=$password;
    }

 

    public function getNombres(){
        return $this->nombres;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPaswword(){
        return $this->password;
    }

    public function agregarPersona(){
        $datosPersona = array();
        $datosPersona[] = $this->getNombres();
        $datosPersona[] = $this->getApellidos();
        $datosPersona[] = $this->getEmail();
        $datosPersona[] = $this->getPaswword();
        if(!file_exists("../Modelo/contactos.csv")){
            $archivo = fopen("../Modelo/contactos.csv", "w");
            fputcsv($archivo, $datosPersona);
            fclose($archivo);
        }
        else{
            $archivo = fopen("../Modelo/contactos.csv", "a+");
            fputcsv($archivo, $datosPersona);
            fclose($archivo);
        }


    }

   
}
?>