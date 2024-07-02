<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Motocicletas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 80%;
            margin: 20px 0;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
        }

        table th {
            background-color: #007BFF;
            color: #fff;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #d1ecf1;
        }

        table td {
            border-bottom: 1px solid #ddd;
        }

        .message {
            font-size: 18px;
            color: #333;
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <?php
        include("conexionPDO.php");

        $sql = "SELECT * FROM motocicletas WHERE 1=1";
        $params = [];

        if (!empty($_GET['matricula'])) {
            $sql .= " AND Matricula = :matricula";
            $params[':matricula'] = $_GET['matricula'];
        }

        if (!empty($_GET['marca'])) {
            $sql .= " AND Marca = :marca";
            $params[':marca'] = $_GET['marca'];
        }

        if (!empty($_GET['modelo'])) {
            $sql .= " AND Modelo = :modelo";
            $params[':modelo'] = $_GET['modelo'];
        }

        if (!empty($_GET['anyo'])) {
            $sql .= " AND Anyo = :anyo";
            $params[':anyo'] = $_GET['anyo'];
        }

        if (!empty($_GET['color'])) {
            $sql .= " AND Color = :color";
            $params[':color'] = $_GET['color'];
        }

        $stmt = $conexion->prepare($sql);
        $stmt->execute($params);

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($resultados) {
            echo "<table border='1'>";
            echo "<tr><th>Matrícula</th><th>Marca</th><th>Modelo</th><th>Año</th><th>Color</th></tr>";
            foreach ($resultados as $fila) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($fila['Matricula']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['Marca']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['Modelo']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['Anyo']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['Color']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='message'>No se encontraron resultados.</div>";
        }
    ?>
</body>
</html>
