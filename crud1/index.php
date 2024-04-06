<?php
include_once("config.php");
$result = $dbConn->query("SELECT * FROM servicios ORDER BY servicioid ASC");
?>

<html>
<head>
    <title>Listado de Servicios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        th {
            background-color: blue;
            color: white;
        }
        .action-links a {
            color: blue;
            text-decoration: none;
            margin-right: 10px;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <a href="add.html">Adicionar servicio</a><br/><br/>
    <table>
        <tr>
            <th>Servicio</th>
            <th>Nombre</th>
            <th>Tarifa</th>
            <th>Acción</th>
        </tr>
        <?php
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['servicioid']."</td>";
            echo "<td>".$row['nombre']."</td>";
            echo "<td>".$row['tarifa']."</td>";
            echo "<td class='action-links'>
                    <a href=\"edit.php?servicioid=$row[servicioid]\">Editar</a> | 
                    <a href=\"delete.php?servicioid=$row[servicioid]\" onClick=\"return confirm('¿Está seguro de eliminar el registro?')\">Eliminar</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
