<?php

    include 'conexion.php';

    // Recibir datos del formulario
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    
    // Encriptar la contraseña (usamos SHA1 para coincidir con tu Login actual)
    $contrasena_encriptada = sha1($contrasena);

    // Consulta para insertar
    $query = "INSERT INTO usuarios(nombre, email, password_hash) 
              VALUES('$nombre_completo', '$correo', '$contrasena_encriptada')";

    // Verificar que el correo no se repita
    $verificar_correo = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$correo'");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya está registrado, intenta con otro");
                window.location = "../registro.php";
            </script>
        ';
        exit();
    }

    // Ejecutar la inserción
    $ejecutar = mysqli_query($con, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario registrado exitosamente");
                window.location = "../login.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Inténtalo de nuevo, usuario no almacenado");
                window.location = "../registro.php";
            </script>
        ';
    }

    mysqli_close($con);
?>