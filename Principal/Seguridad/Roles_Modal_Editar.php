
<!--ventana para Update--->
<div class="modal fade" id="editROL<?php echo $dataCliente['ID_ROL']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #563d7c !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
            Actualizar Información
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="Roles_recib_Update.php">
        <input type="hidden" name="ID_ROL" value="<?php echo $dataCliente['ID_ROL']; ?>">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> ROL:</label>
                  <input type="text" name="ROL"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['ROL']; ?>" required="true">
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
