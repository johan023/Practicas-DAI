<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<style>
    body {
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
    }

    .container {
        border: 1px solid #ccc; 
        width: 300px; 
        padding: 20px; 
        margin: 0 auto; 
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #666;
    }

    input[type="text"],
    input[type="password"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #6699ff;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #0055ff;
    }

    .error-message {
        color: red;
        margin-bottom: 15px;
    }

</style>
<body>
    <h1>Iniciar Sesión</h1>
    <br>
    <div class="container"> 
        <?php
            session_start();
            if(isset($_SESSION['error'])) {
                echo '<p style="color:red;">'.$_SESSION['error'].'</p><br>';
                unset($_SESSION['error']);
            }
        ?>
        <form action="login.php" method="POST">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br><br>  
            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>
</body>
</html>
