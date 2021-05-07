<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Activo
{


	//Implementamos nuestro constructor
	public function __construct()
	{

	}



	public function selectActivoF()
	{
		$sql="SELECT af.idActivo,af.nombreActivo, c.nombreCategoria,af.codigo FROM activofijo af INNER JOIN categoria c on af.idCategoria=c.idCategoria WHERE af.estado=1 ORDER by c.nombreCategoria";
		return ejecutarConsulta($sql);		
	}


	public function inactivarActivo($idActivo)
	{
		$sql="UPDATE activofijo SET estado='0' WHERE idActivo='$idActivo'";
		return ejecutarConsulta($sql);
	}
	public function activarActivo($idActivo)
	{
		$sql="UPDATE activofijo SET estado='1' WHERE idActivo='$idActivo'";
		return ejecutarConsulta($sql);
	}


	public function contaractivos()
	{
		$sql="SELECT COUNT(*) as cantidad FROM activofijo";
		return ejecutarConsulta($sql);
	}


	//----------------------_____________________________--------------------------

	//Implementamos un método para insertar registros
	public function insertar($idCategoria,$nombreActivo,$modelo,$serie,$codigo,$txtnombreEquipo,$txtsistemaO,$txtkeyso,$txtoffice,$txtkeyoffi,$idcdeo,$txtdiscoduro,$txtmemoriaram,$txtprocesador,$descripcion,$txtobservacion,$nombreF,$fechaRegistro)
	{
		$sql="INSERT INTO activofijo (idCategoria,nombreActivo,modelo,serie,codigo,nombreEquipo,sistemaO,keyso,office,keyoffi,centroOperacion,discoduro,memoryram,procesador,descripcion,observacion,factura,fechaRegistro,estado)
		VALUES ('$idCategoria','$nombreActivo','$modelo','$serie','$codigo','$txtnombreEquipo','$txtsistemaO','$txtkeyso','$txtoffice','$txtkeyoffi','$idcdeo','$txtdiscoduro','$txtmemoriaram','$txtprocesador','$descripcion','$txtobservacion','$nombreF','$fechaRegistro','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idActivo,$idCategoria,$nombreActivo,$modelo,$serie,$codigo,$txtnombreEquipo,$txtsistemaO,$txtkeyso,$txtoffice,$txtkeyoffi,$idcdeo,$txtdiscoduro,$txtmemoriaram,$txtprocesador,$descripcion,$txtobservacion,$nombreF)
	{
		$sql="UPDATE activofijo SET nombreActivo='$nombreActivo',idCategoria='$idCategoria',modelo='$modelo',serie='$serie',codigo='$codigo',nombreEquipo='$txtnombreEquipo',sistemaO='$txtsistemaO',keyso='$txtkeyso',office='$txtoffice',keyoffi='$txtkeyoffi',centroOperacion='$idcdeo',discoduro='$txtdiscoduro', memoryram='$txtmemoriaram', procesador='$txtprocesador',descripcion='$descripcion',observacion='$txtobservacion',factura='$nombreF' WHERE idActivo='$idActivo'";
		return ejecutarConsulta($sql);
	}

	
	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrarActivo($idActivo)
	{
		$sql="SELECT af.idActivo,af.nombreActivo, af.modelo,af.serie,af.codigo,af.descripcion,c.idCategoria,af.factura,af.nombreEquipo,af.sistemaO,af.keyso,af.office,af.keyoffi,af.centroOperacion,af.discoduro,af.memoryram,af.procesador,af.observacion from activofijo af INNER JOIN categoria c on af.idCategoria=c.idCategoria  WHERE af.idActivo='$idActivo'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT af.idActivo,af.fechaRegistro, af.codigo,af.nombreActivo as marca,af.modelo,c.nombreCategoria,ci.nomciudad,af.estado,af.factura,af.serie from activofijo af INNER JOIN categoria c on af.idCategoria=c.idCategoria INNER JOIN centrodeoperacion co on co.id=af.centroOperacion INNER JOIN ciudad ci on ci.id=co.ciudad ORDER by af.fechaRegistro desc ";
		//$sql="SELECT af.idActivo,af.fechaRegistro, af.codigo,af.nombreActivo as marca,af.modelo,c.nombreCategoria,af.estado,af.factura,af.serie from activofijo af INNER JOIN categoria c on af.idCategoria=c.idCategoria ORDER by af.fechaRegistro desc";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	

	public function generarbarcode()
	{
		$sql="SELECT af.codigo from activofijo af WHERE af.estado=1 ORDER BY af.codigo";
		return ejecutarConsulta($sql);		
	}



	public function contaractivosCategoria($idCategoria)
	{
		$sql="SELECT c.codigoinicial, COUNT(*) as cantidad from activofijo af INNER JOIN categoria c on c.idCategoria=af.idCategoria WHERE c.idCategoria='$idCategoria'";
		return ejecutarConsulta($sql);
	}

	

	
}

?>