<?php
    include("conexionPDO.php");

    $sql = "SELECT Referencia, Descripcion, Importe, Ganancia, Fotografia FROM repuestos ORDER BY Referencia"; 
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

        a {
            text-decoration: none;
            color: inherit;
        }

        a:hover {
            text-decoration: underline;
            color: #007bff;
        }
    ";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<div class='container'>"; 
    echo "<h1 class='text-center my-4'><b>REPUESTOS</b></h1>";
    echo "<a href='introducir_repuestos.php' class='btn btn-primary my-2'>Añadir nuevo repuesto</a>";
    echo "<form method='post' action='eliminar_repuestos_lista.php'>";

    echo "<table class='table table-bordered'>"; 
    echo "<thead class='thead-light'>";
    echo "<tr>
            <th></th>
            <th class='text-center'>Descripcion</th>
        </tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($resultado as $fila) { 
        $descripcion = $fila['Descripcion']; 
        $referencia = $fila['Referencia'];
        
        echo '<tr>
                <td><center><input type="checkbox" name="borrar[]" value="' . $referencia . '"></center></td>
                <td class="text-center"><a href="listar_repuestos2.php?id=' . $referencia . '">' . $descripcion . '</a></td>     
            </tr>'; 
    }   

    echo "</tbody>";
    echo "</table>";
    echo "<br>"; 
    echo "<input type='submit' name='eliminar' value='Eliminar Repuestos Seleccionados' class='btn btn-danger my-2'>";
    echo "<br>";   
    echo "<input type='reset' value='Deseleccionar Todos' class='btn btn-secondary my-2'>";
    echo "</form>";
    echo "<script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>";
    echo "<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js'></script>";
    echo "<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>";
    echo "</body>";
    echo "</html>";
?>
