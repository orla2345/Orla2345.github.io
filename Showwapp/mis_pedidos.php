<?php
    session_start();
    include 'php/conexion.php';

    if(!isset($_SESSION['usuario_nombre'])){
        header("Location: login.php");
        exit();
    }
    
    $id_usuario = $_SESSION['usuario_id'];
    $nombreUsuario = $_SESSION['usuario_nombre'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Pedidos - SHOPWAPP</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="Admin/css/admin.css"> 
    <style>
        
        .main-content { margin-left: 250px; background: none; } 
        body { background-image: url('imgen/mitienda.jpg'); background-size: cover; background-attachment: fixed; }
        .dashboard-container::before { content: ""; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.85); z-index: -1; }
    </style>
</head>
<body>

    <div class="dashboard-container">
        
        <nav class="sidebar">
            <div class="logo-dashboard">SHOPWAPP *</div>
            <div class="user-profile">
                <div class="user-avatar"><?php echo strtoupper($nombreUsuario[0]); ?></div>
                <p class="user-name"><?php echo $nombreUsuario; ?></p>
            </div>
            <div class="menu-links">
                <a href="dashboard.php">📊 Resumen</a>
                <a href="index.php">🛒 Ir a la Tienda</a>
                <a href="mis_pedidos.php" class="active">📦 Mis Pedidos</a>
                <a href="perfil.php">⚙️ Configuración</a>
                <a href="php/cerrar_sesion.php" class="logout">Cerrar Sesión</a>
            </div>
        </nav>

        <main class="main-content">
            <h1 style="margin-bottom: 20px;">Historial de Pedidos</h1>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Pedido #</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM pedidos WHERE id_usuario = '$id_usuario' ORDER BY fecha_pedido DESC";
                            $res = $con->query($sql);

                            if(mysqli_num_rows($res) > 0){
                                while($row = mysqli_fetch_assoc($res)){
                                    echo "<tr>";
                                    echo "<td>#".$row['id_pedido']."</td>";
                                    echo "<td>".date("d/m/Y", strtotime($row['fecha_pedido']))."</td>";
                                    echo "<td>$".number_format($row['total_pedido'], 2)."</td>";
                                    echo "<td><span class='role-badge user'>".$row['estado_pedido']."</span></td>";
                                    echo "<td><a href='#' style='color:#cc0000;'>Ver items</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5' style='text-align:center;'>Aún no has realizado compras.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>
</html>