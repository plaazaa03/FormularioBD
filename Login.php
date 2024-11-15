<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login de usuarios</title>
    <link rel="stylesheet" type="text/css" media="screen" href="micss.css">
</head>
<body>
    <?php
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
    </main>
</body>
</html>