<?php
	$productos = obtenerProductosDeClientePorId($_GET["id"]);
?>
					<hr>
					<h4>Precios asignados</h4>
					<hr>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Producto</th><th>Precio compra</th><th>Precio mínimo</th><th>Precio cliente</th><th></th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($productos as $producto)
							{
						?>
							<tr>
								<td><?= $producto["nombre"]?></td><td><?= $producto["precio"]?> €</td><td><?= $producto["precioMinimo"]?> €</td><td><?= $producto["precioCliente"]?> €</td>
								<td><a href=cliente_producto_eliminar.php?id=<?= $_GET["id"] ?>&idBorrar=<?= $producto["id"] ?> class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
					<form method="POST">
						<div class="row">
							<div class="col-md-3">
								<select name="categoria" id="categoria" class="form-control">
									<option value="1">Huevos</option>
									<option value="2">Bolsas</option>
									<option value="3">Tarrinas y pastelería</option>
									<option value="4">Bandejas de poliespan</option>
									<option value="5">Restaurantes</option>
								</select>
							</div>
							<div class="col-md-4">
								<select name="producto" id="producto" class="form-control">
								</select>
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control" id="precioProducto" name="precioProducto" placeholder="Precio nuevo">
							</div>
								<input type="submit" class="btn btn-primary" value="Añadir">								
						</div>
						<div class="row">
							<div id="infoProducto" class="oculto">
								<div class="col-md-3">
									<label for="referencia" class="control-label">Referencia: </label>
									<input type="text" class="form-control" id="referencia" disabled="disabled" name="referencia">
								</div>
								<div class="col-md-3">
									<label for="unidades" class="control-label">Unidades: </label>
									<input type="text" class="form-control" id="unidades" disabled="disabled" name="unidades">
								</div>
								<div class="col-md-3">
									<label for="precio" class="control-label">Precio: </label>
									<input type="text" class="form-control" id="precio" disabled="disabled" name="precio">
								</div>
								<div class="col-md-3">
									<label for="precioIVA" class="control-label">Precio con I.V.A.: </label>
									<input type="text" class="form-control" id="precioIVA" disabled="disabled" name="precioIVA">
								</div>
							</div>
						</div>
					</form>