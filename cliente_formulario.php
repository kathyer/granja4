		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<form class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<hr>
							<h4>Datos cliente</h4>
							<hr>
							<div class="row">
								<div class="col-md-5">
									<label for="nombre" class="control-label">Nombre: </label>
									<input type="text" class="form-control" name= "nombre" id="nombre" value="<?= $nombre?>">							
								</div>
								<div class="col-md-3">
									<label for="nif" class="control-label">NIF: </label>
									<input type="text" class="form-control" name="nif" id="nif" value="<?= $nif?>">
								</div>
								<div class="col-md-4">
									<label for="nombreGestor" class="control-label">Nombre Gestor: </label>
									<input type="text" class="form-control" name="nombreGestor" id="nombreGestor" value="<?= $nombreGestor?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="direccion" class="control-label">Dirección: </label>
									<input type="text" class="form-control" id="direccion" name="direccion" value="<?= $direccion?>">
								</div>
								<div class="col-md-3">
									<label for="codigoPostal" class="control-label">Código postal: </label>
									<input type="text" class="form-control" id="codigoPostal" name="codigoPostal" value="<?= $codigoPostal?>">
								</div>
								<div class="col-md-4">
									<label for="localidad" class="control-label">Localidad: </label>
									<input type="text" class="form-control" id="localidad" name="localidad" value="<?= $localidad?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label for="telefono" class="control-label">Teléfono 1: </label>
									<input type="text" class="form-control" id="telefono" name="telefono" value="<?= $telefono?>">
								</div>
								<div class="col-md-4">
									<label for="telefono2" class="control-label">Teléfono 2: </label>
									<input type="text" class="form-control" id="telefono2" name="telefono2" value="<?= $telefono2?>">
								</div>
								<div class="col-md-4">
									<label for="email" class="control-label">eMail: </label>
									<input type="email" class="form-control" id="email" name="email" value="<?= $email?>">
								</div>						
							</div>
							<br>
							<input type="submit" class="btn btn-primary" value="Guardar">
							<hr>
						</div>
					</form>
				</div>
				<div style="background-color: #f7f7f7;" class="col-md-6">
				<?php
					if ($pagina == "Editar Cliente")
					{
						include_once("cliente_productos.php");
					}
				?>
				</div>
			</div>
		</div>