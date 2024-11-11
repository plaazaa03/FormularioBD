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
        require_once('TareasService.php');

        $newTarea = crearTareas();
        
    }




    ?>
    <a id="volverIndex" href="index.php">Volver Index</a>
</body>

</html>