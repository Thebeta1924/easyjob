<?php
include("config2.php");
$id_cliente = $_GET['id_cliente'];
$sql = "DELETE FROM cliente WHERE id_cliente=:id_cliente";
$query = $dbConn->prepare($sql);
$query->execute(array(':id_cliente' => $id_cliente));
header("Location:index2.php");
?>