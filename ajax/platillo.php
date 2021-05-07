<?php 
require_once "../modelos/Platillo.php";

$platillo=new Platillo();

$idPlatillo=isset($_POST["idPlatillo"])? limpiarCadena($_POST["idPlatillo"]):"";
$nombrePlatillo=isset($_POST["txtNombre"])? limpiarCadena($_POST["txtNombre"]):"";
$descripcion=isset($_POST["txtDescripcion"])? limpiarCadena($_POST["txtDescripcion"]):"";



switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idPlatillo)){
			$rspta=$platillo->insertar($nombrePlatillo,$descripcion);
			echo $rspta ? "0" : "1";

			//echo 'Ok, desde php -> '.$nombrePlatillo.' '.$descripcion;
		}
		else {
			$rspta=$platillo->editar($idPlatillo,$nombrePlatillo,$descripcion);
			echo $rspta ? "2" : "1";
		}
	break;


	case 'mostrar':
		$rspta=$platillo->mostrar($idPlatillo);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$platillo->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button  class="btn btn-warning" data-toggle="modal" data-target="#modalPlatillos" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button> '.'<button  class="btn btn-danger"  onclick="eliminarPlatillo('.$reg->id.')"><i class="fa fa-remove"></i></button>',
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
	case 'eliminarPlatillo':
		$rspta=$platillo->eliminarPlatillo($idPlatillo);
		echo $rspta;
		# code...
		break;
}
?>