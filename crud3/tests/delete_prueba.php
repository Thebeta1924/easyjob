<?php

use PHPUnit\Framework\TestCase;

class delete_prueba extends TestCase
{
    // Conexión a la base de datos
    private $dbConn;

    protected function setUp(): void
    {
        // Configurar la conexión a la base de datos antes de cada prueba
        $this->dbConn = new PDO('mysql:host=localhost;dbname=easyjob', 'root', '');
        $this->dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Configurar la base de datos para la prueba (puedes insertar un registro de prueba aquí)
        $this->prepareDatabase();
    }

    protected function tearDown(): void
    {
        // Limpiar la base de datos después de cada prueba (opcional)
    }

    private function prepareDatabase()
    {
        // Insertar un registro de prueba
        $sql = "INSERT INTO empleados (identificacion, nombre, apellido, direccion, telefono, fecha_nacimiento) 
                VALUES (:identificacion, :nombre, :apellido, :direccion, :telefono, :fecha_nacimiento)";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute([
            ':identificacion' => 1026555340,
            ':nombre' => 'edwin',
            ':apellido' => 'villafrades',
            ':direccion' => 'Cra 79 SUR #77g-50',
            ':telefono' => 2147483647,
            ':fecha_nacimiento' => '1987-12-03'
        ]);
    }

    public function testEliminacionRegistro()
    {
        // ID del registro a eliminar
        $id = 1026555340;

        // Eliminar el registro
        $sql = "DELETE FROM empleados WHERE identificacion = :identificacion";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute([':identificacion' => $id]);

        // Verificar que el registro ha sido eliminado
        $sql = "SELECT * FROM empleados WHERE identificacion = :identificacion";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute([':identificacion' => $id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Aserciones
        $this->assertFalse($resultado); // Debería ser falso ya que el registro debe haber sido eliminado
    }
}
