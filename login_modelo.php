<?php

	include_once("funciones.php");

	function logearUsuario($usuario, $contrasena)
	{

		$usuario = hacerListado("SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena';");

		if (count($usuario) == 1)
			return $usuario[0];
		return false;
	}

	function getNombreUsuario()
	{
		return $_SESSION["usuario"]["nombre"];
	}

?>