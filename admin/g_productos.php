<?php
/*
include "header.php";
include "menu.php";
include "../class/classBaseDatos.php";

// de mi objeto de la base de datos yo quiero desplegar la tabla
echo $oBD->desplegarTabla("SELECT * from tipoencusta");
*/

include "header.php";
include "menu.php";
include "../class/classBaseDatos.php";
//var_dump($_POST);

$query = "SELECT P.Id,nomb_prod as Producto,nomb_prov as Proveedor,cantidad_prod as Cantidad,unidad_prod as Unidad,precio_prod as Precio from producto P join proveedor PR on P.fk_id_prov = PR.Id";


// SELECT * FROM Tabla1 INNER JOIN Tabla2
// ON Tabla1.identificador = Tabla2.identificador;

echo'<div style="text-align: center;width: 100%"><h1 style="">Gestion Productos</h1></div><br>';

// si es enviado el post en la ccion
if (isset($_POST['accion'])) {

	// echo $_POST['accion'] ;
	// si fue enviado entonces puedo realizar una serie de acciones
	switch ($_POST['accion']) {

		case 'delete':

			$oBD->consulta("DELETE from producto where Id=".$_POST['Id']);
			// de mi objeto de la base de datos yo quiero desplegar la tabla
			echo $oBD->desplegarTabla("SELECT * from producto",array(),array("update","delete"));
			//echo "borrando";
			break;

		case 'formUpdate': $registro=$oBD->saca_tupla("SELECT * FROM producto where Id=".$_POST['Id']);
			echo $_POST['Id'];
			// echo "formNew";

			echo '<div class="container">

				<h3>Editar Producto</h3>

				<form method="post">

				<!-- Se toma el registro que recuperamos -->
				<input type="hidden" name="Id" value="'.$registro->Id.'" />

				<!--si existe un id de resgitros-->
				<input type="hidden" name="accion" value="'.(isset($registro->Id)?"update":"insert").'" />

				<div class="row">
					<label class="col-md-4">Nombre</label>
					<div class="col-md-8"><input type="text" class="form-control" name="nomb_prod" value="'.(isset($registro->Id)?$registro->nomb_prod:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Unidad</label>
					<div class="col-md-8"><input type="text" class="form-control" name="unidad_prod" value="'.(isset($registro->Id)?$registro->unidad_prod:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Contenido</label>
					<div class="col-md-8"><input type="text" class="form-control" name="cantidad_prod" value="'.(isset($registro->Id)?$registro->cantidad_prod:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Precio</label>
					<div class="col-md-8"><input type="text" class="form-control" name="precio_prod" value="'.(isset($registro->Id)?$registro->precio_prod:"").'"/></div>
				</div>

				

				<div class="row">
					<label class="col-md-4">Proveedor</label>
					<div class="col-md-8">';


			echo $oBD->creaSelect("proveedor","Id","nomb_prov","fk_id_prov",isset($registro->Id)?$registro->fk_id_prov:-1);


			echo '</div>
			<div class="row">
					
					<div class="col-md-8"><input type="submit"/></div>
				</div>
				</form>
				</div>';

		// como no hay break de cierre al ejecutar el caso FormUpdate se ejecuta el caso formUpdate

			break;

		case 'formNew':
			// echo "formNew";

			echo '<div class="container">

				<h3 style="text-align:">Nuevo Producto</h3>

				<form method="post">

				<!--si existe un id de resgitros-->
				<input type="hidden" name="accion" value="'.(isset($registro->Id)?"update":"insert").'" />


				<div class="row">
					<label class="col-md-4">Nombre</label>
					<div class="col-md-8"><input type="text" class="form-control" name="nomb_prod" value="'.(isset($registro->Id)?$registro->nomb_prod:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Unidad</label>
					<div class="col-md-8"><input type="text" class="form-control" name="unidad_prod" value="'.(isset($registro->Id)?$registro->unidad_prod:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Contenido</label>
					<div class="col-md-8"><input type="text" class="form-control" name="cantidad_prod" value="'.(isset($registro->Id)?$registro->cantidad_prod:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Precio</label>
					<div class="col-md-8"><input type="text" class="form-control" name="precio_prod" value="'.(isset($registro->Id)?$registro->precio_prod:"").'"/></div>
				</div>


				<div class="row">
					<label class="col-md-4">Proveedor</label>
					<div class="col-md-8">';


			echo $oBD->creaSelect("proveedor","Id","nomb_prov","fk_id_prov",isset($registro->Id)?$registro->fk_id_prov:-1);


			echo '</div>
			<div class="row">
					
					<div class="col-md-8"><input type="submit"/></div>
				</div>
				</form>
				</div>';

			break;

		case 'update':
			// echo "update";
			 $queryu="UPDATE producto SET ";
			foreach ($_POST as $nombCampo => $valor) 
				// con esto estamos eliminando informacion que no se necesita en la conulta
				if(!in_array($nombCampo,array("accion","Id")))
				$queryu.=$nombCampo."='".$valor."', ";
			// se retira la ultima coma de la consulta
			$queryu= substr($queryu,0,-2);
			// id que estamos enviando del registro
			$queryu.=" where Id=".$_POST['Id'];

			echo $queryu;
			// ejecucion de query
		   $oBD->consulta($queryu);
			// impresion del query que se esta ejecutando
			// echo $query;
		   echo $oBD->desplegarTabla($query,array(),array("update","delete"));

			break;

		case 'insert':
			$queryi="INSERT INTO producto SET ";
			foreach ($_POST as $nombCampo => $valor) 
				if(!in_array($nombCampo,array("accion")))
				$queryi.=$nombCampo."='".$valor."', ";
			// se retira la ultima coma de la consulta
			$queryi= substr($queryi,0,-2);
			// ejecucion de query
		   $oBD->consulta($queryi);
			// impresion del query que se esta ejecutando
			// echo $query;
		   echo $oBD->desplegarTabla($query,array(),array("update","delete"));
			
			break;
		default:
			echo "No se ha programado: ".$_POST['accion'];
			break;
	}
}else{
	echo $oBD->desplegarTabla($query,array(),array("update","delete"));
	// echo $query;
}

?>

