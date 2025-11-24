<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tu Carrito - SHOPWAPP</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .cart-container { max-width: 1000px; margin: 40px auto; padding: 20px; min-height: 60vh; }
        .cart-title { color: white; font-size: 2em; margin-bottom: 20px; text-align: center; }
        
        .cart-table { width: 100%; border-collapse: collapse; background: rgba(255,255,255,0.05); border-radius: 10px; overflow: hidden; backdrop-filter: blur(10px); }
        .cart-table th { background: #cc0000; color: white; padding: 15px; text-align: center; font-weight: bold; } /* Centrado */
        .cart-table td { padding: 15px; color: #ddd; border-bottom: 1px solid rgba(255,255,255,0.1); vertical-align: middle; text-align: center; } /* Centrado */
        
        /* Alinear el nombre y foto a la izquierda */
        .td-producto { text-align: left !important; display: flex; align-items: center; gap: 15px; }
        
        .cart-img { width: 60px; height: 60px; object-fit: contain; background: white; border-radius: 5px; }
        
        .btn-delete { color: #ff6b6b; text-decoration: none; font-weight: bold; font-size: 1.5em; transition: 0.3s; }
        .btn-delete:hover { color: red; transform: scale(1.2); display:inline-block; }

        .cart-total { text-align: right; margin-top: 20px; color: white; font-size: 1.5em; padding-right: 20px; }
        .total-price { color: #cc0000; font-weight: bold; }

        .cart-actions { display: flex; justify-content: space-between; margin-top: 30px; }
        .btn-continue { padding: 12px 25px; border: 1px solid #fff; color: white; text-decoration: none; border-radius: 50px; transition:0.3s;}
        .btn-continue:hover { background: white; color: black; }
        
        .btn-checkout { padding: 12px 40px; background: #cc0000; color: white; text-decoration: none; border-radius: 50px; font-weight: bold; font-size: 1.1em; box-shadow: 0 4px 15px rgba(204,0,0,0.4); transition:0.3s; }
        .btn-checkout:hover { background: #ff0000; transform: translateY(-2px); }
        
        .empty-cart { text-align: center; color: #888; margin-top: 50px; font-size: 1.2em; }
    </style>
</head>
<body>
    <div class="background-wrap">
        
        <header class="main-header glass-header">
            <div class="header-left">
                <a href="index.php" style="text-decoration:none;">
                    <div class="logo">SHOPWAPP <span style="color:#cc0000;">*</span></div>
                </a>
            </div>
            <nav class="header-right">
                <a href="index.php" class="nav-item">Seguir Comprando</a>
            </nav>
        </header>

        <div class="cart-container">
            <h1 class="cart-title">Tu Carrito de Compras</h1>

            <?php if(!empty($_SESSION['carrito'])): ?>
                
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th style="text-align:left; padding-left:20px;">Producto</th>
                            <th>Precio Unitario</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th> <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $total = 0;
                            foreach($_SESSION['carrito'] as $item): 
                                // MATEMÁTICA REAL: Precio x Cantidad
                                $subtotal = $item['precio'] * $item['cantidad'];
                                $total += $subtotal;
                        ?>
                        <tr>
                            <td class="td-producto">
                                <img src="<?php echo $item['imagen']; ?>" class="cart-img">
                                <div>
                                    <strong style="color:white; font-size:1.1em;"><?php echo $item['nombre']; ?></strong>
                                </div>
                            </td>
                            
                            <td>$<?php echo number_format($item['precio'], 2); ?></td>
                            
                            <td>
                                <span style="background:#333; padding:5px 10px; border-radius:5px; font-weight:bold;">
                                    <?php echo $item['cantidad']; ?>
                                </span>
                            </td>

                            <td style="color:#ccc;">$<?php echo number_format($subtotal, 2); ?></td>
                            
                            <td><a href="php/borrar_carrito.php?id=<?php echo $item['id']; ?>" class="btn-delete">×</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="cart-total">
                    Total a Pagar: <span class="total-price">$<?php echo number_format($total, 2); ?></span>
                </div>

                <div class="cart-actions">
                    <a href="index.php" class="btn-continue">← Seguir viendo</a>
                    <a href="https://wa.me/52123456789?text=Hola, quiero pagar mi carrito de $<?php echo number_format($total, 2); ?>" target="_blank" class="btn-checkout">Pagar Ahora →</a>
                </div>

            <?php else: ?>
                <div class="empty-cart">
                    <p style="font-size:3em;">🛒</p>
                    <p>Tu carrito está vacío</p>
                    <br>
                    <a href="index.php" class="btn-checkout">Ir a la tienda</a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</body>
</html>