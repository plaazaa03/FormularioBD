<?php
    require_once('Tareas.php');

    function conectarBD() {
        //crear variables con la informacion para la conexion
        $host = "localhost";
        $bd = "PruebaPrimerDia";
        $username = "root";
        $password = "";

        //crear la conexion
        $conexion = new mysqli($host, $username, $password, $bd);

        //comprobar si se realiza la conexion
        if (!$conexion->connect_error) {
            return $conexion;
        } else {
            die("Error al conectar: " . $conexion->connect_error);
        }
    }

?>