<!--ventana para Update--->
<div class="modal fade" id="editCAI<?php echo $dataCliente['COD_TALONARIO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #41B3D8 !important;">
        <h5 class="modal-title" style="color: #fff; text-align: center;">
            Actualizar Información
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="ConfiguracionCAI_recib_Update.php">
        <input type="hidden" name="COD_TALONARIO" value="<?php echo $dataCliente['COD_TALONARIO']; ?>">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> RANGO INICIAL:</label>
                  <input type="number" name="RANGO_INICIAL"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['RANGO_INICIAL']; ?>" required="true">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> RANGO FINAL:</label>
                  <input type="number" name="RANGO_FINAL" style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['RANGO_FINAL']; ?>" required="true">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> RANGO ACTUAL:</label>
                  <input type="number" name="RANGO_ACTUAL"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['RANGO_ACTUAL']; ?>" required="true">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> NUMERO CAI:</label>
                  <input type="varchar" name="NUMERO_CAI" style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['NUMERO_CAI']; ?>" required="true">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> FECHA VENCIMIENTO:</label>
                  <input type="date" name="FECHA_VENCIMIENTO" style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['FECHA_VENCIMIENTO']; ?>" required="true">
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