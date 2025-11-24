<?php
session_start();

if(isset($_GET['id'])){
    $id_a_borrar = $_GET['id'];

    // Recorremos el carrito buscando el ID para sacarlo
    foreach($_SESSION['carrito'] as $indice => $producto){
        if($producto['id'] == $id_a_borrar){
            unset($_SESSION['carrito'][$indice]);
            // Reordenamos el array para que no queden huecos
            $_SESSION['carrito'] = array_values($_SESSION['carrito']);
            break;
        }
    }
}

header("Location: ../carrito.php");
?>