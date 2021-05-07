<?php 
require_once "../modelos/Servicio.php";

$servicio=new Servicio();

$idservicio=isset($_POST["idservicio"])? limpiarCadena($_POST["idservicio"]):"";

$fechahora=isset($_POST["fechahora"])? limpiarCadena($_POST["fechahora"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$txtDescripcion=isset($_POST["txtDescripcion"])? limpiarCadena($_POST["txtDescripcion"]):"";
$txtInversion=isset($_POST["txtInversion"])? limpiarCadena($_POST["txtInversion"]):"";
$txtprecioVenta=isset($_POST["txtprecioVenta"])? limpiarCadena($_POST["txtprecioVenta"]):"";
$txtcantidad=isset($_POST["txtcantidad"])? limpiarCadena($_POST["txtcantidad"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idservicio)){
			$rspta=$servicio->insertar($txtDescripcion,$txtInversion,
$txtprecioVenta,$txtcantidad,$fechahora,$idusuario);
			echo $rspta ? "0" : "1";
		}
		else {
			$rspta=$servicio->editar($idservicio,$txtDescripcion,$txtInversion,
$txtprecioVenta,$txtcantidad);
			echo $rspta ? "2" : "1";
		}
	break;

	case 'principalServicios':
	 
	 	$rspta=$servicio->principalServicios();


       $data= Array();

        while ($reg=$rspta->fetch_object())
        {
            $data[]=array(
            	"0"=>$reg->descripcion,
            	"1"=>$reg->id,
            	"2"=>$reg->fecha,
            	"3"=>$reg->estado,
                "4"=>$reg->cantidad,
                "5"=>$reg->Valtotal,
                "6"=>$reg->cantidad
            );
        }
        
        echo json_encode($data);
		break;

    case 'principalServiciosCerrado':
     
        $rspta=$servicio->principalServiciosCerrado();


       $data= Array();

        while ($reg=$rspta->fetch_object())
        {
            $data[]=array(
                "0"=>$reg->descripcion,
                "1"=>$reg->id,
                "2"=>$reg->fecha,
                "3"=>$reg->estado,
                "4"=>$reg->cantidad,
                "5"=>$reg->Valtotal
            );
        }
        
        echo json_encode($data);
        break;

        case 'principalServiciosSinRegistro':
     
        $rspta=$servicio->principalServiciosSinRegistro();


       $data= Array();

        while ($reg=$rspta->fetch_object())
        {
            $data[]=array(
                "0"=>$reg->descripcion,
                "1"=>$reg->id,
                "2"=>$reg->fecha,
                "3"=>$reg->estado
               


            );
        }
        
        echo json_encode($data);
        break;

	case 'mostrar':

        $idServicio=$_POST["idServicios"];
        $rspta=$servicio->mostrar($idServicio);
        $fetch=$rspta->fetch_object();
        //Codificar el resultado utilizando json
        echo json_encode($fetch);
        //echo " te devuelvo tu id: ".$idU;
    break;
    case 'cerrarServicio':

        $idServicio=$_POST["idServicios"];
        $rspta=$servicio->cerrarServicio($idServicio);
        
        echo $rspta ? "0" : "1";

        //echo " te devuelvo tu id: ".$idU;
    break;
    case 'abrirServicio':

        $idServicio=$_POST["idServicios"];
        $rspta=$servicio->abrirServicio($idServicio);

        echo $rspta ? "0" : "1";
        
        //echo " te devuelvo tu id: ".$idU;
    break;

    case 'consulInversion':

        $idServicio=$_POST["idServicios"];
        $rspta=$servicio->consulInversion($idServicio);
        $fetch=$rspta->fetch_object();
        //Codificar el resultado utilizando json
        echo json_encode($fetch);
        
        //echo " te devuelvo tu id: ".$idU;
    break;



//____________________________________
	



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