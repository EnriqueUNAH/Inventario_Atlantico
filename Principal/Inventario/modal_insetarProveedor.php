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


      <form method="POST" action="recibProveedor.php">
        <input type="hidden" name="id">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">NOMBRE DEL REPRESENTANTE:</label>
                  <input type="text" name="nombre" class="form-control" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">NOMBRE DE LA EMPRESA:</label>
                  <input type="text" name="empresa" class="form-control" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">RTN:</label>
                  <input type="number" name="RTN" class="form-control" required="true">
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