var idServicio;
var estado=0;

let precioVenta=0.0;
let descripcionServicio='';

var inver;
var gasto;
var saldo;


function init()
{
	cargarServicios();
  listar();
  listar2();
  consultas();
  CargarGastos();

  $("#selectPago").hide();
  $("#btnIngPedido").hide();

	
}


function fecha()
{
  
var fechaActual=new Date();
  

  mesActual=fechaActual.getMonth();
  diaActual=fechaActual.getDay();
  diamesActual=fechaActual.getDate();
  añoActual=fechaActual.getFullYear();

  tiempoHora=fechaActual.getHours();
    tiempoMinuto=fechaActual.getMinutes();
    tiempoSegundos=fechaActual.getSeconds();
    mesActual=mesActual+1;

  mesActual=(mesActual<10)?"0"+mesActual:mesActual;
  diamesActual=(diamesActual<10)?"0"+diamesActual:diamesActual;

  var fechaH="";
  fechaH=añoActual+"-"+mesActual+"-"+diamesActual+" "+tiempoHora+":"+tiempoMinuto+":"+tiempoSegundos;
  $("#fechahora").val(fechaH);
  $("#fechahora2").val(fechaH);
  //alert(fechaH);
  //$("#txtfechahora").val(fechaH);
  //document.getElementById("fechahora").innerHTML=fechaH;

  
}

function cargarServicios()
{

    idServicio=document.getElementById("idServicio").value;

    var parametros={
                'idServicios':''+idServicio+'',
            };

            $.ajax({
            data: parametros,
            url: "../ajax/servicio.php?op=mostrar",
            type: "POST",
     
            success: function(datos)
            { 
              //alert(datos);
              data = JSON.parse(datos);
              //alert(data.descripcion+" - "+data.estado);
              switch(data.estado)
              {
                case "0":

                    color="bg-red";
                    estado="Cerrado";
                    funcion="abrirServicio();";
                    $("#btnIngPedido").hide();

                break;
                case "1":

                    color="bg-green";
                    estado="Abierto";
                    funcion="cerrarServicio();";
                    $("#btnIngPedido").show();

                break;
              }


               document.getElementById("descripcionServicioID").innerHTML='<strong class="text-green">'+data.descripcion+'</strong>'+  
        '<small>- Estado del Servicio </small>'+ 
               ' <span class="pull badge '+color+'" onclick="'+funcion+'">'+estado+'</span> <br>';
              document.getElementById("descripcionServicioID2").innerHTML='<strong class="text-green">'+data.descripcion+'</strong>';
              
            
                //document.getElementById("containerCargando").style.display="none";
                //document.getElementById("nombreUsuario").innerHTML=data.nombre+" "+data.apellido;
                //document.getElementById("cargoUsuario").innerHTML=data.cargo+" - "+data.nomciudad;
                //$("#imagenUsuario").attr("src","../files/usuarios/"+data.imagen);

            }

        });





}

