<?php 
    include "conexionPDO.php"; 

    $referencia=$_POST["referencia"]; 
    $descripcion=$_POST["descripcion"]; 
    $importe=$_POST["importe"]; 
    $ganancia=$_POST["ganancia"]; 

    $sql = "UPDATE repuestos
        SET Descripcion='$descripcion',
        Importe='$importe',
        Ganancia='$ganancia'
        WHERE Referencia='$referencia'"; 

    $resultado = $conexion->query($sql); 
    if ($resultado) {
        echo "<div style='text-align: center;'>"; 
        echo "<div style='font-size: 18px; color: green; margin-top: 20px;'>El repuesto se ha modificado correctamente.</div>";
        echo "<br>";
        echo "<a href='menu.php' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'>Volver al menú principal</a>";
        echo "</div>";  
    } else {
        echo "<div style='text-align: center; font-size: 18px; color: red; margin-top: 20px;'>Error al modificar el registro.</div>";
    }
?>