<?php
    session_start();
    if(!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] != 'admin'){
        header("Location: ../login.php");
        exit();
    }
    include '../php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios - Admin</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="sidebar">
        <div class="brand">SHOPWAPP *</div>
        <div class="menu">
            <a href="index.php">🏠 Inicio</a>
            <a href="productos.php">📦 Productos</a>
            <a href="usuarios.php" class="active">👥 Usuarios</a>
            <a href="../index.php" style="margin-top: 50px;">⬅ Ir a la Tienda</a>
        </div>
    </div>

    <div class="main-content">
        <div class="header"><h1>Control de Usuarios</h1></div>
        
        <div class="table-container">
            <a href="nuevo_usuario.php" class="btn-new">+ Nuevo Usuario</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th><th>Nombre</th><th>Email</th><th>Rol</th><th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM usuarios";
                        $res = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_assoc($res)){
                            echo "<tr>";
                            echo "<td>#".$row['id_usuario']."</td>";
                            echo "<td>".$row['nombre']."</td>";
                            echo "<td>".$row['email']."</td>";
                          
                            $clase_rol = ($row['rol'] == 'admin') ? 'admin' : 'user';
                            echo "<td><span class='role-badge $clase_rol'>".strtoupper($row['rol'])."</span></td>";
                            
                            echo "<td>";
                            // Botón ELIMINAR (Envia el ID por la URL)
                            echo "<a href='eliminar_usuario.php?id=".$row['id_usuario']."' class='btn-action btn-delete' onclick='return confirm(\"¿Seguro que deseas eliminar este usuario?\")'>🗑️</a>";
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