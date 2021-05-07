<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class DetalleServicio
{


	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function listar($idservicio)
	{
		$sql="SELECT * FROM detalleservicio ds WHERE ds.servicio='$idservicio' ORDER by ds.numeroPedido desc";
		return ejecutarConsulta($sql);		
	}

	public function sumarPedidos($idservicio){
		$sql="SELECT SUM(ds.cantidad) as total FROM detalleservicio ds WHERE ds.servicio='$idservicio'";
		return ejecutarConsulta($sql);
	}

	public function cantPorPagar($idservicio)
	{
		$sql="SELECT COUNT(*) as cantPorPagar FROM detalleservicio ds WHERE ds.estado=0 AND ds.servicio='$idservicio'";
		return ejecutarConsulta($sql);
	}
	public function valorPorPagar($idservicio)
	{
		$sql="SELECT SUM(ds.valorTotal) as Valtotal FROM detalleservicio ds WHERE ds.servicio='$idservicio' and ds.estado=0";
		return ejecutarConsulta($sql);
	}

	public function cantPedidosPagos($idservicio)
	{
		$sql="SELECT COUNT(*) as cantPago FROM detalleservicio ds WHERE ds.estado=1 AND ds.servicio='$idservicio'";
		return ejecutarConsulta($sql);
	}
	public function valorIngreso($idservicio)
	{
		$sql="SELECT SUM(ds.valorTotal) as Valtotal FROM detalleservicio ds WHERE ds.servicio='$idservicio' and ds.estado=1";
		return ejecutarConsulta($sql);
	}

	public function ultimoNumero()
	{
		$sql="SELECT ds.numeroPedido from detalleservicio ds order by id desc limit 1";
		return ejecutarConsulta($sql);
	}
	public function cantPagosTransferencia($idservicio)
	{
		$sql="SELECT COUNT(*) as cantTransfe FROM detalleservicio ds WHERE ds.formaPago='Transferencia' and ds.servicio='$idservicio'";
		return ejecutarConsulta($sql);
	}
	public function cantPagosEfectivo($idservicio)
	{
		$sql="SELECT COUNT(*) as cantEfectivo FROM detalleservicio ds WHERE ds.formaPago='Efectivo' and ds.servicio='$idservicio'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para insertar registros
	public function insertar($servicio,$usuario,$numeroPedido,$descripcion,$cantidad,$valorUnitario,$valorTotal,$cliente,$telefono,$Direccion,$algoMas,$fecha,$formaPago,$estado) {

		$sql="INSERT INTO detalleservicio (servicio,usuario,numeroPedido,descripcion,cantidad,valorUnitario,valorTotal,cliente,telefono,Direccion,algoMas,fecha,formaPago,estado)
		VALUES ('$servicio','$usuario','$numeroPedido','$descripcion','$cantidad','$valorUnitario','$valorTotal','$cliente','$telefono','$Direccion','$algoMas','$fecha','$formaPago','$estado')";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idPedido)
	{
		$sql="SELECT * from detalleservicio ds WHERE ds.id='$idPedido'";
		return ejecutarConsulta($sql);
	}

		//Implementamos un método para editar registros
	public function editar($iddetalleServicio,$txtDescripcion,$txtCantidad,$txtValorU,$txtValorT,$txtCliente,$txtTelefono,$txtDireccion,$algoMas,$txtformaPago,$estado_Pago)
	{
		$sql="UPDATE detalleservicio SET descripcion='$txtDescripcion',cantidad='$txtCantidad',valorUnitario='$txtValorU',
		valorTotal='$txtValorT',cliente='$txtCliente',telefono='$txtTelefono',Direccion='$txtDireccion',algoMas='$algoMas',formaPago='$txtformaPago',estado='$estado_Pago' WHERE id='$iddetalleServicio'";
		return ejecutarConsulta($sql);
	}

	public function eliminarPedido($idPedido){

		$sql="DELETE from detalleservicio  WHERE id='$idPedido'";

		return ejecutarConsulta($sql);
	}


	
	

	//______________________________________________________

	

	public function principalServicios()
	{
		$sql="SELECT s.id, s.descripcion,s.fecha,s.estado from servicio s order by s.fecha";
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

	//____________________________________________________________


	
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