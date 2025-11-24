<?php
include '../php/conexion.php';

$promo1 = $_POST['promo1'];
$promo2 = $_POST['promo2'];


$sql = "UPDATE configuracion SET promo_linea1 = '$promo1', promo_linea2 = '$promo2' WHERE id = 1";

if(mysqli_query($con, $sql)){
  
    echo '<script>alert("¡Configuración actualizada!"); window.location="configuracion.php";</script>';
} else {
    echo "Error: " . mysqli_error($con);
}
?>