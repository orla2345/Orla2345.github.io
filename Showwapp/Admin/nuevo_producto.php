<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Producto - Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <style>
        .form-container { max-width: 600px; margin: 20px auto; background: #111; padding: 30px; border-radius: 10px; color: white; }
        .input-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #ccc; }
        input, textarea { width: 100%; padding: 10px; background: #222; border: 1px solid #444; color: white; border-radius: 5px; }
        .btn-save { background: #cc0000; color: white; border: none; padding: 10px 20px; width: 100%; font-weight: bold; cursor: pointer; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="main-content" style="margin-left:0;">
        <h2 style="text-align:center; color:white;">Agregar Producto</h2>
        <div class="form-container">
            
           <form action="guardar_producto.php" method="POST" enctype="multipart/form-data">
                
                <div class="input-group">
                    <label>Nombre del Producto</label>
                    <input type="text" name="nombre" required>
                </div>

                <div class="input-group">
                    <label>Subtítulo (Frase corta)</label>
                    <input type="text" name="subtitulo" placeholder="Ej: El más potente del mercado">
                </div>

                <div class="input-group">
                    <label>Precio</label>
                    <input type="number" step="0.01" name="precio" required>
                </div>

                <div class="input-group">
                    <label>Imagen Principal</label>
                    <input type="file" name="imagen" accept="image/*" required>
                </div>

              <div class="input-group">
                    <label>Características Destacadas</label>
                    <textarea name="caracteristicas" rows="5" placeholder="Ejemplo:&#10;• Pantalla 120Hz&#10;• Cámara 200MP&#10;• Batería Larga Duración"></textarea>
                    <small style="color:#666;">Escribe cada característica en una línea nueva.</small>
                </div>

                <div class="input-group">
                    <label>Especificaciones Técnicas</label>
                    <textarea name="especificaciones" rows="5" placeholder="Procesador...&#10;Memoria...&#10;Sensores..."></textarea>
                </div>

                <div class="input-group">
                    <label>Software y Extras</label>
                    <textarea name="software" rows="3" placeholder="Sistema Operativo..."></textarea>
                </div>

                <button type="submit" class="btn-save">Publicar Producto</button>
                <a href="productos.php" style="display:block; text-align:center; margin-top:15px; color:#888;">Cancelar</a>
                
            </form>
        </div>
    </div>
</body>
</html>