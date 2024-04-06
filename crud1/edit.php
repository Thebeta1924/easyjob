<?php
include_once("config.php");

if(isset($_POST['update']))
{
    $servicioid = $_POST['servicioid'];
    $servicio = $_POST['servicio'];
    $nombre = $_POST['nombre'];
    $tarifa = $_POST['tarifa'];

    if(empty($servicio) || empty($nombre) || empty($tarifa)) {
        if(empty($servicio)) {
            echo "<font color='red'>Campo: servicio está vacío.</font><br/>";
        }
        if(empty($nombre)) {
            echo "<font color='red'>Campo: nombre está vacío.</font><br/>";
        }
        if(empty($tarifa)) {
            echo "<font color='red'>Campo: tarifa está vacío.</font><br/>";
        }
    } else {
        $sql = "UPDATE servicios SET nombre=:nombre, tarifa=:tarifa WHERE servicioid=:servicioid";
        $query = $dbConn->prepare($sql);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':tarifa', $tarifa);
        $query->bindParam(':servicioid', $servicioid);
        $query->execute();
        header("Location: index.php");
    }
}

// Obtener el ID del servicio de la URL
$servicioid = isset($_GET['servicioid']) ? $_GET['servicioid'] : null;

// Verificar si el ID del servicio está presente
if($servicioid) {
    $sql = "SELECT * FROM servicios WHERE servicioid=:servicioid";
    $query = $dbConn->prepare($sql);
    $query->bindParam(':servicioid', $servicioid);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    
    // Verificar si se encontró un registro con el ID proporcionado
    if($row) {
        $servicio = $row['servicioid'];
        $nombre = $row['nombre'];
        $tarifa = $row['tarifa'];
    } else {
        // Si no se encontró el servicio, redirigir o mostrar un mensaje de error
        echo "El servicio con ID proporcionado no existe.";
        exit;
    }
} else {
    // Si no se proporciona un ID de servicio válido, redirigir o mostrar un mensaje de error
    echo "ID de servicio no proporcionado.";
    exit;
}
?>

<html>
<head>
    <title>Editar Datos</title>
</head>
<body>
<a href="index.php">Inicio</a>
<br/><br/>
<form name="form1" method="post" action="edit.php">
    <table border="0">
        <tr>
            <td>Servicio</td>
            <td><input type="text" name="servicio" value="<?php echo $servicio;?>"></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
        </tr>
        <tr>
            <td>Tarifa</td>
            <td><input type="text" name="tarifa" value="<?php echo $tarifa;?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="servicioid" value="<?php echo $servicioid;?>"></td>
            <td><input type="submit" name="update" value="Editar"></td>
        </tr>
    </table>
</form>
</body>
</html>
