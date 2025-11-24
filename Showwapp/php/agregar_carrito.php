<?php
session_start();

if(isset($_POST['id_producto'])){
    
    $id = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    // Ahora recibimos la cantidad del formulario, si no viene, es 1
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 1;
    $stock_max = $_POST['stock_max'];

    // Crear el carrito si no existe
    if(!isset($_SESSION['carrito'])){
        $_SESSION['carrito'] = array();
    }

    // LÓGICA DE AGRUPAMIENTO
    $encontrado = false;
    
    // Recorremos el carrito para ver si ya existe el producto
    foreach($_SESSION['carrito'] as $indice => $producto){
        if($producto['id'] == $id){
            // Si existe, le sumamos la nueva cantidad
            $nueva_cantidad = $producto['cantidad'] + $cantidad;
            
            // Validar que no supere el stock
            if($nueva_cantidad <= $stock_max){
                $_SESSION['carrito'][$indice]['cantidad'] = $nueva_cantidad;
            } else {
                $_SESSION['carrito'][$indice]['cantidad'] = $stock_max; // Topeamos al stock
            }
            
            $encontrado = true;
            break;
        }
    }

    // Si no estaba en el carrito, lo agregamos nuevo
    if(!$encontrado){
        $producto_nuevo = array(
            'id' => $id,
            'nombre' => $nombre,
            'precio' => $precio,
            'imagen' => $imagen,
            'cantidad' => $cantidad,
            'stock_max' => $stock_max
        );
        array_push($_SESSION['carrito'], $producto_nuevo);
    }

    // Regresamos a la página anterior
    echo "<script>window.history.back();</script>";

} else {
    header("Location: ../index.php");
}
?>