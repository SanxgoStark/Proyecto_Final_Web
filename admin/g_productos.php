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

echo'<div style="text-align: center;width: 100%"><h1 style="">Gestion Productos</h1></div><br>';

// si es enviado el post en la ccion
if (isset($_POST['accion'])) {
	// si fue enviado entonces puedo realizar una serie de acciones
	switch ($_POST['accion']) {

		case 'delete':
			$oBD->consulta("DELETE from producto where pk_id_prod=".$_POST['Id']);
			// de mi objeto de la base de datos yo quiero desplegar la tabla
			echo $oBD->desplegarTabla("SELECT * from producto",array(),array("update","delete"));
			//echo "borrando";
			break;

		case 'formUpdate': $registro=$oBD->saca_tupla("SELECT * FROM producto where pk_id_prod=".$_POST['pk_id_prod']);

			// echo "formNew";

			echo '<div class="container">

				<h3>Editar Tipo de encuesta</h3>

				<form method="post">

				<!--si existe un id de resgitros-->
				<input type="hidden" name="accion" value="'.(isset($registro->pk_id_prod)?"update":"insert").'" />

				<!-- Se toma el registro que recuperamos -->
				<input type="hidden" name="Id" value="'.$registro->pk_id_prod.'" />

				<div class="row">
					<label class="col-md-4">Tipo</label>
					<div class="col-md-8"><input type="text" class="form-control" name="Tipo" value="'.(isset($registro->pk_id_prod)?$registro->Tipo:"").'"/></div>
				</div>

				<div class="row">
					
					<div class="col-md-8"><button type="submit">Actualizar</button></div>
				</div>
				</form>
			</div>';

		// como no hay break de cierre al ejecutar el caso FormUpdate se ejecuta el caso formUpdate

			break;

		case 'formNew':
			// echo "formNew";

			echo '<div class="container">

				<h3>Nuevo Tipo de encuesta</h3>

				<form method="post">

				<!--si existe un id de resgitros-->
				<input type="hidden" name="accion" value="'.(isset($registro->pk_id_prod)?"update":"insert").'" />


				<div class="row">
					<label class="col-md-4">Tipo</label>
					<div class="col-md-8"><input type="text" class="form-control" name="Tipo" value="'.(isset($registro->pk_id_prod)?$registro->Tipo:"").'"/></div>
				</div>


				<div class="row">
					
					<div class="col-md-8"><input type="submit"/></div>
				</div>
				</form>
			</div>';

			break;

		case 'update':
			// echo "update";
			 $query="UPDATE producto SET ";
			foreach ($_POST as $nombCampo => $valor) 
				// con esto estamos eliminando informacion que no se necesita en la conulta
				if(!in_array($nombCampo,array("accion","Id")))
				$query.=$nombCampo."='".$valor."', ";
			// se retira la ultima coma de la consulta
			$query= substr($query,0,-2);
			// id que estamos enviando del registro
			$query.=" where pk_id_prod=".$_POST['Id'];
			// ejecucion de query
		   $oBD->consulta($query);
			// impresion del query que se esta ejecutando
			// echo $query;
		   echo $oBD->desplegarTabla("SELECT * from producto",array(),array("update","delete"));
			break;

		case 'insert':
			$query="INSERT INTO producto SET ";
			foreach ($_POST as $nombCampo => $valor) 
				if(!in_array($nombCampo,array("accion")))
				$query.=$nombCampo."='".$valor."', ";
			// se retira la ultima coma de la consulta
			$query= substr($query,0,-2);
			// ejecucion de query
		   $oBD->consulta($query);
			// impresion del query que se esta ejecutando
			// echo $query;
		   echo $oBD->desplegarTabla("SELECT * from producto",array(),array("update","delete"));
			
			break;
		default:
			echo "No se ha programado: ".$_POST['accion'];
			break;
	}
}else{
	echo $oBD->desplegarTabla("SELECT * from producto",array(),array("update","delete"));
}

?>

