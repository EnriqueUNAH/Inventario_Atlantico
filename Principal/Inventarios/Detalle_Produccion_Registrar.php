


<form name="form-data" action="Detalle_Produccion_Create.php" method="POST">


<div class="row">
<div class="col-sm-7"><h4><b>LISTA DE INSUMOS PARA LA PRODUCCIÓN</b></h4> <br>


     <div class="col-4">
  
       <br>
            <label for="yourName" class="form-label">SELECCIONE UN INSUMO PARA LA PRODUCCIÓN:</label>
        <select name="insumo" id="insumo" class="form-control">
                  
        <?php
              include("../db2.php");
              $ejecutar= mysqli_query( $conexion2 , "SELECT * FROM producto where cod_tipo_producto=1" );
              
          ?>
          <?php foreach ($ejecutar as $opciones): ?>
              <option value="<?php echo $opciones['descripcion']?>"><?php echo $opciones['descripcion'] ?></option>
          <?php endforeach ?>
          <?php ?>
                              
        </select>

        <label for="name" class="form-label">CANTIDAD REQUERIDA</label>
      <input type="number" class="form-control" name="cantidad_insumo" id="cantidad_insumo" required='true' placeholder="Cantidad" min="1" autofocus>

                <div class="invalid-feedback">Producto INVÁLIDO!</div>
    </div> 


    <div class="row justify-content-start text-center mt-5">
                    <div class="col-5">
                          <button class="btn btn-success" 
                                  name="agregar_insumo" 
                                  id="agregar_insumo"
                                  value="agregar" 
                                  type="submit">
                Agregar a la lista
                          </button>
                </div>
         </div>


</div>
</div>

</form>



<script type="text/javascript">
    $(document).ready(function() {

        $(window).load(function() {
            $(".cargando").fadeOut(1000);
        });

//Ocultar mensaje
    setTimeout(function () {
        $("#contenMsjs").fadeOut(1000);
    }, 3000);



    $('.agregar_insumo').click(function(e){
        e.preventDefault();
        var id = $(this).attr("id");

        var dataString = 'COD_PRODUCTO='+ id;
        url = "Detalle_Produccion_Create.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data)
                {
                  window.location.href="CrudDetalleProduccion.php";
                  $('#respuesta').html(data);
                }
            });
    return false;

    });


});
</script>