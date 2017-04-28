		<?php
			include_once("login_modelo.php");
		?>

		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<a class="navbar-brand" href="index.php">Huevos Hermanos Martín: ADMINISTRACIÓN</a>
				<ul class="nav navbar-nav">
					<?php
						if ($pagina != "principal")
						{
					?>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $pagina ?>
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="precios.php?categoria=1">Precios</a></li>
							<li><a href="ventas.php">Ventas</a></li>
							<li><a href="#">Facturas</a></li>
							<li><a href="clientes.php">Clientes</a></li>
							<li><a href="productos.php">Productos</a></li>
							<li><a href="#">Compras</a></li>
							<li><a href="#">Estadísticas</a></li>
						</ul>
					</li>
					<?php
						}
						if ($pagina == "Precios")
						{
					?>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos
							<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="precios.php?categoria=1">Huevos</a></li>
								<li><a href="precios.php?categoria=2">Bolsas</a></li>
								<li><a href="precios.php?categoria=3">Tarrinas y pastelería</a></li>
								<li><a href="precios.php?categoria=4">Bolsas de poliespan</a></li>
								<li><a href="precios.php?categoria=5">Restaurantes</a></li>
							</ul>
						</li>
						<li>
							<form method="POST" class="navbar-form navbar-left" role="search">
								<div class="form-group">
									<select name="clienteSeleccionado" class="form-control">
										<option value="0" <?= elementoSelectSeleccionado(0, $clienteSeleccionado)?> >Todos</option>
										<?php
											foreach ($clientes as $cliente)
											{
										?>
											<option value="<?= $cliente["id"] ?>" <?= elementoSelectSeleccionado($cliente["id"], $clienteSeleccionado)?> ><?= $cliente["nombre"] ?></option>
										<?php
											}
										?>
									</select>
								</div>
								<button type="submit" class="btn btn-default">Filtrar</button>
							</form>
						</li>
					<?php
						}
					?>
				</ul>
				<div class="pull-right">
					<ul class="nav navbar-nav">
						<li><p class="navbar-text">Bienvenido, <?= getNombreUsuario();?></p></li>
						<li><p class="navbar-btn"><a href="cerrar_sesion.php" class="btn btn-default">Cerrar sesión</a></p></li>
					</ul>
				</div>  				
			</div>
		</nav>
