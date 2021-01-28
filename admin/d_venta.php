<?php

	include "header.php"; // cabecera con enlaces hacia css
	// HEADER.PHP CONTIENE EL SESSION START POR ESO SE COLOCA PRIMERO EN INCLUDE
   include "menu.php";
   include "../class/classBaseDatos.php";

   echo '<h1 style="text-align: center">Detalle venta</h1>
		 <p style="text-align: center" class="text-success">'.$_POST['Id'].'</p>
   ';

   $idV = $_POST['Id'];

   $query = "SELECT nomb_prod as Producto,precio_prod as Precio,cantidad as Cantidad FROM venta_detalle VD join producto P on VD.fk_id_prod = P.Id WHERE VD.Id =".$idV;

   // $query = "SELECT * FROM venta_detalle WHERE fk_id_vent =".$idV;

// echo $query;

   switch ($_POST['accion']) {

		case 'detalleV':

		// echo $_POST['pk_id_vent'];

			// echo "hola";

			echo $oBD->desplegarTabla($query,array(),array());

			break;
}



?>
