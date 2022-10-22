
function maximo(campo,limite)
{
if(campo.value.length>=limite){
campo.value=campo.value.substring(0,limite);
}
}

function validar_espacio(e, campo)
{
key = e.keyCode ? e.keyCode : e.which;
if (key == 32) {return false;}
}
