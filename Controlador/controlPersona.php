<?php 
    include "../Modelo/Persona.php";
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $correo=$_POST['correo'];
    $clave=sha1($_POST['clave']);
    $listaPersonas = array();
   

        if(file_exists("../Modelo/contactos.csv")){
            $archivo = fopen("../Modelo/contactos.csv","r");
            while ($registroPersona = fgetcsv($archivo)){
                $nom = $registroPersona[0];
                $ape = $registroPersona[1];
                $email = $registroPersona[2];
                $password = $registroPersona[3];
                $persona = new Persona($nom, $ape, $email, $password);
                $listaPersonas[] = $persona;

            }
        }
    $i=0;
    $n=count($listaPersonas);
    while( $i<$n){
        if ($correo == $listaPersonas[$i]->getEmail()){
            break;
        }
            
        $i=$i+1;
        
    }
        
    if($i<$n){
        print("El correo ya existe");
    }
    else{
        $persona = new Persona($nombres, $apellidos, $correo, $clave);
        $persona->agregarPersona();
    }
?>