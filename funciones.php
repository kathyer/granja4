<?php
	function hacerListado($consulta)
	{
		$servidor = "localhost";
		$usuario = "root";
		$contrasena = "";
		$baseDeDatos = "granja4";

		$enlace = mysqli_connect($servidor, $usuario, $contrasena, $baseDeDatos);

		if (mysqli_connect_errno()) {
			die("Error de conexión: " . mysqli_connect_error());
		}

		mysqli_set_charset($enlace, 'utf8');

		$resultado = mysqli_query($enlace, $consulta);

		$listado = [];

		if ($resultado)
		{

			while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC))
			{
				$listado[] = $fila;
			}
		}

		mysqli_free_result($resultado);

		mysqli_close($enlace);

		return $listado;
	}


	function ejecutarConsulta($consulta)
	{

		$servidor = "localhost";
		$usuario = "root";
		$contrasena = "";
		$baseDeDatos = "granja4";

		// Crea una conexión con la base de datos.
		$enlace = mysqli_connect($servidor, $usuario, $contrasena,      $baseDeDatos);

		// Si ha habido un error, abandona la ejecución.
		if (mysqli_connect_errno()) {
			die("Error de conexión: " . mysqli_connect_error());
		}

		// Con esta función se evita que aparezcan caracteres
		// extraños en los resultados.
		mysqli_set_charset($enlace, 'utf8');

		// Ejecuta la consulta.
		$resultado = mysqli_query($enlace, $consulta);

		// Para terminar, cerramos la conexión.
		mysqli_close($enlace);

		// Devolvemos el $resultado.
		return $resultado;
	}

	function consultaInsert($datos, $tabla) {
		// Esto crea un array con los índices del array $datos.
		$indices = array_keys($datos);
		// Esto crea otro array con los valores del array ($datos).
		$valores = array_values($datos);

		$consulta = "INSERT INTO $tabla (" . implode(", ", $indices) . ") VALUES ('" . implode("', '", $valores) . "')";
		return $consulta;
	}

	function crearMensajeError($mensaje)
	{
		$_SESSION["mensajeError"] = "<p class='alert alert-danger'>$mensaje</p>";
	}

	function crearMensajeExito($mensaje)
	{
		$_SESSION["mensajeExito"] = "<p class='alert alert-success'>$mensaje</p>";
	}

	function mostrarErrores()
	{
		if (isset($_SESSION["mensajeError"]))
		{
			echo $_SESSION["mensajeError"];
			unset($_SESSION["mensajeError"]);
		}
		if (isset($_SESSION["mensajeExito"]))
		{
			echo $_SESSION["mensajeExito"];
			unset($_SESSION["mensajeExito"]);
		}		
	}

	function cifrarContrasena($contrasena)
	{
		return sha1($contrasena);
	}

	function mostrarArray($datos)
	{
		echo "<pre>";
		print_r($datos);
		echo "</pre>";
	}

	function esNumeroDeTelefono($numero)
	{
		$numeros = array("+", " ", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
		$total = strlen($numero);

		for ($i = 0; $i < $total; $i++)
		{
			if (!in_array($numero[$i], $numeros))
				return false;
		}

		return true;
	}

	function elementoSelectSeleccionado($suyo, $aComparar)
	{
		if ($suyo == $aComparar)
			return "selected='selected'";
		return "";
	}
?>