function consultas()
{

    idServicio=document.getElementById("idServicio").value;

    var parametros={
                'idServicios':''+idServicio+'',
            };

            $.ajax({
            data: parametros,
            url: "../ajax/detalleServicio.php?op=sumarPedidos",
            type: "POST",
     
            success: function(datos)
            { 
              
              //data = JSON.parse(datos);
              //alert(data.descripcion+" - "+data.estado);
              if(datos=="")
              {
                variable=0
              }
              else{
                variable=datos;
              }


               document.getElementById("idCantPedidos").innerHTML=variable;
              
            
                //document.getElementById("containerCargando").style.display="none";
                //document.getElementById("nombreUsuario").innerHTML=data.nombre+" "+data.apellido;
                //document.getElementById("cargoUsuario").innerHTML=data.cargo+" - "+data.nomciudad;
                //$("#imagenUsuario").attr("src","../files/usuarios/"+data.imagen);

            }

        });
            $.ajax({
            data: parametros,
            url: "../ajax/detalleServicio.php?op=cantPorPagar",
            type: "POST",
     
            success: function(datos)
            { 
              
               document.getElementById("idCantPorPagar").innerHTML=datos;
              
            }

        });

            $.ajax({
            data: parametros,
            url: "../ajax/detalleServicio.php?op=valorPorPagar",
            type: "POST",
     
            success: function(datos)
            { 
              if(datos=="")
              {
                variable=0
              }
              else{
                variable=datos;
              }
              
               document.getElementById("idValorPorPagar").innerHTML=variable;
              
            }

        });

            $.ajax({
            data: parametros,
            url: "../ajax/detalleServicio.php?op=cantPedidosPagos",
            type: "POST",
     
            success: function(datos)
            { 
              if(datos=="")
              {
                variable=0
              }
              else{
                variable=datos;
              }
              
               document.getElementById("idCantPedidosPagos").innerHTML=variable;
              
            }

        });

            $.ajax({
            data: parametros,
            url: "../ajax/detalleServicio.php?op=valorIngreso",
            type: "POST",
     
            success: function(datos)
            { 
              if(datos=="")
              {
                variable=0
              }
              else{
                variable=datos;
              }
              
               document.getElementById("idValorIngresos").innerHTML=variable;
              
            }

        });
        $.ajax({
            data: parametros,
            url: "../ajax/detalleServicio.php?op=cantPagosTransferencia",
            type: "POST",
     
            success: function(datos)
            { 
              if(datos=="")
              {
                variable=0
              }
              else{
                variable=datos;
              }
              
               document.getElementById("idCantTransfe").innerHTML=variable;
              
            }

        });
        $.ajax({
            data: parametros,
            url: "../ajax/detalleServicio.php?op=cantPagosEfectivo",
            type: "POST",
     
            success: function(datos)
            { 
              if(datos=="")
              {
                variable=0
              }
              else{
                variable=datos;
              }
              
               document.getElementById("idCantEfectivo").innerHTML=variable;
              
            }

        });

        $.ajax({
            data: parametros,
            url: "../ajax/egresoServicio.php?op=sumarEgreso",
            type: "POST",
     
            success: function(datos)
            { 
              if(datos=="")
              {
                variable=0
              }
              else{
                variable=datos;
              }
              
               document.getElementById("idEgresos").innerHTML=variable;
               document.getElementById("idSumGastos").innerHTML='<h1>Gastos: '+variable+'</h1>';
              gasto=variable;

            }

        });

        $.ajax({
            data: parametros,
            url: "../ajax/servicio.php?op=consulInversion",
            type: "POST",
     
            success: function(datos)
            { 
              data = JSON.parse(datos);

              descripcionServicio=data.descripcion
              precioVenta=data.precioVenta;
              //$("#txtDescripcion").val(descripcionServicio);
              $("#txtDescripcion").val(data.descripcion);
              $("#txtValorU").val(data.precioVenta);
              //alert('datos: '+precioVenta+' '+descripcionServicio);
              if(data.inversion=="")
              {
                variable=0
              }
              else{
                variable=data.inversion;
              }
              
               document.getElementById("idInversion").innerHTML=variable;
               document.getElementById("idInversion2").innerHTML='<h1> Inversión: '+variable+'</h1>';

               $("#idprueba22").val(variable);
               inver=document.getElementById("idprueba22").value;
               //alert(inver);
            }

        });

        
         //inver=document.getElementById("idprueba22").value;
         //gasto=document.getElementById("idSumGastos").value;   
         //saldo=inver-gasto;

         //alert('Eeeeeeeel gasto es. -> '+gasto);

       

        // document.getElementById("idSaldoActual").innerHTML=saldo;

        


}       



function listar()
{
  tabla=$('#bootstrap-data-table').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      buttons: [              
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
    "ajax":
        {
          url: '../ajax/detalleServicio.php?op=listar',
          data:{idServicios : idServicio},
          type : "get",
          dataType : "json",            
          error: function(e){
            console.log(e.responseText);  
          }
        },
    "bDestroy": true,
    "iDisplayLength": 15,//Paginación
      "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
  }).DataTable();
}
function listar2()
{
  tabla2=$('#bootstrap-data-table2').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      buttons: [              
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
    "ajax":
        {
          url: '../ajax/egresoServicio.php?op=listar',
          data:{idServicios : idServicio},
          type : "get",
          dataType : "json",            
          error: function(e){
            console.log(e.responseText);  
          }
        },
    "bDestroy": true,
    "iDisplayLength": 5,//Paginación
      "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
  }).DataTable();
}






function abrirServicio()
{
  var opcion = confirm("Está Seguro de abrir este Servicio?");
    if (opcion == true) 
    {
       // alert("el id a activar es: "+idPublicacion);
       $.post("../ajax/servicio.php?op=abrirServicio", {idServicios : idServicio}, function(e){
            
              document.getElementById("descripcionServicioID").innerHTML="";
              cargarServicios();
              
              
          }); 
  } 

}
function cerrarServicio()
{
  var opcion = confirm("Está Seguro de Cerrar este Servicio?");
    if (opcion == true) 
    {
       // alert("el id a activar es: "+idPublicacion);
       $.post("../ajax/servicio.php?op=cerrarServicio", {idServicios : idServicio}, function(e){
            
              document.getElementById("descripcionServicioID").innerHTML="";
              cargarServicios();
         
              
          }); 
  } 

}

