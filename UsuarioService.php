<?php
session_start();
require_once 'usuario.php';

function conectarBD()
{
    //crear variables con la informacion para la conexion
    $host = "localhost";
    $bd = "PruebaPrimerDia";
    $username = "root";
    $password = "";

    //crear la conexion mediante mysqli
    $conexion = new mysqli($host, $username, $password, $bd);

    //crear la conexion mediante PDO
    // try {
    //     $conexion = new PDO("mysql:host=$host;dbname=$bd", $username, $password);
    //     return $conexion;
    // } catch (PDOException $ex) {
    //     die($ex->getMessage());
    // }
    //comprobar si se realiza la conexion mediante mysqli
    if (!$conexion->connect_error) {
        return $conexion;
    } else {
        die("Error al conectar: " . $conexion->connect_error);
    }

    
}

function login($nick, $password) {
    $conexion = conectarBD();

    $sql = "SELECT * FROM Usuario WHERE nick = ? AND password = ?";
    $queryFormateada = $conexion -> prepare($sql);
    $queryFormateada -> bind_param("ss", $nick, $password);
    $sehaEjecutadoLaQuery = $queryFormateada -> execute();
    $resultado = $queryFormateada -> get_result();

    if ($sehaEjecutadoLaQuery && $resultado -> num_rows == 1) {
        $usuarioBD = $resultado -> fetch_assoc();
        $usuario = new Usuario($usuarioBD['id'], $usuarioBD['nick'], $usuarioBD['password'], $usuarioBD['avatar']);
        $conexion -> close();
        return $usuario;
    } else {
        return false;
    }
}

function guardarUsuario($nick, $password, $avatar) {
    $conexion = conectarBD();

    $sql = "INSERT INTO Usuario (nick, password, avatar) VALUES (?, ?, ?)";
    $queryFormateada = $conexion -> prepare($sql);
    $queryFormateada -> bind_param("sss", $nick, $password, $avatar);
    $sehaEjecutadoLaQuery = $queryFormateada -> execute();
    $conexion -> close();

    if ($sehaEjecutadoLaQuery) {
        return true;
    } else {
        return false;
    }
}

?>