<?php
	include_once("login_snippet.php");
	include_once("producto_modelo.php");

	if (empty($_GET["id"]))
	{
		crearMensajeError("Error, no se ha especificado un producto");
	}
	else
	{
		$nombre = obtenerProductoNombrePorId($_GET["id"]);

		if (eliminarProductoPorId($_GET["id"]))
		{
			crearMensajeExito("$nombre se ha borrado correctamente");
		}
		else
		{
			crearMensajeError("Error: No ha sido posible eliminar $nombre");
		}
	}

	header("location: productos.php");
?>