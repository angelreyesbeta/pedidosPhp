<?php 
require_once "../modelos/Activo.php";

$activo=new Activo();

$idActivo=isset($_POST["idActivo"])? limpiarCadena($_POST["idActivo"]):"";
$idcategoria=isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";
$nombreActivo=isset($_POST["txtnombreActivoF"])? limpiarCadena($_POST["txtnombreActivoF"]):"";
$modelo=isset($_POST["txtmodeloActivoF"])? limpiarCadena($_POST["txtmodeloActivoF"]):"";
$serie=isset($_POST["txtserieActivoF"])? limpiarCadena($_POST["txtserieActivoF"]):"";
$codigo=isset($_POST["txtcodigoActivoF"])? limpiarCadena($_POST["txtcodigoActivoF"]):"";
$descripcion=isset($_POST["txtdescripcionActivoFijo"])? limpiarCadena($_POST["txtdescripcionActivoFijo"]):"";
$factura=isset($_POST["factura"])? limpiarCadena($_POST["factura"]):"";
$nomfactura=isset($_POST["nomfactura"])? limpiarCadena($_POST["nomfactura"]):"";

$txtnombreEquipo=isset($_POST["txtnombreEquipo"])? limpiarCadena($_POST["txtnombreEquipo"]):"";
$txtsistemaO=isset($_POST["txtsistemaO"])? limpiarCadena($_POST["txtsistemaO"]):"";
$txtkeyso=isset($_POST["txtkeyso"])? limpiarCadena($_POST["txtkeyso"]):"";
$txtkeyoffi=isset($_POST["txtkeyoffi"])? limpiarCadena($_POST["txtkeyoffi"]):"";
$idcdeo=isset($_POST["idcdeo"])? limpiarCadena($_POST["idcdeo"]):"";

$txtdiscoduro=isset($_POST["txtdiscoduro"])? limpiarCadena($_POST["txtdiscoduro"]):"";
$txtmemoriaram=isset($_POST["txtmemoriaram"])? limpiarCadena($_POST["txtmemoriaram"]):"";
$txtprocesador=isset($_POST["txtprocesador"])? limpiarCadena($_POST["txtprocesador"]):"";
$txtobservacion=isset($_POST["txtobservacion"])? limpiarCadena($_POST["txtobservacion"]):"";
$txtoffice=isset($_POST["txtoffice"])? limpiarCadena($_POST["txtoffice"]):"";


