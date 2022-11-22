<?php include('../cabecera.php') ?>
<?php include('../sidebar.php') ?>
<!DOCTYPE html>
<html lang="es">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
  <link type="text/css" rel="shortcut icon" href="../img/logo-mywebsite-urian-viera.svg"/>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/cargando.css">
  <link rel="stylesheet" type="text/css" href="../css/maquinawrite.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    	<!-- SCRIPTS JS-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="peticion.js"></script>
    <script type="text/javascript" src="../js/icons.js"></script>
    <link rel="stylesheet" href="style.css">

      
	</head>
  
	<body>
     <ul class="navbar-nav mr-auto collapse navbar-collapse">
      <li class="nav-item active">
        <a href="bitacora.php"> 
        </a>
    <main id="main" class="main">
    <?php
        include('../db2.php');

        $sqlCliente   = ("SELECT * FROM tbl_ms_objetos ob inner join  tbl_bitacora bi on bi.ID_OBJETO=ob.ID_OBJETO inner join tbl_ms_usuario us  on bi.ID_USUARIO=us.ID_USUARIO order by FECHA DESC");
        $queryCliente = mysqli_query($conexion2, $sqlCliente);
        $cantidad     = mysqli_num_rows($queryCliente);
    ?>

<div class="row text-center" style="background-color: #cecece">
</div>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="body">
      <div class="row clearfix">

      <div class="col-sm-12"><h2>VISTA DE <b>BITACORA</b></h2></div>
            <p></p>
                <div class="col-sm-22">
                              <p></p>
                              <form action="buscarbitacora.php" method="get" class="form_search">
                              <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
                              <button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
                            </form>
                </div>
                <div>
                    <p></p>
                </div> 

         

          <div class="col-sm-20">
              <div class="row">
                <div class="col-md-12 p-2">


                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
						  <th scope="col">NOMBRE USUARIO</th>
							<th scope="col">OBJETO</th>
							<th scope="col">ACCION</th>
							<th scope="col">DESCRIPCION</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              while ($data = mysqli_fetch_array($queryCliente)) { ?>
                          <tr>
						  <td><?php echo $data["NOMBRE_USUARIO"]; ?></td>
							<td><?php echo $data["OBJETO"]; ?></td>
							<td><?php echo $data["ACCION"]; ?></td>
							<td><?php echo $data['DESCRIPCION'] ?></td>
                          </tr>
                        <?php } ?>
                
                    </table>
                </div>


              </div>
          </div>
          </div>
      </div>
  </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

    </main>
    
	</body>
</html>
<?php include("../footer.php")?>