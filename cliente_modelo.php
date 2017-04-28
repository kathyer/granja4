<?php
	include_once("funciones.php");
	include_once("producto_modelo.php");

	/* Función utilizada para mostrar todos los precios de todos los clientes, en x categoría */
	function obtenerIDsCliente()
	{
		return hacerListado("SELECT id, nombre FROM clientes;");
	}

	function obtenerClientes()
	{
		return hacerListado("SELECT * FROM clientes;");
	}

	function obtenerClientePorId($id)
	{
		$cliente = hacerListado("SELECT * FROM clientes WHERE id='$id'");

		if (count($cliente) == 1)
			return $cliente[0];
		else
			return false;
	}

	function obtenerClienteNombrePorId($id)
	{
		return hacerListado("SELECT nombre FROM clientes WHERE id='$id';")[0]["nombre"];
	}

	function obtenerProductosDeClientePorId($id)
	{
		return hacerListado("SELECT id, nombre, precio, precioMinimo, precioCliente FROM productos RIGHT JOIN precios ON productos.id = precios.id_producto WHERE precios.id_cliente ='$id'");
	}

	function validarDatosCliente($datos)
	{

		$mensajeError = "";

		if (empty($datos["nombre"]))
			$mensajeError .= "El nombre no debe estar vacío. ";

		if(!empty($datos["codigoPostal"]))
		{
			if (!is_numeric($datos["codigoPostal"]))
				$mensajeError .= "El código postal no es correcto: Debe ser un número. ";
		}
		if(!empty($datos["telefono"]))
		{
			if (!esNumeroDeTelefono($datos["telefono"]))
				$mensajeError .= "El número de teléfono no es correcto: Debe ser un número. ";
		}
		if(!empty($datos["telefono2"]))
		{
			if (!esNumeroDeTelefono($datos["telefono2"]))
				$mensajeError .= "El segundo número de teléfono no es correcto: Debe ser un número. ";
		}

		if ($mensajeError == "")
			return "OK";
		return "Errores: " . $mensajeError;
	}

	function  guardarCliente($datos)
	{
		$consulta = "INSERT INTO `clientes` (`nombre`, `nif`, `nombreGestor`, `direccion`, `codigoPostal`, `localidad`, `telefono`, `telefono2`, `email`) VALUES ('" . $datos["nombre"] . "', '" . $datos["nif"] . "', '" . $datos["nombreGestor"] . "', '" . $datos["direccion"] . "', '" . $datos["codigoPostal"] . "', '" . $datos["localidad"] . "', '" . $datos["telefono"] . "', '" . $datos["telefono2"] . "', '" . $datos["email"] . "');";

		echo $consulta;

		if (ejecutarConsulta($consulta))
			return true;
		else
			return false;
	}

	function  actualizarCliente($id, $datos)
	{
		$consulta = "UPDATE `clientes` SET nombre = '" . $datos["nombre"] . "', nif = '" . $datos["nif"] . "', nombreGestor = '" . $datos["nombreGestor"] . "', direccion = '" . $datos["direccion"] . "', codigoPostal = '" . $datos["codigoPostal"] . "', localidad = '" . $datos["localidad"] . "', telefono = '" . $datos["telefono"] . "', telefono2 = '" . $datos["telefono2"] . "', email = '" . $datos["email"] . "' WHERE `clientes`.`id` = $id ;";

		if (ejecutarConsulta($consulta))
			return true;
		else
			return false;

	}

	function eliminarClientePorId($id)
	{
		if (ejecutarConsulta("DELETE FROM clientes WHERE id='$id';"))
			return true;
		else
			return false;
	}

	function esFormularioDatosCliente($datos)
	{
		if (isset($datos["nombre"]))
			return true;
		return false;
	}

	function esFormularioProductoCliente($datos)
	{
		if (isset($datos["precioProducto"]))
			return true;
		return false;
	}

	function validarDatosPrecioProductoCliente($datos)
	{
		$errores = "";

		if (empty($datos["precioProducto"]))
		{
			$errores += "Error: El campo de precio no debe estar vacío. ";
		}
		else
		{
			if(!is_numeric($datos["precioProducto"]))
				$errores += "Error: El campo de precio debe ser un número. ";
		}

		if ($errores == "")
			return "OK";
		else
			return $errores;
	}

	function existePrecioProductoCliente($idProducto, $idCliente)
	{
		if (count(hacerListado("SELECT * FROM precios WHERE id_producto='$idProducto' AND id_cliente='$idCliente'")) == 0)
			return false;
		return true;
	}

	function insertarPrecioProductoCliente($idProducto, $idCliente, $precio)
	{
		/* Inserta un nuevo precio específico por cada cliente. En caso de que ya exista, lo actualiza */

		// Primero buscamos si existe o no el artículo para el cliente

		if (!existePrecioProductoCliente($idProducto, $idCliente))
		{
			return (ejecutarConsulta("INSERT INTO `precios` (`id_producto`, `id_cliente`, `precioCliente`) VALUES ('$idProducto', '$idCliente', '$precio');"));
		}
		else
		{
			return (ejecutarConsulta("UPDATE `precios` SET precioCliente = '$precio' WHERE `precios`.`id_producto` = '$idProducto' AND `precios`.`id_cliente` = '$idCliente';"));
		}
	}

	function borrarPrecioProductoCliente($idProducto, $idCliente)
	{
		if (ejecutarConsulta("DELETE FROM precios WHERE id_producto='$idProducto' AND id_cliente='$idCliente';"))
			return true;
		else
			return false;
	}
?>