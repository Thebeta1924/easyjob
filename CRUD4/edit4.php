<?php
include_once("config4.php");
if(isset($_POST['update']))
{
$id_producto = $_POST['id_producto'];
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
} else {
$sql = "UPDATE productos SET id_producto=:id_producto, nombre=:nombre, precio=:precio, stock=:stock WHERE id_producto=:id_producto";
$query = $dbConn->prepare($sql);
$query->bindparam(':id_producto', $id_producto);
$query->bindparam(':id_producto', $id_producto);
$query->bindparam(':nombre', $nombre);
$query->bindparam(':precio', $precio);
$query->bindparam(':stock', $stock);
$query->execute();
header("Location: index4.php");
}
}
?>
<?php
$id_producto = $_GET['id_producto'];
$sql = "SELECT * FROM productos WHERE id_producto=:id_producto";
$query = $dbConn->prepare($sql);
$query->execute(array(':id_producto' => $id_producto));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
$id_producto = $row['id_producto'];
$nombre = $row['nombre'];
$precio = $row['precio'];
$stock = $row['stock'];
}
?>
<html>
<head>
<title>Edit Data</title>
</head>
<body>
<a href="index4.php">Inicio</a>
<br/><br/>
<form name="form1" method="post" action="edit4.php">
<table border="0">
<tr>
<td>Id_producto</td>
<td><input type="text" name="id_producto" value="<?php echo $id_producto;?>"></td>
</tr>
<tr>
<td>Nombre</td>
<td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
</tr>
<tr>
<td>Precio</td>
<td><input type="text" name="precio" value="<?php echo $precio;?>"></td>
</tr>
<tr>
<td>Stock</td>
<td><input type="text" name="stock" value="<?php echo $stock;?>"></td>
</tr>
<tr>
<td><input type="hidden" name="id_producto" value=<?php echo $_GET['id_producto'];?>></td>
<td><input type="submit" name="update" value="Editar"></td>
</tr>
</table>
</form>
</body>
</html>