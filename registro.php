<!DOCTYPE html>
<html></html>
<head>
    <title>Registro de nuevos usuarios</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" media="screen" href="micss.css">
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once('UsuarioService.php');
        $nick = $_POST['nick'];
        $password = $_POST['password'];
        $avatar = $_FILES['avatar'];
    
        // Recuperar el nombre del archivo
        $nombreArchivo = $avatar['name'];
    
        // Recuperar el temporal
        $avatarTmp = $avatar['tmp_name'];

        // Ruta avatar
        $carpetaDestino = "img/$nombreArchivo";

        if(file_exists($carpetaDestino)) {
            mkdir($carpetaDestino, 0777, true);
        }
    
        // Mover el archivo
        move_uploaded_file($avatarTmp, $nombreArchivo);

        if(guardarUsuario($nick, $password, $carpetaDestino)) {
            echo "Usuario guardado con exito";
            header("Location: Login.php");
        } else {
            echo "No se ha podido registrar el usuario";
        }
    }

   


    

    ?>

    <header>
        <h1>Nuevo Usuario</h1>
    </header>

    <main>
      <!-- Este formulario acepta imagenes y compartir ficheros --> 
        <form method="post" action="" enctype="multipart/form-data">
            <label for="nick">Nick:</label>
            <input type="text" name="nick" id="nick" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <label for="avatar">Avatar:</label>
            <input type="file" name="avatar" accept="image/*" id="avatar" required>

            <input type="submit" value="Guardar" name="guardar">
        </form>
    </main>
</body>
</html>