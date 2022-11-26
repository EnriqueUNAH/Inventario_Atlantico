<?php include("../cabecera3.php") ?>
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

    <form action="create.php" method="post" onsubmit="validatePassword(); return false;" class="row g-3 needs-validation" novalidate="false">

      <div class="col-8">
        <label for="yourName" class="form-label">NOMBRE DE USUARIO:</label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
          <input type="text" style="text-transform:uppercase" name="Usuario" placeholder="Usuario" onkeypress="javascript: return validar_espacio(event,this)" onKeyUp="maximo(this,100)" onKeyDown="maximo(this,100)" class="form-control" id="yourUsername" required>
          <div class="invalid-feedback">POR FAVOR ESCRIBA UN NOMBRE DE USUARIO.</div>
        </div>
      </div>

      <div class="col-8">
        <label for="yourName" class="form-label">Nombre Completo:</label>
        <input type="text" style="text-transform:uppercase" name="Nombre" placeholder="ingrese nombre completo" class="form-control" id="yourName" required>
        <div class="invalid-feedback">POR FAVOR, INGRESA TU NOMBRE DE USUARIO!</div>
      </div>

      <div class="col-8">
        <label for="yourName" class="form-label">SELECCIONE UN ROL:</label>
        <select name="Rol" class="form-control">
        <?php
              include("../db2.php");
              $ejecutar= mysqli_query( $conexion2 , "SELECT * FROM tbl_ms_roles " );
              
          ?>
            <option selected disabled value="">--SELECCIONE ROL--</option>
          <?php foreach ($ejecutar as $opciones): ?>
              <option value="<?php echo $opciones['ROL']?>"><?php echo $opciones['ROL'] ?></option>
          <?php endforeach ?>
          <?php ?>
                              
        </select>
        <div class="invalid-feedback">Rol INVALIDO!</div>
      </div> 

      <div class="col-8">
        <label for="yourName" class="form-label">CONTRASEÑA:</label>
        <div class="input-group">
          <input type="Password" Class="form-control" name="Contrasena" placeholder="Ingrese su contraseña"  onkeypress="javascript: return validar_espacio(event,this)" class="form-control" id="yourPassword" required>
          <div class="input-group-append">
              <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
          </div>
        </div>
      </div>

      <div class="col-8">
        <label for="yourEmail" class="form-label">CORREO ELECTRONICO:</label>
        <input type="email" name="Correo" placeholder="nombre@dominio.com" onkeypress="javascript: return validar_espacio(event,this)" class="form-control" id="yourEmail" required>
        <div class="invalid-feedback">POR FAVOR INGRESA CORREO ELECTRONICO VALIDO!</div>
      </div>

      <div class="text-center">
        <div class="form-group">
          <label class="col-sm-6 control-label">&nbsp;</label>
          <div class="col-sm-6">
          <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
          <a href="CrudUsuarios.php" class="btn btn-sm btn-danger">Cancelar</a>
          </div>
        </div>
      </div>
      
    </form><!-- End Change Password Form -->

  </main><!-- End #main -->

<?php include("../footer.php")?>
