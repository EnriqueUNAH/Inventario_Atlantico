<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataCliente['COD_COMPRA']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3d5a7c !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
        ¿Realmente deseas anular?
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="recib_Update_Compra.php">
        <input type="hidden" name="id" value="<?php echo $dataCliente['COD_COMPRA']; ?>">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                <strong style="text-align: center !important"> 
            <?php echo "COMPRA ";
            echo $dataCliente['COD_COMPRA']; ?>
        
          </strong>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
              <button type="submit" class="btn btn-primary">ANULAR</button>
            </div>
       </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->