  
  <?php
    include("header.php");
  ?>

<style type="text/css">

  .divservicios{
    background-color: #670E67;
    color:white;
    border-radius:25px;
    text-align:center;
    display:flex;
    align-items: center;
    justify-content: space-between;
  }
  .h1servicios{
    width: 100%;
    font-weight: bold;
  }
  .aServicios{
    cursor: pointer;
    border-radius:50px;
  }
  .bg-pink{
    background-color: pink;
    color: #670E67;
  }
</style>


  <!-- Full Width Column -->
  <div class="content-wrapper" style="background-color:  #fff "><br>
    <div class="container" style="background-color:  #fff ">
  <section class="content">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 divservicios">
          <h1 class="h1servicios">SERVICIOS</h1>
          <a class="aServicios"  data-toggle="modal" data-target="#modalServicio"><span class="pull-lef badge " style="background-color: peru;color: white; font-weight: bold;padding: 10px;font-size: 20px" onclick="limpiarAgregarServicio();">+ Nuevo</span></a>
        </div> 
      </div>
      <a href="#Abierto" class="btn btn-success" style="margin-top:3%;"  data-toggle="collapse">Servicios Abiertos</a>
      <div id="Abierto" class="collapse in">
        <div class="row">
          <div class="row" align="center" >
              <div style="display: none; " id="containerCargando"   class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <img align="center" src="../files/gif/cargando1.gif">
              </div>
          </div>
        
          <div id="containerServicios">
        
          </div>
        
        
        </div>
      </div>

    

      <a href="#AbiertoSinPedidos" class="btn btn-warning" style="margin-top:3%;"  data-toggle="collapse">Servicios Abiertos Sin pedidos</a>
      <div id="AbiertoSinPedidos" class="collapse in">
        <div class="row">
          <div class="row" align="center" >
              <div style="display: none; " id="containerCargando2"   class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <img align="center" src="../files/gif/cargando1.gif">
              </div>
          </div>
        
          <div id="containerServiciosSinPedidos">
        
          </div>
        
        
        </div> 
      </div>
    
      <a href="#Cerrado" class="btn btn-danger" style="margin-top:3%;"  data-toggle="collapse">Servicios Cerrados</a>
      <div id="Cerrado" class="collapse in">
        <div class="row">
        
          <div class="row" align="center" >
        
              <div style="display: none; " id="containerCargando3"   class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <img align="center" src="../files/gif/cargando1.gif">
              </div>
          </div>
        
          <div id="containerServiciosCerrado">
        
          </div>
        
        
        </div>
        
      </div>
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
