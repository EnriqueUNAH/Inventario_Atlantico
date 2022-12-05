
     

        





<div class="modal fade" id="editP<?php echo $dataCliente['COD_PRODUCCION']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #41B3D8 !important;">
        <h4 class="modal-title" style="color: #fff; text-align: center;">
            DETALLES
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

   


            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> ESTADO:</label>
                  <input type="text" name="NOMBRE_ESTADO"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['COD_PRODUCCION']; ?>" required="true">
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
