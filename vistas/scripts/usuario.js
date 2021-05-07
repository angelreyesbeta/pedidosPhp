var tabla;
function init()
{


listar();


selectRol();
selectCentroOperacion();



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
					url: '../ajax/usuario.php?op=listar',
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

function permisos()
{
	$.post("../ajax/usuario.php?op=permisos&id=",function(r){
	        $("#permisos").html(r);
	});
}

function selectRol()
{
	$.post("../ajax/usuario.php?op=selectRol", function(r){
	            $("#idrol").html(r);
	            //$('#idcategoriaS').selectpicker('refresh');

	});
}

function selectCentroOperacion()
{
	$.post("../ajax/centrodeoperaciones.php?op=selectCentroOperacion", function(r){
	            $("#idcdeo").html(r);
	            //$('#idcategoriaS').selectpicker('refresh');

	});

}


function guardaryeditar()
{


	var nombre,apellido,documento,numero,telefono,correo,password,urll,selectgenero,txtextencion,txtcelular,txtcargo,idcdeo;

	urll: "../ajax/registroUsuario.php?op=guardaryeditar";

	
	nombre=document.getElementById("txtnombre").value;
	apellido=document.getElementById("txtapellido").value;
	documento=document.getElementById("selectdocumento").value;
	numero=document.getElementById("txtnumeroDocumento").value;
	telefono=document.getElementById("txttelefono").value;
	correo=document.getElementById("txtcorreo").value;
	password=document.getElementById("txtpass").value;
	fecha=document.getElementById("fechaNacimiento").value;
	selectgenero=document.getElementById("selectgenero").value;
	txtextencion=document.getElementById("txtextencion").value;
	idrol=document.getElementById("idrol").value;
	txtcelular=document.getElementById("txtcelular").value;
	txtcargo=document.getElementById("txtcargo").value;
	idcdeo=document.getElementById("idcdeo").value;
	//fecha===""||nombre==="" || apellido==="" || documento==="" || telefono==="" || correo==="" || password===""

	if(idrol==0||nombre==="" || apellido===""||numero===""||fecha===""||selectgenero==="Seleccion Opción"||telefono===""||txtextencion===""
		||txtcelular===""||txtcargo===""||idcdeo==0|| correo==="" || password==="")
	{
		//alert("Datos ingresados: "+nombre+" "+apellido+" "+documento+" "+numero+" "+telefono+" "+correo+" "+password);
		document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-warning alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-warning"></i> Alerta!</h4>'+
                'Debes llenar los campos requerido por el sistema.(*)';
		//alert("la fecha esta en blanco");
	
	}
	else
	{
		//alert("Datos ingresados: "+idusuario+" "+nombre+" "+apellido+" "+documento+" "+numero+" "+telefono+" "+correo+" "+password);
		
		var formData = new FormData($("#frmUsuarios")[0]);

		$.ajax({
			url: "../ajax/usuario.php?op=guardaryeditar",
	    	type: "POST",
	    	data: formData,
	    	contentType: false,
	    	processData: false,

	    	success: function(datos)
	    	{    

	    		//alert(datos);                
	         if(datos==="0")
             {

             	document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-success alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-check"></i> Registro!</h4>'+
                'El registro del Usuario tuvo exito';

                //alert("");
                
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
            		if(datos==="3")
            		{
            			document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-warning alert-dismissible">'+
                		'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                		'<h4><i class="icon fa fa-warning"></i> Alerta!</h4>'+
                		'El correo o numero de documento ya estan registrados';	
            		}
            		else
            		{
            			alert("Error !");
                		limpiarRegistro();
            		}
            	}
            	
                
            }   
           
           	//alert(datos);    
	          
	    	}

		});

	}
}



