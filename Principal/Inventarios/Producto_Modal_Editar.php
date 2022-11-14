
<!--ventana para Update--->
<div class="modal fade" id="editProducto<?php echo $dataCliente['COD_PRODUCTO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #41B3D8 !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
            Actualizar Información
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="Producto_recib_Update.php">
        <input type="hidden" name="COD_PRODUCTO" value="<?php echo $dataCliente['COD_PRODUCTO']; ?>">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> Producto:</label>
                  <input type="text" name="Nombre_PRODUCTO"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['Nombre_PRODUCTO']; ?>" required="true">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> DESCRIPCION</label>
                  <input type="text" name="DESCRIPCION"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['DESCRIPCION']; ?>" required="true">         
                </div> 

                
                <div class="form-group">
                <label for="yourName" class="form-label">CANTIDAD MÍNIMA</label>
                <input type="number" name="CANTIDAD_MINIMA"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['CANTIDAD_MINIMA']; ?>" required="true">
                <div class="invalid-feedback">POR FAVOR, INGRESA UNA CANTIDAD!</div>
                </div>

                <div class="form-group">
                <label for="yourName" class="form-label">CANTIDAD MÁXIMA</label>
                <input type="number" name="CANTIDAD_MAXIMA"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['CANTIDAD_MAXIMA']; ?>" required="true">
                <div class="invalid-feedback">POR FAVOR, INGRESA UNA CANTIDAD!</div>
                </div>  
                                   
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
       </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->
