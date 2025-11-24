<?php
session_start();
include "conexion.php";

// Recibir datos
$email = mysqli_real_escape_string($con, $_POST['txtemail']);
$password = sha1($_POST['txtpass']); 

// Buscar usuario
$sql = "SELECT * FROM usuarios WHERE email ='$email' AND password_hash ='$password'";
$res = $con->query($sql);

if (mysqli_num_rows($res) > 0){
    $fila = mysqli_fetch_array($res);
    
    // Guardar sesión
    $_SESSION['usuario_id'] = $fila['id_usuario'];
    $_SESSION['usuario_nombre'] = $fila['nombre'];
    $_SESSION['usuario_rol'] = $fila['rol']; 

    // REDIRECCIÓN
    if($fila['rol'] == 'admin'){
        header("Location: ../Admin/index.php"); 
    } else {
        header("Location: ../dashboard.php");   
    }
    
} else {
    echo '
        <script>
            alert("Correo o contraseña incorrectos");
            window.location = "../login.php";
        </script>
    ';
}
?>