<?php
session_start();
$_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - INVERSIONES DEL ATLANTICO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons Grupo Diseños Alpha -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts --------->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files Inventario----->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <style>
    .contenedor {
  
    display:flex;
    grid-template-rows: 100px 100px;

    grid-gap: 10px;
    justify-items: center;
    align-items: center;
}
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../Principal/principal.php" class="logo d-flex align-items-center">
        <img src="../assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">INVERSIONES DEL ATLÁNTICO</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        
        <!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
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
              <a class="dropdown-item d-flex align-items-center" href="../php/cerrar_sesion.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar Sesion</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar inicio======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="../Principal/principal.php">
          <i class="bi bi-grid"></i>
          <span>INICIO</span>
        </a>
      </li><!-- End Dashboard Nav -->

  <!-- ======= Sidebar Ventas======= -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>VENTAS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Principal/Ventas/crudclientes.php">
              <i class="bi bi-circle"></i><span>VER CLIENTES</span>
            </a>
          </li>
          <li>
            <a href="../Principal/Inventarios/sistema/ventas.php">
              <i class="bi bi-circle"></i><span>VER VENTAS</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

  <!-- ======= Sidebar Inventarios======= -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>INVENTARIOS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Principal/Inventario/crud_compras.php">
              <i class="bi bi-circle"></i><span>VER COMPRAS</span>
            </a>
          </li>
          <li>
            <a href="../Principal/Inventarios/Producto_Producir.php">
              <i class="bi bi-circle"></i><span>NUEVA PRODUCCIÓN</span>
            </a>
          </li>
          <li>
          <a href="../Principal/Inventario/Inventario-inventario.php">
              <i class="bi bi-circle"></i><span>VER INVENTARIO</span>
            </a>
          </li>
          <li>
            <a href="../Principal/Inventarios/Sistema/lista_producto.php">
              <i class="bi bi-circle"></i><span>PRODUCTOS</span>
            </a>
          </li>
          <li>
            <a href="../Principal/Inventario/crud_proveedores.php">
              <i class="bi bi-circle"></i><span>VER PROVEEDORES</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <!-- Dashboard Matenimiento -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>MANTENIMIENTO</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="../Principal/Mantenimiento/crud_tipo_movimiento.php">
              <i class="bi bi-circle"></i><span>TIPO MOVIMIENTO</span>
            </a>
          </li>
          <li>
            <a href="../Principal/Mantenimiento/Mantenimiento-tipo-producto.php">
              <i class="bi bi-circle"></i><span>TIPO PRODUCTO</span>
            </a>
          </li>
          <li>
            <a href="../Principal/Mantenimiento/CrudEstante.php">
              <i class="bi bi-circle"></i><span>ESTANTE</span>
            </a>
          </li>
          <li>
            <a href="../Principal/Mantenimiento/CrudPromocion.php">
              <i class="bi bi-circle"></i><span>PROMOCION</span>
            </a>
          </li>
          <li>
            <a href="../Principal/Mantenimiento/crud_descuento.php">
              <i class="bi bi-circle"></i><span>DESCUENTO</span>
            </a>
          </li>
          <li>
            <a href="../Principal/Mantenimiento/CrudGenero.php">
              <i class="bi bi-circle"></i><span>GENERO</span>
            </a>
          </li>
          <li>
            <a href="../Principal/Mantenimiento/CrudConfiguracionCAI.php">
              <i class="bi bi-circle"></i><span>CAI</span>
            </a>
          </li>


        </ul>
      </li><!-- End Tables Nav -->
      
  <!-- ======= Sidebar Seguridad======= -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>SEGURIDAD</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Principal/Seguridad/usuario.php">
              <i class="bi bi-circle"></i><span>MANTENIMIENTO DE USUARIOS</span>
            </a>
          </li>
        </ul>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Principal/Seguridad/bitacora.php">
              <i class="bi bi-circle"></i><span>BITACORA</span>
            </a>
          </li>
        </ul>

        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Principal/Seguridad/CrudRoles.php">
              <i class="bi bi-circle"></i><span>ROLES</span>
            </a>
          </li>
        </ul>

        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Principal/Seguridad/CrudEstado.php">
              <i class="bi bi-circle"></i><span>ESTADOS</span>
            </a>
          </li>
        </ul>


        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Principal/Seguridad/crud_preguntas.php">
              <i class="bi bi-circle"></i><span>PREGUNTAS</span>
            </a>
          </li>
        </ul>     
        
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Principal/Seguridad/CrudParametros.php">
              <i class="bi bi-circle"></i><span>PARAMETROS</span>
            </a>
          </li>
        </ul> 

        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Principal/Seguridad/CrudObjetos.php">
              <i class="bi bi-circle"></i><span>OBJETOS</span>
            </a>
          </li>
        </ul> 

        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Principal/Seguridad/permisos.php">
              <i class="bi bi-circle"></i><span>PERMISOS</span>
            </a>
          </li>
        </ul> 

      </li><!-- End Icons Nav -->
      

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
    <h1>Dashboard</h1>
      <br>
      <section class="contenedor">
      <div class="col-sm-6">
         <div class="card card-primary">
            <div class="card-body">
            <br> 
            <h5><b>VISION</b></h5>
            <p>
                <p>
                Llegar a ser una empresa muy reconocida a nivel mundial 
                </p>
                <p>
                por la calidad que ofrecemos
              en nuestros productos y buen servicio que le     
                </p>
                brindamos a nuestros clientes.
                <p>                            
            </div>                            
          </div>                          
      </div>                        
  <div class="contenedor">
    <p></p>
  </div>
      <div class="col-sm-6">
         <div class="card">
            <div class="card-body">
            <br> 
            <h5><b>MISION</b></h5>
            <p>Fabricar y comercializar uniformes y ropa deportiva a nivel nacional e internacional y 
                <p>
                ofrecer a nuestros clientes productos de alta calidad, para asi cumplir con las necesidades de nuestros clientes ofreciendo mayor calidad y comodidad.
                </p>
              
            </p>                               
            </div>                            
          </div>                          
      </div> 
      </section>


    </div><!-- End Page Title -->
  </div>

  <section class="contenedor">
      <div class="col-sm-6">
         <div class="card card-primary">
            <div class="card-body">
            <?php 

              include('db2.php');
              $consulta="SELECT * FROM tbl_ms_usuario";
              $resultado= mysqli_query( $conexion2 , $consulta );
              $filas = mysqli_num_rows( $resultado );
              ?>      
                  <br> 
                  <h5><b<i class="bi bi-people-fill"></i> TOTAL DE USUARIOS</b></h5>
                  <?php echo $filas ?>              
                  </div>                            
                </div>                          
              </div>                          
      </div>                        
  <div class="contenedor">
    <p></p>
  </div>
      <div class="col-sm-6">
         <div class="card">
            <div class="card-body">
            <?php 

              include('db2.php');
              $consulta="SELECT * FROM tbl_proveedor";
              $resultado= mysqli_query( $conexion2 , $consulta );
              $filas = mysqli_num_rows( $resultado );
              ?>      
              <br> 
                  <h5><b<i class="bi bi-briefcase-fill"> TOTAL DE PROVEEDORES</b></h5>
                  <?php echo $filas ?>                
                  </div>                            
                </div>                                                   
          </div>                          
      </div> 
      </section>

      <section class="contenedor">
      <div class="col-sm-6">
         <div class="card card-primary">
            <div class="card-body">
            <?php 

              include('db2.php');
              $consulta="SELECT * FROM tbl_cliente";
              $resultado= mysqli_query( $conexion2 , $consulta );
              $filas = mysqli_num_rows( $resultado );
              ?>      
                  <br> 
                  <h5><b<i class="bi bi-emoji-laughing"></i> TOTAL DE CLIENTES</b></h5>
                  <?php echo $filas ?>              
                  </div>                            
                </div>                          
              </div>                          
      </div>            
      
      
      <!-- Reports -->

            
  <div class="contenedor">
    <p></p>
  </div>
      <div class="col-sm-6">
         <div class="card">
            <div class="card-body">
            <?php 

              include('db2.php');
              $consulta="SELECT * FROM tbl_factura";
              $resultado= mysqli_query( $conexion2 , $consulta );
              $filas = mysqli_num_rows( $resultado );
              ?>      
              <br> 
                  <h5><b<i class="bi bi-cash"> TOTAL DE VENTAS</b></h5>
                  <?php echo $filas ?>                
                  </div>                            
                </div>                                                   
          </div>                          
      </div> 
      </section>

