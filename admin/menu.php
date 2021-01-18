<?php

?>


<!-- Este es un header especial para el administrador-->

<!-- concentracion de nav bar para no tener qeu hacer cambios de rutas en todos los archivos -->
<!-- al hacer cambios aqui se veran reflajados en dos los archivos donde tenga el include  -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a style="font-family: sans-serif;font-size: 25px" class="navbar-brand" href="">PexSales</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">

    	<div style="margin-right: 10px;background: rgb(20, 188, 87)">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">
        	<img src="../img/home.png"><br>Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
       </div>

       <div style="margin-right: 10px;background: rgb(20, 188, 87)">
      <li class="nav-item">
        <a class="nav-link" href="g_empleados.php">G.Empleados
        </a>
      </li>
  	   </div>

      <li class="nav-item">
        <a class="nav-link" href="g_productos.php">G.Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ventas.php">Ventas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nueva_venta.php">Nueva Venta</a>
      
    </ul>
    
  </div>


<span style="" class="btn btn-success" style="font-size: ; "><? echo $_SESSION['User'] ?></span>

  <span>

	  <button type = "button" class = "btn btn-outline-success"> <font style = "vertical-align: heredar;"> <font style = "vertical-align: heredar;"> <a style="color: white" href="../loginn.php">Logout</a> </font></button>

  </span>


</nav>
  <!--<a href="../login.php?=correcto">Cerrar Sesion</a>-->




