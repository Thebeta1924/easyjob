<html>
<head>
<title>Adicionar Datos</title>
</head>
<body>
    
<?php
include_once("config3.php");
if(isset($_POST['Submit'])) {
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido']; // Corregido
    $direccion = $_POST['direccion']; // Corregido
    $telefono = $_POST['telefono']; // Corregido
    $fecha_nacimiento = $_POST['fecha_nacimiento']; // Corregido

    if(empty($identificacion) || empty($nombre) || empty($apellido) || empty($direccion) || empty($telefono) || empty($fecha_nacimiento)) {
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
            echo "<font color='red'>Campo: direccion está vacío.</font><br/>";
        }
        if(empty($telefono)) {
            echo "<font color='red'>Campo: telefono está vacío.</font><br/>";
        }
        if(empty($fecha_nacimiento)) {
            echo "<font color='red'>Campo: fecha_nacimiento está vacío.</font><br/>";
        }
        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    } else {
        $sql = "INSERT INTO empleados(identificacion, nombre, apellido, direccion, telefono, fecha_nacimiento) VALUES(:identificacion, :nombre, :apellido, :direccion, :telefono, :fecha_nacimiento)";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':identificacion', $identificacion);
        $query->bindparam(':nombre', $nombre);
        $query->bindparam(':apellido', $apellido); // Corregido
        $query->bindparam(':direccion', $direccion); // Corregido
        $query->bindparam(':telefono', $telefono); // Corregido
        $query->bindparam(':fecha_nacimiento', $fecha_nacimiento); // Corregido
        $query->execute();
        echo "<font color='green'>Registro Agregado Correctamente.</font>";
        echo "<br>Cantidad de Registros Agregados: ".$query->rowCount()."<br>";
        echo "<br/><a href='index3.php'>Ver Todos los Registros</a>";
    }
}
?>
</body>
</html>
