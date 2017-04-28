<?php
	include_once("login_snippet.php");
	include_once("producto_modelo.php");
	$pagina = "Productos";
	$tipoPagina = "Productos";
	
	$huevos = seleccionarHuevos();
	$bolsas = seleccionarBolsas();
	$tarrinas = seleccionarTarrinas();
	$bandejas = seleccionarBandejas();
	$restaurantes = seleccionarRestaurantes();

?>

<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Granja 4: Productos</title>
	<meta name="Description" content="Listar todos los productos">
	<meta name="author" content="Jose Luis Martín Ávila">
	<?php include_once("includes.php"); ?>
	<script defer src="js/producto_nuevo.js"></script>
</head>
<body>
	<?php include("nav.php"); ?>
	<div class="container-fluid">
		<section>
			<?php mostrarErrores(); ?>
			<div class="pull-right">
				<a href="producto_nuevo.php" class="btn btn-primary">Nuevo producto</a>
			</div>
			
			<table class="table table-bordered table-hover">
				<thead>
					<tr><td class="info"  colspan="10"><h4>Huevos</h4></td></tr>
					<tr>
						<th>Nombre</th><th>Unidades por lote</th><th>Referencia</th><th>Precio</th><th>I.V.A.</th><th>Precio + I.V.A.</th><th>Precio mínimo venta</th><th class="centrado">Restaurante</th><th class="centrado">Listado en Web</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($huevos as $huevo)
						{
					?>
						<tr>
							<td><a href="producto_editar.php?id=<?= $huevo["id"]?>"><?= $huevo["nombre"] ?></a></td>
							<td><?= $huevo["unidades"] ?></td>
							<td><?= $huevo["referencia"] ?></td>
							<td><?= $huevo["precio"] ?> €</td>
							<td><?= $huevo["iva"] ?> %</td>
							<td><?= $huevo["precioIVA"] ?> €</td>
							<td><?= $huevo["precioMinimo"] ?> €</td>
							<td class="centrado" ><?= checkeoEnTablaProductos($huevo["restaurante"]) ?></td>
							<td class="centrado" ><?= checkeoEnTablaProductos($huevo["web"]) ?></td>
						<tr>
					<?php
						}
					?>
					<tr><td class="info" colspan="10"><h4>Tarrinas y pastelería</h4></td></tr>
					<tr>
						<th>Nombre</th><th>Unidades por lote</th><th>Referencia</th><th>Precio</th><th>I.V.A.</th><th>Precio + I.V.A.</th><th>Precio mínimo venta</th><th class="centrado" >Restaurante</th><th class="centrado" >Listado en Web</th>
					</tr>
					<?php
						foreach ($tarrinas as $tarrina)
						{
					?>
						<tr>
							<td><a href="producto_editar.php?id=<?= $tarrina["id"]?>"><?= $tarrina["nombre"] ?></a></td>
							<td><?= $tarrina["unidades"] ?></td>
							<td><?= $tarrina["referencia"] ?></td>
							<td><?= $tarrina["precio"] ?> €</td>
							<td><?= $tarrina["iva"] ?> %</td>
							<td><?= $tarrina["precioIVA"] ?> €</td>
							<td><?= $tarrina["precioMinimo"] ?> €</td>
							<td class="centrado" ><?= checkeoEnTablaProductos($tarrina["restaurante"]) ?></td>
							<td class="centrado" ><?= checkeoEnTablaProductos($tarrina["web"]) ?></td>							
						</tr>
					<?php
						}
					?>
					<tr><td class="info" colspan="10"><h4>Bolsas</h4></td></tr>
					<tr>
						<th>Nombre</th><th>Unidades por lote</th><th>Referencia</th><th>Precio</th><th>I.V.A.</th><th>Precio + I.V.A.</th><th>Precio mínimo venta</th><th class="centrado" >Restaurante</th><th class="centrado" >Listado en Web</th>
					</tr>
					<?php
						foreach ($bolsas as $bolsa)
						{
					?>
						<tr>
							<td><a href="producto_editar.php?id=<?= $bolsa["id"]?>"><?= $bolsa["nombre"] ?></a></td>
							<td><?= $bolsa["unidades"] ?></td>
							<td><?= $bolsa["referencia"] ?></td>
							<td><?= $bolsa["precio"] ?> €</td>
							<td><?= $bolsa["iva"] ?> %</td>
							<td><?= $bolsa["precioIVA"] ?> €</td>
							<td><?= $bolsa["precioMinimo"] ?> €</td>
							<td class="centrado" ><?= checkeoEnTablaProductos($bolsa["restaurante"]) ?></td>
							<td class="centrado" ><?= checkeoEnTablaProductos($bolsa["web"]) ?></td>
						</tr>
					<?php
						}
					?>
					<tr><td class="info" colspan="10"><h4>Bandejas de poliespan</h4></td></tr>
					<tr>
						<th>Nombre</th><th>Unidades por lote</th><th>Referencia</th><th>Precio</th><th>I.V.A.</th><th>Precio + I.V.A.</th><th>Precio mínimo venta</th><th class="centrado" >Restaurante</th><th class="centrado" >Listado en Web</th>
					</tr>
					<?php
						foreach ($bandejas as $bandeja)
						{
					?>
						<tr>
							<td><a href="producto_editar.php?id=<?= $bandeja["id"]?>"><?= $bandeja["nombre"] ?></a></td>
							<td><?= $bandeja["unidades"] ?></td>
							<td><?= $bandeja["referencia"] ?></td>
							<td><?= $bandeja["precio"] ?> €</td>
							<td><?= $bandeja["iva"] ?> %</td>
							<td><?= $bandeja["precioIVA"] ?> €</td>
							<td><?= $bandeja["precioMinimo"] ?> €</td>
							<td class="centrado" ><?= checkeoEnTablaProductos($bandeja["restaurante"]) ?></td>
							<td class="centrado" ><?= checkeoEnTablaProductos($bandeja["web"]) ?></td>
						</tr>
					<?php
						}
					?>
					<tr><td class="info" colspan="10"><h4>Restaurantes</h4></td></tr>
					<tr>
						<th>Nombre</th><th>Unidades por lote</th><th>Referencia</th><th>Precio</th><th>I.V.A.</th><th>Precio + I.V.A.</th><th>Precio mínimo venta</th><th class="centrado" >Categoria</th><th class="centrado" >Listado en Web</th>
					</tr>
					<?php
						foreach ($restaurantes as $restaurante)
						{
					?>
						<tr>
							<td><a href="producto_editar.php?id=<?= $restaurante["id"]?>"><?= $restaurante["nombre"] ?></a></td>
							<td><?= $restaurante["unidades"] ?></td>
							<td><?= $restaurante["referencia"] ?></td>
							<td><?= $restaurante["precio"] ?> €</td>
							<td><?= $restaurante["iva"] ?> %</td>
							<td><?= $restaurante["precioIVA"] ?> €</td>
							<td><?= $restaurante["precioMinimo"] ?> €</td>
							<td class="centrado" ><?= getCategoria($restaurante["categoria"]) ?></td>
							<td class="centrado" ><?= checkeoEnTablaProductos($restaurante["web"]) ?></td>
						</tr>
					<?php
						}
					?>
				</tbody>
			</table>

		</section>
	</div>
</body>
</html>