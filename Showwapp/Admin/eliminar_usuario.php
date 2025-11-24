<?php
include '../php/conexion.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
   
    $sql = "DELETE FROM usuarios WHERE id_usuario = $id";
    mysqli_query($con, $sql);
}

header("Location: usuarios.php");
?>