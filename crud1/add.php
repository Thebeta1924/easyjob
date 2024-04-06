<html>
<head>
<title>Adicionar Datos</title>
</head>
<body>
<?php
include_once("config.php");
if(isset($_POST['Submit'])) {
    $servicioid = $_POST['servicio']; // Se corrigió el nombre de la variable
    $nombre= $_POST['nombre']; // Se corrigió el nombre de la variable
    $tarifa = $_POST['tarifa'];

    if(empty($servicioid) || empty($nombre) || empty($tarifa)) {
        if(empty($servicioid)) {
            echo "<font color='red'>Campo: servicios está vacío.</font><br/>";
        }
        if(empty($nombre)) {
            echo "<font color='red'>Campo: nombre está vacío.</font><br/>";
        }
        if(empty($tarifa)) {
            echo "<font color='red'>Campo: tarifa está vacío.</font><br/>";
        }
        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    } else {
        $sql = "INSERT INTO servicios(servicioid, nombre, tarifa) VALUES(:servicioid, :nombre, :tarifa)";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':servicioid', $servicioid);
        $query->bindparam(':nombre', $nombre);
        $query->bindparam(':tarifa', $tarifa);

        $query->execute();
        echo "<font color='green'>Registro Agregado Correctamente.</font>";
        echo "<br>Cantidad de Registros Agregados: ".$query->rowCount()."<br>";
        echo "<br/><a href='index.php'>Ver Todos los Registros</a>";
    }
}
?>
<form action="" method="post">
    <label for="servicio">Servicio:</label><br>
    <input type="text" id="servicio" name="servicio"><br>
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre"><br>
    <label for="tarifa">Tarifa:</label><br>
    <input type="text" id="tarifa" name="tarifa"><br><br>
    <input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>
