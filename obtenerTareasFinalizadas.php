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
    <h1>Tareas Finalizadas</h1>
</header>

<body>
    <main>
    <?php
        require_once('TareasService.php');

        $tareas = obtenerTareasFinalizadas();
        ?>

        <ul>
            <?php foreach ($tareas as $tarea): ?>
                
                <li id="tarea-<?= $tarea->getId() ?>">
                    <!-- Muestra el nombre de la tarea -->    
                    La tarea <?= $tarea->getNombre() ?> finalizo el dia: <?= $tarea->getFechaFin() ?>
                </li>                
            <?php endforeach; ?>
        </ul>
    </main>

        <a id="volverIndex" href="index.php">Volver Index</a>
</body>

</html>