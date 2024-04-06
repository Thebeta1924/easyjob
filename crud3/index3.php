<?php
include_once("config3.php");

try {
    $result = $dbConn->query("SELECT * FROM empleados ORDER BY id ASC");
    
    // Verificar si se obtuvieron resultados
    if ($result) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Encabezado del HTML, incluyendo estilos -->
</head>
<body>
    <div id="container">
        <h1>Listado de empleados</h1>
        <a href="index3.html">Agregar empleado</a><br><br>
        <table width='80%' border=5>
            <tr bgcolor='blue'>
                <th>identificación</th>
                <th>nombre</th>
                <th>apellido</th>
                <th>dirección</th>
                <th>teléfono</th>
                <th>fecha_nacimiento</th>
                <th>Acción</th>
            </tr>
            <?php
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>".$row['identificacion']."</td>";
                    echo "<td>".$row['nombre']."</td>";
                    echo "<td>".$row['apellido']."</td>";
                    echo "<td>".$row['direccion']."</td>";
                    echo "<td>".$row['telefono']."</td>";
                    echo "<td>".$row['fecha_nacimiento']."</td>";
                    echo "<td><a href=\"edit3.php?id=".$row['id']."\">Editar</a> | <a href=\"delete3.php?id="
                    .$row['id']."\" onClick=\"return confirm('¿Estás seguro de eliminar el registro?')\">Eliminar</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>
<?php
    } else {
        echo "No se encontraron registros de empleados.";
    }
} catch(PDOException $e) {
    // Manejar errores de consulta
    die("Error al ejecutar la consulta: " . $e->getMessage());
}
?>


