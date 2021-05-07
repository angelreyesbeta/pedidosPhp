<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class EgresoServicio
{


	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function listar($idservicio)
	{
		$sql="SELECT * FROM egresoservicio es WHERE es.servicio='$idservicio' ORDER by es.fechaHora asc";
		return ejecutarConsulta($sql);		
	}



	public function sumarEgreso($idservicio){
		$sql="SELECT SUM(es.valor) as total FROM egresoservicio es WHERE es.servicio='$idservicio'";
		return ejecutarConsulta($sql);
	}


	public function insertar($servicio,$usuario,$descripcion,$valor,$fechaHora) {

		$sql="INSERT INTO egresoservicio (servicio,usuario,descripcion,valor,fechaHora)
		VALUES ('$servicio','$usuario','$descripcion','$valor','$fechaHora')";
		return ejecutarConsulta($sql);
	}

	public function totalGasto($idservicio){
		$sql="SELECT SUM(es.valor) as totalGasto from egresoservicio es WHERE es.servicio='$idservicio' ";
		return ejecutarConsulta($sql);
	}

	public function eliminarEgreso($idEgreso){

		$sql="DELETE from egresoservicio  WHERE id='$idEgreso'";

		return ejecutarConsulta($sql);
	}


	//------------------------------------

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
	

	public function mostrar($idPedido)
	{
		$sql="SELECT * from detalleservicio ds WHERE ds.id='$idPedido'";
		return ejecutarConsulta($sql);
	}

		//Implementamos un método para editar registros
	public function editar($iddetalleServicio,$txtDescripcion,$txtCantidad,$txtValorU,$txtValorT,$txtCliente,$txtTelefono,$txtDireccion,$txtformaPago,$estado_Pago)
	{
		$sql="UPDATE detalleservicio SET descripcion='$txtDescripcion',cantidad='$txtCantidad',valorUnitario='$txtValorU',
		valorTotal='$txtValorT',cliente='$txtCliente',telefono='$txtTelefono',Direccion='$txtDireccion',formaPago='$txtformaPago',estado='$estado_Pago' WHERE id='$iddetalleServicio'";
		return ejecutarConsulta($sql);
	}

	public function resumenGastos($idservicio){
		$sql="SELECT s.id,s.inversion, SUM(es.valor) as gastos, (s.inversion-SUM(es.valor)) as saldo from servicio s INNER JOIN egresoservicio es on es.servicio=s.id WHERE s.id='$idservicio' GROUP by s.id";
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