<!DOCTYPE html>
<html>
<body>
    <h1>Repuestos</h1>
    <table>
        <thead>
            <tr>
                <th>Referencia</th>
                <th>Descripcion</th>
                <th>Importe</th>
                <th>Ganancia</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($repuestos as $repuesto): ?>
            <tr>
                <td><?php echo $repuesto->Referencia; ?></td>
                <td><?php echo $repuesto->Descripcion; ?></td>
                <td><?php echo $repuesto->Importe; ?></td>
                <td><?php echo $repuesto->Ganancia; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html><?php /**PATH C:\xampp\htdocs\P2_Laravel\Resources\views/repuestos/ver.blade.php ENDPATH**/ ?>