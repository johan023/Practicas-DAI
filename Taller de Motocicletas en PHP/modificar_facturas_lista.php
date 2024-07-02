<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar factura</title>
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
    input[type="float"],
    input[type="date"],
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
    <h1><center>Modificar factura</center></h1>
    <form method="post" action="modificar_facturas_lista2.php" enctype="multipart/form-data">
        <?php
            $numero_factura = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
            echo "<input type='hidden' name='numero_factura' value='$numero_factura'>";
        ?>
        <p>Mano de obra: <input type="number" name="mano_obra"></p>
        <p>Precio por hora (€/h): <input type="float" name="precio_hora"></p>
        <p>Fecha de emisión: <input type="date" name="fecha_emision"></p>
        <p>Fecha de pago: <input type="date" name="fecha_pago"></p>
        <p><input type="submit" value="Modificar factura">&nbsp;<input type="reset" value="Borrar"></p>
    </form>
</body>
</html>