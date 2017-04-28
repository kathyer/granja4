<?php
	include_once("login_snippet.php");
	include_once("cliente_modelo.php");
	$pagina = "Nuevo Cliente";

	$nombre = "";
	$nif = "";
	$nombreGestor = "";
	$direccion = "";
	$codigoPostal = "";
	$localidad = "";
	$telefono = "";
	$telefono2 = "";
	$email = "";
	
	/* Comprobamos si se han recibido datos */
	if ($_POST)
	{
		$erroresValidacion = validarDatosCliente($_POST);

		if ($erroresValidacion == "OK")
		{
			if(guardarCliente($_POST))
			{
				crearMensajeExito($_POST["nombre"] . " guardado correctamente");
			}
			else
			{
				crearMensajeError("Ha ocurrido un error al guardar los datos. Consulta con el administrador");
			}
		}
		else
		{
			// Mostramos los errores y rellenamos los campos

			crearMensajeError($erroresValidacion);

			$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
			$nif = isset($_POST["nif"]) ? $_POST["nif"] : "";
			$nombreGestor = isset($_POST["nombreGestor"]) ? $_POST["nombreGestor"] : "";
			$direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
			$codigoPostal = isset($_POST["codigoPostal"]) ? $_POST["codigoPostal"] : "";
			$localidad = isset($_POST["localidad"]) ? $_POST["localidad"] : "";
			$telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
			$telefono2 = isset($_POST["telefono2"]) ? $_POST["telefono2"] : "";
			$email = isset($_POST["email"]) ? $_POST["email"] : "";

		}
	}

?>

<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Granja 4: Nuevo Cliente</title>
	<meta name="Description" content="Añadir nuevo cliente al listado">
	<meta name="author" content="Jose Luis Martín Ávila">
	<?php include_once("includes.php"); ?>
</head>
<body>
	<?php include("nav.php"); ?>
	<div class="container-fluid">
		<section>
		<?php
			mostrarErrores();
			include_once("cliente_formulario.php");
		?>
		</section>
	</div>
</body>
</html>