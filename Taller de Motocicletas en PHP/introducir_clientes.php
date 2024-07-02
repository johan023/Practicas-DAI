<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducir clientes</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    input[type="submit"],
    input[type="reset"] {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    input[type="reset"] {
        background-color: #ff0000;
        color: black;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    input[type="reset"]:hover {
        background-color: #cc0000;
    }

    @media only screen and (max-width: 600px) {
        form {
            padding: 10px;
        }
    }

</style>
<body>
    <?php
        include("conexionPDO.php");
        $new_id=1; 
        $sql = "SELECT * FROM clientes order by Id_Cliente"; 
        $resultado = $conexion->query($sql); 
        $row = $resultado->fetchAll(); 
        for($i = 0; $i < $resultado->rowCount(); $i++){ 
            if($new_id == $row[$i]['Id_Cliente']){ 
                $new_id++; 
            }
        }
    ?>
    <h1><center>Nuevo cliente</center></h1>
    <form method="post" action="introducir_clientes2.php" enctype="multipart/form-data">
        <?php
            $id_cliente = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
            echo "<p>ID Cliente: <input type='text' name='id' value='$new_id' readonly></p>";
        ?>
        <p>DNI: <input type="text" name="dni"></p>
        <p>Nombre: <input type="text" name="nombre"></p>
        <p>Primer apellido: <input type="text" name="apellido1"></p>
        <p>Segundo apellido: <input type="text" name="apellido2"></p>
        <p>Dirección: <input type="text" name="direccion"></p>
        <p>C.P.: <input type="text" name="cp"></p>
        <p>Población: <input type="text" name="poblacion"></p>
        <p>Provincia: <input type="text" name="provincia"></p>
        <p>Teléfono: <input type="text" name="telefono"></p>
        <p>E-mail: <input type="text" name="email"></p>
        <p>Fotografía: <input type="file" name="foto"></p>
        <p><input type="submit" value="Introducir cliente">&nbsp;<input type="reset" value="Borrar"></p> <!-- Cierre de la etiqueta 'p' añadido -->
    </form>
</body>
</html>