function habilitar(){
    text_1 = document.getElementById("cantidad_producir").value;
    select = document.getElementById("selectProducto").value;
    val=0;


    if(text_1==""){
        val++;
    }
    if(select ==""){
        val++;
    } 
    if(val == 0){
        document.getElementById("btnProductoProducir").disabled = false;
    } else {
        document.getElementById("btnProductoProducir").disabled = true;
    }

}

document.getElementById("cantidad_producir").addEventListener("keyup", habilitar);
document.getElementById("selectProducto").addEventListener("change", habilitar);






