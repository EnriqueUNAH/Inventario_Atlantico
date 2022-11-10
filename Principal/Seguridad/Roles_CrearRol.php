<?php include("../cabecera2.php") ?>
<?php include("../sidebar.php")?>

<script>
    function mostrarPassword(){
        var cambio = document.getElementById("yourPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
    $('#ShowPassword').click(function () {
      $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
    });
    });
  </script>

<script>
    function mostrarPassword1(){
        var cambio = document.getElementById("yourPassword1");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
    $('#ShowPassword').click(function () {
      $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
    });
    });
  </script>

  <script>
    function validar_espacio(e, campo)
    {
		key = e.keyCode ? e.keyCode : e.which;
		if (key == 32) {return false;}
    }
    </script>

  <script>
    function maximo(campo,limite)
    {
    if(campo.value.length>=limite){
    campo.value=campo.value.substring(0,limite);
    }
    }
  </script>

<script>
  function validatePassword() {
    var p = document.getElementById('yourPassword').value,
        errors = [];
    if (p.length < 8) {
        errors.push("TU CONTRASEÑA AL MENOS DEBE TENER 8 CARACTERES");
    }
    if (p.search(/[a-z]/) < 0) {
        errors.push("TU CONTRASEÑA AL MENOS DEBE TENER UNA MINUSCULA"); 
    }
    if (p.search(/[A-Z]/) < 0) {
        errors.push("TU CONTRASEÑA AL MENOS DEBE TENER UNA MAYUSCULA"); 
    }
    if (p.search(/[0-9]/) < 0) {
        errors.push("TU CONTRASEÑA AL MENOS DEBE TENER UN NUMERO");
    }
    if (p.search(/[*&!^)(#@$?¡\-_]/) < 0) {
        errors.push("TU CONTRASEÑA AL MENOS DEBE TENER UN CARACTER ESPECIAL");
    }
    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }else{
      return True;
    }  
}
</script>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>AÑADIR NUEVO USUARIO</h1>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<!-- Change Password Form -->

    <form action="Roles_create.php" method="post" onsubmit="validatePassword(); return false;" class="row g-3 needs-validation" novalidate="false">

    <div class="col-8">
        <label for="yourName" class="form-label">NOMBRE ROL:</label>
        <input type="text" style="text-transform:uppercase" name="rol"  class="form-control" id="yourName" required>
        <div class="invalid-feedback">POR FAVOR, INGRESA TU NOMBRE DE USUARIO!</div>
      </div>

      <div class="col-8">
        <label for="yourName" class="form-label">DESCRIPCION:</label>
        <input type="text" style="text-transform:uppercase" name="descripcion"  class="form-control" id="yourName" required>
        <div class="invalid-feedback">POR FAVOR, INGRESA TU NOMBRE DE USUARIO!</div>
      </div>

      <div class="text-center">
        <div class="form-group">
          <label class="col-sm-6 control-label">&nbsp;</label>
          <div class="col-sm-6">
          <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
          <a href="CrudRoles.php" class="btn btn-sm btn-danger">Cancelar</a>
          </div>
        </div>
      </div>
      
    </form><!-- End Change Password Form -->

  </main><!-- End #main -->

<?php include("../footer.php")?>
