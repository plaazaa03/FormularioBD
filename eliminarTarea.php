<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='micss.css'>
    <script src='micss.js'></script>
</head>
<header>
    <h1>Eliminar Tareas</h1>
</header>

<body>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once('TareasService.php');

        $id = $_POST['id'];

        $eliminarTarea = finalizarTareas($id);

    }


    ?>
    <a id="volverIndex" href="index.php">Volver Index</a>
</body>

</html>