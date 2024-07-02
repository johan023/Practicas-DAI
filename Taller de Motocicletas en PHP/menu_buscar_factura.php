<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        a {
            display: block;
            width: 200px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            text-decoration: none;
            color: #ffffff;
            margin: 10px auto;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease-in-out;
        }
        a:hover {
            background-color: #4a2f66;
        }
        .lila-button {
            background-color: #8e44ad;
        }
        .lila-button:hover {
            background-color: #79378c;
        }
        .azul-button {
            background-color: #87ceeb;
            color: black; 
        }
        .azul-button:hover {
            background-color: #6495ed;
        }
    </style>
</head>
<body>
    <h1><center>Buscador de facturas</center></h1>
    <a href="buscar_factura_fecha.php" class="lila-button">Por fecha</a>
    <a href="buscar_factura_cliente.php" class="azul-button">Por cliente</a>
</body>
</html>