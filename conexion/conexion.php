<?php

function connectDB(){

    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "lists";


    $conexion = mysqli_connect($server, $user, $pass,$bd) 
        or die("Ha sucedido un error inesperado en la conexion de la base de datos".mysqli_error( $conexion ));

    return $conexion;
} 


?>