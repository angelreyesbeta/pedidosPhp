<?php 
require_once "../modelos/Principal.php";

$principal=new Principal();

switch ($_GET["op"]){

	case 'CantidadCliente':
		$rspta=$principal->CantidadCliente();
 		//Codificar el resultado utilizando json
 		$fetch=$rspta->fetch_object();
		$cantidad=$fetch->cantidad;

 		
 		echo $cantidad;

	break;



	//_______________________________________________________



	

	


	
}
?>