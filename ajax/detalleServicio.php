<?php 
require_once "../modelos/DetalleServicio.php";

$detalleServicio=new DetalleServicio();


$fechahora=isset($_POST["fechahora"])? limpiarCadena($_POST["fechahora"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$idServi=isset($_POST["idServi"])? limpiarCadena($_POST["idServi"]):"";

$iddetalleServicio=isset($_POST["iddetalleServicio"])? limpiarCadena($_POST["iddetalleServicio"]):"";
$txtDescripcion=isset($_POST["txtDescripcion"])? limpiarCadena($_POST["txtDescripcion"]):"";
$txtCantidad=isset($_POST["txtCantidad"])? limpiarCadena($_POST["txtCantidad"]):"";
$txtValorU=isset($_POST["txtValorU"])? limpiarCadena($_POST["txtValorU"]):"";
//$txtValorT=isset($_POST["txtValorT"])? limpiarCadena($_POST["txtValorT"]):"";
$txtCliente=isset($_POST["txtCliente"])? limpiarCadena($_POST["txtCliente"]):"";
$txtTelefono=isset($_POST["txtTelefono"])? limpiarCadena($_POST["txtTelefono"]):"";
$txtDireccion=isset($_POST["txtDireccion"])? limpiarCadena($_POST["txtDireccion"]):"";
$txtformaPago=isset($_POST["selectPago"])? limpiarCadena($_POST["selectPago"]):"";
$estado_Pago=isset($_POST["estadoPago"])? limpiarCadena($_POST["estadoPago"]):"";
$txtalgoMas=isset($_POST["txtalgoMas"])? limpiarCadena($_POST["txtalgoMas"]):"";

switch ($_GET["op"]){

    case 'listar':

        $idServicio=$_REQUEST["idServicios"];

        $rspta=$detalleServicio->listar($idServicio);
        //Vamos a declarar un array
        $data= Array();
        $estadoPago=0;

        while ($reg=$rspta->fetch_object()){
            if($reg->estado==0){
                $estadoPago='<span class="pull badge bg-red">Pendiente</span>';
            }
            elseif ($reg->estado==1) {
                $estadoPago='<span class="pull badge bg-green">Realizado</span> <span class="pull badge bg-yellow">'.$reg->formaPago.'</span>';
            }
            $data[]=array(
                "0"=>'<button  class="btn btn-warning" data-toggle="modal"
data-target="#modalPedidos" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button> '.'<button  class="btn btn-danger"  onclick="eliminarPedido('.$reg->id.')"><i class="fa fa-remove"></i></button>',
                "1"=>$reg->numeroPedido,
                "2"=>$reg->descripcion,
                "3"=>$reg->cantidad,
                "4"=>$reg->valorUnitario,
                "5"=>$reg->valorTotal,
                "6"=>$reg->cliente,
                "7"=>$reg->telefono,
                "8"=>$reg->fecha,
                "9"=>$estadoPago
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);

    break;

    case 'sumarPedidos':

        $idServicio=$_POST["idServicios"];
        $rspta=$detalleServicio->sumarPedidos($idServicio);
        $fetch=$rspta->fetch_object();
        //Codificar el resultado utilizando json
        echo ($fetch->total);


        break;

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

        case 'guardaryeditar':
        if (empty($iddetalleServicio)){

            $txtValorT=$txtValorU*$txtCantidad;

           
            $rspta=$detalleServicio->ultimoNumero();
            $fetch=$rspta->fetch_object();

            if(empty($fetch->numeroPedido))
            {
                $ultimonumero=0;
            }
            else
            {
                $ultimonumero=$fetch->numeroPedido;
            }
            $ultimonumero=$ultimonumero+1;

            $rspta=$detalleServicio->insertar($idServi,$idusuario,$ultimonumero,$txtDescripcion,$txtCantidad,$txtValorU,$txtValorT,$txtCliente,$txtTelefono,$txtDireccion,$txtalgoMas,$fechahora,$txtformaPago,$estado_Pago);
            echo $rspta ? "0" : "1";

            //echo "Desde PHP llega esto->  Fecha: ".$fechahora." - User: ".$idusuario." - Servicio: ".$idServi." - Descripcion ".$txtDescripcion." - Canti: ".$txtCantidad." - ValorU: ".$txtValorU." - ValorTo: ".$txtValorT." - Cliente: ".$txtCliente." - Telefono ".$txtTelefono." - Direccion ".$txtDireccion." - FormaPago ".$txtformaPago." - Estado ".$estado_Pago." - NumeroServicio ".$ultimonumero;
        }
        else {
            $txtValorT=$txtValorU*$txtCantidad;
            $rspta=$detalleServicio->editar($iddetalleServicio,$txtDescripcion,$txtCantidad,$txtValorU,$txtValorT,$txtCliente,$txtTelefono,$txtDireccion,$txtalgoMas,$txtformaPago,$estado_Pago);
            echo $rspta ? "2" : "1";
        }
    break;

    case 'mostrar':

        $rspta=$detalleServicio->mostrar($iddetalleServicio);
        $fetch=$rspta->fetch_object();
        //Codificar el resultado utilizando json
        echo json_encode($fetch); //"Desde php enviamos -> ".$iddetalleServicio; //
    break;

    case 'eliminarPedido':

        $idPedido=$_POST["idPedido"];
        $rspta=$detalleServicio->eliminarPedido($idPedido);
        //Codificar el resultado utilizando json
        echo $rspta;

        //echo "Desde PHP ".$idPedido;


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