function ingresarPedido()
{

  fecha();

  
  
  var descri,cantidad,valorU,valorT,cliente,tele,dire,idusuario,fechahora,idservi;

  idusuario=document.getElementById("idusuario").value;
  fechahora=document.getElementById("fechahora").value;
  descri=document.getElementById("txtDescripcion").value;

  cantidad=document.getElementById("txtCantidad").value;
  valorU=document.getElementById("txtValorU").value;
  //valorT=document.getElementById("txtValorT").value;
  cliente=document.getElementById("txtCliente").value;
  tele=document.getElementById("txtTelefono").value;
  dire=document.getElementById("txtDireccion").value;
  $("#idServi").val(idServicio);
  idservi=document.getElementById("idServi").value;



  if(tele===""||idservi==="" || descri==="" || idusuario==="" || fechahora===""|| cantidad==="" || valorU===""|| cliente===""||dire==="")
  {
    document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-danger alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-warning"></i> Alerta!</h4>'+
                'Debes llenar los campos requerido por el sistema.(*)';
  }
  else
  {
    //alert("Ingresaste : Id Servicio "+idservi+" "+descri+ " y el idusuario es: "+idusuario+" fecha : "+fechahora+" "+cantidad+" "+valorU+" "+valorT+" "+cliente+" "+tele+" "+dire);
    var formData = new FormData($("#frmPedido")[0]);

    $.ajax({
      url: "../ajax/detalleServicio.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos)
        { 
          /*document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-success alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-check"></i> Registro!</h4>'+datos;*/
                
           if(datos==="0")
             {

              document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-success alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-check"></i> Registro!</h4>'+
                'Se registro un nuevo Pedido'; 

          

                limpiarAgregarPedidos2();

                tabla.ajax.reload();
                listar(); 
                consultas();   
             }
            else
            {
              if(datos==="2")
              {
                document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-warning alert-dismissible">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                  '<h4><i class="icon fa fa-check"></i> Actulizacion!</h4>'+
                  'Se actulizo la infomación del pedido';


                 
                tabla.ajax.reload();
                listar();  
                consultas();
              }
              else
              {
                alert("Error !"+datos);
                  //limpiarRegistro();
              }
                
            } 
        }

    });
  }
}


function mostrar(idPedido)
{
  document.getElementById("container").innerHTML="";
  $.post("../ajax/detalleServicio.php?op=mostrar",{iddetalleServicio : idPedido}, function(data, status)
  {

 
    data = JSON.parse(data);
    
    $("#iddetalleServicio").val(data.id);  
    $("#txtDescripcion").val(data.descripcion);
    $("#txtCantidad").val(data.cantidad);
    $("#txtValorU").val(data.valorUnitario);
    $("#txtCliente").val(data.cliente);
    $("#txtTelefono").val(data.telefono);
    $("#txtDireccion").val(data.Direccion);
    $("#txtalgoMas").val(data.algoMas);



    if(data.estado==1)
    {
      document.getElementById("checkEstadoPedido").checked = true;
      $("#selectPago").show();
      $("#selectPago").val(data.formaPago);

      
    }
    else
    {
      document.getElementById("checkEstadoPedido").checked = false;
      $("#selectPago").hide();
      $("#selectPago").val(0);
    }
    
   $("#estadoPago").val(data.estado);



  })


  
}





function estadoPagos()
{

      var condiciones = $("#checkEstadoPedido").is(":checked");
        if (condiciones) {
          
          $("#selectPago").show();
          estado=1;
           
           
            
          
        }
        else{
          estado=0;
          $("#selectPago").hide();
          $("#selectPago").val(0);

          //alert(estado);
        }

      $("#estadoPago").val(estado);

}

function limpiarAgregarPedidos(){
  document.getElementById("container").innerHTML="";
    
    $("#iddetalleServicio").val("");
   // $("#txtDescripcion").val("");
    $("#txtCantidad").val("");
   // $("#txtValorU").val("");
    $("#txtValorT").val("");
    $("#txtCliente").val("");
    $("#txtTelefono").val("");
    $("#txtDireccion").val("");

    $("#selectPago").hide();

    document.getElementById("checkEstadoPedido").checked = false; 

    estado=0;
    $("#estadoPago").val(estado);
}

