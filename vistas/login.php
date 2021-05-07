<!DOCTYPE html>
<html>
<head>
   <title>LOGIN</title>
  <meta charset="utf-8">
    <link rel="stylesheet" href="../bower_components/css/hoja.css">
</head>
<body>
  <div class="login-content mt-8">
           
                     
                         
  <form action="" method="post" class="" id="frmAcceso">
    <div class="login-logo" style="text-align: center;">
                    <a href="login.php">
                        <img class="align-content" src="../files/logos/logo.jpeg" width="250px" alt="www.aquaterra.com.co">
                    </a>
                </div>
    <h2>Inicio de Sesión</h2>
    <input type="text" id="txtcorreo" name="txtcorreo" placeholder="usuario@aquaterra.com.co" required="">
    <input type="password" id="txtpass" name="txtpass" placeholder="Ingreso Contraseña" required="">
    <button id="btnCancelar" type="button" onclick="verificarLogin();">ENTRAR</button>
    



  </form>

  <!--<script src="../assets/js/jquery-3.1.1.min.js"></script>-->
 <script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
  <script type="text/javascript" src="scripts/login.js"></script>

</body>
</html>