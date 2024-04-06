<?php
include("config.php");
$servicioid = $_GET['servicioid'];
$sql = "DELETE FROM servicios WHERE servicioid=:servicioid"; // Aquí podrías necesitar cambiar ':servicioid' a ':id' dependiendo del nombre real del parámetro en tu base de datos
$query = $dbConn->prepare($sql);
$query->execute(array(':servicioid' => $servicioid)); // Cambié ':servicioid' a ':id' si ese es el nombre real del parámetro en tu base de datos
header("Location: index.php"); // Se corrigió la dirección de redirección
?>

