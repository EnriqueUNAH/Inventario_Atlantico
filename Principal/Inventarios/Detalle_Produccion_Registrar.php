
<form name="form-data" action="recibCliente.php" method="POST">

<div class="row">
<!--  <div class="col-sm-7"><h4><b>LISTA DE INSUMOS PARA LA PRODUCCIÓN</b></h4> <br></div> -->
  <div class="col-md-7">
  <br>
      <label for="name" class="form-label">CANTIDAD REQUERIDA</label>
      <input type="number" class="form-control" name="CANTIDAD" required='true' autofocus>
  </div>

  <div class="col-7">
       <br>

        <label for="yourName" class="form-label">SELECCIONE UN INSUMO PARA LA PRODUCCIÓN:</label>
        <select name="Nombre_PRODUCTO" class="form-control">
        <?php
              include("../db2.php");
              $ejecutar= mysqli_query( $conexion2 , "SELECT * FROM tbl_producto where cod_tipo_producto=3" );
              
          ?>
          <?php foreach ($ejecutar as $opciones): ?>
              <option value="<?php echo $opciones['Nombre_PRODUCTO']?>"><?php echo $opciones['Nombre_PRODUCTO'] ?></option>
          <?php endforeach ?>
          <?php ?>
                              
        </select>
        <div class="invalid-feedback">Producto INVÁLIDO!</div>
      </div> 


        </div>
                 <div class="row justify-content-start text-center mt-5">
                    <div class="col-5">
                        <button class="btn btn-primary btn-block" id="btnEnviar">
                              Agregar
                        </button>
                </div>
         </div>
</form>
