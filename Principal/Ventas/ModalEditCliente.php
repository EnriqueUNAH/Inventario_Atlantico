<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataCliente['NUMERO_DNI']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3d5a7c !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
            Actualizar Información
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="recib_Update.php">
        <input type="hidden" name="id" value="<?php echo $dataCliente['NUMERO_DNI']; ?>">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">DNI:</label>
                  <input type="text" name="DNI" class="form-control" value="<?php echo $dataCliente['NUMERO_DNI']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">NOMBRE COMPLETO:</label>
                  <input type="text" name="nombre" class="form-control" value="<?php echo $dataCliente['NOMBRE_COMPLETO']; ?>" required="true">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">TELEFONO:</label>
                  <input type="text" name="tel" class="form-control" value="<?php echo $dataCliente['TELEFONO']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">CORREO ELECTRONICO:</label>
                  <input type="text" name="correo" class="form-control" value="<?php echo $dataCliente['CORREO_ELECTRONICO']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">DIRECCION:</label>
                  <input type="text" name="dir" class="form-control" value="<?php echo $dataCliente['DIRECCION']; ?>" required="true">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
              <button type="submit" class="btn btn-primary">GUARDAR CAMBIOS</button>
            </div>
       </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->