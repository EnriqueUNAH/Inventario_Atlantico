<?php include("../cabecera2.php") ?>
<?php include("../sidebar.php")?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Estante</h1>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<!-- Change Password Form -->

    <form action="Estante_create.php" method="post"  class="row g-3 needs-validation" novalidate="false">

    <div class="col-8">
        <label for="yourName" class="form-label">ESTANTE:</label>
        <input type="text" style="text-transform:uppercase" name="NOMBRE_ESTANTE"  class="form-control" id="yourName" required>
      </div>

      <div class="text-center">
        <div class="form-group">
          <label class="col-sm-6 control-label">&nbsp;</label>
          <div class="col-sm-6">
          <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
          <a href="CrudEstante.php" class="btn btn-sm btn-danger">Cancelar</a>
          </div>
        </div>
      </div>
      
    </form><!-- End Change Password Form -->

  </main><!-- End #main -->

<?php include("../footer.php")?>