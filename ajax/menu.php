<?php 
require_once "../modelos/Menu.php";

$menu=new Menu();

$idMenu=isset($_POST["idMenu"])? limpiarCadena($_POST["idMenu"]):"";
$nombre=isset($_POST["txtnombre"])? limpiarCadena($_POST["txtnombre"]):"";
$descripcion=isset($_POST["txtdescripcion"])? limpiarCadena($_POST["txtdescripcion"]):"";


switch ($_GET["op"]){

	case 'listar':
		$rspta=$menu->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button  class="btn btn-warning"  data-toggle="modal" data-target="#modalMenu" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->descripcion
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
		if (empty($idMenu)){

			//echo "Desde PHP ".$idCliente." ".$nombre." ".$apellido." ".$cedula." ".$telefono." ".$direccion;
			$rspta=$menu->insertar($nombre,$descripcion);
			echo $rspta ? "0" : "1";
		}
		else {

			//echo "Desde PHP ".$idCliente." ".$nombre." ".$apellido." ".$cedula." ".$telefono." ".$direccion;

			$rspta=$menu->editar($idMenu,$nombre,$descripcion);
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