<?php
    include("conexionPDO.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Buscar Facturas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 20px auto;
            text-align: center;
        }
        h1 {
            margin: 20px auto;
        }
        form {
            margin: 20px auto;
            width: 70%;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center my-4"><b>Buscar Facturas</b></h1>
    <form method="post" action="buscar_factura_fecha2.php">
        <h4>Facturas Pagadas entre dos Fechas</h4>
        <br>
        <div class="form-group">
            <label for="fecha_inicio">Fecha de Inicio:</label>
            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
        </div>
        <div class="form-group">
            <label for="fecha_fin">Fecha de Fin:</label>
            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
        </div>
        <br>
        <button type="submit" name="buscar_por_fechas" class="btn btn-primary">Buscar</button>
    </form>
</div>
</body>
</html>
