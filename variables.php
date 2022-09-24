<html>
       <head>
       <title>Dashboard - INVENTARIOS DEL ATLANTICO</title>
       </head>
   <body> 
        <?php
            $nombre = strtoupper($_POST[ 'name' ]);
            $nombre_usuario = strtoupper($_POST[ 'username' ]);
            $contra = ($_POST[ 'password' ]);
            $correo = ($_POST[ 'email' ]);
            include('preguntas.html');
         ?>
   </body>
<html>