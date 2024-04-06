<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            text-align: center;
            height: 100%;
            background-color: #f5f5f5;
        }

        .container {
            border: solid 1px #079B96;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 90%;
            margin: 50px auto;
        }

        h1 {
            color: #079B96;
            margin-bottom: 20px;
        }

        a {
            color: #079B96;
            text-decoration: none;
            margin-bottom: 10px;
            display: inline-block;
            padding: 10px 20px;
            border: 2px solid #079B96;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }

        a:hover {
            background-color: #079B96;
            color: #ffffff;
            border-color: #079B96;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Bienvenido a Easyjob!</h1>
        <p>Ingresa o Regístrate</p>
        <a href="login.php">Ingresa</a>
        <a href="register.php">Regístrate</a>
    </div>
</body>
</html>
