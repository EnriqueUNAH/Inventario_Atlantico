<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataCliente['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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


      <form method="POST" action="recib_UpdateConfi.php">
        <input type="hidden" name="id" value="<?php echo $dataCliente['id']; ?>">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">RTN EMPRESA:</label>
                  <input type="text" name="nit" class="form-control" value="<?php echo $dataCliente['nit']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">NOMBRE EMPRESA:</label>
                  <input type="text" name="nombre" class="form-control" value="<?php echo $dataCliente['nombre']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">RAZÓN SOCIA:</label>
                  <input type="text" name="razon_social" class="form-control" value="<?php echo $dataCliente['razon_social']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">TELEFONO:</label>
                  <input type="text" name="telefono" class="form-control" value="<?php echo $dataCliente['telefono']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">EMAIL:</label>
                  <input type="text" name="email" class="form-control" value="<?php echo $dataCliente['email']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">DIRECCION:</label>
                  <input type="text" name="direccion" class="form-control" value="<?php echo $dataCliente['direccion']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">ISV:</label>
                  <input type="text" name="iva" class="form-control" value="<?php echo $dataCliente['iva']; ?>" required="true">
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