function limpiarAgregarPedidos2(){


    $("#iddetalleServicio").val("");    
    $("#txtDescripcion").val("");
    $("#txtCantidad").val("");
    $("#txtValorU").val("");
    $("#txtValorT").val("");
    $("#txtCliente").val("");
    $("#txtTelefono").val("");
    $("#txtDireccion").val("");
    $("#txtalgoMas").val("");

    $("#selectPago").hide();

    document.getElementById("checkEstadoPedido").checked = false; 

    estado=0;
    $("#estadoPago").val(estado);
}


function ingresarGasto()
{

  fecha();

  
  
  var descri,valor

  $("#idServi2").val(idServicio);

  descri=document.getElementById("txtDescripcionEgreso").value;

  valor=document.getElementById("txtValorEgreso").value;




  if(descri==="" || valor==="")
  {
    document.getElementById("containerEgreso").innerHTML='<div id="divnotiaviso" class="alert alert-danger alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-warning"></i> Alerta!</h4>'+
                'Debes llenar los campos requerido por el sistema.(*)';
  }
  else
  {
    //alert("Ingresaste : Id Servicio "+idservi+" "+descri+ " y el idusuario es: "+idusuario+" fecha : "+fechahora+" "+cantidad+" "+valorU+" "+valorT+" "+cliente+" "+tele+" "+dire);
 
    var formData = new FormData($("#frmEgreso")[0]);

    $.ajax({
      url: "../ajax/egresoServicio.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos)
        { 
          /*document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-success alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-check"></i> Registro!</h4>'+datos;*/

               //alert(datos);
               
           if(datos==="0")
             {

              document.getElementById("containerEgreso").innerHTML='<div id="divnotiaviso" class="alert alert-success alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-check"></i> Registro!</h4>'+
                'Se registro un nuevo Gasto'; 

          

                //limpiarAgregarPedidos2();

                tabla.ajax.reload();
                listar2(); 
                consultas();   
             }
            else
            {
              if(datos==="2")
              {
                document.getElementById("containerEgreso").innerHTML='<div id="divnotiaviso" class="alert alert-warning alert-dismissible">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                  '<h4><i class="icon fa fa-check"></i> Actulizacion!</h4>'+
                  'Se actulizo la infomación del Gasto';


                 
                tabla2.ajax.reload();
                listar2();  
                consultas();
              }
              else
              {
                alert("Error !"+datos);
                  //limpiarRegistro();
              }
                
            } 
        }

    });
  }
}


function CargarGastos(){

  idServicio=document.getElementById("idServicio").value;

    var parametros={
                'idServicios':''+idServicio+'',
            };

            $.ajax({
            data: parametros,
            url: "../ajax/egresoServicio.php?op=resumenGastos",
            type: "POST",
     
            success: function(datos)
            { 
              
              //alert(datos);
              //data = JSON.parse(datos);
              //alert(data.descripcion+" - "+data.estado);
              


              // document.getElementById("idCantPedidos").innerHTML=variable;
           

            }

        });

}


function eliminarPedido(idPedido){

  var opcion = confirm("Seguro de Eliminar este pedido? jummm!");
    if (opcion == true) 
    {
       // alert("el id a activar es: "+idPublicacion);
       $.post("../ajax/detalleServicio.php?op=eliminarPedido", {idPedido : idPedido}, function(e){
            
             // document.getElementById("descripcionServicioID").innerHTML="";
              if(e){
                alert('Pedido Eliminado Manito');
                tabla.ajax.reload();
                listar();
                consultas();
              }else{
                alert('Como que hay un problema en QUERY');
                tabla.ajax.reload();
                listar();
              }
              
         
              
          }); 
  } 


  
}

function eliminarEgreso(idEgreso){

  var opcion = confirm("Seguro de Eliminar este Ingreso? jummm!");
    if (opcion == true) 
    {
       // alert("el id a activar es: "+idPublicacion);
       $.post("../ajax/egresoServicio.php?op=eliminarEgreso", {idEgreso : idEgreso}, function(e){
            
             // document.getElementById("descripcionServicioID").innerHTML="";
              if(e){
                alert('Ingreso Eliminado Manito');
                tabla.ajax.reload();
                listar2();
                //consultas();
              }else{
                alert('Como que hay un problema en QUERY');
                tabla.ajax.reload();
                listar2();
              }
              
         
              
          }); 
  } 


  
}








init();

