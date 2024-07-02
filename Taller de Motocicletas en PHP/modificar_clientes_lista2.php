<?php 
    include "conexionPDO.php"; 

    $idCliente=$_POST["id"]; 
    $dni=$_POST["dni"]; 
    $nombre=$_POST["nombre"]; 
    $apellido1=$_POST["apellido1"]; 
    $apellido2=$_POST["apellido2"]; 
    $direccion=$_POST["direccion"]; 
    $cp=$_POST["cp"]; 
    $poblacion=$_POST["poblacion"]; 
    $provincia=$_POST["provincia"]; 
    $telefono=$_POST["telefono"]; 
    $email=$_POST["email"]; 

    $sql = "UPDATE clientes
        SET DNI='$dni',
        Nombre='$nombre',
        Apellido1='$apellido1',
        Apellido2='$apellido2',
        Direccion='$direccion',
        CP='$cp',
        Poblacion='$poblacion',
        Provincia='$provincia',
        Telefono='$telefono',
        Email='$email'
        WHERE Id_Cliente='$idCliente'"; 

    $resultado = $conexion->query($sql); 
    if ($resultado) {
        echo "<div style='text-align: center;'>"; 
        echo "<div style='font-size: 18px; color: green; margin-top: 20px;'>El cliente se ha modificado correctamente.</div>";
        echo "<br>";
        echo "<a href='menu.php' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'>Volver al menú principal</a>";
        echo "</div>";  
    } else {
        echo "<div style='text-align: center; font-size: 18px; color: red; margin-top: 20px;'>Error al modificar el registro.</div>";
    }
?>
