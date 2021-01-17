<?php // checar espacio antes del inicio por qu e

	session_start();

	// inclusion de la clase de base de dato (para conexion global)
	include "class/classBaseDatos.php"; // esto realiza la conexion a la base de datos

	

		//echo "<h1>Se conecto bien</h1>";


		//paso 2 realizar consulta que se requiera
		// consulta que trae toda la info base de un usuario
		$cad = "SELECT * FROM usuario where nomb_usua ='".$_POST['x']."' and pass_usua=password('".$_POST['y']."')";

		//$cad="INSERT INTO usuario SET Nombre='".$_POST['nombre']."', Apellidos='".$_POST['apellidos']."', Email='".$_POST['email']."', Password=password('".$nuevPWD."')";

		//echo $cad;

		// bloqe ontiene la informacion (CONSULTA), contiene la informacion della consulta anterior
		// tupla = registro
		$tupla = $oBD->saca_tupla($cad); // se realiza consulta
		//mysqli_query($conexion,$cad); // busco mi usuario
		
		//sistemasinformatica@itcelaya.edu.mx
		//salvador.sosa@itcelaya.edu.mx

		// para cerrar conexion
		//mysqli_close($conexion);
		//var_dump($bloque);

		// si mi usuario esta en la base de datos
		//if(mysqli_num_rows($bloque)==1) // cuantos registros tiene mi bloque
		if ($oBD->numeRegistros == 1)
		{
			// se trae un registro (tomo el bloque y trae el primer registro), se debe hacer barrido sobre bloque
			//$registro = mysqli_fetch_object($bloque); // se trae un registro, el primero




			// nombre y apellidos se guardan en una sesion
			$_SESSION['User']=$tupla->nomb_usua; // guardado del usuario en la
			// generacion de variables de sesion para almacear datos de un suario en l asesion


			$_SESSION['Id']=$tupla->Id; // alamacena id de usuario 
			// $_SESSION['email']=$tupla->Email; // alamcena email de uausrio
			// $_SESSION['foto']=$tupla->Id.".".$tupla->Foto; // alamcena foto de usuario en la sesion
			// para varios tipos de usuarios

			// Guardado del rol del usuario en la sesion
			$_SESSION['Rol']=$tupla->fk_id_rol;
			//asignar a variable
	        $rolUser = $_SESSION['Rol'];
	        //asegurar que no tenga "", <, > o &
	        $rolU = htmlspecialchars($rolUser);

			if ($rolU == 1) {
				// Gerente 1
				
				header("location: admin/home.php");
			}else{
				// Vendedor 2
				header("location: prueba.php");
			}

		}else
		{

			// sesion de manejo de errores video 17/11/2020 min 18
			$_SESSION['error']= "Datos Incorrectos";
			// no se puede hacer impresinn de texto html antes a header puede macar error
			header("location: loginn.php?m=1"); // redirecciona asia un recurso relativo o de internet 
			//echo "datos correctos";
		}
		
		//echo $cad;

		// niveles o capas de seguridad

		// 1ro se requiere logue

		// 2do capa (ninguna clave debe poder verse en la bd)
			//cambiar de logitud el campo password a 44
			//y al momento de ingresar un usuario en su contraseña aplicar MD5 
		//3ro evitemos inyecciones de sql

		//$_POST['y']= str_replace("'", "", subject)

		//4to Ataques. muerte ping	
 ?>

