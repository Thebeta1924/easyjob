<?php

use PHPUnit\Framework\TestCase;

class edit_prueba extends TestCase
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


    public function testModificacionDatos()
    {
        // Preparar datos de prueba
        $datosOriginales = [
            'identificacion' => 1026555340,
            'nombre' => 'edwin',
            'apellido' => 'villafrades',
            'direccion' => 'Cra 79 SUR #77g-50',
            'telefono' => 2147483647,
            'fecha_nacimiento' => '1987-12-03'
        ];

        $datosModificados = [
            'nombre' => 'pedro',
            'apellido' => 'perez'
        ];

        // Insertar datos originales

        // Simular el envío del formulario de modificación
        $_POST['identificacion'] = $datosOriginales['identificacion'];
        $_POST['nombre'] = $datosModificados['nombre'];
        $_POST['apellido'] = $datosModificados['apellido'];
        $_POST['direccion'] = $datosOriginales['direccion'];
        $_POST['telefono'] = $datosOriginales['telefono'];
        $_POST['fecha_nacimiento'] = $datosOriginales['fecha_nacimiento'];

        // Ejecutar el código de modificación
        // Incluye el archivo o el código PHP que maneja la modificación de datos aquí

        // Verificar que los datos se modificaron correctamente
        $sql = "SELECT * FROM empleados WHERE identificacion = :identificacion";
        $query = $this->dbConn->prepare($sql);
        $query->bindParam(':identificacion', $datosOriginales['identificacion']);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_ASSOC);

        // Realizar aserciones para validar el resultado
        $this->assertNotNull($resultado);
        $this->assertEquals($datosModificados['nombre'], $resultado['nombre']);
        $this->assertEquals($datosModificados['apellido'], $resultado['apellido']);
    }

}