<!-- Line REPORT -->
<?php 
// CONSULTAS
//FACTURAS
include('db2.php');
 # Consulto Factura


/*

 $max=mysqli_query($conexion2,"SELECT MAX(TOTAL_FACTURA) as maximo from tbl_factura");
 $n=mysqli_fetch_assoc($max);
 $nmax=$n["maximo"];


$consulta_="SELECT NO_FACTURA FROM tbl_factura where TOTAL_FACTURA = '$nmax'";
$resultado_=mysqli_query( $conexion2 , $consulta_ );
while ($valor_=mysqli_fetch_array( $resultado_ )) {
     # code...
     $NoFact=$valor_['NO_FACTURA'];
 }

 $consulta="SELECT PRECIO_VENTA FROM tbl_detalle_factura where NO_FACTURA = '$NoFact'";
 $resultado=mysqli_query( $conexion2 , $consulta );
 while ($valor=mysqli_fetch_array( $resultado )) {
      # code...
      $precio=$valor['PRECIO_VENTA'];
  }

  $ventas=$nmax/$precio;*/
?>
      <!-- Top Selling -->
      <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">LO MAS VENDIDO <span></span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">PRE VISUALIZACION</th>
                        <th scope="col">PRODUCTO</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col">VENTAS</th>
                        <th scope="col">INGRESOS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><img src="../assets/img/BUZO.jpg" alt="" width="100" height="100"></a></th>
                        <td><a href="#" class="text-primary fw-bold">UNIFORMES</a></td>
                        <td><?php echo $precio ?> </td>
                        <td> <?php echo intval($ventas)  ?></td>
                        <td><?php echo $nmax ?></td>
                      </tr>

                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

    
          </div>
        </div><!-- End Left side columns -->
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span></span></strong>. Todos los derechos resevados (Diseños Alpha)
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>