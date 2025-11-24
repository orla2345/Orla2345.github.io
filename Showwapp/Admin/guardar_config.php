<?php
include '../php/conexion.php';

$promo1 = $_POST['promo1'];
$promo2 = $_POST['promo2'];

// Actualizamos la fila con ID 1 (que es la única que tenemos para config)
$sql = "UPDATE configuracion SET promo_linea1 = '$promo1', promo_linea2 = '$promo2' WHERE id = 1";

if(mysqli_query($con, $sql)){
    // Si sale bien, regresamos a la misma página
    echo '<script>alert("¡Configuración actualizada!"); window.location="configuracion.php";</script>';
} else {
    echo "Error: " . mysqli_error($con);
}
?>