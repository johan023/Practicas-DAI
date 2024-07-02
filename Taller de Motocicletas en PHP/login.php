<?php
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === "admin" && $password === "1234") {
            $_SESSION['username'] = $username;
            header("Location: menu.php"); 
        } else {
            $_SESSION['error'] = "Usuario o contraseña incorrectos.";
            header("Location: login-form.php"); 
        }
    }
?>
