<?php
    include "./conexion.php";
    if ($_POST["contrasena"] == $_POST["contrasena-conf"]){
        $sql = "SELECT nombre FROM cliente WHERE '$_POST[usuario]' = nombre";
        $result = mysqli_query($link, $sql); //ejecuto la consulta
        $row = mysqli_fetch_assoc($result);
        if (!mysqli_error($link)) {
            if ($row != null){ ?>
                <script>alert("Usuario no disponible. Elija otro")</script>
                <meta http-equiv="refresh" content="0;URL=registrar.php">
            <?php 
            }
            $sql = "INSERT INTO cliente(dni,nombre,direccion,email,contrasena) VALUES ('$_POST[cedula]','$_POST[usuario]','$_POST[direccion]','$_POST[email]','$_POST[contrasena]');";     
            $result = mysqli_query($link, $sql); //ejecuto la consulta
            if (!mysqli_error($link)) {?>
                <script>alert("Usuario registrado correctamente!")</script>
                <meta http-equiv="refresh" content="0;URL=index.php">
            <?php
            }?>
            <script>alert("Estamos en mantenimiento preventivo")</script>
            <meta http-equiv="refresh" content="0;URL=registrar.php">      
    <?php} ?>
        <script>alert("Estamos en mantenimiento preventivo")</script> 
        <meta http-equiv="refresh" content="0;URL=registrar.php">
<?php }?>
    <script>alert("Las contraseñas no coinciden")</script>
    <meta http-equiv="refresh" content="0;URL=registrar.php">


<!--
<script> alert("Usuario registrado correcamente!")</script>
<meta http-equiv="refresh" content="0;URL=index.php">

<script>alert("Las contraseñas no coinciden")</script>
<meta http-equiv="refresh" content="0;URL=registrar.php"> -->