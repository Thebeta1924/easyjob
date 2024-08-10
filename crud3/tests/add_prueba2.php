<?php

use PHPUnit\Framework\TestCase;

class delete_prueba extends TestCase
{
    private $dbConn;

    protected function setUp(): void
    {
        // Configurar la conexión a la base de datos antes de cada prueba
        $this->dbConn = new PDO('mysql:host=localhost;dbname=easyjob', 'root', '');
        // Configurar el modo de error para excepciones
        $this->dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    protected function tearDown(): void
    {
        // Limpiar la base de datos después de cada prueba (opcional, pero recomendado)
        // Puedes eliminar los registros insertados durante la prueba si es necesario
    }

public function testEliminacionDatos()
    {
        // Preparar datos de prueba
        $datosPrueba = [
            'identificacion' => 1026555341,
            'nombre' => 'prueba',
            'apellido' => 'eliminacion',
            'direccion' => 'Dirección para eliminar',
            'telefono' => 123456789,
            'fecha_nacimiento' => '1990-01-01'
        ];
        
        // Insertar datos para eliminar
        $this->insertarDatos($datosPrueba);

        // Simular el envío del formulario de eliminación
        $_POST['identificacion'] = $datosPrueba['identificacion'];

        // Ejecutar el código de eliminación
        // Incluye el archivo o el código PHP que maneja la eliminación de datos aquí

        // Verificar que los datos se eliminaron correctamente
        $sql = "SELECT * FROM empleados WHERE identificacion = :identificacion";
        $query = $this->dbConn->prepare($sql);
        $query->bindParam(':identificacion', $datosPrueba['identificacion']);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_ASSOC);

        // Realizar aserciones para validar el resultado
        $this->assertFalse($resultado); // Verifica que no se encuentre el registro
    }

    // Método auxiliar para insertar datos
    private function insertarDatos($datos)
    {
        $sql = "INSERT INTO empleados (identificacion, nombre, apellido, direccion, telefono, fecha_nacimiento) VALUES (:identificacion, :nombre, :apellido, :direccion, :telefono, :fecha_nacimiento)";
        $query = $this->dbConn->prepare($sql);
        $query->execute([
            ':identificacion' => $datos['identificacion'],
            ':nombre' => $datos['nombre'],
            ':apellido' => $datos['apellido'],
            ':direccion' => $datos['direccion'],
            ':telefono' => $datos['telefono'],
            ':fecha_nacimiento' => $datos['fecha_nacimiento']
        ]);
    }
}
