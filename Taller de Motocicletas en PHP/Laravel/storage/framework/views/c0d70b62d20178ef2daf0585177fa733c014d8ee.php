<!DOCTYPE html>
<html>
<body>
    <h1>Mostrando los clientes</h1>
    <?php foreach ($clientes as $cliente){
        echo $cliente->Nombre." ".$cliente->Apellido1."<br>";
    }
    ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\P2_Laravel\Resources\views/clientes/ver.blade.php ENDPATH**/ ?>