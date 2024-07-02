<?php 
    include "conexionPDO.php"; 

    // Verifica si se ha enviado una imagen
    if(isset($_FILES['foto']['tmp_name']) && !empty($_FILES['foto']['tmp_name'])) {
        $foto=$_FILES['foto']['tmp_name'];

        // Tratamiento necesario para introducir la imagen en la base de datos
        $fotografia=imagecreatefrompng($foto);
        ob_start(); // abrimos el buffer interno
        // obtenemos el fichero jpg-binario del buffer y lo almacena en la variable jpg
        imagejpeg($fotografia); 
        $jpg=ob_get_contents(); 
        //cerramos el buffer 
        // preparamos la variable para usarla en una consulta sql 
        ob_end_clean(); 
        $intermedio = addslashes(trim($jpg)); 
        $jpg=str_replace('##','\##',$intermedio);
    }

    $referencia=$_POST["referencia"]; 
    $descripcion=$_POST["descripcion"]; 
    $importe=$_POST["importe"]; 
    $ganancia=$_POST["ganancia"]; 

    $sql = "INSERT INTO repuestos (Referencia, Descripcion, Importe, Ganancia, Fotografia) VALUES ('$referencia', '$descripcion', '$importe', '$ganancia', '$jpg')";

    $resultado = $conexion->query($sql); 
    if ($resultado) {
        echo "<div style='text-align: center;'>"; 
        echo "<div style='font-size: 18px; color: green; margin-top: 20px;'>El repuesto se ha agregado correctamente.</div>";
        echo "<br>";
        echo "<a href='menu.php' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'>Volver al menú principal</a>";
        echo "</div>";  
    } else {
        echo "<div style='text-align: center; font-size: 18px; color: red; margin-top: 20px;'>Error al añadir el repuesto.</div>";
    }
?>