<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - SHOPWAPP</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    
    <div class="background-wrap-login">
        
        <header class="main-header">
            <div class="logo">SHOPWAPP *</div>
            <nav class="main-nav">
                <a href="showapp.html">VOLVER A TIENDA</a>
            </nav>
        </header>

        <main class="login-wrapper">
            <div class="login-box">
                <h2>Bienvenido</h2>
                <p class="login-subtitle">Ingresa tus credenciales para continuar</p>

                <form action="./php/auth.php" method="POST">
                    
                    <div class="input-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="txtemail" placeholder="ejemplo@correo.com" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="txtpass" placeholder="••••••••" required>
                    </div>

                    <div class="options-group">
                        <label class="remember-me">
                            <input type="checkbox" id="remember"> Recordarme
                        </label>
                        <a href="#" class="forgot-pass">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" class="btn-login">ENTRAR</button>
                    
                </form>

                <div class="login-footer">
                    <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
                </div>
            </div>
        </main>

        <footer class="mini-footer">
            <p>&copy; 2025 SHOPWAPP • Todos los derechos reservados</p>
        </footer>

    </div>

</body>
</html>