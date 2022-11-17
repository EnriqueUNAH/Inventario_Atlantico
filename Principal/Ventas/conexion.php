<?php
$servidor="mysql:dbname=".BD.";host=".SERVIDOR;

try {
    $pdo= NEW PDO($servidor,USUARIO,PASSWORD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
);

} catch (\Throwable $th) {
    echo "<script>alert('ERROR')</script";
}


?>