<div class="modal fade" id="editESTADO<?php echo $dataCliente['ID_ESTADO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

      <form method="POST" action="Estado_recib_Update.php">
        <input type="hidden" name="ID_ESTADO" value="<?php echo $dataCliente['ID_ESTADO']; ?>">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> ESTADO:</label>
                  <input type="text" name="NOMBRE_ESTADO"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['NOMBRE_ESTADO']; ?>" required="true">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> DESCRIPCION:</label>
                  <input type="text" name="DESCRIPCION" style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['DESCRIPCION']; ?>" required="true">
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
