<?php
    include("conexionPDO.php");

    $matricula = isset($_GET['matricula']) ? htmlspecialchars($_GET['matricula'], ENT_QUOTES, 'UTF-8') : '';

    if ($matricula) {
        
        $sql = "SELECT * FROM motocicletas WHERE Matricula = :matricula"; 
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':matricula', $matricula, PDO::PARAM_STR);
        $consulta->execute();
        $fila = $consulta->fetch();

        if ($fila) {
            $matricula = htmlspecialchars($fila['Matricula'], ENT_QUOTES, 'UTF-8');
            $marca = htmlspecialchars($fila['Marca'], ENT_QUOTES, 'UTF-8');
            $modelo = htmlspecialchars($fila['Modelo'], ENT_QUOTES, 'UTF-8');
            $anyo = htmlspecialchars($fila['Anyo'], ENT_QUOTES, 'UTF-8');
            $color = htmlspecialchars($fila['Color'], ENT_QUOTES, 'UTF-8');

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
                    width: 100%;
                    margin: 20px auto;
                    text-align: center;
                }
                
                table {
                    border-collapse: collapse;
                    max-width: 70%;
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

                .btn-edit {
                    color: white;
                    background-color: #007bff;
                    border-color: #007bff;
                }

                .btn-delete {
                    color: white;
                    background-color: #dc3545;
                    border-color: #dc3545;
                }

                a {
                    text-decoration: none;
                    color: inherit;
                }
            ";
            echo "</style>";
            echo "</head>";
            echo "<body>";
            echo "<div class='container'>";
            echo "<h1 class='text-center'>Detalles de la moto</h1>";
            echo "<button class='btn btn-edit'><a href='modificar_motos_lista.php?matricula=$matricula'>Editar moto</a></button>";
            echo "<button class='btn btn-delete'><a href='eliminar_motocicletas_lista.php?matricula=$matricula'>Eliminar moto</a></button>";
            echo "<table>";
            echo "<tr>
                    <th>Matrícula</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Color</th>
                </tr>";
            echo "<tr>
                    <td>$matricula</td>
                    <td>$marca</td>
                    <td>$modelo</td>
                    <td>$anyo</td>
                    <td>$color</td>
                </tr>";
            echo "</table>";
            echo "</div>";
            echo "</body>";
            echo "</html>";
        } else {
            echo "Moto no encontrada.";
        }
    } else {
        echo "Matrícula no proporcionada.";
    }
?>
