<?php
    include("conexionPDO.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Resultados de Búsqueda de Facturas</title>
</head>
<body>
<div class="container">
    <h1 class="text-center my-4"><b>Resultados de Búsqueda de Facturas</b></h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["buscar_por_fechas"])) {
            $fecha_inicio = $_POST["fecha_inicio"];
            $fecha_fin = $_POST["fecha_fin"];
            
            $sql = "SELECT * FROM facturas WHERE Fecha_Pago BETWEEN ? AND ?";
            $consulta = $conexion->prepare($sql);
            $consulta->execute([$fecha_inicio, $fecha_fin]);
            $facturas = $consulta->fetchAll();
            
            echo "<div class='container'>";
            echo "<h2>Listado de Facturas Pagadas entre " . htmlspecialchars($fecha_inicio, ENT_QUOTES, 'UTF-8') . " y " . htmlspecialchars($fecha_fin, ENT_QUOTES, 'UTF-8') . "</h2>";
            if ($facturas) {
                echo "<table class='table table-bordered'>";
                echo "<thead><tr><th>Número de Factura</th><th>Fecha de Emisión</th><th>Fecha de Pago</th><th>Total</th></tr></thead><tbody>";
                foreach ($facturas as $factura) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($factura['Numero_Factura'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($factura['Fecha_Emision'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($factura['Fecha_Pago'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($factura['Total'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>No se encontraron facturas en el rango de fechas especificado.</p>";
            }
            echo "</div>";
        }
    }
    ?>
</div>
</body>
</html>
