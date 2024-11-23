<?php
    include "./conexion.php";
    include "./heading.php" ?>

<body class="fondo">
    <form class="iniciar-sesion " method="post">
        <div class="imagen-usuario"></div>
        <div class="datos-usuario">
            <div class="contenedor-input-usuario">
                <p>Usuario</p>
                <label id="input_usuario"><input class="input_usuario" id="usuario" type="text" required></label>
            </div>
            <div class="contenedor-input-contrasena">
                <p>Contraseña</p>
                <label id="input_contrasena">
                <input class="input_contrasena" id="contrasena" type="password" required>
                <button class="ojito"> 👁️ </button>
                </label>
            </div>
            <button class="inicio-sesion iniciar-sesion-iniciar"><a id="enlace_iniciar_sesion" href="./index.php">Iniciar Sesión</a></button>
            <p class="enlace-registro">¿No tienes cuenta?, <a href="./registrar.php">Registrate aquí</a></p>
        </div>
    </form>
</body>