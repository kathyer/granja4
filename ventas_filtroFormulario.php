					<form class="form-horizontal" method="GET">
						<div class="form-group">
							<hr>
							<h4>Filtro Búsqueda</h4>
							<hr>
							<div class="row">
								<div class="col-md-4">
									<label for="fechaDesde" class="control-label">Desdse: </label>
									<input type="date" class="form-control" name="fechaDesde" id="fechaDesde">							
								</div>
								<div class="col-md-4">
									<label for="fechaHasta" class="control-label">Hasta: </label>
									<input type="date" class="form-control" name="fechaHasta" id="fechaHasta">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label for="clienteFiltro" class="control-label">Cliente: </label>
									<select name="clienteSeleccionadoFiltro" id="clienteFiltro" class="form-control">
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
								<div class="col-md-6">
									<label for="articuloFiltro" class="control-label">Articulo: </label>
									<select name="articuloSeleccionadoFiltro" id="articuloFiltro" class="form-control">
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
