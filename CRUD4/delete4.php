<?php
include("config4.php");
$id_producto = $_GET['id_producto'];
$sql = "DELETE FROM productos WHERE id_producto=:id_producto";
$query = $dbConn->prepare($sql);
$query->execute(array(':id_producto' => $id_producto));
header("Location:index4.php");
?>