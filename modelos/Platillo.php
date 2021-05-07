
<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Platillo
{


	//Implementamos nuestro constructor
	public function __construct()
	{

	}


	public function listar()
	{
		$sql="SELECT * FROM platillo ORDER by platillo.nombre";
		return ejecutarConsulta($sql);		
	}

	public function insertar($nombre,$descripcion)
	{
		$sql="INSERT INTO platillo (nombre,descripcion)
		VALUES ('$nombre','$descripcion')";
		return ejecutarConsulta($sql);
	}

	public function editar($idPlatillo,$nombre,$descripcion)
	{
		$sql="UPDATE platillo SET nombre='$nombre',descripcion='$descripcion' WHERE id='$idPlatillo'";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idPlatillo)
	{
		$sql="SELECT * FROM platillo WHERE id='$idPlatillo'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function select()
	{
		$sql="SELECT * FROM platillo order by nombre ";
		return ejecutarConsulta($sql);		
	}

	public function eliminarPlatillo($idPlatillo){
		$sql="DELETE FROM platillo WHERE id='$idPlatillo'";

		return ejecutarConsulta($sql);
	}

	////////////////////////////////////////////////////////

	//Implementamos un método para insertar registros


	//Implementamos un método para editar registros
	

	
	//Implementar un método para mostrar los datos de un registro a modificar
	

	//Implementar un método para listar los registros
	
	//Implementar un método para listar los registros y mostrar en el select
	
}

?>