<?php
    include "./conexion.php";
    include "./heading.php" ?>

<body class="fondo">
    <form class="iniciar-sesion registrar" method="post">
        <div class="imagen-usuario"></div>
        <div class="datos-usuario">
            <div class="contenedor-input-usuario">
                <p>Usuario</p>
                <label id="input_usuario">
                <input class="input_usuario" id="usuario" type="text" required>
                </label>
            </div>
            <div class="contenedor-input-contrasena">
                <p>Contraseña</p>
                <label id="input_contrasena">
                <input class="input_contrasena" id="contrasena" type="password" required>
                <button class="ojito"> 👁️ </button>
                </label>
                </label>
            </div>
            <div class="contenedor-input-confirmar">
                <p>Confirmar Contraseña</p>
                <label id="input_contrasena">
                <input class="input_contrasena" id="contrasena" type="password" required>
                <button class="ojito"> 👁️ </button>
                </label>
            </div>
            <div class="checkbox-admin">
                <input type="checkbox">¿Iniciar como administrador?
            </div>
            <button class="inicio-sesion iniciar-sesion-iniciar"><a id="enlace_iniciar_sesion" href="./index.php">Registrarse</a></button>    
        </div>
    </form>
</body>