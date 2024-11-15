<!DOCTYPE html>
<html></html>
<head>
    <title>Registro de nuevos usuarios</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" media="screen" href="micss.css">
</head>
<body>
    <?php
    $nick = $_POST['nick'];
    $password = $_POST['password'];
    $avatar = $_FILES['avatar'];

    if (isset($_POST['guardar'])) {
        
    }
    ?>

    <header>
        <h1>Nuevo Usuario</h1>
    </header>

    <main>
      <!-- Este formulario acepta imagenes y compartir ficheros --> 
        <form method="post" action="?" enctype="multipart/form-data">
            <label for="nick">Nick:</label>
            <input type="text" name="nick" id="nick" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <label for="avatar">Avatar:</label>
            <input type="file" name="avatar" id="avatar">

            <input type="submit" value="Guardar" name="guardar">
        </form>
    </main>
</body>
</html>