<?php
    session_start();
    if(empty($_SESSION['name'])) {
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #006D9C;
            color: #FFFFFF;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .username {
            font-size: 24px;
            font-weight: bold;
        }
        .welcome-text {
            margin-top: 20px;
            font-size: 18px;
        }
        .links {
            margin-top: 30px;
        }
        .links a {
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #079B96;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .links a:hover {
            background-color: #057c75;
        }
        .error-message {
            color: #FF0000;
            font-size: 16px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="username"><?php echo $_SESSION['name']; ?></div>
        </div>
        <div class="welcome-text">
            Bienvenido <?php echo $_SESSION['name']; ?>
        </div>
        <?php if(isset($errMsg)): ?>
            <div class="error-message"><?php echo $errMsg; ?></div>
        <?php endif; ?>
        <div class="links">
            <a href="http://localhost/crud1/index.php">Servicios</a>
            <a href="http://localhost/CRUD2/index2.php">Clientes</a>
            <a href="http://localhost/crud3/index3.php">Trabajadores</a>
            <a href="http://localhost/CRUD4/index4.php">Productos</a>
            <a href="update.php">Actualizar</a>
            <a href="logout.php">Salir</a>
        </div>
    </div>
</body>
</html>
