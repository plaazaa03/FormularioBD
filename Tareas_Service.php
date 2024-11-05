<?php
function conectarBD()
{
    $host = "localhost";
    $bd = "PruebaPrimerDia";
    $username = "root";
    $password = "";

    //crear la conexion
    $conexion = new mysqli($host, $username, $password, $bd);
}



?>