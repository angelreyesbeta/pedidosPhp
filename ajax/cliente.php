<?php 
require_once "../modelos/Cliente.php";

$cliente=new Cliente();

$idCliente=isset($_POST["idCliente"])? limpiarCadena($_POST["idCliente"]):"";
$nombre=isset($_POST["txtnombre"])? limpiarCadena($_POST["txtnombre"]):"";
$apellido=isset($_POST["txtapellido"])? limpiarCadena($_POST["txtapellido"]):"";
$cedula=isset($_POST["txtcedula"])? limpiarCadena($_POST["txtcedula"]):"";
$telefono=isset($_POST["txttelefono"])? limpiarCadena($_POST["txttelefono"]):"";
$direccion=isset($_POST["txtdireccion"])? limpiarCadena($_POST["txtdireccion"]):"";


switch ($_GET["op"]){

	case 'listar':
		$rspta=$cliente->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button  class="btn btn-warning"  data-toggle="modal" data-target="#modalCliente" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>',
 				"1"=>$reg->nombre.' '.$reg->apellido,
 				"2"=>$reg->telefono,
 				"3"=>$reg->direccion
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'guardaryeditar':
		if (empty($idCliente)){

			//echo "Desde PHP ".$idCliente." ".$nombre." ".$apellido." ".$cedula." ".$telefono." ".$direccion;
			$rspta=$cliente->insertar($nombre,$apellido,$cedula,$telefono,$direccion);
			echo $rspta ? "0" : "1";
		}
		else {

			//echo "Desde PHP ".$idCliente." ".$nombre." ".$apellido." ".$cedula." ".$telefono." ".$direccion;

			$rspta=$cliente->editar($idCliente,$nombre,$apellido,$cedula,$telefono,$direccion);
		    echo $rspta ? "2" : "1";
		}
	break;


	case 'mostrar':
		$idCliente2=$_POST["idCliente2"];
		$rspta=$cliente->mostrar($idCliente2);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);

		//echo "Estamos en mostrar";
	break;

	//_______________________________________________________



	

	


	
}
?>