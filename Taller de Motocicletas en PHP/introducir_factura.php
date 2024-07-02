<?php
    include("conexionPDO.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $matricula = $_POST["moto"];

        $sql = "SELECT Referencia FROM repuestos"; 
        $consulta = $conexion->prepare($sql);  
        $consulta->execute();  
        $referencias_repuestos = $consulta->fetchAll();

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
        echo "<form method='post' action='introducir_factura2.php'>";
        echo "<input type='hidden' name='matricula' value='" . htmlspecialchars($matricula, ENT_QUOTES, 'UTF-8') . "'>";

        echo "<div id='detalles_factura_container'>";

        echo "<div class='detalle_factura'>";
        echo "<div class='form-group'>";
        echo "<label for='referencia'>Seleccione una referencia de repuesto:</label>";
        echo "<select class='form-control' name='detalles_factura[0][referencia]' required>";
        echo "<option value=''>Seleccione una referencia</option>";
        foreach ($referencias_repuestos as $referencia_repuesto) {
            echo "<option value='" . htmlspecialchars($referencia_repuesto['Referencia'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($referencia_repuesto['Referencia'], ENT_QUOTES, 'UTF-8') . "</option>";
        }
        echo "</select>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='unidades'>Unidades:</label>";
        echo "<input type='number' class='form-control' name='detalles_factura[0][unidades]' required>";
        echo "</div>";
        echo "</div>";

        echo "</div>"; 

        echo "<button type='submit' class='btn btn-primary'>Guardar factura</button>";

        echo "</form>";
        echo "</div>";
        echo "</body>";
        echo "</html>";
    }
?>
