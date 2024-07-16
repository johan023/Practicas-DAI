<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center; /* Center text */
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        td {
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Motos</h1>
    <table>
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Color</th>
                <th>ID Cliente</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($motocicletas as $motocicleta): ?>
            <tr>
                <td><?php echo $motocicleta->Matricula; ?></td>
                <td><?php echo $motocicleta->Marca; ?></td>
                <td><?php echo $motocicleta->Modelo; ?></td>
                <td><?php echo $motocicleta->Anyo; ?></td>
                <td><?php echo $motocicleta->Color; ?></td>
                <td><?php echo $motocicleta->Id_Cliente; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\P2_Laravel\Resources\views/datos_motocicleta/ver.blade.php ENDPATH**/ ?>