<?php
session_start();
$_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - INVENTARIOS DEL ATLANTICO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="../../assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">INVENTARIOS DEL ATLANTICO</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['nombre'];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['nombre'];?></h6>
              <span>Diseñador web</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../users-profile.html">
                <i class="bi bi-person"></i>
                <span>Mi Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Ajustes de la cuenta</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="../../php/cerrar_sesion.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar Sesion</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  <?php include("../sidebar.php")?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>AÑADIR NUEVO USUARIO</h1>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<!-- Change Password Form -->

      <form action="create.php" method="post">
          <div class="col-8">
            <label for="yourName" class="form-label">Usuario</label>
            <input type="text" name="Usuario" class="form-control" id="yourName" required>
            <div class="invalid-feedback">Por favor ingresa el Usuario!</div>
          </div>

          <div class="col-8">
            <label for="yourName" class="form-label">Nombre Usuario</label>
            <input type="text" name="Nombre" class="form-control" id="yourName" required>
            <div class="invalid-feedback">Por favor ingresa tu nombre de usuario!</div>
          </div>

          <div class="col-8">
            <label for="yourName" class="form-label">Seleccione un Rol:</label>
            <select name="Rol" class="form-control">
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

          <div class="col-8">
            <label for="yourName" class="form-label">Contraseña</label>
            <input type="text" name="Contrasena" class="form-control" id="yourName" required>
            <div class="invalid-feedback">Por favor ingresa la Contraseña!</div>
          </div>

          <div class="col-8">
            <label for="yourName" class="form-label">Correo</label>
            <input type="text" name="Correo" class="form-control" id="yourName" required>
            <div class="invalid-feedback">Por favor ingresa un correo!</div>
          </div>
        
          <div class="form-group">
            <label class="col-sm-6 control-label">&nbsp;</label>
            <div class="col-sm-6">
            <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
            <a href="mantenimiento_usuario.php" class="btn btn-sm btn-danger">Cancelar</a>
            </div>
          </div>
      </form><!-- End Change Password Form -->

  </main><!-- End #main -->

<?php include("../footer.php")?>
