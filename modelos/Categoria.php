<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Categoria
{


	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombreCategoria,$codigoinicial,$descripcion)
	{
		$sql="INSERT INTO categoria (nombreCategoria,codigoinicial,descripcion)
		VALUES ('$nombreCategoria','$codigoinicial','$descripcion')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idcategoria,$nombreCategoria,$codigoinicial,$descripcion)
	{
		$sql="UPDATE categoria SET nombreCategoria='$nombreCategoria',codigoinicial='$codigoinicial',descripcion='$descripcion' WHERE idcategoria='$idcategoria'";
		return ejecutarConsulta($sql);
	}

	
	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcategoria)
	{
		$sql="SELECT * FROM categoria WHERE idCategoria='$idcategoria'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM categoria ORDER by categoria.nombreCategoria";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM categoria order by nombreCategoria ";
		return ejecutarConsulta($sql);		
	}
}

?>