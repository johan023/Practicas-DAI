<?php
    include("conexionPDO.php");

    $sql = "SELECT * FROM detalle_factura ORDER BY Id_Det_Factura"; 
    $consulta = $conexion->prepare($sql);  
    $consulta->execute();  
    $resultado = $consulta->fetchAll(); 

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

        table {
            width: 70%;
            margin: 20px auto;
        }
    ";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<div class='container'>"; 
    echo "<h1 class='text-center my-4'><b>FACTURAS</b></h1>";
    echo "<a href='seleccionar_motocicleta_factura.php' class='btn btn-primary my-2'>Añadir nueva factura</a>";
    echo "<form method='post' action='eliminar_facturas_lista.php'>";
    echo "<table class='table table-bordered'>"; 
    echo "<thead class='thead-light'>";
    echo "<tr>
            <th></th>
            <th class='text-center'>Nº factura</th>
        </tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($resultado as $fila) { 
        $id_det_factura = $fila['Id_Det_Factura']; 
        $numero_factura = $fila['Numero_Factura'];
        
        echo '<tr>
                <td><center><input type="checkbox" name="borrar[]" value="' . $numero_factura . '"></center></td>
                <td class="text-center"><a href="listar_facturas2.php?id=' . $numero_factura . '">' . $numero_factura . '</a></td>          
            </tr>';

    }     

    echo "</tbody>";
    echo "</table>"; 
    echo "<br>"; 
    echo "<input type='submit' name='eliminar' value='Eliminar Facturas Seleccionadas' class='btn btn-danger my-2'>";
    echo "<br>"; 
    echo "<input type='reset' value='Deseleccionar Todos' class='btn btn-secondary my-2'>";
    echo "</form>";
    echo "<script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>";
    echo "<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js'></script>";
    echo "<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
?>
