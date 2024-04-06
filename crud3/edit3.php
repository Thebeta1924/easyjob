<?php
include_once("config3.php");
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    
    if(empty($identificacion) || empty($nombre) || empty($apellido) ||
       empty($direccion) || empty($telefono) || empty($fecha_nacimiento)) {
        if(empty($identificacion)) {
            echo "<font color='red'>Campo: identificacion está vacío.</font><br/>";
        }
        if(empty($nombre)) {
            echo "<font color='red'>Campo: nombre está vacío.</font><br/>";
        }
        if(empty($apellido)) {
            echo "<font color='red'>Campo: apellido está vacío.</font><br/>";
        }
        if(empty($direccion)) {
            echo "<font color='red'>Campo: dirección está vacío.</font><br/>";
        }
        if(empty($telefono)) {
            echo "<font color='red'>Campo: teléfono está vacío.</font><br/>";
        }
        if(empty($fecha_nacimiento)) {
            echo "<font color='red'>Campo: fecha de nacimiento está vacío.</font><br/>";
        }
        exit; // Salir del script si hay campos vacíos
    } else {
        $sql = "UPDATE empleados SET identificacion=:identificacion,
        nombre=:nombre, apellido=:apellido, direccion=:direccion, telefono=:telefono, fecha_nacimiento=:fecha_nacimiento WHERE
        id=:id";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':id', $id);
        $query->bindparam(':identificacion', $identificacion);
        $query->bindparam(':nombre', $nombre);
        $query->bindparam(':apellido', $apellido);
        $query->bindparam(':direccion', $direccion);
        $query->bindparam(':telefono', $telefono);
        $query->bindparam(':fecha_nacimiento', $fecha_nacimiento);
        $query->execute();
        header("Location: index3.php");
        exit; // Salir después de la redirección
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM empleados WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $identificacion = $row['identificacion'];
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $fecha_nacimiento = $row['fecha_nacimiento'];
}
?>

<html>
<head>
<title>Editar Datos</title>
</head>
<body>
<a href="index3.php">Inicio</a>
<br/><br/>
<form name="form1" method="post" action="edit3.php">
<table border="10">
<tr>
<td>Identificación</td>
<td><input type="text" name="identificacion" value="<?php echo $identificacion; ?>"></td>
</tr>
<tr>
<td>Nombre</td>
<td><input type="text" name="nombre" value="<?php echo $nombre; ?>"></td>
</tr>
<tr>
<td>Apellido</td>
<td><input type="text" name="apellido" value="<?php echo $apellido; ?>"></td>
</tr>
<tr>
<td>Dirección</td>
<td><input type="text" name="direccion" value="<?php echo $direccion; ?>"></td>
</tr>
<tr>
<td>Teléfono</td>
<td><input type="text" name="telefono" value="<?php echo $telefono; ?>"></td>
</tr>
<tr>
<td>Fecha de Nacimiento</td>
<td><input type="date" name="fecha_nacimiento" value="<?php echo
$fecha_nacimiento; ?>"></td>
</tr>
<tr>
<td><input type="hidden" name="id" value=<?php echo
$_GET['id'];?>></td>
<td><input type="submit" name="update"
value="Editar"></td>
</tr>
</table>
</form>
</body>
</html>