<?php
session_start(); // IMPORTANTE: Iniciar sesión para guardar datos del usuario
include "./conexion.php";

if(isset($_POST['txtemail']) && isset($_POST['txtpass'])){
    
    $email = $con->real_escape_string($_POST['txtemail']); // Limpieza básica
    $password = sha1($_POST['txtpass']); // Usamos SHA1 como en tu código

    // Consulta SQL adaptada a nuestra tabla 'usuarios'
    $sql = "SELECT * FROM `usuarios` WHERE email ='$email' AND password_hash ='$password'";
    
    $res = $con->query($sql) or die($con->error);

    if (mysqli_num_rows($res) > 0){
        // Si las credenciales son correctas:
        $fila = mysqli_fetch_array($res);
        
        // Guardamos datos en la sesión para usarlos en otras páginas
        $_SESSION['usuario_id'] = $fila['id_usuario'];
        $_SESSION['usuario_nombre'] = $fila['nombre'];
        
        // Redirigir al dashboard o página principal
        header("Location: ../showapp.html"); 
        // NOTA: Si tienes un 'dash.php' cámbialo por 'header("Location: ../dash.php");'
        
    } else {
        // Si falla: Redirigir al login con un error (opcional: usar variable GET)
        echo "<script>alert('Credenciales incorrectas'); window.location.href='../login.php';</script>";
    }

} else {
    // Si faltan campos
    echo "<script>alert('Por favor llene todos los campos'); window.location.href='../login.php';</script>";
}
?>