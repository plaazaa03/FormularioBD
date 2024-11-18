<?php
require_once('Tareas.php');

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

function obtenerTareas($finalizado)
{
    $conexion = conectarBD();

    if ($finalizado) {
        $sql = "SELECT * FROM Tareas where fecha_finalizacion is not null";
        $resultado = $conexion->query($sql);

        //Nos permite obtener los datos necesarion del resultado
        while ($fila = $resultado->fetch_assoc()) {
            //mostramos el nombre de la primera tarea
            $tareas[] = new Tareas($fila['id'], $fila['nombre'], $fila['fecha_finalizacion']);
            
        }
    
        $conexion->close();
    } else {
        $sql = "SELECT * FROM Tareas where fecha_finalizacion is null"; 
        $resultado = $conexion->query($sql);

        //Nos permite obtener los datos necesarion del resultado
        while ($fila = $resultado->fetch_assoc()) {
            //mostramos el nombre de la primera tarea
            $tareas[] = new Tareas($fila['id'], $fila['nombre'], $fila['fecha_finalizacion']);
            
        }
    
        $conexion->close();
    }
    return $tareas;
}

/*
    function obtenerTareasFinalizadas() {
        $conexion = conectarBD();
        $sql = "SELECT * FROM Tareas where fecha_finalizacion is not null";

        $resultado = $conexion->query($sql);

        //Nos permite obtener los datos necesarion del resultado
        while ($fila = $resultado->fetch_assoc()) {
            //mostramos el nombre de la primera tarea
            $tareas[] = new Tareas($fila['id'], $fila['nombre'], $fila['fecha_finalizacion']);
            
        }

        $conexion->close();

        return $tareas;
    }
*/

function crearTareas($idUsuario)
{

    $conexion = conectarBD();
    // recuperar informacion del formulario
    $nombre = $_POST['nombre'];
    // realizar la insercion
    $sql = "INSERT INTO Tareas (nombre, id_usuario) VALUES (?,?)";
    // preparar la consulta
    $queryFormateado = $conexion->prepare($sql);
    // ejecutar la consulta
    $queryFormateado->bind_param("si", $nombre, $idUsuario);
    $todoBien = $queryFormateado->execute();

    if ($todoBien) {
        echo "<p>Registro guardado con exito</p>";
        $conexion->close();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    return $todoBien;
}

function modificarTareas() {
    $conexion = conectarBD();
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];

    $sql = "UPDATE Tareas SET nombre = ? WHERE id = ?";
    $queryFormateado = $conexion->prepare($sql);
    $queryFormateado->bind_param("si", $nombre, $id);
    $todoBien = $queryFormateado->execute();

    if ($todoBien) {
        echo "<p>Tarea modificada con exito</p>";
        $conexion->close();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    return $todoBien;
}

function finalizarTareas($id) {
    $conexion = conectarBD();
    $miFecha = date('Y-m-d H:i:s');

    $sql = "UPDATE Tareas SET fecha_finalizacion = ? WHERE id = ?";
    $queryFormateado = $conexion->prepare($sql);
    $queryFormateado->bind_param("si", $miFecha, $id);
    $todoBien = $queryFormateado->execute();

    if ($todoBien) {
        echo "<p>Tarea finalizada con exito</p>";
        $conexion->close();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    return $todoBien;
}

?>