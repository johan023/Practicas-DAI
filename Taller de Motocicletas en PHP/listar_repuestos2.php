<?php
    include("conexionPDO.php");

    $referencia = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $sql = "SELECT * FROM repuestos WHERE Referencia = :referencia"; 
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':referencia', $referencia, PDO::PARAM_INT);
    $consulta->execute();
    $fila = $consulta->fetch();

    if ($fila) {
        $referencia = $fila['Referencia'];
        $descripcion = $fila['Descripcion'];
        $importe = $fila['Importe'];
        $ganancia = $fila['Ganancia'];
        $foto = $fila['Fotografia'];

        $imagen = basename(tempnam(getcwd()."/temporales","temp")) . ".jpg";
        $fichero = fopen("./temporales/".$imagen, "w");
        fwrite($fichero, $foto);
        fclose($fichero);

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
                max-width: 95%;
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

            .btn {
                margin: 10px;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 5px;
                color: white;
            }

            .btn-primary {
                background-color: #007bff;
                border-color: #007bff;
            }

            .btn-danger {
                background-color: #dc3545;
                border-color: #dc3545;
            }

            .btn a {
                color: white;
                text-decoration: none;
            }
        ";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        echo "<div class='container'>";
        echo "<h1 class='text-center'>Detalles del Repuesto</h1>";
        echo "<button class='btn btn-primary'><a href='modificar_repuestos_lista.php?id=$referencia'>Editar Repuesto</a></button>";
        echo "<button class='btn btn-danger'><a href='eliminar_repuestos_lista.php?id=$referencia'>Eliminar Repuesto</a></button>";
        echo "<table>";
        echo "<tr>
                <th>Referencia</th>
                <th>Descripcion</th>
                <th>Importe (€)</th>
                <th>Ganancia</th>
                <th>Fotografía</th>
            </tr>";
        echo "<tr>
                <td>$referencia</td>
                <td>$descripcion</td>
                <td>$importe</td>
                <td>$ganancia</td>
                <td><a href='temporales/$imagen'><img src='temporales/$imagen' alt='Foto' /></a></td>
            </tr>";
        echo "</table>";
        echo "</div>";
        echo "</body>";
        echo "</html>";
    } else {
        echo "Repuesto no encontrado.";
    }
?>


