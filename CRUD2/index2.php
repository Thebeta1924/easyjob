<?php
include_once("config2.php");
$result = $dbConn->query("SELECT * FROM cliente ORDER BY id_cliente ASC");
?>
<html>
<head>
<title> Listado de Cliente</title>
</head>
<body>
<a href="add2.html">Registrar Cliente</a><br/><br/>
<table width='80%' border=5>
<tr bgcolor='red'>
<td>Nombre</td>
<td>Email</td>
<td>Celular</td>
<td>Documento</td>
<td>Direccion</td>
<td>Contraseña</td>
<th>Acción</th>
</tr>
<?php
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
echo "<tr>";
echo "<td>".$row['nombre']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['celular']."</td>";
echo "<td>".$row['documento']."</td>";
echo "<td>".$row['direccion']."</td>";
echo "<td>".$row['contrasena']."</td>";
echo "<td><a href=\"edit2.php?id_cliente=$row[id_cliente]\">Editar</a> | <a
href=\"delete2.php?id_cliente=$row[id_cliente]\"
onClick=\"return confirm('Esta seguro de elimar el
registro?')\">Eliminar</a></td>";
}
?>
</table>
</body>
</html>