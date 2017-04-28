<?php
	include_once("funciones.php");

	function obtenerImagenesProducto($id)
	{
		return hacerListado("SELECT rutaImagen WHERE id_producto='$id';");
	}

	function validarDatosProducto($datos)
	{
		$iva = array("4", "10", "21");
		$mensajeError = "";

		if (empty($datos["nombre"]))
			$mensajeError .= "El nombre no debe estar vacío. ";
		if ($datos["unidades"] < 1 )
			$mensajeError .= "La cantidad de unidades por lote no es correcta. ";
		if (empty($datos["precio"]))
			$mensajeError .= "El precio no debe estar vacío. ";
		if (!is_numeric($datos["precio"]))
			$mensajeError .= "El precio debe ser un número. ";
		if (!in_array ($datos["iva"], $iva))
			$mensajeError .= "El IVA no es un valor correcto. ";
		if (empty($datos["precioMinimo"]))
			$mensajeError .= "Debe establecer un precio mínimo. ";
		if (!is_numeric($datos["precioMinimo"]))
			$mensajeError .= "El precio mínimo debe ser un número. ";

		if ($mensajeError == "")
			return "OK";
		return "Errores: " . $mensajeError;
	}

	function guardarProducto($datos)
	{
		/*
		Constantes de las categorías
		1: Huevos
		2: Bolsas
		3: Tarrinas
		4: Bandejas
		5: Restaurantes
		*/

		/* Si está checheada, se envía información. Si no se ha marcado la casilla, no se envía, de ahí el isset */
		$restaurante = isset($datos["restaurante"]) ? 1 : 0;
		$web = isset($datos["web"]) ? 1 : 0;

		/* Si la categoría es un restaurante, la marcamos */
		if ($datos["categoria"] == 5)
			$restaurante = 1;

		$consulta = "INSERT INTO `productos` (`nombre`, `unidades`, `referencia`, `precio`, `iva`, `precioIVA`, `precioMinimo`, `categoria`, `restaurante`, `web`, `descripcion`) VALUES ('" . $datos["nombre"] . "', '" . $datos["unidades"] . "', '" . $datos["referencia"] . "', '" . $datos["precio"] . "', '" . $datos["iva"] . "', '" . $datos["precioIVA"] . "', '" . $datos["precioMinimo"] . "', '" . $datos["categoria"] . "', '$restaurante', '$web', '" . $datos["descripcion"] . "');";

		if (ejecutarConsulta($consulta))
			return true;
		else
			return false;
	}

	function actualizarProducto($id, $datos)
	{

		/* Si está checheada, se envía información. Si no se ha marcado la casilla, no se envía, de ahí el isset */
		$restaurante = isset($datos["restaurante"]) ? 1 : 0;
		$web = isset($datos["web"]) ? 1 : 0;

		/* Si la categoría es un restaurante, la marcamos */
		if ($datos["categoria"] == 5)
			$restaurante = 1;

		$consulta = "UPDATE `productos` SET nombre = '" . $datos["nombre"] . "', unidades = '" . $datos["unidades"] . "', referencia = '" . $datos["referencia"] . "', precio = '" . $datos["precio"] . "', iva = '" . $datos["iva"] . "', precioIVA = '" . $datos["precioIVA"] . "', precioMinimo = '" . $datos["precioMinimo"] . "', categoria = '" . $datos["categoria"] . "', restaurante = '$restaurante', web = '$web', descripcion = '" . $datos["descripcion"] . "' WHERE `productos`.`id` = $id ;";

		if (ejecutarConsulta($consulta))
			return true;
		else
			return false;
	}

	function eliminarProductoPorId($id)
	{
		if (ejecutarConsulta("DELETE FROM productos WHERE id='$id';"))
			return true;
		else
			return false;
	}

	function categoriaSeleccionada($categoria, $categoriaDelFormulario)
	{
		if ($categoria == $categoriaDelFormulario)
			return "selected='selected'";
		return "";
	}

	function seleccionarHuevos()
	{
		return hacerListado("SELECT * FROM productos WHERE categoria='1';");
	}

	function seleccionarBolsas()
	{
		return hacerListado("SELECT * FROM productos WHERE categoria='2';");
	}

	function seleccionarTarrinas()
	{
		return hacerListado("SELECT * FROM productos WHERE categoria='3';");
	}

	function seleccionarBandejas()
	{
		return hacerListado("SELECT * FROM productos WHERE categoria='4';");
	}

	function seleccionarRestaurantes()
	{
		return hacerListado("SELECT * FROM productos WHERE restaurante='1';");
	}

	/* Muestra un tick si está activo o una X si no está activo */
	function checkeoEnTablaProductos($dato)
	{
		if ($dato == 1)
			return "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
		return "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
	}

	function getCategoria($categoria)
	{
		switch ($categoria) {
			case '1': return "Huevos"; break;
			case '2': return "Bolsas"; break;
			case '3': return "Tarrinas"; break;
			case '4': return "Bandejas"; break;
			case '5': return "Restaurante"; break;
			
			default: return "Error";
		}
	}

	function obtenerProductoPorId($id)
	{
		$producto = hacerListado("SELECT * FROM productos WHERE id='$id'");

		if (count($producto) == 1)
			return $producto[0];
		else
			return false;
	}

	function obtenerProductoNombrePorId($id)
	{
		return hacerListado("SELECT nombre FROM productos WHERE id='$id';")[0]["nombre"];
	}

	function obtenerNombreProductoPorCategoriaParaPrecios($idCategoria)
	{
		return hacerListado("SELECT id, nombre FROM productos WHERE categoria='$idCategoria';");	
	}

	function obtenerDatosProductoPorCategoriaParaPrecios($id)
	{
		return hacerListado("SELECT unidades, referencia, precio, precioIVA, precioMinimo FROM productos WHERE id='$id';");	
	}


?>