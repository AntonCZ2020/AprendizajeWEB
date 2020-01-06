<?php
     include "../Modelo/Persona.php";
    $correo = $_POST['email'];
    $clave=sha1($_POST['password']);
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
    if (($correo == $listaPersonas[$i]->getEmail()) && ($clave == $listaPersonas[$i]->getPassword())){
        break;
    }
        
    $i=$i+1;
    
}


if ($i<$n)
{
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $correo;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
   
    echo "Bienvenido a la pagina privada";

}
else
{
    echo "Acceso denegado";
}
?>