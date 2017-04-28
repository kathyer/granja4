<?php

	session_start();
	include("login_modelo.php");

	if (isset($_SESSION["usuario"]))
	{
		header("location: index.php");
	}

	/* Hemos recibido datos del login */
	if(!empty($_POST))
	{

		$usuario = logearUsuario($_POST["usuario"], cifrarContrasena($_POST["contrasena"]));

		if ($usuario != false)
		{
			$_SESSION["usuario"] = $usuario;
			header("location: index.php");

		}
		else
		{
			crearMensajeError("El usuario y contraseña introducidos no existe");
		}
	}

?>



<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Granja 4: Login</title>
	<meta name="Description" content="Examen de curso PHP y HTML. Día 23 de Noviembre de 2016">
	<meta name="author" content="Jose Luis Martín Ávila">
	<!-- Cargamos Bootstrap -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<link rel="icon" type="img/png" href="img/icono.png">
</head>
<body>
	<?php mostrarErrores(); ?>
	<div id="contenedor">
		<section>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<form action="login.php" method="POST" class="form-horizontal">
				<div class="well col-md-8 col-md-offset-2">

			<div class="form-group">
				<label for="usuario" class="col-md-4 control-label">Usuario</label>
				<div class="col-md-8">
					<input type="text" class="form-control" id="usuario" name="usuario">
				</div>
			</div>

			<div class="form-group">
				<label for="contrasena" class="col-md-4 control-label">Contraseña</label>
				<div class="col-md-8">
					<input type="password" class="form-control" id="contrasena" name="contrasena">
				</div>
			</div>

			<button type="submit" class="btn btn-primary center-block">Entrar</button>

		</div>
	</form>
		</section>
	</div>					
</body>
</html>