  
  <?php

ob_start();

session_start();
    include("header.php");
    $idServicioParametro=$_GET["idServicio"]; 

    require_once "../modelos/Servicio.php";
    $servicio=new Servicio();

    
    $rspta=$servicio->consulInversion($idServicioParametro);
    $fetch=$rspta->fetch_object();

    $inversion=$fetch->inversion;


    require_once "../modelos/EgresoServicio.php";
    $egresoServicio=new EgresoServicio();

    $rspta=$egresoServicio->sumarEgreso($idServicioParametro);
    $fetch=$rspta->fetch_object();
        //Codificar el resultado utilizando json
    $egresoTotal=$fetch->total;


    $saldoTotal=$inversion-$egresoTotal;


  ?>


  <!-- Full Width Column -->
  <div class="content-wrapper" style="background-color: white"> <br>
    <div class="container" style="background-color: white" >

      
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <section class="content-header">
          <ol class="breadcrumb">
        
       <button id="btnIngPedido" type="submit" class="btn btn-success" data-toggle="modal" onclick="limpiarAgregarPedidos();" data-target="#modalPedidos">Ingresar Pedido</button>
      </ol>

      <h1 id="descripcionServicioID">
        
      </h1>
      <br>
     
      <h1>
                <small><dt>- Cantidad de pedidos <span id="idCantPedidos" class="pull badge bg-yellow"></span></dt></small>
                
               <small><dt>- pedidos por pagar <span id="idCantPorPagar" class="pull badge bg-red"></span></dt></small>

                <small><dt>- Cuentas x Cobrar $-> <span id="idValorPorPagar" class="pull badge bg-red"></span> </dt></small>
                
               <small><dt>- pedidos pagos <span  id="idCantPedidosPagos" class="pull badge bg-blue"></span> </dt></small>
                
               
               <small><dt>- Ingresos  $-> <span id="idValorIngresos" class="pull badge bg-blue"></span></dt></small>
                

               <small><dt>- Egresos <span id="idEgresos" class="pull badge bg-orange">200.000</span> </dt></small><br>
                

                <small><dt>- Pago en Transferencias <span id="idCantTransfe" class="pull badge bg-orange"></span> </dt></small>
                
                <small><dt>- Pago en Efectivo <span id="idCantEfectivo" class="pull badge bg-orange"></span> </dt></small>

                <small><dt>- INVERSIÓN <span id="idInversion" class="pull badge bg-orange"></span> </dt></small>
                
      
      
      </h1>
    </section>
