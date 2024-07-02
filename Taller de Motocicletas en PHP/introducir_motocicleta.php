<?php
    include("conexionPDO.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['cliente'])) {
        $id_cliente = $_POST['cliente'];

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
        echo "<form method='post' action='introducir_motocicleta2.php'>";
        echo "<input type='hidden' name='id_cliente' value='" . htmlspecialchars($id_cliente, ENT_QUOTES, 'UTF-8') . "'>";
        echo "<div class='form-group'>";
        echo "<label for='matricula'>Matrícula:</label>";
        echo "<input type='text' class='form-control' id='matricula' name='matricula' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='marca'>Marca:</label>";
        echo "<input type='text' class='form-control' id='marca' name='marca' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='modelo'>Modelo:</label>";
        echo "<input type='text' class='form-control' id='modelo' name='modelo' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='anyo'>Año:</label>";
        echo "<input type='text' class='form-control' id='anyo' name='anyo' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='color'>Color:</label>";
        echo "<input type='text' class='form-control' id='color' name='color' required>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Guardar</button>";
        echo "</form>";
        echo "</div>";
        echo "<script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>";
        echo "<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js'></script>";
        echo "<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>";
        echo "</body>";
        echo "</html>";
    } else {
        header("Location: seleccionar_cliente_motocicleta.php");
        exit();
    }
?>
