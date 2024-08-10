<?php

use PHPUnit\Framework\TestCase;

class add_prueba extends TestCase
{
    // Conexión a la base de datos (asegúrate de tener una conexión disponible)
    private $dbConn;

    protected function setUp(): void
    {
        // Configurar la conexión a la base de datos antes de cada prueba
        $this->dbConn = new PDO('mysql:host=localhost;dbname=easyjob', 'root', '');
    }

    protected function tearDown(): void
    {
        // Limpiar la base de datos después de cada prueba (opcional, pero recomendado)
        // Puedes eliminar los registros insertados durante la prueba
    }

    public function testInsercionDatosCorrectos()
    {
        // 1. Preparar datos de prueba válidos
        $datosPrueba = [
            'identificacion' => 1026555340, 
            'nombre' => 'edwin',
            'apellido' => 'villafrades',
            'direccion' => 'Cra 79 SUR #77g-50',
            'telefono' => 2147483647,
            'fecha_nacimiento' => '1987-12-03'
        ];

        // 2. Simular el envío del formulario (puedes usar una biblioteca como Guzzle para esto)
        $_POST['Submit'] = 'Enviar'; // Simular que se presionó el botón Submit
        $_POST['identificacion'] = $datosPrueba['identificacion'];
        $_POST['nombre'] = $datosPrueba['nombre'];
        $_POST['apellido'] = $datosPrueba['apellido'];
        $_POST['direccion'] = $datosPrueba['direccion'];
        $_POST['telefono'] = $datosPrueba['telefono'];
        $_POST['fecha_nacimiento'] = $datosPrueba['fecha_nacimiento'];

        // 3. Ejecutar el código que inserta los datos
        // Asegúrate de que el código que estás probando esté incluido o accesible desde aquí.
        // Puedes incluir el archivo "config3.php" y luego ejecutar el código PHP que proporcionaste.

        // 4. Verificar que los datos se insertaron correctamente en la base de datos
        $sql = "SELECT * FROM empleados WHERE identificacion = :identificacion";
        $query = $this->dbConn->prepare($sql);
        $query->bindParam(':identificacion', $datosPrueba['identificacion']);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_ASSOC);

        // 5. Realizar aserciones para validar el resultado
        $this->assertNotNull($resultado); // Verificar que se encontró un registro
        $this->assertEquals($datosPrueba['nombre'], $resultado['nombre']);
        $this->assertEquals($datosPrueba['apellido'], $resultado['apellido']);
        // ... (más aserciones para otros campos)
    }

    // Puedes agregar más métodos de prueba para verificar otros escenarios:
    // - Campos vacíos
    // - Tipos de datos incorrectos
    // - Identificación duplicada
    // - ...
};