function mostrar(idusuario)
{
	//alert("el id seleccionado es: "+idusuario);
	limpiarEditar();
	$.post("../ajax/usuario.php?op=mostrar",{idusuarioM : idusuario}, function(data, status)
	{

		//mostrarform(true);
		//$("#imagenmuestra").show();
	
		data = JSON.parse(data);
		
		document.getElementById("containerimagen").innerHTML='<img src="../files/usuarios/'+data.imagen+'" class="img-circle" alt="Cinque Terre" width="150" height="130"> ';

		
		

		$("#idrol").val(data.idr);
		//$('#idcategoriaS').selectpicker('refresh');

		$("#idusuario").val(data.idu);
		$("#txtnombre").val(data.nombre);
 		$("#txtapellido").val(data.apellido);
 		$("#selectdocumento").val(data.tipoDocumento);
 		$("#txtnumeroDocumento").val(data.numeroDocumento);
 		$("#fechaNacimiento").val(data.fechaNacimiento);
		$("#txttelefono").val(data.telefono);
		$("#txtcargo").val(data.cargo);
		$("#idcdeo").val(data.idcentrodeoperacion);
 		$("#txtcorreo").val(data.correo);
 		$("#txtpass").val(data.password);
 		$("#selectgenero").val(data.genero);
 		$("#txtextencion").val(data.extencion);
        $("#txtcelular").val(data.celular);
 		//$("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen);
 		$("#imagenactual").val(data.imagen);


 		$("#txtpass").prop("disabled",true);



	    $.post("../ajax/usuario.php?op=permisos&id="+idusuario,function(r){
	        $("#permisos").html(r);    

	     
	});
 		

 		//alert(data);
 		

 	})


 	
}



	function limpiarRegistro()
	{
		//document.getElementById("containerimagen").innerHTML="";
		//document.getElementById("container").innerHTML="";
		$("#idusuario").val("");      
		$("#txtnombre").val("");      
 		$("#txtapellido").val("");      
 		$("#selectdocumento").val("Cédula");      
 		$("#txtnumeroDocumento").val("");      
 		$("#fechaNacimiento").val("");      
		$("#txttelefono").val("");
		$("#txtcargo").val("");
		$("#idcdeo").val(0);
 		$("#txtcorreo").val("");
 		$("#txtpass").val("");
 		$("#selectgenero").val("Seleccion Opción");
 		$("#txtextencion").val("");
        $("#txtcelular").val("");
 		$("#imagenactual").val("");

 		permisos();
		

	}

	function limpiarEditar()
	{
		document.getElementById("containerimagen").innerHTML="";
		document.getElementById("container").innerHTML="";
		$("#idusuario").val("");      
		$("#txtnombre").val("");      
 		$("#txtapellido").val("");      
 		$("#selectdocumento").val("Cédula");      
 		$("#txtnumeroDocumento").val("");      
 		$("#fechaNacimiento").val("");      
		$("#txttelefono").val("");
		$("#txtcargo").val("");
		$("#idcdeo").val(0);
 		$("#txtcorreo").val("");
 		$("#txtpass").val("");
 		$("#selectgenero").val("Seleccion Opción");
 		$("#txtextencion").val("");
        $("#txtcelular").val("");
 		$("#imagenactual").val("");

 		
	}

	function limpiarNuevo()
	{
		document.getElementById("containerimagen").innerHTML="";
		document.getElementById("container").innerHTML="";
		$("#idusuario").val("");      
		$("#txtnombre").val("");      
 		$("#txtapellido").val("");      
 		$("#selectdocumento").val("Cédula");      
 		$("#txtnumeroDocumento").val("");      
 		$("#fechaNacimiento").val("");      
		$("#txttelefono").val("");
		$("#txtcargo").val("");
		$("#idcdeo").val(0);
 		$("#txtcorreo").val("");
 		$("#txtpass").val("");
 		$("#selectgenero").val("Seleccion Opción");
 		$("#txtextencion").val("");
        $("#txtcelular").val("");
 		$("#imagenactual").val("");

 		$("#txtpass").prop("disabled",false);

 		permisos();

	}

	function limpiarEditarCambiarPass()
	{
		document.getElementById("containerimagen2").innerHTML="";
		document.getElementById("container_CambiarPass").innerHTML="";

        $("#txtcontraNueva1").val("");
 		$("#txtcontraNueva2").val("");

 		
	}


	function inactivarUsuario(idusuario)
{
	var opcion = confirm("Está Seguro de inactivar este Usuario?");
    if (opcion == true) 
    {
       $.post("../ajax/usuario.php?op=inactivarUsuario", {idusuario : idusuario}, function(e){
        		//alert(e);
	            tabla.ajax.reload();
	          	listar(); 
        	});	
	} 
}

