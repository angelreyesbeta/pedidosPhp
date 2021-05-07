var tabla;
function init()
{



listar();
selectCategoria();
selectCentroOperacion();

}

function selectCategoria()
{
	$.post("../ajax/activo.php?op=selectCategoria", function(r){
	            $("#idcategoria").html(r);
	            //$('#idcategoriaS').selectpicker('refresh');

	});
}
function selectCentroOperacion()
{
	$.post("../ajax/centrodeoperaciones.php?op=selectCentroOperacion", function(r){
	            $("#idcdeo").html(r);
	  

	});
}

//metodo para listar todas las categorias registradas

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
					url: '../ajax/activo.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}


//metodo para guardar y editar las categorias

function guardaryeditar()
{
	var activo,modelo,serie,codigo,descripcion;

	activo=document.getElementById("txtnombreActivoF").value;
	descripcion=document.getElementById("txtdescripcionActivoFijo").value;
	modelo=document.getElementById("txtmodeloActivoF").value;
	serie=document.getElementById("txtserieActivoF").value;
	codigo=document.getElementById("txtcodigoActivoF").value;

	txtnombreEquipo=document.getElementById("txtnombreEquipo").value;
	txtsistemaO=document.getElementById("txtsistemaO").value;
	txtkeyso=document.getElementById("txtkeyso").value;
	txtkeyoffi=document.getElementById("txtkeyoffi").value;
	idcdeo=document.getElementById("idcdeo").value;

	txtdiscoduro=document.getElementById("txtdiscoduro").value;
	txtmemoriaram=document.getElementById("txtmemoriaram").value;
	txtprocesador=document.getElementById("txtprocesador").value;
	txtobservacion=document.getElementById("txtobservacion").value;
	txtoffice=document.getElementById("txtoffice").value;


	if(txtdiscoduro==="" || txtmemoriaram==="" || txtprocesador==="" || txtobservacion==="" || txtoffice==="" || txtnombreEquipo===""
	 || txtsistemaO==="" || txtkeyso==="" || txtkeyoffi==="" || idcdeo==0 ||activo==="" || descripcion==="" || modelo==="" || serie==="" ||
	  codigo==="")
	{
		//alert("Datos ingresados: "+nombre+" "+apellido+" "+documento+" "+numero+" "+telefono+" "+correo+" "+password);
		document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-warning alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-warning"></i> Alerta!</h4>'+
                'Debes llenar los campos requerido por el sistema.(*)';
	}
	else
	{
		//alert("Datos ingresados: "+idusuario+" "+nombre+" "+apellido+" "+documento+" "+numero+" "+telefono+" "+correo+" "+password);
		
		var formData = new FormData($("#frmActivos")[0]);

		$.ajax({
			url: "../ajax/activo.php?op=guardaryeditar",
	    	type: "POST",
	    	data: formData,
	    	contentType: false,
	    	processData: false,

	    	success: function(datos)
	    	{	

	    	       
	         if(datos==="0")
             {

             	document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-success alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-check"></i> Registro!</h4>'+
                'Se registro un nuev activo';

             
                
                limpiarRegistro();
     

	          	tabla.ajax.reload();
	          	listar();    
             }
            else
            {
            	if(datos==="2")
            	{
            		document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-success alert-dismissible">'+
                	'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                	'<h4><i class="icon fa fa-check"></i> Actulizacion!</h4>'+
                	'Se actulizo la infomación';
                 
	          		tabla.ajax.reload();
	          		listar();  
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

//metod para mostrar la categoria seleccionada

function mostrar(idActivoF)
{
	limpiar2();
	$.post("../ajax/activo.php?op=mostrar",{idActivoF : idActivoF}, function(data, status)
	{
	
		data = JSON.parse(data);		
		

		$("#idcategoria").val(data.idCategoria);
		//$('#idcategoriaS').selectpicker('refresh');

		$("#idActivo").val(data.idActivo);
		$("#txtnombreActivoF").val(data.nombreActivo);
 		$("#txtmodeloActivoF").val(data.modelo);
 		$("#txtserieActivoF").val(data.serie);
		$("#txtcodigoActivoF").val(data.codigo);
 		$("#txtdescripcionActivoFijo").val(data.descripcion);
 		$("#nomfactura").val(data.factura);

 		$("#txtnombreEquipo").val(data.nombreEquipo);
		$("#txtsistemaO").val(data.sistemaO);
 		$("#txtkeyso").val(data.keyso);
 		$("#txtkeyoffi").val(data.keyoffi);
 		$("#idcdeo").val(data.centroOperacion);

 		$("#txtoffice").val(data.office);
		$("#txtdiscoduro").val(data.discoduro);
 		$("#txtmemoriaram").val(data.memoryram);
 		$("#txtprocesador").val(data.procesador);
 		$("#txtobservacion").val(data.observacion);


 	})

 	
}

function getSelectValue()
{

	idcate=document.getElementById("idcategoria").value;
	
	if(idcate!=0){

	

	$.post("../ajax/activo.php?op=contaractivosCategoria",{idcate : idcate}, function(data, status)
	{


	
		data = JSON.parse(data);		
		
		var cantidad=1;

		cantidad=parseInt(cantidad)+parseInt(data.cantidad);

		//cantidad=(cantidad<1000)?"000"+cantidad:cantidad;

		

	if(cantidad<10)
    {
        cantidad="000"+cantidad;
    }
    else
    {
        if(cantidad>=10 && cantidad<100 )
        {
            cantidad="00"+cantidad;
        }
       	else
       	{
            if(cantidad>=100 && cantidad<1000 )
            {
                cantidad="0"+cantidad;
            }
            else
            {
                if(cantidad>=1000 && cantidad<10000 )
                {
                    cantidad=cantidad;
                }
            }
       	}
    }


		
	$("#txtcodigoActivoF").val(data.codigoinicial+cantidad);

		$("#txtnombreActivoF").focus();

		

	})
	}
	else
	{
		$("#txtcodigoActivoF").val("");
	}
}


function mostrarEvento(idActivoE)
{
	//alert("Estamos en el evento "+idActivoE);
	window.doOpen("../vistas/activoEvento.php/?op="+idActivoE);
} 




	function limpiarRegistro()
	{
		//document.getElementById("containerimagen").innerHTML="";
		//document.getElementById("container").innerHTML="";    
		$("#idActivo").val("");

		$("#idcategoria").val(0);
		$("#txtnombreActivoF").val("");
		$("#txtmodeloActivoF").val("");
		$("#txtserieActivoF").val("");

		$("#txtcodigoActivoF").val(""); 
		$("#txtnombreEquipo").val("");
		$("#txtsistemaO").val("");
		$("#txtkeyso").val("");

		$("#txtoffice").val("");
		$("#txtkeyoffi").val("");
		$("#txtdiscoduro").val("");
		$("#txtmemoriaram").val("");

		$("#txtprocesador").val("");
		$("#idcdeo").val(0);

		$("#txtdescripcionActivoFijo").val("");
		$("#txtobservacion").val("");
		

	}

	function limpiar2()
	{

		document.getElementById("container").innerHTML="";

		$("#idActivo").val("");

		$("#idcategoria").val(0);
		$("#txtnombreActivoF").val("");
		$("#txtmodeloActivoF").val("");
		$("#txtserieActivoF").val("");

		$("#txtcodigoActivoF").val(""); 
		$("#txtnombreEquipo").val("");
		$("#txtsistemaO").val("");
		$("#txtkeyso").val("");

		$("#txtoffice").val("");
		$("#txtkeyoffi").val("");
		$("#txtdiscoduro").val("");
		$("#txtmemoriaram").val("");

		$("#txtprocesador").val("");
		$("#idcdeo").val(0);

		$("#txtdescripcionActivoFijo").val("");
		$("#txtobservacion").val(""); 

	}

	function inactivarActivo(idActivo)
{
	var opcion = confirm("Está Seguro de inactivar este Activo?");
    if (opcion == true) 
    {
       $.post("../ajax/activo.php?op=inactivarActivo", {idActivo : idActivo}, function(e){
        		//alert(e);
	            tabla.ajax.reload();
	          	listar(); 
        	});	
	} 
}

//Función para activar registros
function activarActivo(idActivo)
{

    var opcion = confirm("Está Seguro de activar este Activo?");
    if (opcion == true) 
    {
       // alert("el id a activar es: "+idPublicacion);
       $.post("../ajax/activo.php?op=activarActivo", {idActivo : idActivo}, function(e){
        		
	            tabla.ajax.reload();
	            listar();
        	});	
	} 

	
}







init();


