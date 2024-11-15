<?php
session_start();
require_once 'usuario.php';
function login() {
    $conexion = conexionBD();

    $sql = "SELECT * FROM usuarios WHERE nick = ? AND password = ?";
    $queryFormateada = $conexion -> prepare($sql);
    $queryFormateada -> bind_param("ss", $_POST['nick'], $_POST['password']);
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

function guardarUsuario($usuario) {
    $conexion = conexionBD();

    $sql = "INSERT INTO usuarios (nick, password, avatar) VALUES (?, ?, ?)";
    $queryFormateada = $conexion -> prepare($sql);
    $queryFormateada -> bind_param("sss", $usuario -> getNick(), $usuario -> getPassword(), $usuario -> getAvatar());
    $sehaEjecutadoLaQuery = $queryFormateada -> execute();
    $conexion -> close();
    return $sehaEjecutadoLaQuery;
}

?>