<?php
    session_start();
    include '../php/conexion.php';
    if(!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] != 'admin') exit();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Inventario - SHOPWAPP</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; }
        h1 { text-align: center; color: #333; }
        .fecha { text-align: right; color: #666; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #cc0000; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .btn-print { 
            background: #333; color: white; padding: 10px 20px; text-decoration: none; 
            display: block; width: 100px; text-align: center; margin: 20px auto; cursor: pointer;
        }
        @media print { .btn-print { display: none; } } /* Oculta el botón al imprimir */
    </style>
</head>
<body>
    <h1>Reporte de Inventario Oficial</h1>
    <div class="fecha">Fecha de emisión: <?php echo date("d/m/Y H:i"); ?></div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM productos";
                $res = mysqli_query($con, $sql);
                while($row = mysqli_fetch_assoc($res)){
                    echo "<tr>";
                    echo "<td>".$row['id_producto']."</td>";
                    echo "<td>".$row['nombre']."</td>";
                    echo "<td>$".number_format($row['precio'], 2)."</td>";
                    echo "<td>".$row['stock']."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <button onclick="window.print()" class="btn-print">🖨️ Imprimir</button>
</body>
</html>