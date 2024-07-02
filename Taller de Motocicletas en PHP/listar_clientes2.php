<?php
    include("conexionPDO.php");

    $id_cliente = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $sql = "SELECT * FROM clientes WHERE Id_Cliente = :id_cliente"; 
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
    $consulta->execute();
    $fila = $consulta->fetch();

    if ($fila) {
        $id_cliente = $fila['Id_Cliente'];
        $dni = $fila['DNI'];
        $nombre = $fila['Nombre'];
        $apellido1 = $fila['Apellido1'];
        $apellido2 = $fila['Apellido2'];
        $direccion = $fila['Direccion'];
        $cp = $fila['CP'];
        $poblacion = $fila['Poblacion'];
        $provincia = $fila['Provincia'];
        $telefono = $fila['Telefono'];
        $email = $fila['Email'];
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
                display: inline-block;
                margin: 10px;
                padding: 10px 20px;
                color: #fff;
                text-decoration: none;
                font-size: 16px;
                border-radius: 5px;
            }

            .btn-blue {
                background-color: #007bff;
                border-color: #007bff;
            }

            .btn-red {
                background-color: #dc3545;
                border-color: #dc3545;
                border: none; 
            }

            .btn:hover {
                opacity: 0.8;
            }
        ";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        echo "<div class='container'>";
        echo "<h1 class='text-center'>Detalles del Cliente</h1>";
        echo "<a href='modificar_clientes_lista.php?id=$id_cliente' class='btn btn-blue'>Editar Cliente</a>";
        echo "<form method='post' action='eliminar_clientes_lista.php' style='display:inline;'>";
        echo "<button type='submit' name='id_cliente' value='$id_cliente' class='btn btn-red'>Eliminar Cliente</button>";
        echo "</form>";
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido1</th>
                <th>Apellido2</th>
                <th>Dirección</th>
                <th>CP</th>
                <th>Población</th>
                <th>Provincia</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Fotografía</th>
            </tr>";
        echo "<tr>
                <td>$id_cliente</td>
                <td>$dni</td>
                <td>$nombre</td>
                <td>$apellido1</td>
                <td>$apellido2</td>
                <td>$direccion</td>
                <td>$cp</td>
                <td>$poblacion</td>
                <td>$provincia</td>
                <td>$telefono</td>
                <td>$email</td>
                <td><a href='temporales/$imagen'><img src='temporales/$imagen' alt='Foto' /></a></td>
            </tr>";
        echo "</table>";
        echo "</div>";
        echo "</body>";
        echo "</html>";
    } else {
        echo "Cliente no encontrado.";
    }
?>
