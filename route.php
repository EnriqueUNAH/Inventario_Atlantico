<?php

if (isset($_POST['btnCorreo'])) {
    include('_por_correo.php');
}

if (isset($_POST['btnPregunta'])) {
    include('validar.php');
}

?>