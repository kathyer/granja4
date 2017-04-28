<?php
	include_once("login_snippet.php");
	include_once("cliente_modelo.php");
	$pagina = "Editar Cliente";

	$clienteActualizado = false;
	$nombre = "";
	$nif = "";
	$nombreGestor = "";
	$direccion = "";
	$codigoPostal = "";
	$localidad = "";
	$telefono = "";
	$telefono2 = "";
	$email = "";

	/* Comprobamos si se han recibido datos para cargar el cliente a editar */
	if (!empty($_GET["id"]))
	{
		$cliente = obtenerClientePorId($_GET["id"]);
		if ($cliente == false)
		{
			crearMensajeError("Error, el cliente seleccionado no existe");
		}
		else
		{
			$nombre = $cliente["nombre"];
			$nif = $cliente["nif"];
			$nombreGestor = $cliente["nombreGestor"];
			$direccion = $cliente["direccion"];
			$codigoPostal = $cliente["codigoPostal"];
			$localidad = $cliente["localidad"];
			$telefono = $cliente["telefono"];
			$telefono2 = $cliente["telefono2"];
			$email = $cliente["email"];
		}
	}
	else
	{
		crearMensajeError("Error, no se ha seleccionado un cliente");
	}

	/* Comprobamos si se va a eliminar algún producto con precio específico por cliente */
	if (!empty($_GET["idBorrar"]))
	{
		/* Primero el id del producto y luego el id del cliente */
		if(borrarPrecioProductoCliente($_GET["idBorrar"], $_GET["id"]))
		{
			crearMensajeExito(obtenerProductoNombrePorId($_GET["idBorrar"]) . " se ha borrado correctamente");
		}
		else
		{
			crearMensajeError(obtenerProductoNombrePorId($_GET["idBorrar"]) ." no se ha podido eliminar. Consulte con el administrador");
		}

		$redireccion = "location: cliente_editar.php?id=" . $_GET["id"];
		header($redireccion);
	}
	
	/* Comprobamos si se han recibido datos de enviar el formulario (cliente a actualizar o adición de nuevo precio a producto) */
	if ($_POST)
	{
		/* Comprobamos si los datos recibidos es una actualización de los datos del cliente */
		if (esFormularioDatosCliente($_POST))
		{
			$erroresValidacion = validarDatosCliente($_POST);

			if ($erroresValidacion == "OK")
			{
				$clienteActualizado = actualizarCliente($_GET["id"], $_POST);
				if($clienteActualizado)
				{
					crearMensajeExito("$nombre se ha actualizado correctamente");
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
		/* Comprobamos si los datos recibidos es una nueva adición de precios específicos del cliente */
		if (esFormularioProductoCliente($_POST))
		{
			$erroresValidacionPrecioProductoCliente = validarDatosPrecioProductoCliente($_POST);

			if ($erroresValidacionPrecioProductoCliente == "OK")
			{
				if(insertarPrecioProductoCliente($_POST["producto"], $_GET["id"], $_POST["precioProducto"]))
				{
					crearMensajeExito(obtenerProductoNombrePorId($_POST["producto"]) . " se ha añadido con nuevo precio");
				}
				else
				{
					crearMensajeError(obtenerProductoNombrePorId($_POST["producto"]) . " no se ha podido añadir. Consulte con el administrador");
				}
			}
			else
			{
				// Mostramos los errores y rellenamos los campos
				crearMensajeError($erroresValidacionPrecioProductoCliente);
			}
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
	<script defer src="js/cliente_productos.js"></script>
</head>
<body>
	<?php include("nav.php"); ?>
	<div class="container-fluid">
		<section>
		<?php
			if ($clienteActualizado)
			{
				header("Location: clientes.php");
			}
			else
			{
				mostrarErrores();
				if ($cliente != false)
				{
					include_once("cliente_formulario.php");
				}
			}
		?>
		</section>
	</div>
</body>
</html>