<?php include("../cabecera2.php") ?>
<?php 

if ($_SESSION['nombre']=="ADMINISTRADOR") {
	# code...
	include('../sidebar.php');
  }else{
	# code...
	include('../sidebar2.php');
  }

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tipo_Productos</h1>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<!-- Change Password Form -->

    <form action="Tipo_Producto_create.php" method="post"  class="row g-3 needs-validation" novalidate="false">

    <div class="col-8">
        <label for="yourName" class="form-label">Tipo_Producto:</label>
        <input type="text" style="text-transform:uppercase" name="NOMBRE_Tipo_Producto"  class="form-control" id="yourName" required>
      </div>

      <div class="text-center">
        <div class="form-group">
          <label class="col-sm-6 control-label">&nbsp;</label>
          <div class="col-sm-6">
          <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
          <a href="CrudTipo_Producto.php" class="btn btn-sm btn-danger">Cancelar</a>
          </div>
        </div>
      </div>
      
    </form><!-- End Change Password Form -->

  </main><!-- End #main -->

<?php include("../footer.php")?>
