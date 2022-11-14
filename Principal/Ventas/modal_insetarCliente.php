<!--ventana para insertar--->
<div class="modal fade" id="InsertChildresn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3d5a7c !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
            INSERTAR INFORMACION
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="recibcliente.php">
        <input type="hidden" name="id">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">DNI:</label>
                  <input type="text" name="DNI" class="form-control" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">PRIMER NOMBRE:</label>
                  <input type="text" name="primer" class="form-control" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">SEGUNDO NOMBRE:</label>
                  <input type="text" name="segundo" class="form-control" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">PRIMER APELLIDO:</label>
                  <input type="text" name="apellido" class="form-control" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">SEGUNDO APELLIDO:</label>
                  <input type="text" name="apellido2" class="form-control" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">TELEFONO:</label>
                  <input type="text" name="telefono" class="form-control" required="true">
                </div>
                <div class="form-group">
                  <label for="email" class="form-label">CORREO ELECTONICO:</label>
                  <input type="email" class="form-control" name="correo" required='true'>
              </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">DIRECCION:</label>
                  <input type="text" name="direccion" class="form-control" required="true">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
              <button type="submit" class="btn btn-primary">GUARDAR DATOS</button>
            </div>
       </form>

    </div>
  </div>
</div>