<?php
    include "./conexion.php";
    include "./heading.php" ?>

<body class="fondo fondo-registrar">
    <form class="iniciar-sesion registrar registrar-form" method="post" action="./registrar_logica.php">
        <div class="imagen-usuario imagen-usuario-registrar"></div>
        <div class="datos-usuario">
            <div class="contenedor-input-usuario">
                <p>Usuario</p>
                <label for="usuario" id="input_usuario">
                <input class="input_usuario" id="usuario" type="text" name="usuario" required>
                </label>
            </div>
            <div class="contenedor-input-cedula">
                <p>Cédula</p>
                <label for="cedula" id="input_cedula">
                <input class="input_cedula" id="cedula" type="number" name="cedula" required>
                </label>
            </div>
            <div class="contenedor-input-email">
                <p>Email</p>
                <label for="email" id="input_email">
                <input class="input_email" id="email" type="email" name="email" required>
                </label>
            </div>
            <div class="contenedor-input-direccion">
                <p>Dirección</p>
                <label for="direccion" id="input_direccion">
                <input class="input_direccion" id="direccion" type="text" name="direccion" required>
                </label>
            </div>
            <div class="contenedor-input-contrasena">
                <p>Contraseña</p>
                <label for="cotrasena" id="input_contrasena">
                <input class="input_contrasena" id="contrasena" type="password" name="contrasena" required>
                <button class="ojito"> 👁️ </button>
                </label>
                </label>
            </div>
            <div class="contenedor-input-confirmar">
                <p>Confirmar Contraseña</p>
                <label for="contrasena-conf" id="input_contrasena">
                <input class="input_contrasena" id="contrasena-conf" type="password" name="contrasena-conf"  required>
                <button class="ojito"> 👁️ </button>
                </label>
            </div>
            <div class="checkbox-admin">
                <input type="checkbox" name="checkadmin" value="1">¿Iniciar como administrador?
            </div>
            <!-- <button class="inicio-sesion iniciar-sesion-iniciar"><a id="enlace_iniciar_sesion" href="./index.php">Registrarse</a></button> -->  
            <button class="inicio-sesion iniciar-sesion-iniciar boton-registrar" type="submit">Registrarse</button>
        </div>
    </form>
</body>