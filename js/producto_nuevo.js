$(function()
{
	$("#precio").keyup(actualizarPrecioIVA);
	$("#precioIVA").keyup(actualizarPrecio);
	$("#iva").change(actualizarPrecioIVA);
});


function actualizarPrecioIVA()
{
	$("#precioIVA").val($("#precio").val()*IVA());
}

function actualizarPrecio()
{
	$("#precio").val($("#precioIVA").val()/IVA());
}

function IVA()
{
	return ($("#iva").val() / 100) + 1
}