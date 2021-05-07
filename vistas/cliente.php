  
  <?php
    include("header.php");
  ?>


  <!-- Full Width Column -->
  <div class="content-wrapper" ><br>
    <div class="container" style="background-color: white">

      
      <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
        <strong class="text-green"> Control de Clientes </strong> <br>  
        <small>- Consultas, Actualizacion y Registro</small>
        
      </h1>
      <ol class="breadcrumb">
        
       <button type="submit" class="btn btn-success" data-toggle="modal" onclick="limpiar();" data-target="#modalCliente">Nuevo Cliente</button>
      </ol>
    </section>
<br>

      <!-- Main content -->
      <section class="content">
        <div class="row">

         
          
          <div class="col-md-12">

            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title text-green">LISTADO DE CLIENTES</h3>
            </div>

            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead align="center">
                      <tr style="text-align: center">
                        <th align="center" width="10%">Opciones</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                                             
                      </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                  </table>
            
            <!-- /.box-body -->
          </div>
            
          </div>


       

        <!--<div class="row">
          
          <div class="col-md-12">

            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">REGISTRO DE CLIENTES</h3>
            </div>
            <form role="form">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="txtnombre">Nombre (*)</label>
                  <input type="text" class="form-control" id="txtnombre" placeholder="Nombre">
                </div>
              
                <div class="form-group">
                  <label for="exampleInputPassword1">Apellido (*)</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Apellido">
                </div>
                <div class="form-group">
                  <label for="txtnombre">Cédula</label>
                  <input type="text" class="form-control" id="txtnombre" placeholder="Cédula">
                </div>
              
                <div class="form-group">
                  <label for="exampleInputPassword1">Telefono (*)</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telefono">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Dirección (*)</label>
                  <textarea class="form-control"></textarea>
                </div>
                
              </div>
    

              <div class="box-footer" align="right">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
       
          </div>
            
          </div>


        </div> -->



     
      </div>


  

        

        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->

  <div id="modalCliente" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-lg" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-green">Registro de Clientes</h2>

      </div>
      <div class="modal-body">

        <form role="form" id="frmCliente">

                <div class="row"> 
                    <div class="col-md-12" id="container"> 

                    </div>
                </div>

               
                 <div class="row">  

                  <div class="form-group col-md-6">
                  <label for="txtnombre">Nombre (*)</label>
                  <input type="hidden" name="idCliente" id="idCliente">
                  <input type="text"  class="form-control text-green" name="txtnombre" id="txtnombre" placeholder="Nombre">
                </div>
              
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Apellido (*)</label>
                  <input type="text" class="form-control text-green" name="txtapellido" id="txtapellido" placeholder="Apellido">
                </div>

                 </div>             
                <div class="row"> 
                  <div class="form-group col-md-6 ">
                  <label for="txtcedula">Cédula</label>
                  <input type="text" class="form-control text-green" name="txtcedula" id="txtcedula" placeholder="Cédula">
                </div>
              
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Telefono (*)</label>
                  <input type="text" class="form-control text-green" name="txttelefono" id="txttelefono" placeholder="Telefono">
                </div>
                </div>
                
                <div class="row"> 
                  <div class="form-group col-md-12">
                  <label for="exampleInputPassword1">Dirección (*)</label>
                  <textarea class="form-control text-green" name="txtdireccion" id="txtdireccion"></textarea>
                </div> 

                </div>
                      
            </form>

      </div>


      <div class="modal-footer">
        <button type="button" id="btnguardarusuario" class="btn  btn-success"   onclick="guardaryeditar()">Ingresar Cliente</button>
      </div>
    </div>

  </div>
</div>

  <?php
    include("footer.php");
    echo"<script type='text/javascript' src='scripts/cliente.js'></script>";
  ?>