switch ($_GET["op"]){

	case 'inactivarActivo':
		$idActivo=$_POST["idActivo"];
        $rspta=$activo->inactivarActivo($idActivo);
        echo $rspta ? "0" : "1";
        //echo "id que me llega: ".$idActivo;
		break;
	case 'activarActivo':
		$idActivo=$_POST["idActivo"];
        $rspta=$activo->activarActivo($idActivo);
        echo $rspta ? "0" : "1";
		break;

	case 'guardaryeditar':

	$nombreF = $_FILES['factura']['name'];
	$fechaRegistro=date("Y-m-d");

	if(empty($nombreF))
	{
		
		if (empty($idActivo))
		{
			

			$factura="null";
			$rspta=$activo->insertar($idcategoria,$nombreActivo,$modelo,$serie,$codigo,$txtnombreEquipo,$txtsistemaO,$txtkeyso,$txtoffice,$txtkeyoffi,$idcdeo,$txtdiscoduro,$txtmemoriaram,$txtprocesador,$descripcion,$txtobservacion,$factura,$fechaRegistro);
			echo $rspta ? "0" : "1";

			/*echo $idcategoria.' - '.$nombreActivo.' - '.$modelo.' - '.$serie.' - '.$codigo.' - '.$txtnombreEquipo.' - '.
			$txtsistemaO.' - '.$txtkeyso.' - '.$txtoffice.' - '.$txtkeyoffi.' - '.$idcdeo.' - '.$txtdiscoduro.' - '.$txtmemoriaram.' - '.$txtprocesador.' - '.$descripcion.' - '.$txtobservacion.' - '.$factura.' - '.$fechaRegistro;*/
		}
		else 
		{
			if(empty($nomfactura))
			{
				$nomfactura="null";
			}

			$rspta=$activo->editar($idActivo,$idcategoria,$nombreActivo,$modelo,$serie,$codigo,$txtnombreEquipo,$txtsistemaO,$txtkeyso,$txtoffice,$txtkeyoffi,$idcdeo,$txtdiscoduro,$txtmemoriaram,$txtprocesador,$descripcion,$txtobservacion,$nomfactura);
			echo $rspta ? "2" : "1";

			//echo "la factura QUE TU TIENES ES: ".$nomfactura;
		}

		//echo "No se selecciono ninguna factura.";

	}
	else
	{
		
    	$ruta = $_FILES['factura']['tmp_name'];
    	$destino = "../files/facturas/".$nombreF;

    	if(copy($ruta,$destino))
    	{

			if (empty($idActivo))
			{
				$rspta=$activo->insertar($idcategoria,$nombreActivo,$modelo,$serie,$codigo,$txtnombreEquipo,$txtsistemaO,$txtkeyso,$txtoffice,$txtkeyoffi,$idcdeo,$txtdiscoduro,$txtmemoriaram,$txtprocesador,$descripcion,$txtobservacion,$factura,$nombreF);
				echo $rspta ? "0" : "1";
			}
			else 
			{
				$rspta=$activo->editar($idActivo,$idcategoria,$nombreActivo,$modelo,$serie,$codigo,$txtnombreEquipo,$txtsistemaO,$txtkeyso,$txtoffice,$txtkeyoffi,$idcdeo,$txtdiscoduro,$txtmemoriaram,$txtprocesador,$descripcion,$txtobservacion,$nombreF);
				echo $rspta ? "2" : "1";

			
			}
		}

		//echo "Seleccionaste la factura con el nombre: ".$nombreF;

	}

	
	
	break;

	

	case 'mostrar':
		$idA=$_POST["idActivoF"];
		$rspta=$activo->mostrarActivo($idA);
		$fetch=$rspta->fetch_object();
 		//Codificar el resultado utilizando json
 		echo json_encode($fetch);
 		//echo " te devuelvo tu id: ".$idA;
	break;

	case 'listar':
		$rspta=$activo->listar();
 		//Vamos a declarar un array
 		$data= Array();
 		
 		while ($reg=$rspta->fetch_object())
 		{
 			
 			if($reg->factura=="null")
 			{
 				$href="<a target='_blank' href='../vistas/notienefactura.php";
 			}
 			else
 			{
 				$href="<a target='_blank' href='../files/facturas/".$reg->factura;
 			}

 			$data[]=array(
 				"0"=>($reg->estado)?'<button  class="btn btn-warning" data-toggle="modal" data-target="#modalactivos" onclick="mostrar('.$reg->idActivo.')"><i class="fa fa-pencil"></i> 
 				<a href="activoEvento.php?idActivoE='.$reg->idActivo.'"></button> <button  class="btn btn-success"><i class="fa fa-wrench"></i></button></a>'.' <button class="btn btn-danger" onclick="inactivarActivo('.$reg->idActivo.')"><i class="fa fa-close"></i></button>':'<button  class="btn btn-warning" data-toggle="modal" data-target="#modalactivos" onclick="mostrar('.$reg->idActivo.')"><i class="fa fa-pencil"></i> 
 				<a href=""></button> <button  class="btn btn-success"><i class="fa fa-wrench"></i></button></a>'.' <button class="btn btn-primary" onclick="activarActivo('.$reg->idActivo.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->fechaRegistro,
 				"2"=>$reg->nombreCategoria,
 				"3"=>$reg->codigo,
 				"4"=>$reg->marca,
 				"5"=>$reg->serie,
 				"6"=>$reg->nomciudad,
 				"7"=>$href."'>".$reg->factura."</a>",
 				"8"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'

 				//"5"=>"<img src='../files/usuarios/".$reg->imagen."' height='70px' width='70px'  class='rounded-circle mx-auto' >"

 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case "selectCategoria":
		require_once "../modelos/Categoria.php";
		$categoria = new Categoria();

		$rspta = $categoria->select();
		echo '<option value=0>Seleccione Categoria</option>';
		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idCategoria . '>' . $reg->nombreCategoria . '</option>';
				}
	break;

	case "generarbarcode":

		$rspta1=$activoF->contaractivos();
		$fetch=$rspta1->fetch_object();
		$cantidad=$fetch->cantidad;

		$rspta2=$activoF->generarbarcode();


		$data= Array();

		while ($reg=$rspta2->fetch_object())
		{
 			$data[]=array($reg->codigo);
 		}
 		
 		echo json_encode($data);
	break;

	case "contActivos":

		$rspta1=$activo->contaractivos();
		$fetch=$rspta1->fetch_object();
		$cantidad=$fetch->cantidad;

 		
 		echo $cantidad;
	break;

	case "contaractivosCategoria":

		$idC=$_POST["idcate"];
		$rspta=$activo->contaractivosCategoria($idC);
		$fetch=$rspta->fetch_object();
 		//Codificar el resultado utilizando json
 		echo json_encode($fetch);


	break;


	
}
?>