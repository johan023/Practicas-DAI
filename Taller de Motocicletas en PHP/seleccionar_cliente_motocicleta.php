<?php
    include("conexionPDO.php");

    $sql = "SELECT Id_Cliente, Nombre, Apellido1, Apellido2 FROM clientes ORDER BY Nombre"; 
    $consulta = $conexion->prepare($sql);  
    $consulta->execute();  
    $clientes = $consulta->fetchAll(); 

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
    echo "<h1 class='text-center my-4'><b>Añadir nueva motocicleta</b></h1>";
    echo "<form method='post' action='introducir_motocicleta.php'>";
    echo "<div class='form-group'>";
    echo "<label for='cliente'>Seleccione un cliente:</label>";
    echo "<select class='form-control' id='cliente' name='cliente' required>";
    echo "<option value=''>Seleccione un cliente</option>";
    foreach ($clientes as $cliente) {
        $nombreCompleto = htmlspecialchars($cliente['Nombre'], ENT_QUOTES, 'UTF-8') . ' ' .
                          htmlspecialchars($cliente['Apellido1'], ENT_QUOTES, 'UTF-8') . ' ' .
                          htmlspecialchars($cliente['Apellido2'], ENT_QUOTES, 'UTF-8');
        echo "<option value='" . htmlspecialchars($cliente['Id_Cliente'], ENT_QUOTES, 'UTF-8') . "'>" . $nombreCompleto . "</option>";
    }
    echo "</select>";
    echo "</div>";
    echo "<button type='submit' class='btn btn-primary'>Seleccionar</button>";
    echo "</form>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
?>
