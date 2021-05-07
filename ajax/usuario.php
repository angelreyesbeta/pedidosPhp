<?php 
session_start(); 
require_once "../modelos/Usuario.php";

$usuario=new Usuario();

//DATOS 
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";  
$txtcorreo=isset($_POST["txtcorreo"])? limpiarCadena($_POST["txtcorreo"]):"";
$txtpass=isset($_POST["txtpass"])? limpiarCadena($_POST["txtpass"]):"";





switch ($_GET["op"])
{
    case 'verificarLogin':

    $mensaje=false;
    $rspta=$usuario->verificarLogin($txtcorreo,$txtpass);
    $fetch=$rspta->fetch_object();
    



        if (isset($fetch))
        {
    
            $_SESSION['id']=$fetch->id;
            $_SESSION['mail']=$fetch->mail;
                
            $mensaje=true;
        }
            
        else
        {
            $mensaje=false;
        }
   

        
        echo $mensaje;
       

        

        break;


    

    



    case 'salir':

        //limpiamos variables de sesion
        session_unset();
        //Destruimos la Session
        session_destroy();
        //redireccionamos al login
        header("location: ../index.php");

    break;


}
?>