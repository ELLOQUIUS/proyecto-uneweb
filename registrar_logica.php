<?php
    include "./conexion.php";
    if ($_POST["contrasena"] == $_POST["contrasena-conf"]){
        $sql = "SELECT nombre FROM cliente WHERE '$_POST[usuario]' = nombre";
        $result = mysqli_query($link, $sql); //ejecuto la consulta
        $row = mysqli_fetch_assoc($result);
        if (!mysqli_error($link)) {
            if ($row != null){
?>              <script>alert("Usuario no disponible. Elija otro")</script>
                <meta http-equiv="refresh" content="0;URL=registrar.php">
<?php 
            }else{
                if (isset($_POST['checkadmin'])){
                    $sql = "INSERT INTO cliente(dni,nombre,direccion,email,contrasena,administrador) VALUES ('$_POST[cedula]','$_POST[usuario]','$_POST[direccion]','$_POST[email]','$_POST[contrasena]',$_POST[checkadmin]);";
                }else{
                    $sql = "INSERT INTO cliente(dni,nombre,direccion,email,contrasena,administrador) VALUES ('" . $_POST['cedula'] . "','" . $_POST['usuario'] . "','" . $_POST['direccion'] . "','" . $_POST['email'] . "','" . $_POST['contrasena'] . "','" . 0 . "')";
                }  
                $result = mysqli_query($link, $sql); //ejecuto la consulta
                $_SESSION['user'] = $_POST["usuario"];
                if (!mysqli_error($link)) {
                    if ($_POST['checkadmin'] == 1) {
                        $_SESSION['admin'] = true;
                    }else{
                        $_SESSION['admin'] = false;
                    }
?>                  <script>alert("Usuario registrado correctamente!")</script>
                    <meta http-equiv="refresh" content="0;URL=index.php">
<?php
                }else{
?>                  <script>alert("Estamos en mantenimiento preventivo")</script>
                    <meta http-equiv="refresh" content="0;URL=registrar.php">  
<?php           }    
            }
        }else{
?>          <script>alert("Estamos en mantenimiento preventivo")</script> 
            <meta http-equiv="refresh" content="0;URL=registrar.php">
<?php   }
    }else{
?>      <script>alert("Las contraseñas no coinciden")</script>
        <meta http-equiv="refresh" content="0;URL=registrar.php">
<?php } ?>


<!--
<script> alert("Usuario registrado correcamente!")</script>
<meta http-equiv="refresh" content="0;URL=index.php">

<script>alert("Las contraseñas no coinciden")</script>
<meta http-equiv="refresh" content="0;URL=registrar.php"> -->