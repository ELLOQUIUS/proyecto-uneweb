<?php
    include "./navegacion.php";
    include "./heading.php";
    $_SESSION['total'] = 0;
?>

<div class="tabla-modificar-agregar">
    <div class="tabla-items">
        <h3 class="center">Item</h3>
        <h3 class="center">Producto</h3>
        <h3 class="center">Descripción</h3>
        <h3 class="center">Precio</h3>
        <h3 class="center">Acciones</h3>
<?php
        $sqlTempTable = "CREATE TEMPORARY TABLE temp AS SELECT idCliente FROM cliente WHERE nombre = '" . $_SESSION['user'] . "';";
        mysqli_query($link, $sqlTempTable);
        $sqlItems = "SELECT * FROM carrito JOIN temp ON temp.idCliente = carrito.id_cliente;";
        $resultado = mysqli_query($link, $sqlItems);
        while ($filas = mysqli_fetch_assoc($resultado)){

            include "./producto_carrito.php";
?>          
            <button class="boton-eliminar">Eliminar</button>
<?php   }
 ?>

    </div>
    <div class="comprar_producto">
        <form method="post" action="./agregar_producto_logica.php">
            <div class="contenedor-agregar no-margin" style="height: 550px;">
                <h2>Generar Compra</h2>
                <div>
                    <h3 style="text-align: center; font-size: 25px">Total a Pagar</h3>
                    <div class="contenedor-total-compra"><p class="total-compra"> $ <?php echo $_SESSION['total']; ?></p></div>
                </div>
                <div>
                    <h4>Direccion de Tarjeta</h4>
                    <label for="tarjeta">
                    <input class="medium-input" type="number" name="tarjeta" id="tarjeta"></label>
                </div>
                <div>
                    <h4>Código de seguridad</h4>
                    <label for="codigo">
                    <input class="medium-input" type="password" name="codigo" id="codigo"></label>
                </div>
                <div>
                    <h4>Monto</h4>
                    <label for="monto">
                    <input class="medium-input" type="number" name="monto" id="monto"></label>
                </div>
                <button class="boton boton-agregar boton-agregar-producto" type="submit">Pagar</button>
            </div>
        </form>
    </div>
</div>


<!-- <button class="boton-eliminar"><a class="no-decoration" href="eliminar_producto_carrito.php?eliPC=<?php print $sqlItems['id_producto']; ?>">Eliminar</a></button> -->