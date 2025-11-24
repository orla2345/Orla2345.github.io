<?php
include '../php/conexion.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    // Borramos el producto
    $sql = "DELETE FROM productos WHERE id_producto = '$id'"; 
    mysqli_query($con, $sql);
}

header("Location: productos.php");
?>