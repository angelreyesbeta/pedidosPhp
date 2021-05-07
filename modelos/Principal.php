<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Principal
{


	//Implementamos nuestro constructor
	public function __construct()
	{

	}



	public function CantidadCliente()
	{
		$sql="SELECT COUNT(*) as cantidad FROM cliente";
		return ejecutarConsulta($sql);		
	}



	

	
}

?>