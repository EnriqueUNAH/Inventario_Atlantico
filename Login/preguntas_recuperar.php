<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INVERSIONES ATLANTICO</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>INVERSIONES DEL ATLANTICO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>

<?php 
 # Consulto el id usuario
 $id_user= $usuario="";

 $consulta_Id="SELECT Id_Usuario FROM tbl_ms_usuario where Usuario = '$usuario'";
 $resultado_Id=mysqli_query( $conexion , $consulta_Id);
 while ($otra_=mysqli_fetch_array( $resultado_Id )) {
     # code...
     $id_user=$otra_['Id_Usuario'];
 }

 #Consulto id de preguntas
 $consulta_Id_pre="SELECT ID_PREGUNTA FROM tbl_ms_preguntas_usuario WHERE ID_USUARIO='$id_user'";
 $resultado_Id_pre=mysqli_query( $conexion , $consulta_Id_pre);
 while ($id_pre=mysqli_fetch_array( $resultado_Id_pre )) {
     # code...
     $id_preguntas=$id_pre['ID_PREGUNTA'];
 }


?>



<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="/Login/index.php" class="logo d-flex align-items-center w-auto">
                  <img src="../assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">INVERSIONES DEL ATLANTICO</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">CONFIGURACION DE PREGUNTAS</h5>
                    <p class="text-center small">SELECCIONA DOS PREGUNTAS PARA GESTIONAR TU CUENTA</p>
                  </div>
                    

                  <form  action="../php/validarrespuesta.php" method="post" class="row g-3 needs-validation" novalidate="false">
                    <div class="col-12">
                      <label for="yourName" class="form-label">SELECCIONE UNA PREGUNTA:</label>
                      <select name="pregunta" class="form-control" id="_pregunta">
                      <?php
                            include("db.php");
                            $ejecutar= mysqli_query( $conexion , "SELECT * FROM tbl_ms_preguntas " ); //WHERE ID_USUARIO = '$id_preguntas'
                            
                        ?>
                        <?php foreach ($ejecutar as $opciones): ?>
                            <option value="<?php echo $opciones['PREGUNTA']?>"><?php echo $opciones['PREGUNTA'] ?></option>
                        <?php endforeach ?>
                        <?php ?>
                                            
                      </select>
                      <div class="invalid-feedback">PREGUNTA INVALIDA!</div>
                    </div> 

                    <div class="col-12">
                      <label for="yourName" class="form-label">RESPUESTA:</label>
                      <input type="text" style="text-transform:uppercase" name="respuesta" class="form-control" id="yourAnswer" required>
                      <div class="invalid-feedback">POR FAVOR, INGRESA TU RESPUESTA!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">CONFIRMAR</button>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->
</body>
 <!-- Vendor JS Files -->
 <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</html>