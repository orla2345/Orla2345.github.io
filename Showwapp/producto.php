<?php
    // 1. Conexión y Sesión
    include 'php/conexion.php';
    session_start();
    
    $sql_config = "SELECT * FROM configuracion WHERE id = 1";
    $res_config = $con->query($sql_config);
    $config = mysqli_fetch_assoc($res_config);



    // 2. Verificamos si nos enviaron un ID (ej: producto.php?id=5)
    if(isset($_GET['id'])){
        $id_producto = $_GET['id'];
        
        // Buscamos ese producto específico en la base de datos
        $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
        $resultado = $con->query($sql);
        
        if($resultado->num_rows > 0){
            $fila = mysqli_fetch_assoc($resultado);
        } else {
            // Si el ID no existe, regresamos al inicio
            header("Location: index.php");
            exit();
        }
    } else {
        // Si no hay ID, regresamos al inicio
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
        
        <header class="main-header">
            <div class="logo">SHOPWAPP *</div>
            <nav class="main-nav">
                <a href="index.php">VOLVER A TIENDA</a>
            </nav>
        </header>

        <section class="top-banner">
            <p>-Regalos Sorpresa - Envío Gratis a todo el país</p>
            <p>-Hasta 24 MSI - Pagos seguros con PayPal</p>
        </section>

        <main class="product-detail-container">
            
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

                    <div class="buy-options">
                        <p class="price-display">
                            $<?php echo number_format($fila['precio'], 2); ?> MXN
                        </p>
                        <div class="action-buttons">
                            <a href="#" class="btn-add-to-cart">Añadir a la cesta</a>
                            <a href="#" class="btn-buy-now">Comprar ahora</a>
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