<?php
    require 'config.php';

    if(isset($_POST['login'])) {
        $errMsg = '';

        // Get data from FORM
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == '')
            $errMsg = 'Ingrese un usuario';
        if($password == '')
            $errMsg = 'ingrese una contraseña';

        if($errMsg == '') {
            try {
                $stmt = $connect->prepare('SELECT id, fullname, username, password, secretpin FROM users WHERE username = :username');
                $stmt->execute(array(
                    ':username' => $username
                    ));
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                if($data == false){
                    $errMsg = "Usuario $username no encontrado.";
                }
                else {
                    if($password == $data['password']) {
                        $_SESSION['name'] = $data['fullname'];
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['password'] = $data['password'];
                        $_SESSION['secretpin'] = $data['secretpin'];

                        header('Location: dashboard.php');
                        exit;
                    }
                    else
                        $errMsg = 'Contraseña Incorrecta.';
                }
            }
            catch(PDOException $e) {
                $errMsg = $e->getMessage();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            height: 100vh;
        }

        .container {
            border: solid 1px #ccc;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #079B96;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px; /* Aumenta el espacio entre los campos */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Incluye el padding y el borde en el ancho total */
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            color: #fff;
            background-color: #079B96;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #057c75;
        }

        a {
            color: #079B96;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #FF0000;
            font-size: 17px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ingresa</h1>
        <span>o <a href="register.php">Registrate</a></span>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Usuario" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" /><br />
            <input type="password" name="password" placeholder="Contraseña" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" /><br/>
            <input type="submit" name='login' value="Ingresar" /><br />
        </form>
        <span><a href="forgot.php">¿Olvidaste la Contraseña?</a></span><br>
        <span><a href="index.php">Volver al Inicio</a></span>
        <?php
            if(isset($errMsg)){
                echo '<div class="error-message">'.$errMsg.'</div>';
            }
        ?>
    </div>
</body>
</html>
