<?php
	include_once("login_snippet.php");
	include_once("cliente_modelo.php");
	$pagina = "Eliminar Precio Producto";

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
	}

	if(!empty($_GET["id"]))
	{
		$redireccion = "location: cliente_editar.php?id=" . $_GET["id"];
		header($redireccion);
	}

?>