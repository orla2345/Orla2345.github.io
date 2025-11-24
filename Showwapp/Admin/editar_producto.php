<?php
    session_start();
    if(!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] != 'admin') exit();
    include '../php/conexion.php';

    // 1. Obtener el ID del producto a editar
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM productos WHERE id_producto = '$id'";
        $res = mysqli_query($con, $sql);
        $fila = mysqli_fetch_assoc($res);
    }

    // Truco: Función para convertir <br> de vuelta a "Enter" visual
    function br2nl($string){
        return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto - Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <style>
        /* Reutilizamos estilos del form */
        .form-container { max-width: 600px; margin: 20px auto; background: #2a2a2a; padding: 30px; border-radius: 10px; border: 1px solid #444; }
        .input-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #ccc; font-weight: bold; }
        input, textarea { width: 100%; padding: 10px; background: #1a1a1a; border: 1px solid #444; color: white; border-radius: 5px; }
        .btn-save { background: #cc0000; color: white; border: none; padding: 10px 20px; width: 100%; font-weight: bold; cursor: pointer; margin-top: 10px; }
        img.preview { display: block; margin: 10px auto; border-radius: 5px; border: 1px solid #555; }
    </style>
</head>
<body>
    <div class="main-content" style="margin-left:0;">
        <h2 style="text-align:center;">Editar Producto: <span style="color:#white"><?php echo $fila['nombre']; ?></span></h2>
        
        <div class="form-container">
            <form action="actualizar_producto.php" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="id" value="<?php echo $fila['id_producto']; ?>">

                <div class="input-group">
                    <label>Nombre del Producto</label>
                    <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" required>
                </div>

                <div class="input-group">
                    <label>Subtítulo</label>
                    <input type="text" name="subtitulo" value="<?php echo $fila['subtitulo']; ?>">
                </div>

                <div class="input-group">
                    <label>Precio</label>
                    <input type="number" step="0.01" name="precio" value="<?php echo $fila['precio']; ?>" required>
                </div>

                <div class="input-group" style="text-align:center;">
                    <label>Imagen Actual</label>
                    <img src="../<?php echo $fila['url_imagen_principal']; ?>" width="100" class="preview">
                    <label style="font-weight:normal; font-size:0.9em; color:#888;">Subir nueva (Opcional)</label>
                    <input type="file" name="imagen" accept="image/*">
                </div>

                <div class="input-group">
                    <label>Características</label>
                    <textarea name="caracteristicas" rows="5"><?php echo br2nl($fila['caracteristicas']); ?></textarea>
                </div>

                <div class="input-group">
                    <label>Especificaciones</label>
                    <textarea name="especificaciones" rows="5"><?php echo br2nl($fila['especificaciones']); ?></textarea>
                </div>

                <div class="input-group">
                    <label>Software</label>
                    <textarea name="software" rows="3"><?php echo br2nl($fila['software']); ?></textarea>
                </div>

                <button type="submit" class="btn-save">Guardar Cambios</button>
                <a href="productos.php" style="display:block; text-align:center; margin-top:15px; color:#888;">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>