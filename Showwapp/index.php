<?php
    session_start();
    include 'php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>SHOPWAPP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="background-wrap">
        
   
        <header class="main-header">
            
            
            <div class="header-left">
                <div class="logo">SHOPWAPP <span style="color:#cc0000;">*</span></div>
            </div>

            
            <div class="header-center">
                <form action="busqueda.php" method="GET" class="search-bar-container">
                    <input type="text" name="q" placeholder="Buscar iPhone, Samsung..." required>
                    <button type="submit" class="search-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
                </form>
            </div>

          
            <nav class="header-right">
                
                <a href="#inicio" class="nav-item">Inicio</a>
                <a href="#productos" class="nav-item">Productos</a>
                <a href="#contacto" class="nav-item">Contacto</a>

               
                <?php if(isset($_SESSION['usuario_nombre'])): ?>
                    
                    <?php
                        $ruta = "dashboard.php";
                        $texto = "Mi Cuenta";
                        if(isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] == 'admin'){
                            $ruta = "Admin/index.php";
                            $texto = "Admin";
                        }
                    ?>
                    
                    <a href="<?php echo $ruta; ?>" class="btn-user-action">
                      
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span><?php echo $texto; ?></span>
                    </a>

                <?php else: ?>

                    <a href="login.php" class="btn-user-action">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span>Login</span>
                    </a>

                <?php endif; ?>

              
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

            </nav>
        </header>

        <section class="hero-section">
            <div class="hero-content">
                <h1>La mejor opcion para tu bolsillo</h1>
                <a href="producto.php" class="btn-ordenar">Ordena ahora!</a>
            </div>
            <div class="hero-image">
                <img src="imgen/smartphones_-1160x696-removebg-preview.png" alt="Modelos de celulares premium"> 
            </div>
        </section>

        <main>
            <h2 id="productos" class="section-title">TIENDA SHOPWAPP *</h2>
            
            <div class="products-grid">
                <div class="products-grid">
                
                <?php
                   
                    $sql = "SELECT * FROM productos";
                    $resultado = $con->query($sql);

                   
                    while($fila = mysqli_fetch_assoc($resultado)){
                ?>

                <div class="product-item">
                    
                    <img src="<?php echo $fila['url_imagen_principal']; ?>" alt="Producto">
                    
                    <div class="price-tag">
                        <span>
                            <?php echo $fila['nombre']; ?> <br>
                            $<?php echo number_format($fila['precio'], 2); ?>
                        </span>
                        
                      <a href="producto.php?id=<?php echo $fila['id_producto']; ?>" class="btn-cart">Ver</a>
                    </div>
                </div>

                <?php 
                    } 
                ?>
                
            </div>         
            </div>
        </main>
        
    </div> 
    
    <footer class="main-footer" id="contacto">
    <section class="footer-info">
        <h3>ACERCA DE SHOPWAP</h3>
        <h3>SOPORTE</h3>
        <p>Métodos de pago permitidos</p>
        
        <div class="payment-icons">
            <img src="imgen/visa.webp" alt="Visa" class="card-icon">
            <img src="imgen/logo_mastercard-despues.webp" alt="Mastercard" class="card-icon">
            <img src="imgen/am_amex_06.webp" alt="American Express" class="card-icon">
        </div>
        </section>
    
    <div class="social-icons">
        <p>Solo presiona y ya estaras siguiendonos:</p>
        <div class="social-links">
            <a href="https://facebook.com/tu_pagina" target="_blank">
                <img src="imgen/icono-facebook-estilo-corte-papel-iconos-redes-sociales_505135-232-removebg-preview.png" alt="Facebook" class="social-icon">
            </a>
            <a href="https://wa.me/tunumero" target="_blank">
                <img src="imgen/diseno-iconos-whatsapp-redes-sociales-mensajeria_1303737-6449-removebg-preview.png" alt="WhatsApp" class="social-icon">
            </a>
            <a href="mailto:tu.correo@ejemplo.com">
                <img src="imgen/icono-gmail_1273375-1247-removebg-preview.png" alt="Email" class="social-icon">
            </a>
        </div>
    </div>
    </footer>
</body>
</html>