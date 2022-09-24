<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inversiones Atlantico</title>
</head>
<body>
        <?php
            $nombre = strtoupper($_POST[ 'name' ]);
            $nombre_usuario = strtoupper($_POST[ 'username' ]);
            $contra = ($_POST[ 'password' ]);
            $correo = ($_POST[ 'email' ]);
            include('gestion.html');
         ?>
</body>
</html>