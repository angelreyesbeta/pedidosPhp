<?php 

require_once "../modelos/RequestOrder.php";

$requestOrder=new RequestOrder();

$txtNameCompleto=isset($_POST["txtNameCompleto"])? limpiarCadena($_POST["txtNameCompleto"]):"";
$txtPhone=isset($_POST["txtPhone"])? limpiarCadena($_POST["txtPhone"]):"";
$txtAddress=isset($_POST["txtAddress"])? limpiarCadena($_POST["txtAddress"]):"";
$txtAddicional=isset($_POST["txtAddicional"])? limpiarCadena($_POST["txtAddicional"]):"";
$txtCantidad=isset($_POST["txtCantidad"])? limpiarCadena($_POST["txtCantidad"]):"";
$txtValorTotal=isset($_POST["txtValorTotal"])? limpiarCadena($_POST["txtValorTotal"]):"";
$fechahora=isset($_POST["fechahora"])? limpiarCadena($_POST["fechahora"]):"";
$txtValorU=isset($_POST["txtValorU"])? limpiarCadena($_POST["txtValorU"]):"";


//PARAMETROS QUEMADOS

$idServi=69;
$idusuario=2;
$txtDescripcion="Carne mechada para el 4 de octubre";
$txtformaPago=0;
$estado_Pago=0;





switch ($_GET["op"]){

	case 'saveOrder':
        
            $rspta=$requestOrder->ultimoNumero();
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

           // echo 'Desde php2 tenemos-> Numero de pedido: '.$ultimonumero.' Cliente: '.$txtNameCompleto.' Telefono: '.$txtPhone.' Direccion: '.$txtAddress.' algo mas: '.$txtAddicional.' Cantidad del producto: '.$txtCantidad.' Valor total a pagar: '.$txtValorTotal.' fecha: '.$fechahora.' Valor Uni-> '.$txtValorU;
           $rspta=$requestOrder->insertar($idServi,$idusuario,$ultimonumero,$txtDescripcion,$txtCantidad,$txtValorU,$txtValorTotal,$txtNameCompleto,$txtPhone,$txtAddress,$fechahora,$txtformaPago,$estado_Pago);
            echo $rspta;




		

	



	
}
?>