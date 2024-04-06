<?php
$host = 'localhost';
$dbname = 'easyjob';
$username = 'root';
$password = ''; // La contraseña está vacía en este caso

try {
    // Crear una instancia de PDO
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Configurar PDO para que arroje excepciones en caso de errores
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Conexión establecida correctamente
    // echo "Conexión exitosa a la base de datos $dbname.";
} catch(PDOException $e) {
    // Manejar errores de conexión
    die("Error al conectar a la base de datos $dbname: " . $e->getMessage());
}
?>
