<?php
    include("conexionPDO.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $matricula = $_POST["matricula"];
        $referencia = $_POST["referencia"];
        $unidades = $_POST["unidades"];
        $mano_obra = $_POST["mano_obra"];
        $precio_hora = $_POST["precio_hora"];
        $numero_factura = $_POST["numero_factura"];
        $fecha_emision = $_POST["fecha_emision"];
        $fecha_pago = $_POST["fecha_pago"];

        
        $sql_referencia = "SELECT Importe, Ganancia FROM repuestos WHERE Referencia = ?";
        $consulta_referencia = $conexion->prepare($sql_referencia);
        $consulta_referencia->execute([$referencia]);
        $repuesto = $consulta_referencia->fetch(PDO::FETCH_ASSOC);

        if ($repuesto) {
            $importe = $repuesto["Importe"] * $unidades;
            $ganancia = $repuesto["Ganancia"];
            $importe_con_ganancia = $importe + ($importe * $ganancia / 100);
        } else {
            
            echo "Error: La referencia de repuesto '$referencia' no existe en la base de datos.";
            exit();
        }

        
        $base_imponible = $importe_con_ganancia + $mano_obra;
        $iva = $base_imponible * 0.21;
        $total_factura = $base_imponible + $iva;

        
        $sql_insert_factura = "INSERT INTO facturas (Matricula, Mano_Obra, Precio_Hora, Numero_Factura, Fecha_Emision, Fecha_Pago, Base_Imponible, IVA, Total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $consulta_insert_factura = $conexion->prepare($sql_insert_factura);
        $consulta_insert_factura->execute([$matricula, $mano_obra, $precio_hora, $numero_factura, $fecha_emision, $fecha_pago, $base_imponible, $iva, $total_factura]);

        
        $sql_insert_detalle = "INSERT INTO detalle_factura (Numero_Factura, Referencia, Unidades) VALUES (?, ?, ?)";
        $consulta_insert_detalle = $conexion->prepare($sql_insert_detalle);
        $consulta_insert_detalle->execute([$numero_factura, $referencia, $unidades]);

        
        if ($consulta_insert_factura && $consulta_insert_detalle) {
            echo "La factura y los detalles se han guardado correctamente.";
        } else {
            echo "Error al guardar la factura y/o los detalles.";
        }
    }
?>
