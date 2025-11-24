<?php
    session_start();
    include 'php/conexion.php'; 

   
    if(!isset($_SESSION['usuario_nombre'])){
        header("Location: login.php");
        exit();
    }
    
    $id_usuario = $_SESSION['usuario_id']; 
    $nombreUsuario = $_SESSION['usuario_nombre'];

    // 2. CONTAR PRODUCTOS EN CARRITO (REAL)
    $items_carrito = 0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $prod){
            $items_carrito += $prod['cantidad'];
        }
    }

    // 3. CONSULTAR PEDIDOS EN BASE DE DATOS
    
    $sql = "SELECT * FROM pedidos WHERE id_usuario = '$id_usuario' ORDER BY fecha_pedido DESC";
    $res = $con->query($sql);

    $total_pedidos = mysqli_num_rows($res); 
    $total_gastado = 0;
    $ultimo_pedido = null; 

   
    if($total_pedidos > 0){
       
        $ultimo_pedido = mysqli_fetch_assoc($res);
        $total_gastado += $ultimo_pedido['total_pedido'];

       
        while($fila = mysqli_fetch_assoc($res)){
            $total_gastado += $fila['total_pedido'];
        }
    }
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
                <a href="mis_pedidos.php">📦 Mis Pedidos</a>
                <a href="perfil.php">⚙️ Configuración</a>
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
                    <h3><?php echo $total_pedidos; ?></h3>
                    <p>Pedidos Realizados</p>
                </div>

                <div class="stat-card">
                    <h3><?php echo $items_carrito; ?></h3>
                    <p>En Carrito</p>
                </div>

                <div class="stat-card">
                    <h3>$<?php echo number_format($total_gastado, 2); ?></h3>
                    <p>Total Gastado</p>
                </div>
            </div>

            <div style="margin-top: 40px; background: rgba(255,255,255,0.05); padding: 20px; border-radius: 10px; border: 1px solid rgba(255,255,255,0.1);">
                
                <?php if($ultimo_pedido): ?>
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <h3>📦 Pedido #<?php echo $ultimo_pedido['id_pedido']; ?></h3>
                        <span style="background:#cc0000; padding:5px 10px; border-radius:5px; font-size:0.9em;">
                            <?php echo $ultimo_pedido['estado_pedido']; ?>
                        </span>
                    </div>
                    <p style="color: #ccc; margin-top: 10px;">
                        Fecha: <?php echo date("d/m/Y", strtotime($ultimo_pedido['fecha_pedido'])); ?><br>
                        Total: $<?php echo number_format($ultimo_pedido['total_pedido'], 2); ?>
                    </p>
                    <a href="#" style="color: #ccc; text-decoration: underline; font-size:0.9em;">Ver detalles</a>

                <?php else: ?>
                    <h3>📦 Aún no tienes pedidos</h3>
                    <p style="color: #ccc; margin-top: 10px;">¿Qué esperas para estrenar celular?</p>
                    <a href="index.php" style="color: #cc0000; text-decoration: none; font-weight: bold; margin-top: 10px; display: inline-block;">
                        Explorar productos →
                    </a>
                <?php endif; ?>

            </div>
        </main>
    </div>

</body>
</html>