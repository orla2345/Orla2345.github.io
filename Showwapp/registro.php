<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - SHOPWAPP</title>
    <link rel="stylesheet" href="css/login.css"> </head>
<body>
    
    <div class="background-wrap-login">
        
        <header class="main-header">
            <div class="logo">SHOPWAPP *</div>
            <nav class="main-nav">
                <a href="index.php">VOLVER A TIENDA</a>
            </nav>
        </header>

        <main class="login-wrapper">
            <div class="login-box">
                <h2>Crear Cuenta</h2>
                <p class="login-subtitle">Únete a SHOPWAPP hoy mismo</p>

                <form action="php/registro_bd.php" method="POST">
                    
                    <div class="input-group">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" id="nombre" name="nombre_completo" placeholder="Tu Nombre" required>
                    </div>

                    <div class="input-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" id="email" name="correo" placeholder="ejemplo@correo.com" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="contrasena" placeholder="Crea una contraseña segura" required>
                    </div>

                    <button type="submit" class="btn-login">REGISTRARSE</button>
                    
                </form>

                <div class="login-footer">
                    <p>¿Ya tienes cuenta? <a href="login.php">Inicia Sesión aquí</a></p>
                </div>
            </div>
        </main>

        <footer class="mini-footer">
            <p>&copy; 2025 SHOPWAPP. Todos los derechos reservados.</p>
        </footer>

    </div>

</body>
</html>