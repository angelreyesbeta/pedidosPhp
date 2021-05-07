<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Ordes Client</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-3 text-center">
    <!--<img class="d-block mx-auto mb-4" src="assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
    <h1 class="text-dark">Gracias por llegar hasta aqui :)</h1>
    <!--<p class="lead text-warning">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>-->
  </div>

  <!--d-block mx-auto mb-4-->
    <div class="col-md-12 order-md-1 text-dark " >
      <h4 class="mb-4" align="center">Nuestros plato Disponible</h4>
        <div class="row mb-3">
          <div class="col-md-5 mb-3" >
           <img class=" d-block mx-auto rounded" src="assets/brand/desmechada.jpg" alt="Lasaña" width="300" height="200">
          </div>
          <div class="col-md-5">

            <h2 class="text-dark">Carne mechada para el 4 de octubre</h2>
            <p class="lead">Carne de res desmechada sudada en temendo guiso, acompañada de un chorizo jugoso santarosano, una suculenta ensalada de los 2 repollos (verve y morado), zanahoria, cebolla y una crema casera, papa y yuca cocida, mazorca, jugo masai</p>
            
          
        </div>
        <div class="col-sm-2" align="left">

            <h3  class="text-dark">$15.000</h3>
          
        </div>
            
            
          </div>
          <!--<div class="row">
              <div class="col-sm-12">
                 <button class="btn btn-outline-primary btn-lg btn-block" type="button" onclick="agregar();">Agregar
                 </button>
              </div>
          </div>-->
            <hr/>
            <div class="row">
              <div class="col-6 col-sm-6">
                  <h6>Cantidad</h6>
              </div>
              <div class="col-3 col-sm-3" align="right">
                  <h5 id="idcantidad"  class="text-dark">0</h5>
                  
              </div>
              <div class="col-3 col-sm-3" align="left">
                  <button class="btn btn-outline-primary" style="border-radius: 20%; padding: 5px;" type="button" onclick="agregar();">+</button>
                  <button class="btn btn-outline-danger" style="border-radius: 20%; padding: 5px;" type="button" onclick="restar();">-</button>

              </div>
              
          
            </div>
            <div class="row">
              <div class="col-6 col-sm-6 ">
                  <h6>Valor total a pagar</h6>
              </div>
              <div class="col-3 col-sm-3" align="right">
                  <h5 id="idValPagar" class="text-dark">$. 0</h5>
              </div>
              
          
            </div>
            

            <hr/>
            <form name="frmServicio" id="frmServicio" method="POST" class="needs-validation" novalidate>

            <div class="row">
              <div class="col-md-6 mb-3">
                <input type="hidden" id="txtCantidad" name="txtCantidad">
                <input type="hidden" id="txtValorTotal" name="txtValorTotal">
                <input type="hidden" id="fechahora" name="fechahora">
                <input type="hidden" id="txtValorU" name="txtValorU">
                <label for="text">Nombre Completo <span class="text-muted">(*)</span></label>
                <input type="text" class="form-control" id="txtNameCompleto" name="txtNameCompleto" placeholder="Juan Perez" required>
                <div class="invalid-feedback">
                   Por favor ingresa la informaión requerida.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="text">Telefono <span class="text-muted">(*)</span></label>
                <input type="text" class="form-control" id="txtPhone" name="txtPhone" placeholder="3157894565" required>
                <div class="invalid-feedback">
                 Por favor ingresa la informaión requerida.
                </div>
              </div>

              
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="address2">Dirección con referencias <span class="text-muted">(*)</span></label>
                <textarea class="form-control" id="txtAddress" name="txtAddress" required>

                </textarea>
                <div class="invalid-feedback">
                 Por favor ingresa la informaión requerida.
                </div>
              </div>
            </div>
            <div class="row">
              
              <div class="col-md-12 mb-3">
          <label for="address">Algo adiccional? (Opcional)</label>
          <input type="text" class="form-control" id="txtAddicional" name="txtAddicional" placeholder="1234 Main St">
          <div id="idalert" class="invalid-feedback" >
            
          </div>
        </div>

            </div>
     
            

          <hr class="mb-4">
          <div id="idbtn">

            
          </div>
        

            
            </form>
          </div><!--cierre col 12 -->
            
      


        
      
    </div> <!-- Cierre container 12 -->
  </body>
 

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020 Betapp</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="http://www.betappsoft.com" target="_blanck">Contact</a></li>
    </ul>
  </footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="form-validation.js"></script></body>
       
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <!--cierre col 12 -->




</html>




















<!-- <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" id="state" required>
              <option value="">Choose...</option>
              <option>California</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div> -->
