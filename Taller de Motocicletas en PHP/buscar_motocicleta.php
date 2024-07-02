<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar motocicleta</title>
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f2f2f2;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    form {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    form label {
        font-weight: bold;
        margin-top: 10px;
        display: block;
        color: #333;
    }

    form input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
        color: #333;
    }

    form input[type="text"]:focus {
        border-color: #007BFF;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        outline: none;
    }

    form input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        border: none;
        border-radius: 4px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
<body>
    <form method="GET" action="buscar_motocicleta2.php">
    <h2><center>Buscar motocicleta</center></h2><br>
        <label for="matricula">Matrícula:</label>
        <input type="text" id="matricula" name="matricula"><br>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca"><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo"><br>

        <label for="anyo">Año:</label>
        <input type="text" id="anyo" name="anyo"><br>

        <label for="color">Color:</label>
        <input type="text" id="color" name="color"><br><br>

        <input type="submit" value="Buscar">
    </form>
</body>
</html>

