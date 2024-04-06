<?php
include("config3.php");

// Verificar si se proporciona un ID válido
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        // Preparar la consulta de eliminación
        $sql = "DELETE FROM empleados WHERE id=:id";
        $query = $dbConn->prepare($sql);
        
        // Vincular el parámetro ID
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Ejecutar la consulta
        $query->execute();
        
        // Redirigir a la página principal después de la eliminación
        header("Location: index3.php");
        exit(); // Terminar el script después de redireccionar
    } catch(PDOException $e) {
        // Manejar errores de PDO
        echo "Error al intentar eliminar el registro: " . $e->getMessage();
        // También puedes redirigir a una página de error
        // header("Location: error.php");
        // exit();
    }
} else {
    // Si no se proporciona un ID válido, mostrar un mensaje de error o redirigir a una página de error
    echo "ID inválido.";
    // O puedes redirigir a una página de error:
    // header("Location: error.php");
    // exit();
}
?>
