<?php

include "header.php";
include "menu.php";
include "../class/classBaseDatos.php";
//var_dump($_POST);

// $query = "SELECT * FROM empleado";



$query = "SELECT E.Id,CONCAT(nomb_emp,' ',apepat_emp,' ',apemat_emp)as Empleado,direccion_emp as Direccion,nss_emp as NSS,fechanac_emp as Nacimiento,telnum_emp as Telefono,nomb_usua as Usuario,
    clave_cancelv as Clv_X,nomb_rol as Rol FROM empleado E
    join usuario_emp U ON E.Id = U.Id join usuario US ON U.fk_id_usua = US.Id join rol R ON US.fk_id_rol = R.Id";

// SELECT * FROM Tabla1 INNER JOIN Tabla2
// ON Tabla1.identificador = Tabla2.identificador;

echo'<div style="text-align: center;width: 100%"><h1 style="">Gestion Empleados</h1></div><br>';

// si es enviado el post en la ccion
if (isset($_POST['accion'])) {

	// echo $_POST['accion'] ;
	// si fue enviado entonces puedo realizar una serie de acciones
	switch ($_POST['accion']) {

		case 'delete':

			$oBD->consulta("DELETE from empleado where Id=".$_POST['Id']);
			// de mi objeto de la base de datos yo quiero desplegar la tabla
			echo $oBD->desplegarTabla("SELECT * from empleado",array(),array("update","delete"));
			//echo "borrando";
			break;

		case 'formUpdate': $registro=$oBD->saca_tupla("SELECT * FROM empleado where Id=".$_POST['Id']);

			// echo "formNew";

			echo '<div class="container">

				<h3>Editar Empleado</h3>

				<form method="post">

				<!-- Se toma el registro que recuperamos -->
				<input type="hidden" name="Id" value="'.$registro->Id.'" />

				<!--si existe un id de resgitros-->
				<input type="hidden" name="accion" value="'.(isset($registro->Id)?"update":"insert").'" />

				<div class="row">
					<label class="col-md-4">Nombre</label>
					<div class="col-md-8"><input type="text" class="form-control" name="nomb_emp" value="'.(isset($registro->Id)?$registro->nomb_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Apellido paterno</label>
					<div class="col-md-8"><input type="text" class="form-control" name="apepat_emp" value="'.(isset($registro->Id)?$registro->apepat_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Apellido Materno</label>
					<div class="col-md-8"><input type="text" class="form-control" name="apemat_emp" value="'.(isset($registro->Id)?$registro->apemat_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Direccion</label>
					<div class="col-md-8"><input type="text" class="form-control" name="direccion_emp" value="'.(isset($registro->Id)?$registro->direccion_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">NSS</label>
					<div class="col-md-8"><input type="text" class="form-control" name="nss_emp" value="'.(isset($registro->Id)?$registro->nss_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Nacimiento</label>
					<div class="col-md-8"><input type="text" class="form-control" name="fechanac_emp" value="'.(isset($registro->pk_id_prod)?$registro->fechanac_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Genero</label>
					<div class="col-md-8"><input type="text" class="form-control" name="genero_emp" value="'.(isset($registro->Id)?$registro->genero_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Tel</label>
					<div class="col-md-8"><input type="text" class="form-control" name="telnum_emp" value="'.(isset($registro->Id)?$registro->telnum_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Sueldo</label>
					<div class="col-md-8"><input type="text" class="form-control" name="sueldo_emp" value="'.(isset($registro->Id)?$registro->sueldo_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">CURP</label>
					<div class="col-md-8"><input type="text" class="form-control" name="curp_emp" value="'.(isset($registro->Id)?$registro->curp_emp:"").'"/></div>
				</div>

				
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

				<h3>Nuevo Empleado</h3>

				<form method="post">

				<!--si existe un id de resgitros-->
				<input type="hidden" name="accion" value="'.(isset($registro->Id)?"update":"insert").'" />

				<div class="row">
					<label class="col-md-4">Nombre</label>
					<div class="col-md-8"><input type="text" class="form-control" name="nomb_emp" value="'.(isset($registro->Id)?$registro->nomb_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Apellido paterno</label>
					<div class="col-md-8"><input type="text" class="form-control" name="apepat_emp" value="'.(isset($registro->Id)?$registro->apepat_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Apellido Materno</label>
					<div class="col-md-8"><input type="text" class="form-control" name="apemat_emp" value="'.(isset($registro->Id)?$registro->apemat_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Direccion</label>
					<div class="col-md-8"><input type="text" class="form-control" name="direccion_emp" value="'.(isset($registro->Id)?$registro->direccion_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">NSS</label>
					<div class="col-md-8"><input type="text" class="form-control" name="nss_emp" value="'.(isset($registro->Id)?$registro->nss_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Nacimiento</label>
					<div class="col-md-8"><input type="text" class="form-control" name="fechanac_emp" value="'.(isset($registro->pk_id_prod)?$registro->fechanac_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Genero</label>
					<div class="col-md-8"><input type="text" class="form-control" name="genero_emp" value="'.(isset($registro->Id)?$registro->genero_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Tel</label>
					<div class="col-md-8"><input type="text" class="form-control" name="telnum_emp" value="'.(isset($registro->Id)?$registro->telnum_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">Sueldo</label>
					<div class="col-md-8"><input type="text" class="form-control" name="sueldo_emp" value="'.(isset($registro->Id)?$registro->sueldo_emp:"").'"/></div>
				</div>

				<div class="row">
					<label class="col-md-4">CURP</label>
					<div class="col-md-8"><input type="text" class="form-control" name="curp_emp" value="'.(isset($registro->Id)?$registro->curp_emp:"").'"/></div>
				</div>

				
				<div class="row">
					
					<div class="col-md-8"><input type="submit"/></div>
				</div>
				</form>
				</div>';

			break;

		case 'update':
			// echo "update";
			 $queryu="UPDATE empleado SET ";
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
			$queryi="INSERT INTO empleado SET ";
			foreach ($_POST as $nombCampo => $valor) 
				if(!in_array($nombCampo,array("accion")))
				$queryi.=$nombCampo."='".$valor."', ";
			// se retira la ultima coma de la consulta
			$queryi= substr($queryi,0,-2);
			echo $queryi;
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

