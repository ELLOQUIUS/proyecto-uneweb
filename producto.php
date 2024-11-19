<?php include "./heading.php"?>
<div class="producto">
    <h3><?= $row["nombre"];?></h3>
    <p class="precio"><?= $row["precio"];?> $</p>
    <img class="imagen" src="<?= $row["foto"];?>" alt="<?= $row["nombre"];?>">
    <p class="descripcion"><?= $row["descripcion"];?></p>
    <button>Agregar Carrito</button>
    <button>Comprar</button>
</div>
