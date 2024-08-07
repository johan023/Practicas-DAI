<?php 
    include "conexionPDO.php";

    if (isset($_POST['eliminar']) && isset($_POST["borrar"])) {
        $array_borrados = $_POST["borrar"];
        $error = 0;

        foreach ($array_borrados as $numero_factura) {
            
            $SentenciaSQLDetalle = "DELETE FROM detalle_factura WHERE Numero_Factura = ?";
            $stmtDetalle = $conexion->prepare($SentenciaSQLDetalle);
            
            if (!$stmtDetalle) {
                $error = 1;
                break;
            }
            
            $stmtDetalle->bindParam(1, $numero_factura, PDO::PARAM_STR);
            $resultDetalle = $stmtDetalle->execute();
            
            if (!$resultDetalle) {
                $error = 1;
                break;
            }

            
            $SentenciaSQL = "DELETE FROM facturas WHERE Numero_Factura = ?";
            $stmt = $conexion->prepare($SentenciaSQL);
            
            if (!$stmt) {
                $error = 1;
                break;
            }
            
            $stmt->bindParam(1, $numero_factura, PDO::PARAM_STR);
            $result = $stmt->execute();
            
            if (!$result) {
                $error = 1;
                break;
            }
        }

        if ($error == 0) {
            echo "<div style='text-align: center;'>"; 
            echo "<div style='font-size: 18px; color: green; margin-top: 20px;'>La(s) factura(s) se ha(n) eliminado correctamente.</div>";
            echo "<br>";
            echo "<a href='menu.php' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'>Volver al menú principal</a>";
            echo "</div>";  
        } else {
            echo "<div style='text-align: center; font-size: 18px; color: red; margin-top: 20px;'>Error al eliminar las facturas.</div>";
        }
    } 
    elseif (isset($_POST['eliminar_individual']) && isset($_POST['numero_factura'])) {
        $numero_factura = htmlspecialchars($_POST['numero_factura'], ENT_QUOTES, 'UTF-8');

        
        $SentenciaSQLDetalle = "DELETE FROM detalle_factura WHERE Numero_Factura = ?";
        $stmtDetalle = $conexion->prepare($SentenciaSQLDetalle);
        
        if ($stmtDetalle) {
            $stmtDetalle->bindParam(1, $numero_factura, PDO::PARAM_STR);
            $resultDetalle = $stmtDetalle->execute();
            
            if (!$resultDetalle) {
                echo "Error al eliminar los detalles de la factura.";
                exit;
            }
        } else {
            echo "Error al preparar la consulta para eliminar los detalles de la factura.";
            exit;
        }

        
        $SentenciaSQL = "DELETE FROM facturas WHERE Numero_Factura = ?";
        $stmt = $conexion->prepare($SentenciaSQL);
        
        if ($stmt) {
            $stmt->bindParam(1, $numero_factura, PDO::PARAM_STR);
            $result = $stmt->execute();
            
            if ($result) {
                echo "<div style='text-align: center;'>"; 
                echo "<div style='font-size: 18px; color: green; margin-top: 20px;'>La(s) factura(s) se ha(n) eliminado correctamente.</div>";
                echo "<br>";
                echo "<a href='menu.php' style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'>Volver al menú principal</a>";
                echo "</div>";  
            } else {
                echo "<div style='text-align: center; font-size: 18px; color: red; margin-top: 20px;'>Error al eliminar las facturas.</div>";
            }
        } else {
            echo "Error al preparar la consulta.";
        }
    } else {
        echo "No se han seleccionado facturas para eliminar.";
    }
?>
