<?php 
    require_once 'all_define.php';
    $conexion = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
    error_reporting(0);
    if($conexion->connect_errno) {
        echo "El servidor tuvo una falla";
        exit();
    }
?>