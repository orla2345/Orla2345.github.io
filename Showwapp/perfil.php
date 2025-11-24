<?php
    session_start();
    include 'php/conexion.php';

    if(!isset($_SESSION['usuario_nombre'])){
        header("Location: login.php"); exit();
    }
    
    $id_usuario = $_SESSION['usuario_id'];
    
    // Obtener datos actuales del usuario
    $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
    $res = $con->query($sql);
    $datos = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuración - SHOPWAPP</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="Admin/css/admin.css"> <style>
        .main-content { margin-left: 250px; background: none; } 
        body { background-image: url('imgen/mitienda.jpg'); background-size: cover; background-attachment: fixed; }
    </style>
</head>
<body>

    <div class="dashboard-container">
        
        <nav class="sidebar">
            <div class="logo-dashboard">SHOPWAPP *</div>
            <div class="user-profile">
                <div class="user-avatar"><?php echo strtoupper($datos['nombre'][0]); ?></div>
                <p class="user-name"><?php echo $datos['nombre']; ?></p>
            </div>
            <div class="menu-links">
                <a href="dashboard.php">📊 Resumen</a>
                <a href="index.php">🛒 Ir a la Tienda</a>
                <a href="mis_pedidos.php">📦 Mis Pedidos</a>
                <a href="perfil.php" class="active">⚙️ Configuración</a>
                <a href="php/cerrar_sesion.php" class="logout">Cerrar Sesión</a>
            </div>
        </nav>

        <main class="main-content">
            <h1>Mis Datos</h1>
            
            <div class="table-container" style="max-width: 600px; margin: 20px 0;">
                <form action="php/actualizar_perfil.php" method="POST">
                    
                    <div class="input-group">
                        <label>Nombre Completo</label>
                        <input type="text" name="nombre" value="<?php echo $datos['nombre']; ?>" required>
                    </div>

                    <div class="input-group">
                        <label>Correo (No editable)</label>
                        <input type="email" value="<?php echo $datos['email']; ?>" disabled style="opacity:0.5;">
                    </div>

                    <div class="input-group">
                        <label>Teléfono</label>
                        <input type="text" name="telefono" value="<?php echo $datos['telefono']; ?>" placeholder="Ej: 55 1234 5678">
                    </div>

                    <div class="input-group">
                        <label>Dirección de Envío Predeterminada</label>
                        <textarea name="direccion" rows="3" placeholder="Calle, Número, Colonia, Ciudad..."><?php echo isset($datos['direccion_envio']) ? $datos['direccion_envio'] : ''; ?></textarea>
                    </div>

                    <button type="submit" class="btn-save">Guardar Cambios</button>
                </form>
            </div>
        </main>
    </div>

</body>
</html>