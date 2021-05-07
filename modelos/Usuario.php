<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Usuario
{
	//Implementamos nuestro constructor


	public function __construct()
	{

	}





	public function verificarLogin($correo,$password)
    {
    	$sql="SELECT * from usuario u WHERE u.mail='$correo' and u.pass='$password'"; 
    	return ejecutarConsulta($sql);  
    }

    


	


}

?>