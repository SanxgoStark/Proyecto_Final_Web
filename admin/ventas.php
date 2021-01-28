<?php

include "header.php";
include "menu.php";
include "../class/classBaseDatos.php";
//var_dump($_POST);

$query = "SELECT V.Id,fecha,CONCAT(nomb_emp,' ',apepat_emp,' ',apemat_emp)as empleado FROM venta V join empleado E on V.fk_id_emp = E.Id";

// echo $query;
echo'<div style="text-align: center;width: 100%"><h1 style="">Ventas</h1></div><br>';




if (isset($_POST['accion'])) {


	switch ($_POST['accion']) {

		case 'delete':

			$oBD->consulta("DELETE from producto where Id=".$_POST['Id']);
			// de mi objeto de la base de datos yo quiero desplegar la tabla
			echo $oBD->desplegarTabla("SELECT * from producto",array(),array("update","delete"));
			//echo "borrando";
			break;
		}
	}else{
		echo $oBD->desplegarTabla($query,array(),array("detalle"));
	}

?>
