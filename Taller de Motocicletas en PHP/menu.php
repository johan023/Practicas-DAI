<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <title>Menú</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            color: #333;
            font-size: 24px;
            flex-grow: 1;
        }

        .logout-btn, .search-icon-btn {
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .logout-btn {
            background-color: orange;
        }

        .logout-btn:hover {
            background-color: #ff7b00;
        }

        .search-icon-btn {
            display: flex;
            align-items: center;
            text-decoration: none; 
        }

        .search-icon-btn i {
            margin-right: 10px; 
        }

        .search-icon-btn a {
            text-decoration: none; 
            color: inherit; 
        }

        #button1 {
            background-color: white;
            color: #28A745; 
            border: 2px solid #28A745; 
        }

        #button1:hover {
            background-color: #28A745; 
            color: white;
        }

        #button1:hover a {
            color: white; 
        }

        #button2 {
            background-color: white;
            color: #DC3545; 
            border: 2px solid #DC3545; 
        }

        #button2:hover {
            background-color: #c82333; 
            color: white;
        }

        #button2:hover a {
            color: white; 
        }

        .icon-container {
            display: flex;
            gap: 10px;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .menu-links {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .menu-links a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }

        .menu-links a:nth-child(1) {
            background-color: #007BFF;
        }

        .menu-links a:nth-child(2) {
            background-color: #28A745;
        }

        .menu-links a:nth-child(3) {
            background-color: #FFC107;
        }

        .menu-links a:nth-child(4) {
            background-color: #DC3545;
        }

        .menu-links a:hover {
            filter: brightness(85%);
        }

        /* Media Queries */
        @media (max-width: 600px) {
            .container {
                margin: 10px;
                padding: 15px;
            }

            .menu-links {
                grid-template-columns: 1fr;
            }

            .menu-links a {
                font-size: 14px;
                padding: 8px;
            }

            .search-icon-btn {
                font-size: 14px; 
                padding: 8px;
            }
        }
    </style>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
</head>
<body>
    <header>
        <h1><b>MENÚ PRINCIPAL</b></h1>
        <div class="icon-container">
            <div class="search-icon-btn" id="button1"><i class="bi bi-search"></i><a href="buscar_motocicleta.php">Buscar motocicleta</a></div>
            <div class="search-icon-btn" id="button2"><i class="bi bi-search"></i><a href="menu_buscar_factura.php">Buscar factura</a></div>
            <a class="logout-btn" href="logout.php">Cerrar Sesión</a>
        </div>
    </header>
    <div class="container">
        <div class="menu-links">
            <a href="listar_clientes.php">Clientes</a>
            <a href="listar_motocicletas.php">Motocicletas</a>
            <a href="listar_repuestos.php">Repuestos</a>
            <a href="listar_facturas.php">Facturas</a>
        </div>
    </div>
</body>
</html>
