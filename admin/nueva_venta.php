<?php
include "header.php"; 
include "menu.php";
include "../class/classBaseDatos.php";
?>

<html>
<head>

	<script src="../js/jquery-3.5.1.min.js"></script>

	<script language="javascript">


            function doSearch() {
                var tableReg = document.getElementById('regTable');
                var searchText = document.getElementById('searchTerm').value.toLowerCase();
                for (var i = 1; i < tableReg.rows.length; i++) {
                    var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                    var found = false;
                    for (var j = 0; j < cellsOfRow.length && !found; j++) {
                        var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                        if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                            found = true;
                        }
                    }
                    if (found) {
                        tableReg.rows[i].style.display = '';
                    } else {
                        tableReg.rows[i].style.display = 'none';
                    }
                }
            }

      		function addproducto(){
      			alert("addproducto");
   
      		};

      		$(document).ready(function(){

      				$("#addproduct").click(function(){
		
						alert("esto es ajax");

						
					})

					$("#btnventa").click(function(){
		
						alert("esto es ajax");

						
					})
      		});
</script>
</head>
<body>

</body>
</html>

<?php

   echo '<h1 style="text-align: center">Nueva venta</h1>
		 <p style="text-align: center" class="text-success"></p>';

// Obtencion de fecha del dia 
date_default_timezone_set('America/Mexico_City');

$hora = date("g:i a");
$fecha = date("Y,n,j");
///////////////////////////////////////////////////////////////////////////////////////
$idEmp = $_SESSION['Id'];
$queryi="INSERT INTO venta(fk_id_emp,fecha) values($idEmp,'$fecha')";
// ejecucion de query
$oBD->consulta($queryi);
///////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////////////
// QUERY PARA SELECCIONAR LA ULTIMA VENTA
$queryVent = "SELECT Id FROM venta ORDER BY Id DESC LIMIT 1";
$resultados = $oBD->consulta($queryVent);
$consulta = mysqli_fetch_array($resultados);
$idV = $consulta['Id'];




$queryVd = "SELECT nomb_prod as Producto,precio_prod as Precio,cantidad as Cantidad FROM venta_detalle VD join producto P on VD.fk_id_prod = P.Id WHERE VD.Id =".$consulta['Id'];


// qury producto para ahacer registro en base de datos
$query = "SELECT P.Id,nomb_prod as Producto,nomb_prov as Proveedor,cantidad_prod as Cantidad,unidad_prod as Unidad,precio_prod as Precio from producto P join proveedor PR on P.fk_id_prov = PR.Id";

// query para calcular el total de los productos añadidos a una tabla de selccion de productos
$querytotal = "SELECT SUM(precio_prod) AS sumallprod FROM producto";
$resultadosqt = $oBD->consulta($querytotal);
$consultaqt = mysqli_fetch_array($resultadosqt);
$total = $consultaqt['sumallprod'];

$idprod = (isset($registro->Id)?$registro->Id:"");

if (isset($_POST['accion'])) {

	switch ($_POST['accion']){

		case 'addp'://////////////////////////////////////////////////////////////////////	

			// se ejecuta la funcion de js
   			echo '<script type="text/javascript">
 			   addproducto();
   				 </script>';

   				// consulta necesaria para poder obtener los valores fila de la tabla en especifico
				$registro=$oBD->saca_tupla("SELECT * FROM producto where Id=".$_POST['Id']);

				// echo $_POST['Id'];
				// echo "presionaste add";
				
				$addproduct = "INSERT INTO venta_detalle(Id,fk_id_prod,precio_ref,cantidad) values($idV,$registro->Id,$registro->precio_prod,8)";
				$oBD->consulta($addproduct);

				// echo $oBD->desplegarTabla($queryVd,array(),array("delp"));


			break;

		case 'delp'://////////////////////////////////////////////////////////////////////

		    echo'<div>

			<div style="width: 50%;float: left;;background:">

        
       	    <div style="width: 100%">
       		 <img src="../img/search.png">
        	 <input id="searchTerm" type="text" onkeyup="doSearch()"/>
       	    <br>';

        	echo $oBD->desplegarTabla($query,array(),array("addp"));

       		echo '</div>

			</div>

			<div style="width: 50%;float: right; background:">';
				echo $oBD->desplegarTabla("SELECT * FROM producto where Id=".$_POST['Id'],array(),array("delp"));

				echo'<div style="width:70px">

				<div style="" class="row">
				<h1 class="col-md-4" style="size:34px">Total</h1>
				<div style="left:55px" class="col-md-4"><input style="width:70px;" type="text" class="form-control" name="Id" value="'.(isset($registro->Id)?$registro->Id:"").'"/></div>
				</div>

				</div>';

				echo '

					<div align="center">

						<button style="width:80px" type = "button" class = "btn btn-success">
						<img src="../img/s.png"><br>
						<font style = "">Venta</font>
						</button>

					</div>
					

				';


			'</div>;

	        </div>';

			break;

		default:
			echo "No se ha programado: ".$_POST['accion'];
			break;
		}

}else{//////////////////////////////////////////////////////////////////////

	echo'<div>

			<div style="width: 50%;float: left;;background:">

        
       	    <div style="width: 100%">
       		 	<img src="../img/search.png">
        		 <input id="searchTerm" type="text" onkeyup="doSearch()"/>
       	    	<br>';

        	echo $oBD->desplegarTabla($query,array(),array("addp"));

       		echo '</div>

			</div>

			<div style="width: 50%;float: right; background:;">';
				echo $oBD->desplegarTabla($queryVd,array(),array("delp"));

				echo'<div style="width:70px;float:right;margin-right:150px">

						<div class="row">
							<h1 class="col-md-4" style="size:34px">Total</h1>

							<div style="left:55px" class="col-md-4">
							<label style="font-size:32px">'.$total.'</label>
							</div>

						</div>

					</div>


					<div style="width:70px">

						<div style="" class="row">
							<h3 class="col-md-4" style="size:34px">Pago</h3>

							<div style="left:55px" class="col-md-4">
							<input style="width:70px;" type="text" class="form-control" name="Id" value=""/>
							</div>

						</div>

					</div>

					<div style="width:70px">

						<div style="" class="row">
							<h3 class="col-md-4" ">Cambio</h3>

							<div style="left:55px" class="col-md-4">
							<input style="width:70px;" type="text" class="form-control" name="Id" value=""/>
							</div>

						</div>

					</div>';

				echo '

					<div align="center">

						<button id="btnventa" style="width:80px" type = "button" class = "btn btn-success">
						<img src="../img/s.png"><br>
						<font style = "">Venta</font>
						</button>

					</div>


					

				';


			'</div>;

	        </div>';

}

?>




