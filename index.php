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
            //crear variables con la informacion para la conexion
            $host = "localhost";
            $bd = "PruebaPrimerDia";
            $username = "root";
            $password = "";

            //crear la conexion
            $conexion = new mysqli($host, $username, $password, $bd);

            //comprobar si se realiza la conexion
            if (!$conexion->connect_error) {
                echo "<p>Conexion realizada con exito</p>";
                $sql = "SELECT * FROM Tareas";

                $resultado = $conexion->query($sql);

                $numeroResultados = $resultado->num_rows;
                //Nos permite obtener los datos necesarion del resultado
                while ($fila = $resultado->fetch_assoc()) {
                    //mostramos el nombre de la primera tarea
                    echo "<ul>";
                    echo "<li>" . $fila['nombre'] . "</li>";
                    echo "</ul>";
                }

                $conexion->close();


            } else {
                echo "<p>Error con la conexion en la base de datos</p>";
                die("Murio el programa");
            }
            ?>
            <a href="formulario.php">Crear Tarea</a>
        </body>
    </main>

</hmtl>