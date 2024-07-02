<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $matricula = $_POST["matricula"];
        $detalles_factura = $_POST["detalles_factura"];

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
        echo "<h1 class='text-center my-4'><b>Detalles de la factura</b></h1>";

        foreach ($detalles_factura as $index => $detalle) {
            $referencia = $detalle["referencia"];
            $unidades = $detalle["unidades"];

            echo "<form method='post' action='guardar_factura.php'>";
            echo "<input type='hidden' name='matricula' value='" . htmlspecialchars($matricula, ENT_QUOTES, 'UTF-8') . "'>";
            echo "<input type='hidden' name='referencia' value='" . htmlspecialchars($referencia, ENT_QUOTES, 'UTF-8') . "'>";
            echo "<input type='hidden' name='unidades' value='" . htmlspecialchars($unidades, ENT_QUOTES, 'UTF-8') . "'>";
            echo "<div class='form-group'>";
            echo "<label for='mano_obra'>Mano de obra:</label>";
            echo "<input type='text' class='form-control' id='mano_obra' name='mano_obra' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='precio_hora'>Precio por hora:</label>";
            echo "<input type='text' class='form-control' id='precio_hora' name='precio_hora' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='numero_factura'>Número de factura:</label>";
            echo "<input type='text' class='form-control' id='numero_factura' name='numero_factura' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='fecha_emision'>Fecha de emisión:</label>";
            echo "<input type='date' class='form-control' id='fecha_emision' name='fecha_emision' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='fecha_pago'>Fecha de pago:</label>";
            echo "<input type='date' class='form-control' id='fecha_pago' name='fecha_pago' required>";
            echo "</div>";
            echo "<button type='submit' class='btn btn-primary'>Guardar factura</button>";
            echo "</form>";
        }

        echo "</div>";
        echo "</body>";
        echo "</html>";
    }
?>
