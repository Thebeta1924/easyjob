<html>
<head>
<title>Adicionar Datos</title>
</head>
<body>
<?php
include_once("config4.php");
if(isset($_POST['Submit'])) {
$id_producto = $_POST['id_producto'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
if(empty($id_producto) || empty($nombre) || empty($precio) || empty($stock)) {
if(empty($id_producto)) {
echo "<font color='red'>Campo: id_producto esta vacio.</font><br/>";
}
if(empty($nombre)) {
echo "<font color='red'>Campo: nombre esta vacio.</font><br/>";
}
if(empty($precio)) {
echo "<font color='red'>Campo: precio esta vacio.</font><br/>";
}
if(empty($stock)) {
echo "<font color='red'>Campo: stock esta vacio.</font><br/>";
}
echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
} else {
$sql = "INSERT INTO productos (id_producto, nombre, precio, stock) VALUES(:id_producto, :nombre, :precio, :stock)";
$query = $dbConn->prepare($sql);
$query->bindparam(':id_producto', $id_producto);
$query->bindparam(':nombre', $nombre);
$query->bindparam(':precio', $precio);
$query->bindparam(':stock', $stock);
$query->execute();
echo "<font color='green'>Registro Agregado Correctamente.";
echo "Cantidad de Registros Agregados: ".$query->rowCount()."<br>";
echo "<br/><a href='index4.php'>Ver Todos los Registros</a>";
}
}
?>
</body>
</html>