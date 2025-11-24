<?php
include '../php/conexion.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = sha1($_POST['password']); // Encriptamos igual que en el registro
$rol = $_POST['rol'];

$sql = "INSERT INTO usuarios (nombre, email, password_hash, rol) VALUES ('$nombre', '$email', '$password', '$rol')";

if(mysqli_query($con, $sql)){
    header("Location: usuarios.php"); 
} else {
    echo "Error: " . mysqli_error($con);
}
?>