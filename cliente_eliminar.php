<?php
	include_once("login_snippet.php");
	include_once("cliente_modelo.php");

	if (empty($_GET["id"]))
	{
		crearMensajeError("Error, no se ha especificado un cliente");
	}
	else
	{
		$nombre = obtenerClienteNombrePorId($_GET["id"]);

		if (eliminarClientePorId($_GET["id"]))
		{
			crearMensajeExito("$nombre se ha borrado correctamente");
		}
		else
		{
			crearMensajeError("Error: No ha sido posible eliminar $nombre");
		}
	}

	header("location: clientes.php");
?>