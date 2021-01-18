<?php
  session_start();
  session_destroy();
?>

<html>
<head>
	<title>Proyecto</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrapnew.css">

  <script src="js/jquery-3.5.1.min.js"></script>

  <script type="text/javascript">
    // Colocar funciones aqui


    function ocultaralert() {
          $("#hola").fadeOut(700);
          // alert("pulsaste el boton x");
    }

    // para poder ejecutar lafuncion que esta adentro primero debe estar cargado el htl al 100%
    // eso se logra con la funcion siguiente
    // esto es para funciones jquery
    $(document).ready(function()
    {

      // $("#btn").click(function(){

      //     alert("pulsaste el boton x");

      // }); 

    });


  </script>



</head>
<body>



<!-- Se incluye la cabecera header.php generica para centralizar todos los cambios -->
<? /*include "header.php";*/ ?>

<style type="text/css">
	.renglon{margin-top: 65px;}
</style>

<div style="position: absolute;width: 100%;height: 100%; align-content: center; background-image: url(img/fondo.png"); >

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a style="font-family: sans-serif;font-size: 25px" class="navbar-brand" href="">PexSales</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      
    </ul>
    
  </div>


</nav>

<!-- contenedor -->
<div class="container" style=";justify-content: center;width: 500px;">
  <div class="row renglon">
    <div style="background: rgba( 255, 255, 255,0.9);position: absolute;border-radius: 20px" class="col-md-5">
      <!--  -->
<form action="validar.php" method="post">
  <fieldset>

    <legend style="position: relative; left: 180px"><img src="img/usergrey.png"></legend>
   
    <div class="form-group">
      <label for="idEmail">Usuario</label>
      <input type="text" class="form-control" id="idEmail" placeholder="Ingresa usuario" name="x">
      <small id="emailHelp" class="form-text text-muted">Si no recuerdas tu usuario ponte en contacto con el administrador del sistema.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Contraseña</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" name="y">
      <br>
      <!-- por defecto el boton es submit -->
      <button type="submit" class="btn btn-success">Enviar</button>
      
      </form></td>
    </div>
    
    <!-- <input id="btn" onclick="ocultaralert()" type="button"  value="alerta"></input> -->
</form>

    </div>
  </div>
</div>



</div>

<?php

// con esto se logra que el recurso login reciba el parametro m de validar y en base a m login 
//mande mensaje a la vista del cliente -->
if (isset($_GET['m']) && $_GET['m']==1)
  echo '

  <div id="hola" style="; width:400px; left: 500px; bottom: -530px" class="alert alert-dismissible alert-danger">

    <button onclick="ocultaralert()" type="button" class="close" data-dismiss="alert">&times;</button>

    <strong>Por favor!</strong> <a href="#" class="alert-link">verifica tus credenciales</a> e intenta nuevamente.

  </div>

  ';

// <button id="boton3" style="display:none" type="button" >Ocultar</button>


// <style>
// #boton{display:none;}
// </style>

// manejo de erro m con sesiones
session_start();
if (isset($_SESSION['error']) && $_SESSION['error']>"")
  echo '<h1>'.$SESSION['error'].'</h1>';



?>

</body>
</html>