//Función para activar registros
function activarUsuario(idusuario)
{

    var opcion = confirm("Está Seguro de activar este Usuario?");
    if (opcion == true) 
    {
       // alert("el id a activar es: "+idPublicacion);
       $.post("../ajax/usuario.php?op=activarUsuario", {idusuario : idusuario}, function(e){
        		
	            tabla.ajax.reload();
	            listar();
        	});	
	} 

	
}


function CambiarContraseña()
{
	var contraseña1, contraseña2, idusuario_CambiarPass;

	contraseña1=document.getElementById("txtcontraNueva1").value;
	contraseña2=document.getElementById("txtcontraNueva2").value;

	idusuario_CambiarPass=document.getElementById("idusuario_CambiarPass").value;


	if(contraseña1==="" || contraseña2==="")
	{
		document.getElementById("container_CambiarPass").innerHTML='<div id="divnotiaviso" class="alert alert-danger alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-warning"></i> Alerta!</h4>'+
                'Debes llenar los campos';		
	


	}

	else
	{
		if(contraseña1===contraseña2)
		{
			
            var parametros={
                'idsesion':''+idusuario_CambiarPass+'',
                'contraNueva1':''+txtcontraNueva1+'',

            };

            $.ajax({
            data: parametros,
            url: "../ajax/usuario.php?op=CambiarContraseña",
            type: "POST",
           beforeSend: function(){
                document.getElementById("containerCargando").style.display="block";
            },
            success: function(datos)
            { 
                
                
                document.getElementById("containerCargando").style.display="none";
               /* document.getElementById("container").innerHTML='<div id="divnotiaviso" class="alert alert-danger alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-warning"></i> Alerta!</h4>'+datos;*/
                
             if(datos=="0")
                {
                    document.getElementById("container_CambiarPass").innerHTML='<div id="divnotiaviso" class="alert alert-success alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-warning"></i> Alerta!</h4>Se ha cambiado la contraseña';
           
                }
                else
                {
                    document.getElementById("container_CambiarPass").innerHTML='<div id="divnotiaviso" class="alert alert-danger alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-warning"></i> Alerta!</h4>No se pudo cambiar la contraseña';
               
                }
                //document.getElementById("containerCargando").style.display="none";
                
      

            }

        });
		}
			
		else
		{
			document.getElementById("container_CambiarPass").innerHTML='<div id="divnotiaviso" class="alert alert-warning alert-dismissible">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h4><i class="icon fa fa-warning"></i> Alerta!</h4>'+
                'Las contraseñas no coinciden';	
		}



                			
	}
	
	

}

function mostrar_CambiasPass(paramentro)
{
	limpiarEditarCambiarPass();
	$.post("../ajax/usuario.php?op=mostrar",{idusuarioM : paramentro}, function(data, status)
	{

		//mostrarform(true);
		//$("#imagenmuestra").show();
	
		data = JSON.parse(data);
		
		document.getElementById("containerimagen2").innerHTML='<img src="../files/usuarios/'+data.imagen+'" class="img-circle" alt="Cinque Terre" width="150" height="130"> ';

		$("#idusuario_CambiarPass").val(data.idu);

 		

 		//alert(data);
 		
 	})

}









init();