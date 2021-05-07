<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Servicio
{


	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($descripcion,$txtInversion,
$txtprecioVenta,$txtcantidad,$fecha,$usuario)
	{

	$sql="INSERT INTO servicio (descripcion,inversion,precioVenta,cantidad,cantidadEstimada,fecha,usuario)
		VALUES ('$descripcion','$txtInversion','$txtprecioVenta','$txtcantidad','$txtcantidad', '$fecha','$usuario')";
	return ejecutarConsulta($sql);


	//$sql2="INSERT INTO detalleservicio (servicio,usuario,numeroPedido,descripcion,cantidad,valorUnitario,valorTotal,cliente,telefono,Direccion,fecha,formaPago,estado)
	//VALUES ('$servicio','$usuario','$numeroPedido','$descripcion','$cantidad','$valorUnitario','$valorTotal','$cliente','$telefono','$Direccion','$fecha','$formaPago','$estado')";



		
	}

	public function principalServicios()
	{
		/*$sql="SELECT s.id, s.descripcion,s.fecha,s.estado from servicio s order by s.fecha";*/

		$sql="SELECT s.id, s.descripcion,s.fecha,s.estado, SUM(ds.cantidad) as pedidos,SUM(ds.valorTotal) as Valtotal , s.cantidad from servicio s INNER JOIN detalleservicio ds on s.id=ds.servicio WHERE s.estado='1' GROUP BY s.id";


		 return ejecutarConsulta($sql);

		 
	}
	public function principalServiciosCerrado()
	{
		
		$sql="SELECT s.id, s.descripcion,s.fecha,s.estado, SUM(ds.cantidad) as cantidad,SUM(ds.valorTotal) as Valtotal from servicio s INNER JOIN detalleservicio ds on s.id=ds.servicio WHERE s.estado='0' GROUP BY s.id ORDER BY s.fecha DESC";


		 return ejecutarConsulta($sql);

		 
	}
	public function principalServiciosSinRegistro()
	{
		$sql="SELECT * from servicio s WHERE NOT EXISTS (SELECT null FROM detalleservicio ds WHERE ds.servicio=s.id) and s.estado=1";

	
		 return ejecutarConsulta($sql);

		 
	}
	

	public function mostrar($idservicio)
	{
		$sql="SELECT * from servicio WHERE servicio.id='$idservicio'";
		return ejecutarConsulta($sql);
	}

	public function cerrarServicio($idservicio)
	{
		$sql="UPDATE servicio SET estado='0' WHERE id='$idservicio'";
		return ejecutarConsulta($sql);
	}
	public function abrirServicio($idservicio)
	{
		$sql="UPDATE servicio SET estado='1' WHERE id='$idservicio'";
		return ejecutarConsulta($sql);
	}
	public function consulInversion($idservicio)
	{
		$sql="SELECT s.inversion,s.descripcion,s.precioVenta from servicio s WHERE s.id='$idservicio' ";
		return ejecutarConsulta($sql);
	}

	/*
	SELECT
(SELECT s.inversion from servicio s WHERE s.id=62) as inversion,
SUM(ds.cantidad) as SumaPedidos,
(SELECT COUNT(*) from detalleservicio ds WHERE ds.estado=0 AND ds.servicio=s.id) as Deben,
(SELECT SUM(ds.valorTotal) from detalleservicio ds WHERE ds.estado=0 AND ds.servicio=s.id) as ValorDeben,
(SELECT COUNT(*) from detalleservicio ds WHERE ds.estado=1 AND ds.servicio=s.id) as Pagos,
(SELECT SUM(ds.valorTotal) from detalleservicio ds WHERE ds.estado=1 AND ds.servicio=s.id) as ValorPagos,
(SELECT COUNT(*) from detalleservicio ds WHERE ds.formaPago='Transferencia' AND ds.servicio=s.id) as CantTransfe,
(SELECT COUNT(*) from detalleservicio ds WHERE ds.formaPago='Efectivo' AND ds.servicio=s.id) as CantEfectivo
FROM servicio s INNER JOIN detalleservicio ds on s.id=ds.servicio WHERE ds.servicio=62
	*/

	public function editar($idservicio,$txtDescripcion,$txtInversion,
$txtprecioVenta,$txtcantidad)
	{
		$sql="UPDATE servicio SET descripcion='$txtDescripcion',inversion='$txtInversion',precioVenta='$txtprecioVenta', cantidad='$txtcantidad' WHERE id='$idservicio'";
		return ejecutarConsulta($sql);
	}

	//____________________________________________________________

	//Implementamos un método para editar registros
	

	
	//Implementar un método para mostrar los datos de un registro a modificar


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