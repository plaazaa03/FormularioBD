<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Obtención de datos desde Base de datos</title>
    <link rel="stylesheet" type="text/css" media="screen" href="micss.css">
</head>

<body>
    <header>
        <h1>Obtención de datos desde Base de datos</h1>
    </header>

    <main>
        <?php
        require_once('TareasService.php');

        $tareas = obtenerTareas();
        ?>

        <ul>
            <?php foreach ($tareas as $tarea): ?>
                
                <li id="tarea-<?= $tarea->getId() ?>">
                    <!-- Muestra el nombre de la tarea -->    
                    <?= $tarea->getNombre() ?></li>

                    <a href="modificarTarea.php?id=<?=$tarea->getId()?>">Modificar Tarea</a>
                    <!-- Creamos el dialogo -->
                    
                    <button onclick="document.getElementById('dialog-<?=$tarea->getId()?>').showModal()">Detalles</button>

                    <dialog id="dialog-<?=$tarea->getId()?>">
                        <p>Estas seguro de que deseas borrar la tarea: <?= htmlspecialchars($tarea->getNombre()) ?></p>
                        <form action="eliminarTarea.php" method="post">
                            <input type="hidden" name="id" value="<?=$tarea->getId()?>">
                            <button type="submit">Eliminar</button>
                            <button onclick="document.getElementById('dialog-<?= $tarea->getId() ?>').close()">Cerrar</button>
                        </form>
                    </dialog>
                    

            <?php endforeach; ?>
        </ul>
        <a href="formulario.php">Crear Tarea</a>
    </main>
</body>

</html>