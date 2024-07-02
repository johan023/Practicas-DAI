<?php
    include("conexionPDO.php");

    $numero_factura = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $sql = "SELECT * FROM facturas WHERE Numero_Factura = :numero_factura"; 
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':numero_factura', $numero_factura, PDO::PARAM_INT);
    $consulta->execute();
    $fila = $consulta->fetch();

    if ($fila) {
        $numero_factura = $fila['Numero_Factura'];
        $matricula = $fila['Matricula'];
        $mano_obra = $fila['Mano_Obra'];
        $precio_hora = $fila['Precio_Hora'];
        $fecha_emision = $fila['Fecha_Emision'];
        $fecha_pago = $fila['Fecha_Pago'];
        $base_imponible = $fila['Base_Imponible'];
        $iva = $fila['IVA'];
        $total = $fila['Total'];

        echo "<html>";
        echo "<head>";
        echo "<style>";
        echo "
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            .container {
                width: 90%;
                margin: 20px auto;
                text-align: center;
            }
            
            table {
                border-collapse: collapse;
                max-width: 90%;
                margin: 20px auto;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            th, td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #f2f2f2;
            }

            img {
                max-width: 50px;
                max-height: 50px;
            }
        ";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        echo "<div class='container'>";
        echo "<h1 class='text-center'>Detalles de la Factura</h1>";
        echo "<button><a href='modificar_facturas_lista.php?id=$numero_factura'>Editar factura</a></button>";
        echo "<form method='post' action='eliminar_facturas_lista.php'>";
        echo "<input type='hidden' name='numero_factura' value='$numero_factura'>";
        echo "<input type='submit' name='eliminar_individual' value='Eliminar factura' class='btn btn-danger my-2'>";
        echo "</form>";
        echo "<table>";
        echo "<tr>
                <th>Número de Factura</th>
                <th>Matrícula</th>
                <th>Mano de Obra</th>
                <th>Precio por Hora</th>
                <th>Fecha de Emisión</th>
                <th>Fecha de Pago</th>
                <th>Base Imponible</th>
                <th>IVA</th>
                <th>Total</th>
            </tr>";
        echo "<tr>
                <td>$numero_factura</td>
                <td>$matricula</td>
                <td>$mano_obra</td>
                <td>$precio_hora</td>
                <td>$fecha_emision</td>
                <td>$fecha_pago</td>
                <td>$base_imponible</td>
                <td>$iva</td>
                <td>$total</td>
            </tr>";
        echo "</table>";
        echo "</div>";
        echo "</body>";
        echo "</html>";
    } else {
        echo "Factura no encontrada.";
    }
?>

