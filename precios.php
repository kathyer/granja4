<?php
	include_once("login_snippet.php");
	include_once("precios_modelo.php");

	$pagina="Precios";
	$clienteSeleccionado = 0;

	/* Comprobamos si hemos seleccionado un cliente para filtrar los resultados */
	if($_POST)
	{
		/* Si se ha enviado un filtro de cliente, entonces indicamos que queremos buscar solo ese cliente */
		if(!empty($_POST["clienteSeleccionado"]))
		{
			$clienteSeleccionado = $_POST["clienteSeleccionado"];			
		}
	}

	/* Ahora, seleccionamos la categoría a mostrar */
	if (empty($_GET["categoria"]))
	{
		crearMensajeError("No hay categoría seleccionada");
	}
	else
	{
		if (!esCategoriaValida($_GET["categoria"]))
		{
			crearMensajeError("La categoría seleccionada no es válida");
		}
		else
		{
			/* Obtenemos todos los IDs y nombre de los clientes. Esta función se usa tanto para mostrar el nombre de los clientes a la izquierda como para listar los clientes en el filtro */
			$clientes = obtenerIDsCliente();

			/*Si se llega hasta aquí, es que todo es correcto. Ahora, commprobamos si necesitamos mostrar todos los precios o solo el de un cliente en concreto */
			if ($clienteSeleccionado <= 0)
			{
				/* Si vale 0, mostramos todos */
				$productos = obtenerInfoProductoPorCategoria($_GET["categoria"]);
			}
			else
			{
				/* Si es mayor de 0, mostramos los precios de ese cliente en esa categoría */
				$productos = obtenerProductosPorClienteYCategoria($clienteSeleccionado, $_GET["categoria"]);
			}
		}
	}
?>

<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Granja 4: Huevos</title>
	<meta name="Description" content="Examen de curso PHP y HTML. Día 23 de Noviembre de 2016">
	<meta name="author" content="Jose Luis Martín Ávila">
	<?php include_once("includes.php"); ?>
</head>
<body>
	<?php include("nav.php"); ?>
	<div id="contenedor" class="container-fluid">
		<header id="cabeceraPrincipal">
			<!--<img src="img/titulo.jpg"/>-->
		</header>
		<section>
		<?php 
			mostrarErrores();
			if (isset($clientes))
			{
		?>
			<h3><?=getCategoria($_GET["categoria"])?></h3>
			<?php
				if ($clienteSeleccionado == 0)
				{
			?>
				<table class="table table-bordered table-hover">
					<thead>
						<tr class='info'>
							<th>Cliente</th>
							<?php

							/*
							#####################################################################################################
							#																									#
							# 									INFORMACIÓN DE LOS PRODUCTOS 									#
							#																									#
							#####################################################################################################
							*/

							/* Nombre de los productos */

								foreach ($productos as $producto)
								{
									echo "<th>" . $producto["nombre"] . "</th>";
								}
								echo "</tr><tr class='warning'><td>Referencia y unidades</td>";

							/* Descripción de los productos */

								foreach ($productos as $producto)
								{
								echo "<td>" . $producto["referencia"] . "  (" . $producto["unidades"] . " Unidades)</td>";
								}
								echo "</tr><tr class='warning'><td>Precio</td>";

							/* Precio */

								foreach ($productos as $producto)
								{
								echo "<td>" . $producto["precio"] . " €</td>";
								}
								echo "</tr><tr class='warning'><td>Precio + I.V.A.</td>";

							/* Precio + I.V.A. */

								foreach ($productos as $producto)
								{
								echo "<td>" . $producto["precioIVA"] . " €</td>";
								}
								echo "</tr><tr class='warning'><td>Precio mínimo</td>";

							/* Precio Mínimo */

								foreach ($productos as $producto)
								{
								echo "<td>" . $producto["precioMinimo"] . " €</td>";
								}
							?>
						</tr>
						</thead>
						<tbody>
							<?php

							/*
							#####################################################################################################
							#																									#
							#	 									PRECIOS DE CADA CLIENTE 									#
							#																									#
							#####################################################################################################
							*/

							foreach ($clientes as $cliente)
								{
									$precios = obtenerPreciosPorClienteYCategoria($cliente["id"], $_GET["categoria"]);
									if($precios != false)
									{
										echo "<tr><td><a href='cliente_editar.php?id=" . $cliente["id"] . "'>" . obtenerClienteNombrePorId($cliente["id"]) . "</td>";
										foreach ($precios as $precio)
										{
							?>
										<td><?= mostrarPrecio($precio["precioCliente"]);?></td>
							<?php
										}
										echo "</tr>";
									}
								}
							?>
					</tbody>
				</table>
			<?php
				}
				else
				{

					/* En caso de que se haya seleccionado un cliente para filtrar, se muestran solo los datos y precios de los productos asociados a ese cliente

					#####################################################################################################
					#																									#
					#	 									PRECIOS DE 1 SOLO CLIENTE									#
					#																									#
					#####################################################################################################
					*/

					echo "<h4>" . obtenerClienteNombrePorId($clienteSeleccionado) . "</h4>";
					if (empty($productos))
					{
						echo "<h5>No hay precios establecidos para este cliente y esta categoría</h5>";
					}
					else
					{
			?>
					<table class="table table-bordered table-hover">
						<thead>
							<tr><th>Producto</th><th>Unidades</th><th>Referencia</th><th>Precio</th><th>Precio + I.V.A.</th><th>Precio mínimo</th><th>Precio de venta</th></tr>
						</thead>
						<tbody>
						<?php
							foreach ($productos as $producto)
							{
						?>
								<tr><td><a href="producto_editar.php?id=<?= $producto["id"]?>"><?= $producto["nombre"]?></td><td><?= $producto["unidades"]?></td><td><?= $producto["referencia"]?></td><td><?= $producto["precio"]?> €</td><td><?= $producto["precioIVA"]?> €</td><td><?= $producto["precioMinimo"]?> €</td><td class="info"><?= $producto["precioCliente"]?> €</td><tr>
						<?php
							}
						?>
						</tbody>
					</table>
			<?php
					}
				}
			?>
			</section>
		<?php
			}
		?>
		<footer id="pieDePagina">
		</footer>
	</div>					
</body>
</html>