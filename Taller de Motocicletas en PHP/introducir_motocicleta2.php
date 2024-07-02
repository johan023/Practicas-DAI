<?php 
    include "conexionPDO.php"; 

    $id=$_POST["id_cliente"]; 
    $matricula=$_POST["matricula"]; 
    $marca=$_POST["marca"]; 
    $modelo=$_POST["modelo"]; 
    $anyo=$_POST["anyo"]; 
    $color=$_POST["color"]; 

    $sql = "INSERT INTO motocicletas (Matricula, Marca, Modelo, Anyo, Color, Id_Cliente) VALUES ('$matricula', '$marca', '$modelo', '$anyo', '$color', '$id')";

    $resultado = $conexion->query($sql); 

    if ($resultado) {
        echo "<div style='text-align: center;'>"; 
        echo "<div style='font-size: 18px; color: green; margin-top: 20px;'>La moto se ha agregado correctamente.</div>";
        echo "<br>";
        echo "<a href='menu.php' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'>Volver al menú principal</a>";
        echo "</div>";  
    } else {
        echo "<div style='text-align: center; font-size: 18px; color: red; margin-top: 20px;'>Error al añadir el registro: " . $conexion->error . "</div>";
    }
?>
