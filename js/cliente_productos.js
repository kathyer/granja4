$(function()
{
	$("#categoria").change(cargaProductos);
	$("#producto").change(cargaInfoProductos);

	$("#categoria option:eq(0)").attr("selected","selected").change();

});

function cargaProductos()
{
	/* Vaciamos primero los productos de la categoría, por si esta estuviera vacía y que no diera errores al seleccionar */
	$("#producto").empty();
	$("#referencia").val("");
	$("#unidades").val("");
	$("#precio").val("");
	$("#precioIVA").val("");
	$("#precioProducto").val("");

	var categoriaId = this.value;

	/* Crea un objeto XMLHttpRequest */
	var xhttp = new XMLHttpRequest();

	/* Creamos un disparador para que cuando cambie la propiedad onready cambie */
	xhttp.onreadystatechange = function()
	{
		/* Comprueba si está preparado y si lo está cambia el contenido */
		if (this.readyState == 4 && this.status == 200)
		{
			var productosJSON = JSON.parse(this.responseText);
			var opciones = "";

			/* como el foreach */
			for (producto in productosJSON)
			{
				opciones += "<option value='" + productosJSON[producto].id + "'>" + productosJSON[producto].nombre + "</option>\n";
			}

			$("#producto").html(opciones);

			if(opciones != "")
			{
				$("#producto option:eq(0)").attr("selected","selected");
				$("#producto").change();
			}
		}
	};

	xhttp.open("GET", "productosPorCategoria.php?categoria=" + categoriaId, true);
	xhttp.send();

	
}

function cargaInfoProductos()
{
	var productoID = this.value;
	//console.info("producto: " + productoID);

	/* Crea un objeto XMLHttpRequest */
	var xhttp = new XMLHttpRequest();

	/* Creamos un disparador para que cuando cambie la propiedad onready cambie */
	xhttp.onreadystatechange = function()
	{
		/* Comprueba si está preparado y si lo está cambia el contenido */
		if (this.readyState == 4 && this.status == 200)
		{
			var productosJSON = JSON.parse(this.responseText);
			//console.log(productosJSON);

			/* como el foreach */
			if (!jQuery.isEmptyObject(productosJSON))
			{
				$("#infoProducto").show();
				for (producto in productosJSON)
				{

					var referencia = productosJSON[producto].referencia;
					var unidades = productosJSON[producto].unidades;
					var precio = productosJSON[producto].precio;
					var precioIVA = productosJSON[producto].precioIVA;
					var precioMinimo = productosJSON[producto].precioMinimo;
					//console.info("holaaaa");
				}

				$("#referencia").val(referencia);
				$("#unidades").val(unidades);
				$("#precio").val(precio);
				$("#precioIVA").val(precioIVA);
				$("#precioProducto").val(precioMinimo);
			}
		}
	};

	xhttp.open("GET", "productosPorCategoria.php?id=" + productoID, true);
	xhttp.send();
}