<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Cliente
{


	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function listar()
	{
		$sql="SELECT * FROM cliente ORDER by cliente.apellido ";
		return ejecutarConsulta($sql);		
	}


 	

	public function insertar($nombre,$apellido,$cedula,$telefono,$direccion)
	{
		$sql="INSERT INTO cliente (nombre,apellido,cedula,telefono,direccion)
		VALUES ('$nombre','$apellido','$cedula','$telefono','$direccion')";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idCliente)
	{
		$sql="SELECT * FROM cliente WHERE id='$idCliente'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function editar($idCliente,$nombre,$apellido,$cedula,$telefono,$direccion)
	{
		$sql="UPDATE cliente SET nombre='$nombre',apellido='$apellido',cedula='$cedula',telefono='$telefono',direccion='$direccion' WHERE id='$idCliente'";
		return ejecutarConsulta($sql);
	}


	//____________________________________________________________________

	//Implementamos un método para insertar registros
	

	//Implementamos un método para editar registros


	
	//Implementar un método para mostrar los datos de un registro a modificar
	

	//Implementar un método para listar los registros
	
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM categoria order by nombreCategoria ";
		return ejecutarConsulta($sql);		
	}
}

?>