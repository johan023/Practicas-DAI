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
    <form method="post" action="buscar_factura_cliente2.php">
        <h4>Facturas de un cliente</h4>
        <div class="form-group">
            <br>
            <label for="id_cliente">Selecciona un cliente:</label>
            <select class="form-control" id="id_cliente" name="id_cliente" required>
                <option value="">Selecciona un cliente</option>
                <?php
                    $sql = "SELECT Id_Cliente, Nombre FROM clientes"; 
                    $consulta = $conexion->prepare($sql);  
                    $consulta->execute();  
                    $clientes = $consulta->fetchAll();
                    foreach ($clientes as $cliente) {
                        echo "<option value='" . htmlspecialchars($cliente['Id_Cliente'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($cliente['Nombre'], ENT_QUOTES, 'UTF-8') . "</option>";
                    }
                ?>
            </select>
            <br>
        </div>
        <button type="submit" name="buscar_por_cliente" class="btn btn-primary">Buscar</button>
    </form>
</div>
</body>
</html>
