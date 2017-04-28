<?php

	include("login_snippet.php");
	$pagina ="Página principal";
	$tipoPagina ="principal";

?>

<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Granja 4: Principal</title>
	<meta name="Description" content="Examen de curso PHP y HTML. Día 23 de Noviembre de 2016">
	<meta name="author" content="Jose Luis Martín Ávila">
	<?php include_once("includes.php"); ?>
</head>
<body>
<div id="contenedor">
<header id="cabeceraPrincipal">
</header>

	<?php include("nav.php"); ?>
	<div class="container-fluid">

	<section>
	<div class="row">
		<a href="precios.php?categoria=1">
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-balance-scale fa-5x"></i>
							</div>
							<div class="col-xs-9 text-center">
								<span class="elementoMenuPrincipal">Precios</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<a href="ventas.php">
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-green">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-line-chart fa-5x"></i>
							</div>
							<div class="col-xs-9 text-center">
								<span class="elementoMenuPrincipal">Ventas</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<a href=#>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-yellow">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-folder-open fa-5x"></i>
							</div>
							<div class="col-xs-9 text-center">
								<span class="elementoMenuPrincipal">Facturas</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<a href="clientes.php">
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-red">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-user-circle fa-5x"></i>
							</div>
							<div class="col-xs-9 text-center">
								<span class="elementoMenuPrincipal">Clientes</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<a href="productos.php">
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-success">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-archive fa-5x"></i>
							</div>
							<div class="col-xs-9 text-center">
								<span class="elementoMenuPrincipal">Productos</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<a href=#>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-copy fa-5x"></i>
							</div>
							<div class="col-xs-9 text-center">
								<span class="elementoMenuPrincipal">Compras</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<a href=#>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-bar-chart fa-5x"></i>
							</div>
							<div class="col-xs-9 text-center">
								<span class="elementoMenuPrincipal">Estadísticas</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>				
	</div>

	<div class="row">
		<center><img height="500px" weight="auto" src="img\titulo.png"></center>
	</div>

	</section>
	</div>
</div>
</body>
</html>