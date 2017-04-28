<?php
	include_once("producto_modelo.php");
	
	if (!empty($_GET["categoria"]))
	{
		echo json_encode(obtenerNombreProductoPorCategoriaParaPrecios($_GET["categoria"]));
	}

	if (!empty($_GET["id"]))
	{
		echo json_encode(obtenerDatosProductoPorCategoriaParaPrecios($_GET["id"]));
	}
	
?>