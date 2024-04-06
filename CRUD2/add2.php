<html>
<head>
<title>Adicionar Datos</title>
</head>
<body>
<?php
include_once("config2.php");
if(isset($_POST['Submit'])) {
$nombre = $_POST['nombre'];
$email= $_POST['email'];
$celular = $_POST['celular'];
$documento = $_POST['documento'];
$direccion = $_POST['direccion'];
$contrasena = $_POST['contrasena'];
if( empty($nombre) || empty($email) || empty($celular) ||
empty($documento) || empty($direccion) || empty($contrasena)) {
if(empty($nombre)) {
echo "<font color='red'>Campo: nombre esta
vacio.</font><br/>";
}
if(empty($email)) {
echo "<font color='red'>Campo: email esta
vacio.</font><br/>";
}
if(empty($celular)) {
echo "<font color='red'>Campo: celular esta
vacio.</font><br/>";
}
if(empty($documento)) {
echo "<font color='red'>Campo: documento esta
vacio.</font><br/>";
}
if(empty($direccion)) {
echo "<font color='red'>Campo: direccion esta
vacio.</font><br/>";
}
if(empty($contrasena)) {
echo "<font color='red'>Campo: contrasena esta
vacio.</font><br/>";
}
echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
} else { 
$sql = "INSERT INTO cliente(nombre, email, celular,
documento, direccion, contrasena) VALUES(:nombre, :email, :celular, :documento, :direccion,
:contrasena)";
$query = $dbConn->prepare($sql);
$query->bindparam(':nombre', $nombre);
$query->bindparam(':email', $email);
$query->bindparam(':celular', $celular);
$query->bindparam(':documento', $documento);
$query->bindparam(':direccion', $direccion);
$query->bindparam(':contrasena', $contrasena);
$query->execute();
echo "<font color='green'>Registro Agregado Correctamente.";
echo "Cantidad de Registros Agregados: ".$query->rowCount()."<br>";
echo "<br/><a href='index2.php'>Ver Todos los Registros</a>";
}
}
?>
</body>
</html>