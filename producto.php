<?php include "./heading.php"?>
<div class="producto">
    <h3><?= $row["nombre"];?></h3>
    <p class="precio"><?= $row["precio"];?> $</p>
    <img class="imagen-producto" src="<?= $row["foto"];?>" alt="<?= $row["nombre"];?>">
    <p class="descripcion"><?= $row["descripcion"];?></p>
    <div class="botones">
        <button class="boton boton-agregar">Agregar a Carrito</button>
        <button class="boton boton-comprar">Comprar</button>
    </div>
</div>
