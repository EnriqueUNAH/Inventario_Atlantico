$(obtener_registros());

function obtener_registros(data)
{
	$.ajax({
		url : 'bitacora.php',
		type : 'POST',
		dataType : 'HTML',
		data : { data: data },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});