<br>
   
         <div class="row">

        <div id="descripcionServicioIDs" class="col-md-12 col-sm-12 col-xs-12">
          <input type="hidden" id="idServicio" name="idServicio" value="<?php echo $idServicioParametro ?>">
          
          <!-- /.info-box -->
        </div>          
         
        </div>

        <div class="row">
          
          <div class="col-md-12">

            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title text-green">LISTA DE PEDIDOS</h3>
            </div>



            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead align="center">
                      <tr style="text-align: center">
                        <th align="center" width="10%">Opciones</th>
                        <th>#/Pedido</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>V/U</th>
                        <th>Valor Total.</th>
                        <th>Cliente</th>
                        <th>Número</th>
                        <th>Fecha de ingreso</th>
                         <th>Estado de Pago</th>                    
                      </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                  </table>
            
            <!-- /.box-body -->
          </div>
            
          </div>


        </div>
    
    <br>
 

    <div class="row">

      <div class="col-lg-6">
        <h1 id="descripcionServicioID2"></h1>
      </div>
      
      <br>

      <div class="col-lg-6" align="right">
        <button type="submit" class="btn btn-success" data-toggle="modal" onclick="limpiarAgregarPedidos();" data-target="#modalEgreso">Agregar Gasto</button>
      </div>     
    </div>

    <div class="row">
      
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <h1>Inversión: <?php echo $inversion ?></h1>
      </div>

      <div  id="idSumGastoso" class="col-lg-4 col-md-12 col-sm-12 col-xs-12" align="center">
        <h1>Gastos: <?php echo $egresoTotal ?></h1>
      </div>
      <div  id="idSaldoActual" class="col-lg-4 col-md-12 col-sm-12 col-xs-12" align="right">
        <h1>Saldo Actual: <?php echo $saldoTotal ?></h1>
        <input type="hidden" id="idprueba22" name="idprueba22">
      </div>
      
    </div>

    <div class="row" >
          
          <div class="col-md-12">

            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title text-green">LISTA DE EGRESOS</h3>
            </div>

            <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                    <thead align="center">
                      <tr style="text-align: center">
                        <th align="center" width="10%">Opciones</th>
                      
                        <th>Descripción</th>
                        <th>Valor del gasto</th>
                        <th>Fecha de registro</th>                    
                      </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                  </table>
            
            <!-- /.box-body -->
          </div>
            
          </div>


        </div>




  

        

        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>


  <div id="modalPedidos" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-xs" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3  class="modal-title">Ingresar una nuevo Pedido</h3>

      </div>
      <div class="modal-body">

        <form name="frmPedido" id="frmPedido" method="POST">

          <div class="row"> 
              <div class="col-md-12" id="container"> 

              </div>
          </div>

          <div class="row">
            
            <div class="form-group col-lg-12">
                  <label for="exampleInputEmail1">Descripción del Pedido(*)</label>

                  <input type="hidden" id="iddetalleServicio" name="iddetalleServicio">
                  <input type="hidden" id="idServi" name="idServi">
                  <input type="hidden" id="fechahora" name="fechahora">
                  <input type="hidden" id="estadoPago" name="estadoPago">
                  <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $_SESSION['id'] ?>">
                  <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion"  placeholder="Anchete Especial de 80mil">
                </div>


          </div>
          <div class="row">
            
            <div class="form-group col-lg-6">
                  <label for="exampleInputEmail1">Cantidad(*)</label>
                  <input type="text" class="form-control" id="txtCantidad" name="txtCantidad"  placeholder="1" value="1">
                </div>
                <div class="form-group col-lg-6">
                  <label for="exampleInputEmail1">Valor Unitario(*)</label>
                  <input type="text" class="form-control" id="txtValorU" name="txtValorU"  placeholder="Ej. 50000">
                </div>
            


          </div>
          <div class="row">
            
            <div class="form-group col-lg-8">
                  <label for="exampleInputEmail1">Cliente(*)</label>
                  <input type="text" class="form-control" id="txtCliente" name="txtCliente"  placeholder="Pepito Perez">
                </div>
                <div class="form-group col-lg-4">
                  <label for="exampleInputEmail1">Telefono(*)</label>
                  <input type="text" class="form-control" id="txtTelefono" name="txtTelefono"  placeholder="546565">
                </div>


          </div>
          <div class="row">
            
            <div class="form-group col-lg-12">
                  <label for="exampleInputEmail1">Dirección de entrega del pedio(*)</label>
                  <input type="text" class="form-control" id="txtDireccion" name="txtDireccion"  placeholder="Ej. Clle 24 #29-21 Barrio Jardin via al batallon ">
                </div>

       
          </div>
          <hr/>
          <div class="row">
            
            <div class="form-group col-lg-12">
                  <label for="exampleInputEmail1">Algo mas ? (Opcional)</label>
                  <input type="text" class="form-control" id="txtalgoMas" name="txtalgoMas"  placeholder="Ej. Entregar de 1pm a 2pm  ">
                </div>

       
          </div>
          <hr/>

          <div class="row box-tools pull-">
            <div class="form-group col-lg-6">
               <label class="checkbox-inline">
              <input name="checkEstadoPedido" id="checkEstadoPedido" onclick="estadoPagos();" type="checkbox" value="">Pedido Pago $$
            </label>
            </div>
                 <div class="form-group col-lg-6">
                 <select class="form-control" id="selectPago" name="selectPago">
                  <option value="0">Selecciona Forma de pago</option>
                  <option value="Efectivo">Efectivo</option>
                  <option value="Transferencia">Transferencia</option>
                </select>  
            </div>

           

            


          </div>

                                                
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="ingresarPedido();" class="btn  btn-success btn-block">Ingresar</button>
      </div>
    </div>

  </div>
</div>

<div id="modalEgreso" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-xs" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3  class="modal-title">Registro de gastos (EGRESOS)</h3>

      </div>
      <div class="modal-body">

        <form name="frmEgreso" id="frmEgreso" method="POST">

          <div class="row"> 
              <div class="col-md-12" id="containerEgreso"> 

              </div>
          </div>

          <div class="row">
            
            <div class="form-group col-lg-12">
                  <label for="exampleInputEmail1">Descripción del Gasto(*)</label>

                  <input type="hidden" id="idEgresoServicio" name="idEgresoServicio">
                  <input type="hidden" id="idServi2" name="idServi2">
                  <input type="hidden" id="fechahora2" name="fechahora2">
                  <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $_SESSION['id'] ?>">
                  <input type="text" class="form-control" id="txtDescripcionEgreso" name="txtDescripcionEgreso"  placeholder="Anchete Especial de 80mil">
                </div>


          </div>
          <div class="row">
            
            <div class="form-group col-lg-12">
                  <label for="exampleInputEmail1">Valor del Gasto(*)</label>
                  <input type="text" class="form-control" id="txtValorEgreso" name="txtValorEgreso"  placeholder="60000">
            </div>
                


          </div>
                                                
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="ingresarGasto();" class="btn  btn-success btn-block">Ingresar</button>
      </div>
    </div>

  </div>
</div>
  <!-- /.content-wrapper -->

  <?php
    include("footer.php");
    echo"<script type='text/javascript' src='scripts/consultaservicio.js'></script>";

  ?>
