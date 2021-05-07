// Example starter JavaScript for disabling form submissions if there are invalid fields
let valPagarTotal=0;
let cantidad=0;
let valorU=15000;


function init(){

   
  
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
  //$("#fechahora2").val(fechaH);
  //alert(fechaH);
  //$("#txtfechahora").val(fechaH);
  //document.getElementById("fechahora").innerHTML=fechaH;

  
}



function agregar(){

  
  add=document.getElementById("idcantidad").innerHTML;
  add++;
  document.getElementById("idcantidad").innerHTML=add;

  valPagarTotal=valorU*add

  document.getElementById("idValPagar").innerHTML='$. '+valPagarTotal;
  document.getElementById("idbtn").innerHTML='<button id="btnValidata" class="btn btn-outline-primary btn-lg btn-block" onclick="validarForm()" type="button">'+
  '<div class="row">'+
    '<div class="col-6" align="right">'+
      'Confirmar'+
    '</div>'+
    '<div class="col-6" align="right"> $.'+
      valPagarTotal+
    '</div>'+
  '</div>'+
'</button>';
$("#txtCantidad").val(add);
$("#txtValorTotal").val(valPagarTotal);

  /*$.post("./php/agregar.php?op=agregar", {variable:variable},function(data, status)
  {

    add=document.getElementById("idcantidad").innerHTML;


  })*/


}
function restar(){

  add=document.getElementById("idcantidad").innerHTML;


  if(add>0){
    
  add--;
  document.getElementById("idcantidad").innerHTML=add;

  valPagarTotal=valorU*add

  document.getElementById("idValPagar").innerHTML='$. '+valPagarTotal;
  document.getElementById("idbtn").innerHTML='<button id="btnValidata" class="btn btn-outline-primary btn-lg btn-block" onclick="validarForm()" type="button">'+
  '<div class="row">'+
    '<div class="col-6" align="right">'+
      'Confirmar'+
    '</div>'+
    '<div class="col-6" align="right"> $.'+
      valPagarTotal+
    '</div>'+
  '</div>'+
'</button>';
$("#txtCantidad").val(add);
$("#txtValorTotal").val(valPagarTotal);

  }if(add<1){
    document.getElementById("idbtn").innerHTML='';
  }
  

  /*$.post("./php/agregar.php?op=agregar", {variable:variable},function(data, status)
  {

    add=document.getElementById("idcantidad").innerHTML;


  })*/


}

function validarForm(){
  

  //fecha();

  
  
  var name,phone,address,algoAdi,exprecion;

  exprecion=/[a-z]/;

  name=document.getElementById("txtNameCompleto").value;
  phone=document.getElementById("txtPhone").value;
  address=document.getElementById("txtAddress").value;
  algoAdi=document.getElementById("txtAddicional").value;

  if(name===""||phone==="" || address==="")
  {
      
      Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Todos los campos (*) son obligatorios!'
      })    
  }
  else if(isNaN(phone)){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'El numero de telefono que ingresaste no es valido'
      })  

  }else if(phone.length>10 || phone.length<10){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Ingresa un numero de telefono valido'
      })  
  }else if(name.length>50){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Tu Nombre esta muy largo'
      })  
  }
  else if(!exprecion.test(name)){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Esta incorrecto este nombre'
      })  
  }else{
    
    saveOrder();
    
  }
}

function limpiarInputs(){

  $("#txtNameCompleto").val('');
  $("#txtPhone").val('');
  $("#txtAddress").val('');  
  $("#txtAddicional").val('');
  document.getElementById("idcantidad").innerHTML=0;
  valPagarTotal=0;
  document.getElementById("idValPagar").innerHTML='$. '+valPagarTotal;
  document.getElementById("idbtn").innerHTML='';


}

function saveOrder(){
  fecha();
  $("#txtValorU").val(valorU);
  var formData = new FormData($("#frmServicio")[0]);

    $.ajax({
      url: "requestOrder.php?op=saveOrder",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos)
        { 
            
           if(datos)
             {
                Swal.fire({
                icon: 'success',
                title: 'En hora buena',
                text: 'Tu orden ha sido enviada desde la funcion saveOrder'
                });    
                limpiarInputs();        
             }
            else
            {
              Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Algo salio mal, intentalo mas tarde'
              })                
                
            }
           // alert(datos);
        }

    });
    
}







init();