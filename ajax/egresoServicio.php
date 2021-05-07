<?php 
require_once "../modelos/EgresoServicio.php";

$egresoServicio=new EgresoServicio();


$fechahora=isset($_POST["fechahora2"])? limpiarCadena($_POST["fechahora2"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$idServi=isset($_POST["idServi2"])? limpiarCadena($_POST["idServi2"]):"";

$idEgresoServicio=isset($_POST["idEgresoServicio"])? limpiarCadena($_POST["idEgresoServicio"]):"";

$txtDescripcionEgreso=isset($_POST["txtDescripcionEgreso"])? limpiarCadena($_POST["txtDescripcionEgreso"]):"";
$txtValorEgreso=isset($_POST["txtValorEgreso"])? limpiarCadena($_POST["txtValorEgreso"]):"";



switch ($_GET["op"]){

    case 'listar':

        $idServicio=$_REQUEST["idServicios"];

        $rspta=$egresoServicio->listar($idServicio);
        //Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>'<button  class="btn btn-warning" data-toggle="modal"
data-target="#modalPedidos" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button> '.'<button  class="btn btn-danger"  onclick="eliminarEgreso('.$reg->id.')"><i class="fa fa-remove"></i></button>',
                "1"=>$reg->descripcion,
                "2"=>$reg->valor,
                "3"=>$reg->fechaHora
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);

    break;

    case 'sumarEgreso':

        $idServicio=$_POST["idServicios"];
        $rspta=$egresoServicio->sumarEgreso($idServicio);
        $fetch=$rspta->fetch_object();
        //Codificar el resultado utilizando json
        echo ($fetch->total);


        break;



        case 'guardaryeditar':
        if (empty($idEgresoServicio)){

                   
           $rspta=$egresoServicio->insertar($idServi,$idusuario,$txtDescripcionEgreso,$txtValorEgreso,$fechahora);
          echo $rspta ? "0" : "1";

       
        }
        else {
            $txtValorT=$txtValorU*$txtCantidad;
            $rspta=$detalleServicio->editar($iddetalleServicio,$txtDescripcion,$txtCantidad,$txtValorU,$txtValorT,$txtCliente,$txtTelefono,$txtDireccion,$txtformaPago,$estado_Pago);
            echo $rspta ? "2" : "1";
        }
    break;

    case 'resumenGastos':
        $idServicio=$_POST["idServicios"];
        $rspta=$egresoServicio->resumenGastos($idServicio);
        $fetch=$rspta->fetch_object();
        //Codificar el resultado utilizando json
        echo json_encode($fetch);
        break;

        case 'eliminarEgreso':

            $idEgreso=$_POST["idEgreso"];
            $rspta=$egresoServicio->eliminarEgreso($idEgreso);
        //Codificar el resultado utilizando json
            echo $rspta;
            # code...
            break;


        //__________________________________________________________

    case 'cantPorPagar':

        $idServicio=$_POST["idServicios"];
        $rspta=$detalleServicio->cantPorPagar($idServicio);
        $fetch=$rspta->fetch_object();
        //Codificar el resultado utilizando json
        echo ($fetch->cantPorPagar);

        break;
    case 'valorPorPagar':

        $idServicio=$_POST["idServicios"];
        $rspta=$detalleServicio->valorPorPagar($idServicio);
        $fetch=$rspta->fetch_object();
        //Codificar el resultado utilizando json
        echo ($fetch->Valtotal);

        break;

        case 'cantPedidosPagos':

        $idServicio=$_POST["idServicios"];
        $rspta=$detalleServicio->cantPedidosPagos($idServicio);
        $fetch=$rspta->fetch_object();
        //Codificar el resultado utilizando json
        echo ($fetch->cantPago);

        break;
    case 'valorIngreso':

        $idServicio=$_POST["idServicios"];
        $rspta=$detalleServicio->valorIngreso($idServicio);
        $fetch=$rspta->fetch_object();
        //Codificar el resultado utilizando json
        echo ($fetch->Valtotal);

        break;
        case 'cantPagosTransferencia':

        $idServicio=$_POST["idServicios"];
        $rspta=$detalleServicio->cantPagosTransferencia($idServicio);
        $fetch=$rspta->fetch_object();
        //Codificar el resultado utilizando json
        echo ($fetch->cantTransfe);

        break;
        case 'cantPagosEfectivo':

        $idServicio=$_POST["idServicios"];
        $rspta=$detalleServicio->cantPagosEfectivo($idServicio);
        $fetch=$rspta->fetch_object();
        //Codificar el resultado utilizando json
        echo ($fetch->cantEfectivo);

        break;
    




    case 'mostrar':

        $rspta=$detalleServicio->mostrar($iddetalleServicio);
        $fetch=$rspta->fetch_object();
        //Codificar el resultado utilizando json
        echo json_encode($fetch); //"Desde php enviamos -> ".$iddetalleServicio; //
    break;




        


        

    //---------------------------------

	

	case 'principalServicios':
	 
	 	$rspta=$servicio->principalServicios();

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


//____________________________________
	



	
}
?>