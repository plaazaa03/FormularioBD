<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login de usuarios</title>
    <link rel="stylesheet" type="text/css" media="screen" href="micss.css">
</head>
<body>
    <?php

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("UsuarioService.php");
    $nick = $_POST['nick'];
    $password = $_POST['password'];
    
    $usuario = login($nick, $password);
    
    if ($usuario) {
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php");
            exit();
        } else {
            echo "<p id='error'>Usuario o contraseña incorrectas</p>";
        }
    }
    ?>

    <header>
        <h1>Login Usuario</h1>
    </header>

    <main>
        <form method="post" action="?">
            <label for="nick">Nick:</label>
            <input type="text" name="nick" id="nick" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" value="Login">
        </form>
        <a href="registro.php">Registrarse</a>
    </main>
</body>
</html>