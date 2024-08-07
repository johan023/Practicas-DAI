<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo repuesto</title>
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
    <h1><center>Nuevo repuesto</center></h1>
    <form method="post" action="introducir_repuestos2.php" enctype="multipart/form-data">
        <p>Referencia: <input type="text" name="referencia"></p>
        <p>Descripción: <input type="text" name="descripcion"></p>
        <p>Importe: <input type="number" step="0.01" name="importe"></p>
        <p>Ganancia (%): <input type="number" name="ganancia" min="1" max="100"></p>
        <p>Fotografía: <input type="file" name="foto"></p>
        <p><input type="submit" value="Añadir repuesto">&nbsp;<input type="reset" value="Borrar"></p> <!-- Cierre de la etiqueta 'p' añadido -->
    </form>
</body>
</html>

