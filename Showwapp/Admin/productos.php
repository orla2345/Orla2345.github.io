<?php
    session_start();
    if(!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] != 'admin') exit();
    include '../php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos - Admin</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="sidebar">
        <div class="brand">SHOPWAPP *</div>
        <div class="menu">
            <a href="index.php">🏠 Inicio</a>
            <a href="productos.php" class="active">📦 Productos</a>
            <a href="usuarios.php">👥 Usuarios</a>
            <a href="../index.php" style="margin-top: 50px;">⬅ Ir a la Tienda</a>
        </div>
    </div>

    <div class="main-content">
        <div class="header"><h1>Inventario</h1></div>
        
        <div class="table-container">
            <a href="nuevo_producto.php" class="btn-new">+ Nuevo Producto</a>
            <table>
                <thead>
                    <tr>
                        <th>Imagen</th><th>Nombre</th><th>Precio</th><th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM productos";
                        $res = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_assoc($res)){
                            echo "<tr>";
                            // Muestra la imagen saliendo de la carpeta admin
                            echo "<td><img src='../".$row['url_imagen_principal']."' width='50' style='border-radius:5px;'></td>";
                            echo "<td>".$row['nombre']."</td>";
                            echo "<td>$".number_format($row['precio'], 2)."</td>";
                            echo "<td>";
                            echo "<a href='editar_producto.php?id=".$row['id_producto']."' class='btn-action btn-edit'>✏️</a>";
                            echo "<a href='eliminar_producto.php?id=".$row['id_producto']."' class='btn-action btn-delete' onclick='return confirm(\"¿Borrar producto?\")'>🗑️</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>