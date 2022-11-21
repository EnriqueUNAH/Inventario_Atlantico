
<!--ventana para Update--->
<div class="modal fade" id="ediTGENERO<?php echo $dataCliente['COD_GENERO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

      <form method="POST" action="Genero_recib_Update.php">
        <input type="hidden" name="COD_GENERO" value="<?php echo $dataCliente['COD_GENERO']; ?>">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> GENERO:</label>
                  <input type="text" name="NOMBRE_GENERO"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['NOMBRE_GENERO']; ?>" required="true">
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


















