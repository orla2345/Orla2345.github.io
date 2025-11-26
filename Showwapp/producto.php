<?php
    
    include 'php/conexion.php';
    session_start();
    
    $sql_config = "SELECT * FROM configuracion WHERE id = 1";
    $res_config = $con->query($sql_config);
    $config = mysqli_fetch_assoc($res_config);



    
    if(isset($_GET['id'])){
        $id_producto = $_GET['id'];
        
        
        $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
        $resultado = $con->query($sql);
        
        if($resultado->num_rows > 0){
            $fila = mysqli_fetch_assoc($resultado);
        } else {
         
            header("Location: index.php");
            exit();
        }
    } else {
        
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $fila['nombre']; ?> - SHOPWAPP</title>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styles2.css"> 
</head>
<body>
    <div class="background-wrap">
        
       <header class="main-header glass-header">
            
            <div class="header-left">
                <a href="index.php" style="text-decoration:none;">
                    <div class="logo">SHOPWAPP <span style="color:#cc0000;">*</span></div>
                </a>
            </div>

            <div class="header-center">
                <form action="busqueda.php" method="GET" class="search-bar-container">
                    <input type="text" name="q" placeholder="Buscar iPhone, Samsung..." required>
                    <button type="submit" class="search-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
                </form>
            </div>
            </div>

            <nav class="header-right">
                <a href="index.php" class="nav-item">Inicio</a>
                
                <?php 
                    $cantidad_total = 0;
                    if(isset($_SESSION['carrito'])){
                        foreach($_SESSION['carrito'] as $p){
                            
                            $cantidad_total += $p['cantidad'];
                        }
                    }
                ?>

                <a href="carrito.php" class="icon-link cart-container-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    
                    <?php if($cantidad_total > 0): ?>
                        <span class="cart-badge"><?php echo $cantidad_total; ?></span>
                    <?php endif; ?>
                </a>

                <?php if(isset($_SESSION['usuario_nombre'])): ?>
                    <?php
                        $ruta_destino = "dashboard.php";
                        $txt_btn = "Mi Cuenta";
                        if(isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] == 'admin'){
                            $ruta_destino = "Admin/index.php";
                            $txt_btn = "Admin";
                        }
                    ?>
                    <a href="<?php echo $ruta_destino; ?>" class="btn-user-action">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <?php echo $txt_btn; ?>
                    </a>
                <?php else: ?>
                    <a href="login.php" class="btn-user-action">Login</a>
                <?php endif; ?>

            </nav>
        </header>

        <section class="top-banner">
            <p><?php echo $config['promo_linea1']; ?></p>
            <p><?php echo $config['promo_linea2']; ?></p>
        </section>

        <main class="product-detail-container">
            <div style="margin-bottom: 20px;">
                <a href="index.php" class="btn-back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                    Volver a la tienda
                </a>
            </div>
            
            <div class="product-intro">
                <p class="new-tag">Destacado</p>
                <h2><?php echo $fila['nombre']; ?></h2>
                <p class="product-subtitle">
                    <?php echo ($fila['subtitulo']) ? $fila['subtitulo'] : "La mejor tecnología a tu alcance."; ?>
                </p>
            </div>

            <div class="product-main-content">
                
                <div class="product-gallery">
                    <img src="<?php echo $fila['url_imagen_principal']; ?>" class="main-product-image" alt="Imagen del producto">
                </div>
                
                <div class="product-specs-buy">
                    <div class="product-specs">
                        <div class="spec-column">
                            <h3>Características</h3>
                            <p><?php echo ($fila['caracteristicas']) ? $fila['caracteristicas'] : "Detalles pendientes."; ?></p>
                        </div>
                        <div class="spec-column">
                            <h3>Especificaciones</h3>
                            <p><?php echo ($fila['especificaciones']) ? $fila['especificaciones'] : "Información técnica pendiente."; ?></p>
                        </div>
                        <div class="spec-column">
                            <h3>Software</h3>
                            <p><?php echo ($fila['software']) ? $fila['software'] : "S.O. Actualizado."; ?></p>
                        </div>
                    </div>

                    <div class="buy-options-refined">
                        
                        <div class="price-row">
                            <span class="currency">$</span>
                            <span class="amount"><?php echo number_format($fila['precio'], 2); ?></span>
                            <span class="mxn">MXN</span>
                        </div>
                        
                        <form action="php/agregar_carrito.php" method="POST">
                            <input type="hidden" name="id_producto" value="<?php echo $fila['id_producto']; ?>">
                            <input type="hidden" name="nombre" value="<?php echo $fila['nombre']; ?>">
                            <input type="hidden" name="precio" value="<?php echo $fila['precio']; ?>">
                            <input type="hidden" name="imagen" value="<?php echo $fila['url_imagen_principal']; ?>">
                            <input type="hidden" name="stock_max" value="<?php echo $fila['stock']; ?>">

                            <div class="controls-wrapper">
                                <div class="qty-box">
                                    <input type="number" name="cantidad" value="1" min="1" max="<?php echo $fila['stock']; ?>">
                                </div>

                                <button type="submit" class="btn-add-refined">
                                    Agregar a la bolsa
                                </button>
                            </div>
                            
                            <div class="stock-mini">
                                <span class="dot">●</span> Disponible: <?php echo $fila['stock']; ?> unidades
                            </div>

                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </main>
        
        <footer class="main-footer">
            <section class="footer-info">
                <h3>SHOPWAPP</h3>
                <p>Todos los derechos reservados 2025</p>
            </section>
        </footer>

    </div> 
</body>
</html>