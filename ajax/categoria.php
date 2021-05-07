<?php 
require_once "../modelos/Categoria.php";

$categoria=new Categoria();

$idcategoria=isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";
$nombreCategoria=isset($_POST["txtnombreCategoria"])? limpiarCadena($_POST["txtnombreCategoria"]):"";
$descripcion=isset($_POST["txtdescripcionCategoria"])? limpiarCadena($_POST["txtdescripcionCategoria"]):"";
$codigoinicial=isset($_POST["txtcodigoinicial"])? limpiarCadena($_POST["txtcodigoinicial"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idcategoria)){
			$rspta=$categoria->insertar($nombreCategoria,$codigoinicial,$descripcion);
			echo $rspta ? "0" : "1";
		}
		else {
			$rspta=$categoria->editar($idcategoria,$nombreCategoria,$codigoinicial,$descripcion);
			echo $rspta ? "2" : "1";
		}
	break;

	

	case 'mostrar':
		$rspta=$categoria->mostrar($idcategoria);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$categoria->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button  class="btn btn-warning" data-toggle="modal" data-target="#modalcategoria" onclick="mostrar('.$reg->idCategoria.')"><i class="fa fa-pencil"></i></button>',
 				"1"=>$reg->nombreCategoria,
 				"2"=>$reg->codigoinicial,
 				"3"=>$reg->descripcion
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
?>