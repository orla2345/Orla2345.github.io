<?php
    // 1. SEGURIDAD: Iniciar sesión y verificar si el usuario existe
    session_start();

    if(!isset($_SESSION['usuario_nombre'])){
        echo '
            <script>
                alert("Por favor debes iniciar sesión");
                window.location = "login.php";
            </script>
        ';
        session_destroy();
        die();
    }
    
    // Obtenemos el nombre guardado en la sesión
    $nombreUsuario = $_SESSION['usuario_nombre'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta - SHOPWAPP</title>
    <link rel="stylesheet" href="css/dashboard.css">
    </head>
<body>

    <div class="dashboard-container">
        
        <nav class="sidebar">
            <div class="logo-dashboard">SHOPWAPP *</div>
            
            <div class="user-profile">
                <div class="user-avatar">
                    <?php echo strtoupper($nombreUsuario[0]); ?>
                </div>
                <p class="user-name"><?php echo $nombreUsuario; ?></p>
                <p class="user-email">Cliente VIP</p>
            </div>

            <div class="menu-links">
                <a href="#" class="active">📊 Resumen</a>
                <a href="index.php">🛒 Ir a la Tienda</a>
                <a href="#">📦 Mis Pedidos</a>
                <a href="#">⚙️ Configuración</a>
                <a href="php/cerrar_sesion.php" class="logout">Cerrar Sesión</a>
            </div>
        </nav>

        <main class="main-content">
            
            <div class="welcome-banner">
                <h1>Hola, <?php echo $nombreUsuario; ?> 👋</h1>
                <p>Bienvenido de nuevo a tu panel de control de Shopwapp.</p>
            </div>

            <h2 style="margin-bottom: 20px;">Tu Actividad</h2>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>0</h3>
                    <p>Pedidos Realizados</p>
                </div>
                <div class="stat-card">
                    <h3>0</h3>
                    <p>En Carrito</p>
                </div>
                <div class="stat-card">
                    <h3>$0.00</h3>
                    <p>Total Gastado</p>
                </div>
            </div>

            <div style="margin-top: 40px; background: rgba(255,255,255,0.05); padding: 20px; border-radius: 10px;">
                <h3>📦 Estado del último pedido</h3>
                <p style="color: #ccc; margin-top: 10px;">No tienes pedidos recientes.</p>
                <a href="index.php" style="color: #cc0000; text-decoration: none; font-weight: bold; margin-top: 10px; display: inline-block;">Explorar productos →</a>
            </div>

        </main>
    </div>

</body>
</html>