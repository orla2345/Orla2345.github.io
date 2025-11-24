<?php
session_start();
include 'conexion.php';

$id = $_SESSION['usuario_id'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

$sql = "UPDATE usuarios SET nombre='$nombre', telefono='$telefono', direccion_envio='$direccion' WHERE id_usuario='$id'";

if(mysqli_query($con, $sql)){
    // Actualizamos la variable de sesión por si cambió el nombre
    $_SESSION['usuario_nombre'] = $nombre;
    echo '<script>alert("Datos actualizados correctamente"); window.location="../perfil.php";</script>';
} else {
    echo "Error: " . mysqli_error($con);
}
?>