<?php
	include_once("login_snippet.php");
	include_once("cliente_modelo.php");
	$pagina = "Ventas";

	$clientes = obtenerIDsCliente();

	$clienteSeleccionado = 0;

?>

<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Granja 4: Ventas</title>
	<meta name="Description" content="Regsitrar una venta realizada">
	<meta name="author" content="Jose Luis Martín Ávila">
	<?php include_once("includes.php"); ?>
	<script defer src="js/cliente_productos.js"></script>
</head>
<body>
	<?php include("nav.php"); ?>
	<div class="container-fluid">
		<section>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6" style="background-color: red;">
					<?php include("ventas_filtroFormulario.php");?>
				</div>
				<div class="col-md-6" style="background-color: blue;">
					<?php include("ventas_anadirFormulario.php");?>
				</div>
			</div>
		</div>	
		</section>
	</div>
</body>
</html>