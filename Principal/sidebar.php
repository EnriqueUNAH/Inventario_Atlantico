  <!-- ======= Sidebar inicio======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="../principal.php">
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
            <a href="../Ventas/Ventas_clientes.php">
              <i class="bi bi-circle"></i><span>VER CLIENTES</span>
            </a>
          </li>
          <li>
          <a href="../Ventas/Ventas_ventas.php">
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
            <a href="Inventarios-compras.html">
              <i class="bi bi-circle"></i><span>VER COMPRAS</span>
            </a>
          </li>
          <li>
            <a href="../Inventario/Inventario-inventario.php">
              <i class="bi bi-circle"></i><span>VER INVENTARIO</span>
            </a>
          </li>
          <li>
            <a href="Inventario-productos.html">
              <i class="bi bi-circle"></i><span>VER PRODUCTOS</span>
            </a>
          </li>
          <li>
            <a href="../Inventario/crud_proveedores.php">
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
            <a href="../Mantenimiento/Mantenimiento-tipo-mov.php">
              <i class="bi bi-circle"></i><span>TIPO MOVIMIENTO</span>
            </a>
          </li>
          <li>
            <a href="../Mantenimiento/Mantenimiento-tipo-producto.php">
              <i class="bi bi-circle"></i><span>TIPO PRODUCTO</span>
            </a>
          </li>
          <li>
            <a href="../Mantenimiento/Mantenimiento-estante.php">
              <i class="bi bi-circle"></i><span>ESTANTE</span>
            </a>
          </li>
          <li>
            <a href="../Mantenimiento/CrudPromocion.php">
              <i class="bi bi-circle"></i><span>PROMOCION</span>
            </a>
          </li>
          <li>
            <a href="../Mantenimiento/Mantenimiento descuento.php">
              <i class="bi bi-circle"></i><span>DESCUENTO</span>
            </a>
          </li>
          <li>
            <a href="../Mantenimiento/Mantenimiento-genero.php">
              <i class="bi bi-circle"></i><span>GENERO</span>
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
            <a href="../Seguridad/CrudUsuarios.php">
              <i class="bi bi-circle"></i><span>MANTENIMIENTO DE USUARIOS</span>
            </a>
          </li>
        </ul>

        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Seguridad/bitacora.php">
              <i class="bi bi-circle"></i><span>BITACORA</span>
            </a>
          </li>
        </ul>

        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Seguridad/CrudRoles.php">
              <i class="bi bi-circle"></i><span>ROLES</span>
            </a>
          </li>
        </ul>

        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Seguridad/CrudEstado.php">
              <i class="bi bi-circle"></i><span>ESTADOS</span>
            </a>
          </li>
        </ul>

        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Seguridad/Pregunta.php">
              <i class="bi bi-circle"></i><span>PREGUNTAS</span>
            </a>
          </li>
        </ul>     
        
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Seguridad/CrudParametros.php">
              <i class="bi bi-circle"></i><span>PARAMETROS</span>
            </a>
          </li>
        </ul> 


        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Seguridad/CrudObjetos.php">
              <i class="bi bi-circle"></i><span>OBJETOS</span>
            </a>
          </li>
        </ul> 
        
      </li><!-- End Icons Nav -->
      

  </aside><!-- End Sidebar-->