
<!--ventana para Update--->
<div class="modal fade" id="editParametro<?php echo $dataCliente['ID_ROL']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

      <form method="POST" action="Permiso_recib_Update.php">
        <input type="hidden" name="ID_P" value="<?php echo $dataCliente['ID_P']; ?>">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> ROL:</label>
                  <input type="text" name="ROL"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['ROL']; ?>" required="true">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> PANTALLA:</label>
                  <input type="text" name="OBJETO"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['OBJETO']; ?>" required="true">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> PERMISO INSERCIÓN:</label>
                  <input type="text" name="PERMISO_INSERCION"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['PERMISO_INSERCION']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> PERMISO ELIMINACIÓN:</label>
                  <input type="text" name="PERMISO_ELIMINACION"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['PERMISO_ELIMINACION']; ?>" required="true">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> PERMISO ACTUALIZACIÓN:</label>
                  <input type="text" name="PERMISO_ACTUALIZACION"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['PERMISO_ACTUALIZACION']; ?>" required="true">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> PERMISO CONSULTAR:</label>
                  <input type="text" name="PERMISO_CONSULTAR"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['PERMISO_CONSULTAR']; ?>" required="true">
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
