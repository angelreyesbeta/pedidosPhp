
function init()
{


continventario();
contarMisActivos();
contarMisRequerimientosPendientes();
cumpleañoshoy();
}


function continventario()
{

	
	$.post("../ajax/activo.php?op=contActivos", function(data,status)
	{

	
		

		document.getElementById("idcontinventario").innerHTML=data;	

 		

 	})
}

function contarMisActivos()
{
	var idusuarioSesion=document.getElementById("idusuariosesion").value;
	//alert("id: "+idusuarioSesion);
	$.post("../ajax/cargaractivos.php?op=contarMisActivos",{idusuario : idusuarioSesion}, function(data,status)
	{

	
		

		document.getElementById("idmisactivos").innerHTML=data;	

 		

 	})
}

function contarMisRequerimientosPendientes()
{
	var idusuarioSesion=document.getElementById("idusuariosesion").value;
	var prueba=document.getElementById("prueba").value;

	//alert("id: "+idusuarioSesion);
	$.post("../ajax/requerimiento.php?op=contarMisRequerimientosPendientes",{idusuario : idusuarioSesion}, function(data,status)
	{


	document.getElementById("idrequerimientospendientes").innerHTML=data;	
	document.getElementById("idrequerimientospendientes2").innerHTML=data;
	if(data==0)
	{
		document.getElementById("idrequerimientospendientes2").style.display="none";
	}
	
 		
	//document.getElementById("idrequerimientospendientes2").style.display="none";
 	})

 	//alert(prueba);
}

function cumpleañoshoy()
{
	var fechaActual=new Date();
 	

 	mesActual=fechaActual.getMonth();
 	diamesActual=fechaActual.getDate();

    mesActual=mesActual+1;

 	mesActual=(mesActual<10)?"0"+mesActual:mesActual;
 	diamesActual=(diamesActual<10)?"0"+diamesActual:diamesActual;



	$.post("../ajax/usuario.php?op=cumpleañoshoy",{mes : mesActual,dia:diamesActual}, function(data,status)
	{
			document.getElementById("idcumpleañeros").innerHTML=data;	
			document.getElementById("idcumpleañeros_Global").innerHTML=data;
	if(data==0)
	{
		document.getElementById("idcumpleañeros").style.display="none";
		document.getElementById("idcumpleañeros_Global").style.display="none";
	}



 	})




}












init();