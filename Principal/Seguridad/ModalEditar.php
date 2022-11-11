
<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataCliente['ID_USUARIO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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



      <form method="POST" action="recib_Update.php">
        <input type="hidden" name="ID_USUARIO" value="<?php echo $dataCliente['ID_USUARIO']; ?>">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label"> NOMBRE USUARIO:</label>
                  <input type="text" name="NOMBRE_USUARIO" class="form-control" value="<?php echo $dataCliente['NOMBRE_USUARIO']; ?>" required="true">
                </div>

                    <div class="Form-group">
                      <label for="yourName" class="form-label">Seleccione un Estado:</label>
                      <select name="NOMBRE_ESTADO" class="form-control">
                      <?php
                            include("../db2.php");
                            $ejecutar= mysqli_query( $conexion2 , "SELECT * FROM tbl_ms_estado" );
                            
                        ?>
                        <?php foreach ($ejecutar as $opciones): ?>
                            <option value="<?php echo $opciones['NOMBRE_ESTADO']?>"><?php echo $opciones['NOMBRE_ESTADO'] ?></option>
                        <?php endforeach ?>
                        <?php ?>
                                            
                      </select>
                      <div class="invalid-feedback">ESTADO INVÁLIDO!</div>
                    </div>



                    <div class="Form-group">
                      <label for="yourName" class="form-label">SELECCIONE UN ROL:</label>
                      <select name="ROL" class="form-control">
                      <?php
                            include("../db2.php");
                            $ejecutar= mysqli_query( $conexion2 , "SELECT * FROM tbl_ms_roles " );
                            
                        ?>
                        <?php foreach ($ejecutar as $opciones): ?>
                            <option value="<?php echo $opciones['ROL']?>"><?php echo $opciones['ROL'] ?></option>
                        <?php endforeach ?>
                        <?php ?>
                                            
                      </select>
                      <div class="invalid-feedback">Rol INVALIDO!</div>
                    </div> 

                    <div class="form-group">
                  <label for="recipient-name" class="col-form-label">NUEVO CORREO:</label>
                  <input type="email" name="CORREO_ELECTRONICO" placeholder="nombre@dominio.com" class="form-control" value="<?php echo $dataCliente['CORREO_ELECTRONICO']; ?>" required="true">
                  <div class="invalid-feedback">Por favor ingresa un email valido!</div>
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
