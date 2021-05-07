
<?php 

if(strlen(session_id())<1)
{
  session_start();
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COMPLICES DE AMOR | Control de Pedidos</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/style.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../dist/css/estilos.css>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    
<style type="text/css">

.aEmail{
  background-color:  #A8045D !important;
}
.aEmail:hover{
  background-color:  #A8045D !important;
}
.dropdown-menu,.user-footer{
  background-color:  #670E67 !important;
}

</style>
  

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <header class="main-header" >
    <nav class="navbar navbar-static-top navheader" style="background-color: #A8045D !important">
      <div class="container">
        <div class="navbar-header">
          <a href="principal.php" class="navbar-brand" style="color: white;font-weight: bold;"><b style="color: white"></b>COMPLICES DE AMOR <i style="color: red" class="fa fa-heart"></i>
                </a>

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>


        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
         
          </ul>
      
        </div>
     
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
       
            <li class="dropdown user user-menu">
         
              <a  href="#" class="aEmail dropdown-toggle" data-toggle="dropdown" style="color:white; font-weight: bold; font-size:20px; &hover{background-color:tomato !important;}">
            
                <img src="../files/logos/logo.jpeg" class="user-image" alt="User Image" style="">
            
                <span class="aSpan hidden-xs"><?php echo $_SESSION['mail']?></span>
              </a>
              <ul class="dropdown-menu">
    
                <li class="user-header">
                  <img src="../files/logos/logo.jpeg"  class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['mail']?>
                    <small>ADMINISTRADORA</small>
                  </p>
                </li>
     
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Salir</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>

      </div>

    </nav>
  </header>

