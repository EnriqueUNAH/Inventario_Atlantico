var urlgetpreguntas = 'http://localhost:80/API_Inventario_Atlantico/controller/pedidos.php?op=GetPedidos';

$(document).ready(function(){
    cargarPedidos();
});


function cargarPedidos(){
    $.ajax({
        url: UrlGETpedidos,
        type: 'GET',
        datatype: 'JSON',
        success: function(response){
            var MiItems = response;
            var valores = '';

            for(i=0; i<MiItems.length; i++){
                valores += '<tr>'+
                '<option>'+MiItems[i]. Pregunta + '</option>';
            }
            $('.Pedidos').html(valores);
        }

    });
}

