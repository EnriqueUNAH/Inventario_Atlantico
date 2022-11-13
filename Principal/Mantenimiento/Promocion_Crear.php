<?php include("../cabecera2.php") ?>
<?php include("../sidebar.php")?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>PROMOCIÓN</h1>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<!-- Change Password Form -->

    <form action="Promocion_create.php" method="post"  class="row g-3 needs-validation" novalidate="false">

    <div class="col-7">
       <br>
        <label for="yourName" class="form-label">NOMBRE DE LA PROMOCIÓN</label>
        <input type="text" style="text-transform:uppercase" name="NOMBRE_PROMOCION"  class="form-control" id="yourName" required><br>
        <div class="invalid-feedback">POR FAVOR, INGRESA EL NOMBRE DE LA PROMOCIÓN!</div>

        <div class="col-5">
        <label for="yourName" class="form-label">FECHA INICIAL</label>
        <input type="date" style="text-transform:uppercase" name="FECHA_INICIAL"  class="form-control" id="yourName" required><br>
        <div class="invalid-feedback">POR FAVOR, INGRESA UNA FECHA!</div>

        <label for="yourName" class="form-label">FECHA FINAL</label>
        <input type="date" style="text-transform:uppercase" name="FECHA_FINAL"  class="form-control" id="yourName" required>
        <div class="invalid-feedback">POR FAVOR, INGRESA UNA FECHA!</div>
    </div>



      <div class="text-center">
        <div class="form-group">
          <label class="col-sm-6 control-label">&nbsp;</label>
          <div class="col-sm-6">
          <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
          <a href="CrudPromocion.php" class="btn btn-sm btn-danger">Cancelar</a>
          </div>
        </div>
      </div>
      
    </form><!-- End Change Password Form -->

  </main><!-- End #main -->

<?php include("../footer.php")?>
