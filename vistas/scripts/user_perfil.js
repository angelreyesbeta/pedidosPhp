
function init()
{
	

  capturoID();

}

function capturoID()
{
  var id;

  id=document.getElementById("idusuariovisita").value;

  var parametros={
                'idusuarioM':''+id+'',
            };

            $.ajax({
            data: parametros,
            url: "../ajax/usuario.php?op=mostrar",
            type: "POST",
     
            success: function(datos)
            { 
                data = JSON.parse(datos);
               // alert(data.nombre+" - "+data.apellido);
            
                //document.getElementById("containerCargando").style.display="none";
                document.getElementById("nombreUsuario").innerHTML=data.nombre+" "+data.apellido;
                document.getElementById("cargoUsuario").innerHTML=data.cargo+" - "+data.nomciudad;
                $("#imagenUsuario").attr("src","../files/usuarios/"+data.imagen);

            }

        });

            $.ajax({
            data: parametros,
            url: "../ajax/publicaciones.php?op=contPost",
            type: "POST",
     
            success: function(datos)
            { 

                document.getElementById("contPost").innerHTML=datos;


            }

        });

            $.ajax({
            data: parametros,
            url: "../ajax/publicaciones.php?op=mispublicaciones",
            type: "POST",
            success: function(datos)
            {  
            //alert(datos);                  
               

                data1 = JSON.parse(datos);

              if (data1.length!=0)
              {

                var variable="";

                for(var i=0;i<data1.length;i++)
                {
                    //alert(data1[i][6]);

                    if(data1[i][1]==="")
                    {
                      variable="";

                    }
                    else
                    {
                      variable='<div class="col-lg-1"></div>'+
                    '<div class="col-lg-10" align="center">'+
                      '<img class="img-responsive"  src="../files/publicaciones/'+data1[i][1]+'" alt="Photo">'+
                    '</div>'+
                    '<div class="col-lg-1"></div>';
                    }


                    document.getElementById("containerP").innerHTML+='<div class="post" style="background-color: white">'+
                  '<div class="user-block">'+
                    '<a><img class="img-circle img-bordered-sm" src="../files/usuarios/'+data1[i][6]+'" alt="User Image"> '+
                        ' <span class="username"> '+data1[i][4]+' - '+data1[i][5]+''+

                       '</span></a>'+
                    '<span class="description">Publicado: '+data1[i][0]+'</span>'+

                  '</div>'+
                  '<div class="row margin-bottom">'+
                    '<div class="col-sm-12">'+
  

                          '<h4><strong>'+data1[i][2]+'</strong></h4>'+


                      '<div class="row">'+
                        '<div class="col-lg-12">'+
                          '<p>'+data1[i][3]+'</p>'+
                        '</div>'+
                      '</div>'+
                    '</div>'+variable+

                  '</div>'+                  
                '</div>';



            
            }//fin_for
                    
                


            }//fin_si
            else
            {
                //alert("no hay INFORMACION");

                document.getElementById("containerP").innerHTML='<h1 align="center">NO HAY PUBLIACIONES</h1>';
           
            }

                
        

            }

        });


  //alert(id);
  //document.getElementById("idprueba").innerHTML='El id que llega es: '+id;
}

function publicacionesAjax()
{


    
}


init();

