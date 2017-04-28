<?php
	include_once("login_snippet.php");
	include_once("cliente_modelo.php");
	$pagina = "Clientes";
	
	$clientes = obtenerClientes();

?>

<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Granja 4: Clientes</title>
	<meta name="Description" content="Listar todos los productos">
	<meta name="author" content="Jose Luis Martín Ávila">
	<?php include_once("includes.php"); ?>
</head>
<body>
	<?php include("nav.php"); ?>
	<div class="container-fluid">
		<section>
			<?php mostrarErrores(); ?>
			<div class="pull-right">
				<a href="cliente_nuevo.php" class="btn btn-primary">Nuevo cliente</a>
			</div>
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Nombre</th><th>NIF</th><th>Gestor</th><th>Dirección</th><th>Código Postal</th><th>Localidad</th><th>Telefono</th><th>Telefono 2</th><th>eMail</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($clientes as $cliente)
						{
					?>
						<tr>
							<td><a href="cliente_editar.php?id=<?= $cliente["id"]?>"><?= $cliente["nombre"] ?></a></td>
							<td><?= $cliente["nif"] ?></td>
							<td><?= $cliente["nombreGestor"] ?></td>
							<td><?= $cliente["direccion"] ?> </td>
							<td><?= $cliente["codigoPostal"] ?> </td>
							<td><?= $cliente["localidad"] ?> </td>
							<td><?= $cliente["telefono"] ?> </td>
							<td><?= $cliente["telefono2"] ?> </td>
							<td><?= $cliente["email"] ?> </td>
						<tr>
					<?php
						}
					?>
				</tbody>
			</table>

		</section>
	</div>
</body>
</html>