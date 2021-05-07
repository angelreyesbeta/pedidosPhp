containerServicios
let variable;


function init()
{
	//CantidadCliente();
	fecha();
	cargarServicios();
  cargarServiciosCerrado();
  cargarServiciosSinRegisrtro();
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
  //alert(fechaH);
  //$("#txtfechahora").val(fechaH);
  //document.getElementById("fechahora").innerHTML=fechaH;

  
}
function cargarServiciosCerrado()
{

    $.ajax({

            url: "../ajax/servicio.php?op=principalServiciosCerrado",
            type: "POST",
            beforeSend: function(){
                document.getElementById("containerCargando").style.display="block";
            },
            success: function(datos)
            {     
            //alert(datos);               
                document.getElementById("containerCargando").style.display="none";
                  
                data1 = JSON.parse(datos);

                var estado,color;

              if (data1.length!=0)
              {


                for(var i=0;i<data1.length;i++)
                {

                  switch(data1[i][3])
                  {
                    case "0":
                      estado="Cerrado";
                      color="bg-red";
                    break;

                    case "1":
                      estado="Abierto";
                      color="bg-yellow";
                    break;
                  }

                  var parametros={
                  'idServicios':''+data1[i][1]+'',
                  };

                  

                  //alert(data1[i][3])


     document.getElementById("containerServiciosCerrado").innerHTML+='<div class="col-sm-4">'+
    '<div class="card ">'+
      '<h5 class="card-title h3 bg-green" style="padding:10px">'+data1[i][0]+' <span class="pull badge '+color+'">'+estado+'</span></h5>'+
    
      '<div class="card-body ">'+  
       ' <p class="card-text">'+data1[i][2]+'</p>'+
       ' <p id="idprueba" class="card-text">Pedidos: <span class="pull badge '+color+'">'+data1[i][4]+'</span></p>'+
       ' <p  class="card-text">Ingreso $-> <span class="pull badge bg-orange">'+data1[i][5]+'</span></p>'+
        '<a  href="consultaservicio.php?idServicio='+data1[i][1]+'"  class="btn btn-primary">Ver...</a>'+
        ' <a data-toggle="modal" data-target="#modalServicio" class="btn btn-warning ml-3">Editar</a>'+

      '</div>'+
    '</div>'+
  '</div>';
  

            }//fin_for
                    
                


            }//fin_si
            else
            {
                //alert("no hay INFORMACION");

                document.getElementById("containerServiciosCerrado").innerHTML='<h1 align="center">No hay servicios cerrados</h1>';
           
            }

                
        

            }//fin success

        });



}

function cargarServiciosSinRegisrtro()
{

    $.ajax({

            url: "../ajax/servicio.php?op=principalServiciosSinRegistro",
            type: "POST",
            beforeSend: function(){
                document.getElementById("containerCargando2").style.display="block";
            },
            success: function(datos)
            {     


                          
                document.getElementById("containerCargando2").style.display="none";
                  
                data1 = JSON.parse(datos);

                var estado,color;

              if (data1.length!=0)
              {


                for(var i=0;i<data1.length;i++)
                {

                  switch(data1[i][3])
                  {
                    case "0":
                      estado="Cerrado";
                      color="bg-red";
                    break;

                    case "1":
                      estado="Abierto";
                      color="bg-yellow";
                    break;
                  }

                  var parametros={
                  'idServicios':''+data1[i][1]+'',
                  };

                  

                  //alert(data1[i][3])


     document.getElementById("containerServiciosSinPedidos").innerHTML+='<div class="col-sm-4">'+
    '<div class="card ">'+
      '<h5  class="card-title h3 bg-green" style="padding:10px">'+data1[i][0]+' <span class="pull badge '+color+'">'+estado+'</span></h5>'+
    
      '<div class="card-body ">'+  
       ' <p class="card-text">'+data1[i][2]+'</p>'+
       ' <p id="idprueba" class="card-text">Pedidos: <span class="pull badge '+color+'">0</span></p>'+
       ' <p  class="card-text">Ingreso $-> <span class="pull badge bg-orange">0</span></p>'+
        '<a  href="consultaservicio.php?idServicio='+data1[i][1]+'"  class="btn btn-primary">Ver...</a> '+
        '<a  data-toggle="modal" data-target="#modalServicio"  class="btn btn-warning ml-3" onclick="probandoAndo('+data1[i][1]+');">Editar</a>'+

      '</div>'+
    '</div>'+
  '</div>';
  

            }//fin_for
                    
                


            }//fin_si
            else
            {
                //alert("no hay INFORMACION");

                document.getElementById("containerServiciosSinPedidos").innerHTML='<h1 align="center">Aún no tienes Pedidos registrados</h1>';
           
            }

                
        

            }//fin success

        });



}

