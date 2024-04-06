<?php
	require 'config.php';

	if(isset($_POST['register'])) {
		$errMsg = '';

		// Get data from FORM
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$secretpin = $_POST['secretpin'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $document = $_POST['document'];
        $direction = $_POST['direction'];
        $especiality = $_POST['especiality'];

		if($fullname == '')
			$errMsg = 'Ingrese su Nombre Completo';
		if($username == '')
			$errMsg = 'Ingrese su Usuario';
		if($password == '')
			$errMsg = 'Ingrese su Contraseña';
		if($secretpin == '')
			$errMsg = 'Ingrese su recordatorio';
        if($email == '')
            $errMsg = 'Ingrese su correo electrónico';
        if($telephone == '')
            $errMsg = 'Ingrese su número de teléfono';
        if($document == '')
            $errMsg = 'Ingrese su documento de identidad';
        if($direction == '')
            $errMsg = 'Ingrese su dirección';
        if($especiality == '')
            $errMsg = 'Ingrese su especialidad';

		if($errMsg == ''){
			try {
				$stmt = $connect->prepare('INSERT INTO easyjob.users (fullname, email, telephone, document, direction, password, especiality, username, secretpin) VALUES (:fullname, :email, :telephone, :document, :direction, :password, :especiality, :username, :secretpin)');
				$stmt->execute(array(
					':fullname' => $fullname,
					':email' => $email,
					':telephone' => $telephone,
					':document' => $document,
					':direction' => $direction,
					':password' => $password,
					':especiality' => $especiality,
					':username' => $username,
					':secretpin' => $secretpin
					));
				header('Location: register.php?action=joined');
				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registro Exitoso!!. Ahora puede Ingresar <a href="login.php">Ingreso</a>';
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            text-align: center;
            height: 100%;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
        }

        .container {
            border: solid 1px #079B96;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        b {
            color: #079B96;
            font-size: 20px;
        }

        .box {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit {
            width: 100%;
            padding: 10px;
            color: #fff;
            background-color: #079B96;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit:hover {
            background-color: #057c75;
        }

        a {
            color: #079B96;
            text-decoration: none;
            margin-top: 10px;
            display: block;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #FF0000;
            text-align: center;
            font-size: 17px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div style="margin: 15px">
        <div align="center" class="container">
            <b>Regístrate</b>
            <div style="margin: 15px">
                <form action="" method="post">
                    <input type="text" name="fullname" placeholder="Nombre Completo" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname'] ?>" autocomplete="off" class="box"/><br />
                    <input type="text" name="email" placeholder="Correo Electrónico" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" autocomplete="off" class="box"/><br />
                    <input type="text" name="telephone" placeholder="Número de Teléfono" value="<?php if(isset($_POST['telephone'])) echo $_POST['telephone'] ?>" autocomplete="off" class="box"/><br />
                    <input type="text" name="document" placeholder="Documento de Identidad" value="<?php if(isset($_POST['document'])) echo $_POST['document'] ?>" autocomplete="off" class="box"/><br />
                    <input type="text" name="direction" placeholder="Dirección" value="<?php if(isset($_POST['direction'])) echo $_POST['direction'] ?>" autocomplete="off" class="box"/><br />
                    <input type="password" name="password" placeholder="Contraseña" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" class="box" /><br/>
                    <input type="text" name="especiality" placeholder="Especialidad" value="<?php if(isset($_POST['especiality'])) echo $_POST['especiality'] ?>" autocomplete="off" class="box"/><br />
                    <input type="text" name="username" placeholder="Usuario" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br />
                    <input type="text" name="secretpin" placeholder="Pin secreto (números)" value="<?php if(isset($_POST['secretpin'])) echo $_POST['secretpin'] ?>" autocomplete="off" class="box"/><br />
                    <input type="submit" name='register' value="Registro" class='submit'/><br />
                </form>
                <span><a href="index.php">Volver al inicio</a></span>
            </div>
            <?php
                if(isset($errMsg)){
                    echo '<div class="error-message">'.$errMsg.'</div>';
                }
            ?>
        </div>
    </div>
</body>
</html>
