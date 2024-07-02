<?php
    include("conexionPDO.php");

    $sql = "SELECT Matricula, CONCAT(Marca, ' ', Modelo) AS Moto FROM motocicletas ORDER BY Marca, Modelo"; 
    $consulta = $conexion->prepare($sql);  
    $consulta->execute();  
    $motos = $consulta->fetchAll();

    echo "<html>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>";
    echo "<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>";
    echo "<style>";
    echo "
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
    ";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<div class='container'>";
    echo "<h1 class='text-center my-4'><b>Añadir nueva factura</b></h1>";
    echo "<form method='post' action='introducir_factura.php'>";
    echo "<div class='form-group'>";
    echo "<label for='moto'>Seleccione una motocicleta:</label>";
    echo "<select class='form-control' id='moto' name='moto' required>";
    echo "<option value=''>Seleccione una motocicleta</option>";
    foreach ($motos as $moto) {
        echo "<option value='" . htmlspecialchars($moto['Matricula'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($moto['Moto'], ENT_QUOTES, 'UTF-8') . "</option>";
    }
    echo "</select>";
    echo "</div>";
    echo "<button type='submit' class='btn btn-primary'>Seleccionar</button>";
    echo "</form>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
?>
