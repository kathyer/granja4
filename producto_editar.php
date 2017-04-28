<?php
	include_once("login_snippet.php");
	include_once("producto_modelo.php");
	$pagina = "Editar Producto";
	$tipoPagina = "productoEditar";
	$productoActualizado = false;

	/* Comprobamos si se han recibido datos para cargar el producto a editar */
	if (!empty($_GET["id"]))
	{
		$producto = obtenerProductoPorId($_GET["id"]);
		if ($producto == false)
		{
			crearMensajeError("Error, el producto seleccionado no existe");
		}
		else
		{
			$nombre = $producto["nombre"];
			$unidades = $producto["unidades"];
			$referencia =$producto["referencia"];
			$precio = $producto["precio"];
			$IVA = $producto["iva"];
			$precioIVA = $producto["precioIVA"];
			$precioMinimo = $producto["precioMinimo"];
			$categoria = $producto["categoria"];
			$restaurante = $producto["restaurante"] == 1 ? "checked='checked'" : "";
			$web = $producto["web"] == 1 ? "checked='checked'" : "";
			$descripcion = $producto["descripcion"];
		}
	}
	else
	{
		crearMensajeError("Error, no se ha seleccionado un producto");
	}

	/* Comprobamos si se han recibido datos de enviar el formulario (producto a actualizar) */
	if ($_POST)
	{
		$erroresValidacion = validarDatosProducto($_POST);

		if ($erroresValidacion == "OK")
		{
			$productoActualizado = actualizarProducto($_GET["id"], $_POST);
			if($productoActualizado)
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
			$unidades = isset($_POST["unidades"]) ? $_POST["unidades"] : "";
			$referencia = isset($_POST["referencia"]) ? $_POST["referencia"] : "";
			$precio = isset($_POST["precio"]) ? $_POST["precio"] : "";
			$precioIVA = isset($_POST["precioIVA"]) ? $_POST["precioIVA"] : "";
			$IVA = isset($_POST["iva"]) ? $_POST["iva"] : "";
			$precioMinimo = isset($_POST["precioMinimo"]) ? $_POST["precioMinimo"] : "";
			$categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : 0;
			$restaurante = isset($_POST["restaurante"]) ? "checked='checked'" : "";
			$web = isset($_POST["web"]) ? "checked='checked'" : "";
			$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";

		}
	}

?>

<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Granja 4: Nuevo producto</title>
	<meta name="Description" content="Añadir nuevo producto al listado">
	<meta name="author" content="Jose Luis Martín Ávila">
	<?php include_once("includes.php"); ?>
	<script defer src="js/producto_nuevo.js"></script>
</head>
<body>
	<?php include("nav.php"); ?>
	<div class="container-fluid">
		<section>
		<?php
			if ($productoActualizado)
			{
				header("Location: productos.php");
			}
			else
			{
				mostrarErrores();
				if ($producto != false)
				{
					include_once("producto_formulario.php");
				}
			}
		?>
		</section>
	</div>
</body>
</html>