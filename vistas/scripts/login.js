
//Función que se ejecuta al inicio
function init()
{




	

}



function verificarLogin()
{
	
	var txtcorreo;
	var txtpass;

	txtcorreo=document.getElementById("txtcorreo").value;
    txtpass=document.getElementById("txtpass").value;

    
    if(txtcorreo==="" || txtpass==="")
    {
    	alert("Por favor escribe tus credenciales!");
    }

    else
    {
    	var formData = new FormData($("#frmAcceso")[0]);

		$.ajax({
			url: "../ajax/usuario.php?op=verificarLogin",
	    	type: "POST",
	    	data: formData,
	    	contentType: false,
	    	processData: false,

	    	success: function(datos)
	    	{   
            //alert(datos);
            
	         if(datos)
             {
               
                location.href = "principal.php"; 

           
             }
            else
            {
               alert("Usuario y/o Password incorrectos");

            }   
           
           
	    	}

		});


        	

    }


   
}






init();