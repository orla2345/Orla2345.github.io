<?php
    session_start();
    
    if(!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] != 'admin'){
        header("Location: ../login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin - Shopwapp</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="sidebar">

        <div class="brand">SHOPWAPP ADMIN</div>
        <div class="menu">
            <a href="index.php" class="active">🏠 Inicio</a>
            <a href="productos.php">📦 Productos</a>
            <a href="usuarios.php">👥 Usuarios</a>
            <a href="configuracion.php">⚙️ Configuración</a>
            <a href="../index.php" style="margin-top: 50px; border: 1px solid #555;">⬅ Ir a la Tienda</a>
            <a href="../php/cerrar_sesion.php" style="color: #ff6b6b;">✖ Cerrar Sesión</a>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Panel de Control</h1>
            <div>Admin: <strong><?php echo $_SESSION['usuario_nombre']; ?></strong></div>
        </div>

        <div class="cards-grid">
           
            
            <div class="card">
                <h3>Productos</h3>
                <p>Gestionar inventario</p>
                <a href="productos.php" class="btn-card">Ver Productos</a>
            </div>

            <div class="card">
                <h3>Usuarios</h3>
                <p>Gestionar clientes</p>
                <a href="usuarios.php" class="btn-card">Ver Usuarios</a>
            </div>

            <div class="card">
                <h3>Configuración</h3>
                <p>Editar banners y promociones</p>
                <a href="configuracion.php" class="btn-card">Editar Banners</a>
            </div>

        </div>
        </div>
    </div>
</body>
</html>