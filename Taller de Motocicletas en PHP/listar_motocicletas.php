<?php
    include("conexionPDO.php");

    $sql = "SELECT Matricula, Marca, Modelo FROM motocicletas ORDER BY Matricula"; 
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
    echo "<h1 class='text-center my-4'><b>MOTOCICLETAS</b></h1>";
    echo "<a href='seleccionar_cliente_motocicleta.php' class='btn btn-primary my-2'>Añadir nueva moto</a>";
    echo "<form method='post' action='eliminar_motocicletas_lista.php'>";
    echo "<table class='table table-bordered'>"; 
    echo "<thead class='thead-light'>";
    echo "<tr>
            <th></th>
            <th class='text-center'>Nombre</th>
        </tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($resultado as $fila) { 
        $matricula = htmlspecialchars($fila['Matricula'], ENT_QUOTES, 'UTF-8');
        $nombre_moto = htmlspecialchars($fila['Marca'] . ' ' . $fila['Modelo'], ENT_QUOTES, 'UTF-8');
        
        echo '<tr>
                <td><center><input type="checkbox" name="borrar[]" value="' . $matricula . '"></center></td>
                <td class="text-center"><a href="listar_motocicletas2.php?matricula=' . $matricula . '">' . $nombre_moto . '</a></td>     
            </tr>'; 
    }   

    echo "</tbody>";
    echo "</table>"; 
    echo "<br>"; 
    echo "<input type='submit' name='eliminar' value='Eliminar Motos Seleccionadas' class='btn btn-danger my-2'>";
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
