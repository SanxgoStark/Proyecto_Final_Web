<?php session_start(); 

// if(!isset($_SESSION['User'])){
// 		//si sesion no existe
// 		header("location: index.php?m=100");
// 	}

?>	

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrapnew.css">
</head>
<body>


<!-- <h1 style="color:rgb(100,255,255)">Hola</h1> -->

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


  <span style="" class="btn btn-success" style="font-size: ; "><? echo $_SESSION['User'] ?></span>

  <span>

	  <button type = "button" class = "btn btn-outline-success"> <font style = "vertical-align: heredar;"> <font style = "vertical-align: heredar;"> <a style="color: white" href="loginn.php">Logout</a> </font></button>

  </span>


<!-- esto es un comentario de prueba para github -->

</nav>
<div style="text-align: center;width: 100%"><h1 style="">Home Vendedor</h1></div><br>
</body>
</html>



