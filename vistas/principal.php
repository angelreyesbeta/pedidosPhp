  
  <?php
    include("header.php");
  ?>


  <!-- Full Width Column -->
  <div class="content-wrapper" style="background-color:  white "><br>
    <div class="container" style="background-color:  white ">

      
      <!-- Content Header (Page header) -->


      <!-- Main content -->
  <section class="content">
      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <p align="" class="h1">SERVICIOS <a href="" data-toggle="modal" data-target="#modalServicio"><span class="pull-lef badge bg-pink" style="background-color: peru;color: white; font-weight: bold;padding: 10px;font-size: 20px" onclick="limpiarAgregarServicio();">+ APREGAR</span></a></p>
          <!-- /.info-box -->
        </div>          
         
        </div>
<hr/>
  <h4>Servicios Abiertos</h4>
    
<div class="row">
  <div class="row" align="center" >
      <div style="display: none; " id="containerCargando"   class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <img align="center" src="../files/gif/cargando1.gif">
      </div>
  </div>

  <div id="containerServicios">

  </div>


</div>
<hr/>
<h4>Servicio Abierto sin pedidos</h4>
    
<div class="row">
  <div class="row" align="center" >
      <div style="display: none; " id="containerCargando2"   class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <img align="center" src="../files/gif/cargando1.gif">
      </div>
  </div>

  <div id="containerServiciosSinPedidos">

  </div>


</div>
<hr/>
<h4>Servicios Cerrado</h4>
<div class="row">

  <div class="row" align="center" >

      <div style="display: none; " id="containerCargando3"   class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <img align="center" src="../files/gif/cargando1.gif">
      </div>
  </div>

  <div id="containerServiciosCerrado">

  </div>


</div>

<hr/>

<!--<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small>3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    <small>Donec id elit non mi porta.</small>
  </a><br>
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small class="text-muted">3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    <small class="text-muted">Donec id elit non mi porta.</small>
  </a><br>
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small class="text-muted">3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    <small class="text-muted">Donec id elit non mi porta.</small>
  </a><br>
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
    <div class="row">
      <div class="col-md-6">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">List group item heading columna 6</h5>
          <small>3 days ago</small>
          <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
        </div>
        
      </div>
      <div class="col-md-6">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">List group item heading columna 6</h5>
          <small>3 days ago</small>
          <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
        </div>
        
      </div>
      
    </div>
    
    
    <small>Donec id elit non mi porta.</small>
  </a><br>
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small class="text-muted">3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    <small class="text-muted">Donec id elit non mi porta.</small>
  </a><br>
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small class="text-muted">3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    <small class="text-muted">Donec id elit non mi porta.</small>
  </a>
</div>-->



 

  
  

        

        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>


  <div id="modalServicio" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-xs" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Ingresar una nuevo Servicio</h3>

      </div>
      <div class="modal-body">

        <form name="frmServicio" id="frmServicio" method="POST">

          <div class="row"> 
              <div class="col-md-12" id="container"> 

              </div>
          </div>

          <div class="row">
            
            <div class="form-group col-lg-12">
                  <label for="exampleInputEmail1">Descripción(*)</label>
                  <input type="hidden" id="idservicio" name="idservicio">
                  <input type="hidden" id="fechahora" name="fechahora">
                  <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $_SESSION['id'] ?>">
                  <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion"  placeholder="Dia del Amor y la Amistad">
                </div>


          </div>
          <div class="row">
            <div class="form-group col-lg-4">
                  <label for="exampleInputEmail1">Inversión(*)</label>
                 
                  <input type="text" class="form-control" id="txtInversion" name="txtInversion"  placeholder="200000">
                </div>
                <div class="form-group col-lg-4">
                  <label for="exampleInputEmail1">Precio de Venta</label>
                 
                  <input type="text" class="form-control" id="txtprecioVenta" name="txtprecioVenta"  placeholder="10000">
                </div>
                <div class="form-group col-lg-4">
                  <label for="exampleInputEmail1">Cantidad estimada</label>
                 
                  <input type="text" class="form-control" id="txtcantidad" name="txtcantidad"  placeholder="2">
                </div>
                
          </div>

            
         

                                                
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="ingresarServicio();" class="btn  btn-success btn-block">Ingresar</button>
      </div>
    </div>

  </div>
</div>
  <!-- /.content-wrapper -->

  <?php
    include("footer.php");
    echo"<script type='text/javascript' src='scripts/principal.js'></script>";
  ?>
