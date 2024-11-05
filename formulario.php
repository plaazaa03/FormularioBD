<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='micss.css'>
    <script src='main.js'></script>
</head>
<header>
    <h1>Formulario Creacion de Tareas</h1>
</header>

<body>
    <form action="" method="POST">
        <label for="nombre">Nombre Tarea: </label>
        <input type="text" name="nombre" id="nombre" required>
        <div class="operaciones">
            <input type="submit" value="Guardar">
        </div>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //crear variables con la informacion para la conexion
        $host = "localhost";
        $bd = "PruebaPrimerDia";
        $username = "root";
        $password = "";

        //crear la conexion
        $conexion = new mysqli($host, $username, $password, $bd);

        //comprobar si se realiza la conexion
        if (!$conexion->connect_error) {
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

        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
            die("Todo ha ido mal");
        }

    }




    ?>
    <a href="index.php">Volver Index</a>
</body>

</html>