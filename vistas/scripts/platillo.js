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
					url: '../ajax/platillo.php?op=listar',
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
	var nombre,descripcion;

	nombre=document.getElementById("txtNombre").value;
	descripcion=document.getElementById("txtDescripcion").value;


	if(nombre==="" || descripcion==="")
	{
		//alert("Datos ingresados: "+nombre+" "+apellido+" "+documento+" "+numero+" "+telefono+" "+correo+" "+password);
		document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-danger alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-warning"></i> Alerta!</h4>'+
                'Debes llenar los campos requerido por el sistema.(*)';
	}
	else
	{
		//alert("Datos ingresados desde el cliente: "+nombre+" "+descripcion);
		
		var formData = new FormData($("#frmServicio")[0]);

		$.ajax({
			url: "../ajax/platillo.php?op=guardaryeditar",
	    	type: "POST",
	    	data: formData,
	    	contentType: false,
	    	processData: false,

	    	success: function(datos)
	    	{	


	    		/*document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-success alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-check"></i> Registro!</h4>'+datos;*/

	    	    
	         if(datos==0)
             {

             	document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-success alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-check"></i> Registro!</h4>'+
                'Se registro un nuevo platillo';   

	          	tabla.ajax.reload();
	           
             }
            else
            {
            	if(datos==2)
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
            		document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-danger alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-warning"></i> Alerta!</h4>'+
                'Error! '+datos;
                	limpiarRegistro();
            	}
                
            } 
	    	}

		});

		
	}
	
}

//metod para mostrar la categoria seleccionada

function mostrar(idPlatillo)
{
	
	
	$.post("../ajax/platillo.php?op=mostrar",{idPlatillo : idPlatillo}, function(data, status)
	{

		//alert (data);
	
		data = JSON.parse(data);		
		

		$("#idPlatillo").val(data.id);
		$("#txtNombre").val(data.nombre);
		$("#txtDescripcion").val(data.descripcion);
 



 	})

 	
}



function eliminarPlatillo(idPlatillo){

  var opcion = confirm("Seguro de Eliminar este Plato? jummm!");
    if (opcion == true) 
    {
       // alert("el id a activar es: "+idPublicacion);
       $.post("../ajax/platillo.php?op=eliminarPlatillo", {idPlatillo : idPlatillo}, function(e){
            
             // document.getElementById("descripcionServicioID").innerHTML="";
              if(e){
                alert('Plato Eliminado Manito :(');
                tabla.ajax.reload();
     
                //consultas();
              }else{
                alert('Como que hay un problema en el QUERY');
                tabla.ajax.reload();
              
              }
              
         
              
          }); 
  } 


  
}





init();


