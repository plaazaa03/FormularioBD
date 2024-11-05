<?php
require_once('Tareas.php');

function conectarBD()
{
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

function obtenerTareas()
{
    $conexion = conectarBD();
    $sql = "SELECT * FROM Tareas";

    $resultado = $conexion->query($sql);

    //Nos permite obtener los datos necesarion del resultado
    while ($fila = $resultado->fetch_assoc()) {
        //mostramos el nombre de la primera tarea
        $tareas[] = new Tareas($fila['id'], $fila['nombre'], $fila['fechaFin']);
        
    }

    foreach ($tareas as $tarea) {
        echo "<ul>";
        echo "<li>" . $tarea->getNombre() . "</li>";
        echo "</ul>";
    }

    $conexion->close();

    return $tareas;
}

function crearTareas()
{
    $conexion = conectarBD();
    // recuperar informacion del formulario
    $nombre = $_POST['nombre'];
    // realizar la insercion
    $sql = "INSERT INTO Tareas (nombre) VALUES (?)";
    // preparar la consulta
    $queryFormateado = $conexion->prepare($sql);
    // ejecutar la consulta
    $queryFormateado->bind_param("s", $nombre);
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

}

function eliminarTarea() {
    $conexion = conectarBD();

}

?>