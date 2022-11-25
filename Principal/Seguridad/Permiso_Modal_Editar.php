
<!--ventana para Update--->
<div class="modal fade" id="editPermiso<?php echo $dataCliente['ID_ROL']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #41B3D8 !important;">
        <h3 class="modal-title" style="color: #fff; text-align: center;">
            Cambiar Permisos
        </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="Permiso_recib_Update.php">
       

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> ROL:</label>
                  <input disabled type="text" name="ROL"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['ROL']; ?>" required="true">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> PANTALLA:</label>
                  <input disabled type="text" name="OBJETO"  style="text-transform:uppercase" class="form-control" value="<?php echo $dataCliente['OBJETO']; ?>" required="true">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> PERMISO INSERCIÓN:</label>
                  <select name="PERMISO_INSERCION" class="form-control ">               
                                 <option selected value="<?php echo $dataCliente['PERMISO_INSERCION']?>"><?php echo $dataCliente['PERMISO_INSERCION'] ?></option>
                                 <option >NO</option>
                                 <option >SI</option>
                </select> </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> PERMISO ELIMINACIÓN:</label>
                  <select name="PERMISO_ELIMINACION" class="form-control ">               
                                 <option selected value="<?php echo $dataCliente['PERMISO_ELIMINACION']?>"><?php echo $dataCliente['PERMISO_ELIMINACION'] ?></option>
                                 <option >NO</option>
                                 <option >SI</option>
                </select>
                </div>

                <div class="form-group">
                <label for="recipient-name" class="col-form-label"> PERMISO ACTUALIZACIÓN:</label>
                <select name="PERMISO_ACTUALIZACION" class="form-control ">               
                                 <option selected value="<?php echo $dataCliente['PERMISO_ACTUALIZACION']?>"><?php echo $dataCliente['PERMISO_ACTUALIZACION'] ?></option>
                                 <option >NO</option>
                                 <option >SI</option>
                </select>
                </div>





                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> PERMISO CONSULTAR:</label>
                  <select name="PERMISO_CONSULTAR" class="form-control ">               
                                 <option selected value="<?php echo $dataCliente['PERMISO_CONSULTAR']?>"><?php echo $dataCliente['PERMISO_CONSULTAR'] ?></option>
                                 <option >NO</option>
                                 <option >SI</option>
                </select> </div> </div>

     
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
