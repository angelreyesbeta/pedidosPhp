  
  <?php
    include("header.php");
  ?>


  <!-- Full Width Column -->
  <div class="content-wrapper"><br>
    <div class="container" style="background-color: white">

      
      <!-- Content Header (Page header) -->


      <!-- Main content -->
  <section class="content">
      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <p align="" class="h1">Platillos <a href="" data-toggle="modal" data-target="#modalPlatillos"><span class="pull-lef badge bg-green" onclick="limpiarAgregarServicio();">+ APREGAR</span></a></p>
          <!-- /.info-box -->
        </div>          
         
        </div>

      <div class="row">
          
          <div class="col-md-12">

            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title text-green">LISTADO DE TUS PLATILLOS</h3>
            </div>



            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead align="center">
                      <tr style="text-align: center">
                        <th align="center" width="10%">Opciones</th>
                        <th>Nombre</th>
                        <th>Descripción</th>                 
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


  <div id="modalPlatillos" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-xs" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Ingresar una nuevo Plato</h3>

      </div>
      <div class="modal-body">

        <form name="frmServicio" id="frmServicio" method="POST">

          <div class="row"> 
              <div class="col-md-12" id="container"> 

              </div>
          </div>

          <div class="row">
            <div class="form-group col-lg-12">
                  <label for="exampleInputEmail1">Nombre(*)</label>
                 
                  <input type="text" class="form-control" id="txtNombre" name="txtNombre"  placeholder="Arroz Con Pollo">
                </div>
                


          </div>

          <div class="row">
            
            <div class="form-group col-lg-12">
                  <label for="exampleInputEmail1">Descripción(*)</label>
                  <input type="hidden" id="idPlatillo" name="idPlatillo">
               
                  <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion"  placeholder="Delicioso arroz compuesto de verduras, pollo, etc...">
                </div>


          </div>
          

            
         

                                                
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="guardaryeditar();" class="btn  btn-success btn-block">Ingresar</button>
      </div>
    </div>

  </div>
</div>
  <!-- /.content-wrapper -->

  <?php
    include("footer.php");
    echo"<script type='text/javascript' src='scripts/platillo.js'></script>";
  ?>
