<?php
    session_start();
    if(!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] != 'admin') exit();
    include '../php/conexion.php';

  
    $sql = "SELECT * FROM configuracion WHERE id = 1";
    $res = mysqli_query($con, $sql);
    $fila = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuración - Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <style>
        .form-container { max-width: 600px; margin: 0 auto; background: #111; padding: 30px; border-radius: 10px; }
        .input-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 10px; color: #cc0000; font-weight: bold; }
        input { width: 100%; padding: 12px; background: #222; border: 1px solid #444; color: white; border-radius: 5px; }
        .btn-save { background: #cc0000; color: white; border: none; padding: 12px 20px; width: 100%; font-weight: bold; cursor: pointer; font-size: 1.1em; }
        .btn-save:hover { background: #a00000; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="brand">SHOPWAPP ADMIN</div>
        <div class="menu">
            <a href="index.php">🏠 Inicio</a>
            <a href="productos.php">📦 Productos</a>
            <a href="usuarios.php">👥 Usuarios</a>
            <a href="configuracion.php" class="active">⚙️ Configuración</a>
            <a href="../index.php" style="margin-top: 50px;">⬅ Ir a la Tienda</a>
        </div>
    </div>

    <div class="main-content">
        <div class="header"><h1>Configuración de la Tienda</h1></div>
        
        <div class="form-container">
            <h3 style="margin-bottom: 20px; text-align: center;">Banner de Promociones</h3>
            
            <form action="guardar_config.php" method="POST">
                
                <div class="input-group">
                    <label>Línea 1 (Arriba)</label>
                    <input type="text" name="promo1" value="<?php echo $fila['promo_linea1']; ?>" required>
                </div>

                <div class="input-group">
                    <label>Línea 2 (Abajo)</label>
                    <input type="text" name="promo2" value="<?php echo $fila['promo_linea2']; ?>" required>
                </div>

                <button type="submit" class="btn-save">Guardar Cambios</button>
            </form>
        </div>
    </div>

</body>
</html>