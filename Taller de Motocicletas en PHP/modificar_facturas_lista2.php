<?php 
    include "conexionPDO.php"; 

    $numero_factura=$_POST["numero_factura"]; 
    $mano_obra=$_POST["mano_obra"]; 
    $precio_hora=$_POST["precio_hora"]; 
    $fecha_emision=$_POST["fecha_emision"]; 
    $fecha_pago=$_POST["fecha_pago"]; 

    $sql = "UPDATE facturas
        SET Mano_Obra='$mano_obra',
        Precio_Hora='$precio_hora',
        Fecha_Emision='$fecha_emision', 
        Fecha_Pago='$fecha_pago'
        WHERE Numero_Factura='$numero_factura'"; 

    $resultado = $conexion->query($sql); 
    if ($resultado) {
        echo "<div style='text-align: center;'>"; 
        echo "<div style='font-size: 18px; color: green; margin-top: 20px;'>La factura se ha modificado correctamente.</div>";
        echo "<br>";
        echo "<a href='menu.php' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'>Volver al menú principal</a>";
        echo "</div>";  
    } else {
        echo "<div style='text-align: center; font-size: 18px; color: red; margin-top: 20px;'>Error al modificar el registro.</div>";
    }
?>