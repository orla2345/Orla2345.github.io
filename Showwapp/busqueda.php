<?php
    session_start();
    include 'php/conexion.php';

    // Recibir lo que escribieron
    if(isset($_GET['q'])){
        $busqueda = mysqli_real_escape_string($con, $_GET['q']);
        
        // Consulta inteligente: Busca en el Nombre O en el Subtítulo
        $sql = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%' OR subtitulo LIKE '%$busqueda%'";
        $resultado = $con->query($sql);
        $numero_resultados = mysqli_num_rows($resultado);
    } else {
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados: <?php echo $busqueda; ?> - SHOPWAPP</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Ajustes pequeños para esta página */
        .search-header { text-align: center; margin: 40px 0; color: white; }
        .search-header h1 { font-size: 2.5em; }
        .search-header span { color: #cc0000; }
        .no-results { text-align: center; color: #888; margin-top: 50px; font-size: 1.2em; min-height: 40vh;}
    </style>
</head>
<body>
    <div class="background-wrap">
        
        <header class="main-header glass-header">
            <div class="header-left">
                <a href="index.php" style="text-decoration:none;"><div class="logo">SHOPWAPP <span style="color:#cc0000;">*</span></div></a>
            </div>
            <div class="header-center">
                <form action="busqueda.php" method="GET" class="search-bar-container">
                    <input type="text" name="q" value="<?php echo $busqueda; ?>" placeholder="Buscar...">
                    <button type="submit" class="search-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
                </form>
            </div>
            <nav class="header-right">
                <a href="index.php" class="nav-item">Volver al Inicio</a>
            </nav>
        </header>

        <div class="search-header">
            <h1>Resultados para: "<span><?php echo $busqueda; ?></span>"</h1>
            <p><?php echo $numero_resultados; ?> coincidencias encontradas</p>
        </div>

        <main>
            <div class="products-grid">
                <?php 
                if($numero_resultados > 0){
                    while($fila = mysqli_fetch_assoc($resultado)){ 
                ?>
                    
                    <div class="product-item">
                        <img src="<?php echo $fila['url_imagen_principal']; ?>" alt="<?php echo $fila['nombre']; ?>">
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
                } else {
                    echo "<div class='no-results'>
                            <p>Ups, no encontramos nada con ese nombre.</p>
                            <a href='index.php' style='color:#cc0000; text-decoration:underline;'>Ver todos los productos</a>
                          </div>";
                }
                ?>
            </div>
        </main>
        
    </div>
</body>
</html>