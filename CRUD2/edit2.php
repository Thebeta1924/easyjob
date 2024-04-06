<?php
include_once("config2.php");

if(isset($_POST['update']))
{
    $id_cliente = $_POST['id_cliente'];
    $nombre= $_POST['nombre'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $documento = $_POST['documento'];
    $direccion = $_POST['direccion'];
    $contrasena = $_POST['contrasena'];

    if(empty($nombre) || empty($email) || empty($celular) || 
    empty($documento) || empty($direccion)|| 
    empty($contrasena)) {
        // Mensajes de error
    } else {
        $sql = "UPDATE cliente SET nombre=:nombre,
         email=:email,celular=:celular,documento=:documento,direccion=:direccion,
         contrasena=:contrasena
          WHERE id_cliente=:id_cliente";
        $query = $dbConn->prepare($sql);
        $query->bindParam(':id_cliente', $id_cliente);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':email', $email);
        $query->bindParam(':celular', $celular);
        $query->bindParam(':documento', $documento); // Corregido el nombre de la columna
        $query->bindParam(':direccion', $direccion);
        $query->bindParam(':contrasena', $contrasena);
        $query->execute();
        header("Location: index2.php");
    }
}

$id_cliente = $_GET['id_cliente'];
$sql = "SELECT * FROM cliente WHERE id_cliente=:id_cliente";
$query = $dbConn->prepare($sql);
$query->execute(array(':id_cliente' => $id_cliente));
$row = $query->fetch(PDO::FETCH_ASSOC);
$id_cliente = $row['id_cliente'];
$nombre = $row['nombre']; // Corregido el nombre de la columna
$email = $row['email'];
$celular = $row['celular'];
$documento = $row['documento'];
$direccion = $row['direccion'];
$contrasena = $row['contrasena'];
?>

<html>
<head>
    <title>Editar Datos</title>
</head>
<body>
<a href="index2.php">Inicio</a>
<br/><br/>
<form name="form1" method="post" action="edit2.php">
    <table border="5">
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $email;?>"></td>
        </tr>
        <tr>
            <td>Celular</td>
            <td><input type="text" name="celular" value="<?php echo $celular;?>"></td> <!-- Corregido el tipo de entrada -->
        </tr>
        <tr>
            <td>Documento</td>
            <td><input type="text" name="documento" value="<?php echo $documento;?>"></td> <!-- Corregido el tipo de entrada -->
        </tr>
        <tr>
            <td>Direccion</td>
            <td><input type="text" name="direccion" value="<?php echo $direccion;?>"></td>
        </tr>
        <tr>
            <td>contrasena</td>
            <td><input type="text" name="contrasena" value="<?php echo $contrasena;?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id_cliente" value="<?php echo $id_cliente;?>"></td>
            <td><input type="submit" name="update" value="Editar"></td>
        </tr>
    </table>
</form>
</body>
</html>
