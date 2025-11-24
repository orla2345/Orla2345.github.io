<?php
    session_start();
    if(!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] != 'admin') exit();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Usuario - Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <style>
       
        .form-container { max-width: 500px; margin: 0 auto; background: #111; padding: 30px; border-radius: 10px; }
        .input-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #ccc; }
        input, select { width: 100%; padding: 10px; background: #222; border: 1px solid #444; color: white; border-radius: 5px; }
        .btn-save { background: #cc0000; color: white; border: none; padding: 10px 20px; width: 100%; cursor: pointer; font-weight: bold; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="main-content" style="margin-left: 0; text-align: center;"> <h2 style="color: #cc0000; margin-bottom: 20px;">Registrar Nuevo Usuario</h2>
        
        <div class="form-container">
            <form action="guardar_usuario.php" method="POST">
                <div class="input-group">
                    <label>Nombre Completo</label>
                    <input type="text" name="nombre" required>
                </div>
                <div class="input-group">
                    <label>Correo Electrónico</label>
                    <input type="email" name="email" required>
                </div>
                <div class="input-group">
                    <label>Contraseña</label>
                    <input type="password" name="password" required>
                </div>
                <div class="input-group">
                    <label>Rol</label>
                    <select name="rol">
                        <option value="cliente">Cliente</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>
                <button type="submit" class="btn-save">Guardar Usuario</button>
                <a href="usuarios.php" style="display: block; margin-top: 15px; color: #888;">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>