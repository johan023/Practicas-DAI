<?php 
    include "conexionPDO.php";

    if (isset($_POST['eliminar']) && isset($_POST["borrar"])) {
        $array_borrados = $_POST["borrar"];
        $error = 0;

        foreach ($array_borrados as $matricula) {
            $SentenciaSQL = "DELETE FROM motocicletas WHERE Matricula = ?";
            $stmt = $conexion->prepare($SentenciaSQL);
            
            if (!$stmt) {
                $error = 1;
                break;
            }
            
            $stmt->bindParam(1, $matricula, PDO::PARAM_STR);
            $result = $stmt->execute();
            
            if (!$result) {
                $error = 1;
                break;
            }
        }

        if ($error == 0) {
            echo "<div style='text-align: center;'>"; 
            echo "<div style='font-size: 18px; color: green; margin-top: 20px;'>La(s) moto(s) se ha(n) eliminado correctamente.</div>";
            echo "<br>";
            echo "<a href='menu.php' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'>Volver al menú principal</a>";
            echo "</div>";  
        } else {
            echo "<div style='text-align: center; font-size: 18px; color: red; margin-top: 20px;'>Error al eliminar las motos.</div>";
        }
    } elseif (isset($_GET['matricula'])) {
        $matricula = htmlspecialchars($_GET['matricula'], ENT_QUOTES, 'UTF-8');
        $SentenciaSQL = "DELETE FROM motocicletas WHERE Matricula = ?";
        $stmt = $conexion->prepare($SentenciaSQL);
        
        if ($stmt) {
            $stmt->bindParam(1, $matricula, PDO::PARAM_STR);
            $result = $stmt->execute();
            
            if ($result) {
                echo "<div style='text-align: center;'>"; 
                echo "<div style='font-size: 18px; color: green; margin-top: 20px;'>La(s) moto(s) se ha(n) eliminado correctamente.</div>";
                echo "<br>";
                echo "<a href='menu.php' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'>Volver al menú principal</a>";
                echo "</div>";  
            } else {
                echo "<div style='text-align: center; font-size: 18px; color: red; margin-top: 20px;'>Error al eliminar las motos.</div>";
            }
        } else {
            echo "Error al preparar la consulta.";
        }
    } else {
        echo "No se han seleccionado motos para eliminar.";
    }
?>



