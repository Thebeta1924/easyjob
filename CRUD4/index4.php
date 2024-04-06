<?php
include_once("config4.php");
$result = $dbConn->query("SELECT * FROM productos ORDER BY id_producto ASC");
?>
<html>
<head>
<title> Listado de Productos</title>
</head>
<body>
<a href="add4.html">Adicionar Productos</a><br/><br/>
<table width='80%' border=0>
<tr bgcolor='#CCCCCC'>
<td>Id_producto</td>
<td>Nombre</td>
<td>Precio</td>
<td>Stock</td>
<td>Accion</td>
</tr>
<?php
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
echo "<tr>";
echo "<td>".$row['id_producto']."</td>";
echo "<td>".$row['nombre']."</td>";
echo "<td>".$row['precio']."</td>";
echo "<td>".$row['stock']."</td>";
echo "<td><a href=\"edit4.php?id_producto=$row[id_producto]\">Editar</a> | <a href=\"delete4.php?id_producto=$row[id_producto]\"
onClick=\"return confirm('Esta seguro de elimar el registro?')\">Eliminar</a></td>";
}
?>
</table>
</body>
</html>