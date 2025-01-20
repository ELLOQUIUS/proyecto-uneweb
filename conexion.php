
<?php
    /* Cambiar el root y el password cuando lo suba en la pagina de host */
    $link = mysqli_connect("mysql5035.site4now.net","aafdac_carrito", "m123456*", "db_aafdac_carrito");
    
    if (!$link) {
        die('Error de Conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }
    if (session_status() != PHP_SESSION_ACTIVE){
        session_start();
    }
?>  
