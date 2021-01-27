<?php

include "header.php";
include "menu.php";
include "../class/classBaseDatos.php";
//var_dump($_POST);

$query = "SELECT pk_id_vent,fecha,CONCAT(nomb_emp,' ',apepat_emp,' ',apemat_emp)as empleado FROM venta V join empleado E on V.fk_id_emp = E.pk_id_emp";

// echo $query;
echo'<div style="text-align: center;width: 100%"><h1 style="">Ventas</h1></div><br>';

echo $oBD->desplegarTabla($query,array(),array("detalle"));

?>
