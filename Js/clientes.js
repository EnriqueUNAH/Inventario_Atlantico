var urlgetclientes = 'http://localhost:80/API_Inventario/controller/pedidos.php?op=GetPedidos';


$(document).ready(function(){
    cargarPedidos();
});

function cargarPedidos(){
    $.ajax({
        url: urlgetclientes,
        type: 'GET',
        datatype: 'JSON',
        success: function(response){
            var MiItems = response;
            var valores = '';

            for(i=0; i<MiItems.length; i++){
                valores += '<tr>'+
                '<td>'+MiItems[i]. Cod_cliente + '</td>'+
                '<td>'+MiItems[i]. NumeroDNI +'</td>'+
                '<td>'+MiItems[i]. Nombres +'</td>'+
                '<td>'+MiItems[i]. Apellidos +'</td>'+
                '<td>'+MiItems[i]. Telefono +'</td>'+
                '<td>'+MiItems[i]. Correo +'</td>'+
                '<td>'+MiItems[i]. Direccion +'</td>'+
                '<td>'+MiItems[i]. FechaRegistro +'</td>'+
                '<td>'+MiItems[i]. Genero +'</td>'+
                '<td>'+
                '<button class="btn btn-outline-warning" onclick="cargarPedido('+MiItems[i].ID +')">Editar</button>'+
                '<button class="btn btn-outline-danger" onclick="EliminarPedido('+MiItems[i].ID +')">Eliminar</button>'
                '</td>'+
                '</tr>';
            }
            $('.Ventas clientes').html(valores);
        }

    });
}