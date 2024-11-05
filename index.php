<hmtl>

    <head>
        <link rel='stylesheet' type='text/css' media='screen' href='micss.css'>

    </head>
    <header>
        <h1>Obtencion de datos desde Base de datos</h1>
    </header>
    <main>

        <body>
            <?php
            require_once('TareasService.php');

            $tareas = obtenerTareas();

            foreach ($tareas as $tarea) {
                echo "<ul>";
                echo "<li>" . $tarea->getNombre() . "</li>";
                echo "</ul>";
            }


            ?>
            <a href="formulario.php">Crear Tarea</a>
        </body>
    </main>

</hmtl>