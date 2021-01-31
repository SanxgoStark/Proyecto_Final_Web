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

    	<div align="center" style=" margin-right: 10px;border-radius: 10px;background: rgb(20, 188, 87)">
      <li class="nav-item active">
      	
        <a style="" class="nav-link" href="home.php">
        	<img src="../img/h.png"><br>Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
       </div>

       <div align="center" style="margin-right: 10px;border-radius: 10px;background: rgb(20, 188, 87)">
      <li class="nav-item">
        <a class="nav-link" href="g_empleados.php"><img src="../img/ge.png"><br>G.Empleados
        </a>
      </li>
  	   </div>

  	   <div align="center" style="margin-right: 10px;border-radius: 10px;background: rgb(20, 188, 87)">
      <li class="nav-item">
        <a class="nav-link" href="g_productos.php"><img src="../img/p.png"><br>G.Productos
        <span class="sr-only">(current)</span></a>
      </li>
  	   </div>

  	   <div align="center" style="margin-right: 10px;border-radius: 10px;background: rgb(20, 188, 87)">
      <li class="nav-item">
        <a class="nav-link" href="ventas.php"><img src="../img/s.png"><br>Ventas
        <span class="sr-only">(current)</span></a>
      </li>
  	   </div>

  	   <div align="center" style="margin-right: 10px;border-radius: 10px;background: rgb(20, 188, 87)">
      <li class="nav-item">
        <a onclick="creaVentaDb();" class="nav-link" href="nueva_venta.php"><img  src="../img/cr.png"><br>Nueva Venta
        <span class="sr-only">(current)</span></a>
      </div>
    </ul>
    
  </div>


<span style="" class="btn btn-success" style="font-size: ; "><? echo $_SESSION['User'] ?></span>

  <span>

	  <button type = "button" class = "btn btn-outline-success"> <font style = "vertical-align: heredar;"> <font style = "vertical-align: heredar;"> <a style="color: white" href="../loginn.php">Logout</a> </font></button>

  </span>


</nav>
  <!--<a href="../login.php?=correcto">Cerrar Sesion</a>-->

<script type="text/javascript">
	

function creaVentaDb() {


}


</script>


