<?php 
    include "conexionPDO.php";

    if (isset($_POST['eliminar']) && isset($_POST["borrar"])) {
        $array_borrados = $_POST["borrar"];
        $error = 0;

        foreach ($array_borrados as $id_cliente) {
            $SentenciaSQL = "DELETE FROM clientes WHERE Id_Cliente = ?";
            $stmt = $conexion->prepare($SentenciaSQL);
            
            if (!$stmt) {
                $error = 1;
                break;
            }
            
            $stmt->bindParam(1, $id_cliente, PDO::PARAM_INT);
            $result = $stmt->execute();
            
            if (!$result) {
                $error = 1;
                break;
            }
        }

        if ($error == 0) {
            echo "<div style='text-align: center;'>"; 
            echo "<div style='font-size: 18px; color: green; margin-top: 20px;'>El(los) cliente(s) se ha(n) eliminado correctamente.</div>";
            echo "<br>";
            echo "<a href='menu.php' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'>Volver al menú principal</a>";
            echo "</div>";  
        } else {
            echo "<div style='text-align: center; font-size: 18px; color: red; margin-top: 20px;'>Error al eliminar los clientes.</div>";
        }

    } elseif (isset($_POST['id_cliente'])) {
        $id_cliente = intval($_POST['id_cliente']);
        $SentenciaSQL = "DELETE FROM clientes WHERE Id_Cliente = ?";
        $stmt = $conexion->prepare($SentenciaSQL);
        
        if ($stmt) {
            $stmt->bindParam(1, $id_cliente, PDO::PARAM_INT);
            $result = $stmt->execute();
            
            if ($result) {
                echo "<div style='text-align: center;'>"; 
                echo "<div style='font-size: 18px; color: green; margin-top: 20px;'>El(los) cliente(s) se ha(n) eliminado correctamente.</div>";
                echo "<br>";
                echo "<a href='menu.php' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'>Volver al menú principal</a>";
                echo "</div>";  
            } else {
                echo "<div style='text-align: center; font-size: 18px; color: red; margin-top: 20px;'>Error al eliminar los clientes.</div>";
            }
        } else {
            echo "Error al preparar la consulta.";
        }
    } else {
        echo "<br><br>No se han seleccionado clientes para eliminar.";
    }
?>


