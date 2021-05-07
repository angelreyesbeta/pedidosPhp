var tabla;
function init()
{



listar();


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
					url: '../ajax/cliente.php?op=listar',
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
	var nombre,apellido,cedula,telefono,direccion;

	nombre=document.getElementById("txtnombre").value;
	apellido=document.getElementById("txtapellido").value;
	//cedula=document.getElementById("txtcedula").value;
	telefono=document.getElementById("txttelefono").value;
	direccion=document.getElementById("txtdireccion").value;

	if(nombre==="" || apellido==="" || telefono==="" || direccion==="")
	{
		//alert("Datos ingresados: "+nombre+" "+apellido+" "+documento+" "+numero+" "+telefono+" "+correo+" "+password);
		document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-danger alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-warning"></i> Alerta!</h4>'+
                'Debes llenar los campos requerido por el sistema.(*)';
	}
	else
	{
		//alert("Datos ingresados: "+idusuario+" "+nombre+" "+apellido+" "+documento+" "+numero+" "+telefono+" "+correo+" "+password);
		
		var formData = new FormData($("#frmCliente")[0]);

		$.ajax({
			url: "../ajax/cliente.php?op=guardaryeditar",
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
                'Se registro un nuevo Cliente';   

                limpiarRegistro();

	          	tabla.ajax.reload();
	          	listar();    
             }
            else
            {
            	if(datos==="2")
            	{
            		document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-warning alert-dismissible">'+
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

function mostrar(idCliente)
{
	limpiar();
	
	
	$.post("../ajax/cliente.php?op=mostrar",{idCliente2 : idCliente}, function(data, status)
	{

		//alert (data);
	
		data = JSON.parse(data);		
		

		$("#idCliente").val(data.id);
		$("#txtnombre").val(data.nombre);
		$("#txtapellido").val(data.apellido);
 		$("#txtcedula").val(data.cedula);
 		$("#txttelefono").val(data.telefono);
		$("#txtdireccion").val(data.direccion);



 	})

 	
}


function limpiarRegistro()
	{
		 
		$("#idCliente").val("");
		$("#txtnombre").val("");
		$("#txtapellido").val("");
		$("#txtcedula").val("");
		$("#txttelefono").val(""); 
		$("#txtdireccion").val("");

	}

	function limpiar()
	{

		document.getElementById("container").innerHTML="";

		$("#idCliente").val("");
		$("#txtnombre").val("");
		$("#txtapellido").val("");
		$("#txtcedula").val("");
		$("#txttelefono").val(""); 
		$("#txtdireccion").val("");

	}





init();