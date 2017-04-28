		<form class="form-horizontal" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<div class="col-md-6">
					<hr>
					<h4>Datos del producto</h4>
					<hr>
					<div class="row">
						<div class="col-md-5">
							<label for="nombreProducto" class="control-label">Nombre: </label>
							<input type="text" class="form-control" name= "nombre" id="nombre" value="<?= $nombre?>">							
						</div>
						<div class="col-md-3">
							<label for="unidades" class="control-label">Unidades: </label>
							<input type="number" class="form-control" name="unidades" id="unidades" placeholder="por lote" value="<?= $unidades?>">
						</div>
						<div class="col-md-4">
							<label for="referencia" class="control-label">Referencia: </label>
							<input type="text" class="form-control" name="referencia" id="referencia" value="<?= $referencia?>">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label for="precio" class="control-label">Precio: </label>
							<input type="text" class="form-control" id="precio" name="precio" value="<?= $precio?>">
						</div>
						<div class="col-md-3">
							<label for="iva" class="control-label">IVA: </label>
							<select name="iva" class="form-control" id="iva">
								<option <?= categoriaSeleccionada(4, $IVA)?> value="4">4%</option>
								<option <?= categoriaSeleccionada(10, $IVA)?> value="10">10%</option>
								<option <?= categoriaSeleccionada(21, $IVA)?> value="21">21%</option>
							</select>
						</div>
						<div class="col-md-3">
							<label for="precioIVA" class="control-label">Precio con IVA: </label>
							<input type="text" class="form-control" id="precioIVA" name="precioIVA" value="<?= $precioIVA?>">
						</div>
						<div class="col-md-3">
							<label for="precioMinimo" class="control-label">Precio mínimo: </label>
							<input type="text" class="form-control" id="precioMinimo" name="precioMinimo" value="<?= $precioMinimo?>">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label for="categoria" class="control-label">Categoría</label>
							<select name="categoria" id="categoria" class="form-control">
								<option <?= categoriaSeleccionada(1, $categoria)?> value="1">Huevos</option>
								<option <?= categoriaSeleccionada(2, $categoria)?> value="2">Bolsas</option>
								<option <?= categoriaSeleccionada(3, $categoria)?> value="3">Tarrinas y pastelería</option>
								<option <?= categoriaSeleccionada(4, $categoria)?> value="4">Bandejas de poliespan</option>
								<option <?= categoriaSeleccionada(5, $categoria)?> value="5">Restaurantes</option>
							</select>
						</div>
						<label class="col-md-3 checkbox">
							<input type="checkbox" <?= $restaurante ?> name="restaurante" id="restaurante" value="1"> Es para un restaurante
						</label>
						<label class="col-md-3 checkbox">
							<input type="checkbox"  <?= $web ?> name="web" id="web" value="1"> Aparecer en la web
						</label>
					</div>
					<hr>
					<h4>Descripción</h4>
					<hr>
					<textarea class="form-control" name="descripcion" rows="10"><?= $descripcion ?></textarea>
				</div>
				<div class="col-md-6">
					<hr>
					<h4>Imágenes</h4>
					<hr>
					<input type="file" name="fotos" id="fotos" class="form-control" multiple="multiple"> 
					<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
				</div>
			</div>
			<input type="submit" class="btn btn-primary" value="Guardar">
			<?php
				/* En caso de que estemos en editar un producto, mostramos el botón de eliminar */
				if ($tipoPagina == "productoEditar")
					echo "<a href=\"producto_eliminar.php?id=" . $_GET["id"] . "\" onclick=\"return confirm('¿Estás seguro de que quieres eliminarlo? Se eliminaran todos los precios y facturas asociadas a ese producto')\" class='btn btn-danger'>Eliminarlo</a>";
			?>
		</form>