function probandoAndo(idServicio){
  //alert('Conexion con id: '+idServicio);
  //document.getElementById("container").innerHTML="";
  $.post("../ajax/servicio.php?op=mostrar",{idServicios : idServicio}, function(data, status)
  {



 
    data = JSON.parse(data);
    
    $("#idservicio").val(data.id);  
    $("#txtDescripcion").val(data.descripcion);
    $("#txtInversion").val(data.inversion);
    $("#txtprecioVenta").val(data.precioVenta);
    $("#txtcantidad").val(data.cantidadEstimada);


  })
}

function cargarServicios()
{

    $.ajax({

            url: "../ajax/servicio.php?op=principalServicios",
            type: "POST",
            beforeSend: function(){
                document.getElementById("containerCargando3").style.display="block";
            },
            success: function(datos)
            {     
            //alert(datos);               
                document.getElementById("containerCargando3").style.display="none";
                	
                data1 = JSON.parse(datos);

                var estado,color;

              if (data1.length!=0)
              {


                for(var i=0;i<data1.length;i++)
                {

                  switch(data1[i][3])
                  {
                    case "0":
                      estado="Cerrado";
                      color="bg-red";
                    break;

                    case "1":
                      estado="Abierto";
                      color="#38BD7F";
                      
                    break;
                  }

                  var parametros={
                  'idServicios':''+data1[i][1]+'',
                  };

                  

                  //alert(data1[i][3])


     document.getElementById("containerServicios").innerHTML+='<div class="col-sm-4">'+
    '<div class="card ">'+
      '<h5 class="card-title h4" style="padding:10px;background-color:pink !important; color:#670E67; font-weight: bold;">'+data1[i][0]+' <span style="background-color:'+color+';padding: 7px 15px 5px 15px;border-radius:25px;font-size:13px;color:white;" class="ml-5">'+estado+'</span></h5>'+
    
      '<div class="card-body" style="background-color:#6C1269 !important; color:white; font-weight:bold; text-align:center;padding:10px">'+  
       ' <p class="card-text">'+data1[i][2]+'</p>'+
       ' <p id="idprueba" class="card-text">Pedidos: <span class="pull badge '+color+'">'+data1[i][4]+'</span></p>'+
       ' <p  class="card-text">Ingreso $-> <span class="pull badge bg-orange">'+data1[i][5]+'</span></p> '+
       ' <p  class="card-text">Disponible $-> <span class="pull badge bg-orange">'+data1[i][6]+'</span></p> '+
        '<a  href="consultaservicio.php?idServicio='+data1[i][1]+'"  class="btn btn-primary">Ver...</a>'+
        ' <a data-toggle="modal" data-target="#modalServicio" class="btn btn-warning ml-3" onclick="probandoAndo('+data1[i][1]+');">Editar</a>'+

      '</div>'+
    '</div>'+
  '</div>';//+document.getElementById("containerServiciosSinPedidos").innerHTML;
  

            }//fin_for
                    
                


            }//fin_si
            else
            {
                //alert("no hay INFORMACION");

                document.getElementById("containerServicios").innerHTML='<h1 align="center">Aún no tienes Pedidos registrados</h1>';
           
            }

                
        

            }//fin success

        });



}



function ingresarServicio()
{

	fecha();
	
	var descri;

	idusuario=document.getElementById("idusuario").value;
	descri=document.getElementById("txtDescripcion").value;
	fechahora=document.getElementById("fechahora").value;
  inversion=document.getElementById("txtInversion").value;
  txtcantidad=document.getElementById("txtcantidad").value;

	if(descri==="" || idusuario==="" || fechahora==="" || inversion==="" || txtcantidad==="")
	{
		document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-danger alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-warning"></i> Alerta!</h4>'+
                'Debes llenar los campos requerido por el sistema.(*)';
	}
	else
	{
		//alert("Ingresaste : "+descri+ "y el idusuario es: "+idusuario+" fecha : "+fechahora);
		var formData = new FormData($("#frmServicio")[0]);

		$.ajax({
			url: "../ajax/servicio.php?op=guardaryeditar",
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
                'Se registro un nuevo Servicio';   
                document.getElementById("containerServicios").innerHTML=" ";
                document.getElementById("containerServiciosSinPedidos").innerHTML=" ";
                cargarServicios();
                //cargarServiciosCerrado();
                cargarServiciosSinRegisrtro();

                //limpiarRegistro();

	          	//tabla.ajax.reload();
	          	//listar();    
             }
            else
            {
            	if(datos==="2")
            	{
            		document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-warning alert-dismissible">'+
                	'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                	'<h4><i class="icon fa fa-check"></i> Actulizacion!</h4>'+
                	'Se actulizo la infomación';
                 
	          		document.getElementById("containerServicios").innerHTML=" ";
                document.getElementById("containerServiciosSinPedidos").innerHTML=" ";
                cargarServicios();
                //cargarServiciosCerrado();
                cargarServiciosSinRegisrtro();
            	}
            	else
            	{
            		alert("Error !"+datos);
                	limpiarRegistro();

            	}
                
            } 
	    	}

		});
	}
}


function limpiarAgregarServicio(){
	document.getElementById("container").innerHTML="";
    $("#txtDescripcion").val("");
    $("#txtInversion").val("");
    $("#txtprecioVenta").val("");
}









init();

