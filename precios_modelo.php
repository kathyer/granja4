<?php
	include_once("funciones.php");
	include_once("cliente_modelo.php");

	function tienePrecios($datos)
	{
		//mostrarArray($datos);

		$vacios = 0;
		$total = count($datos);
		
		foreach ($datos as $dato)
		{
			if ($dato["precioCliente"] == null)
			{
				$vacios++;
			}
		}

		if ($vacios == $total)
			return false;
		return true;
	}

	function eliminarProductosSinPrecio($datos)
	{

		$datosConPrecio = [];

		foreach ($datos as $dato)
		{
			if ($dato["precioCliente"] != null)
			{
				$datosConPrecio[] = $dato;
			}
		}

		return $datosConPrecio;
	}

	function obtenerInfoProductoPorCategoria($idCategoria)
	{
		return hacerListado("SELECT nombre, unidades, referencia, precio, precioIVA, precioMinimo FROM productos WHERE categoria='$idCategoria' ORDER by id;");
	}

	function obtenerPreciosPorClienteYCategoria($idCliente, $idCategoria)
	{
		$resultado = hacerListado("SELECT id, precioCliente FROM productos LEFT JOIN (SELECT id_producto, precioCliente FROM productos JOIN precios ON (productos.id = precios.id_producto) WHERE id_cliente='$idCliente') AS preciosCliente ON (productos.id = preciosCliente.id_producto) WHERE categoria ='$idCategoria' ORDER by id;");

		if (tienePrecios($resultado))
			return $resultado;
		return false;

	}

	function obtenerProductosPorClienteYCategoria($idCliente, $idCategoria)
	{
		$resultado = hacerListado("SELECT id, nombre, unidades, referencia, precio, precioIVA, precioMinimo, precioCliente FROM productos LEFT JOIN (SELECT id_producto, precioCliente FROM productos JOIN precios ON (productos.id = precios.id_producto) WHERE id_cliente='$idCliente') AS preciosCliente ON (productos.id = preciosCliente.id_producto) WHERE categoria ='$idCategoria' ORDER by id;");

		return eliminarProductosSinPrecio($resultado);
	}

	function mostrarPrecio($precio)
	{
		if ($precio != null)
			return $precio . " €";
		return "";
	}

	function esCategoriaValida($categoria)
	{
		/*
		1: Huevos
		2: Bolsas
		3: Tarrinas
		4: Bandejas
		5: Restaurantes
		*/

		if ($categoria >= 1 && $categoria <= 5)
			return true;
		return false;

	}

?>