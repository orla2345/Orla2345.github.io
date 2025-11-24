<?php
include '../php/conexion.php';

// 1. Recibir Datos
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
function limpiarTexto($texto) {
    if (empty($texto)) return "Pendiente.";
    // 1. Escapar caracteres raros para seguridad
    $texto = htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
    // 2. Convertir los "Enter" del teclado en etiquetas <br>
    return nl2br($texto);
}

// RECIBIMOS LOS DATOS USANDO LA FUNCIÓN
$subtitulo = !empty($_POST['subtitulo']) ? $_POST['subtitulo'] : "Increíble smartphone.";
// Aquí aplicamos la magia:
$caracteristicas = limpiarTexto($_POST['caracteristicas']);
$especificaciones = limpiarTexto($_POST['especificaciones']);
$software = limpiarTexto($_POST['software']);

// 2. Procesar Imagen
$nombre_imagen = $_FILES['imagen']['name'];
$temporal = $_FILES['imagen']['tmp_name'];
$carpeta = "../imgen"; 
$ruta = "imgen/" . $nombre_imagen; 

move_uploaded_file($temporal, $carpeta . "/" . $nombre_imagen);

// 3. INSERTAR (Ya borramos url_pagina de aquí)
// La base de datos pondrá 'sugerencia.html' por defecto, pero ya no nos importa porque no lo usamos.
$sql = "INSERT INTO productos 
(nombre, precio, url_imagen_principal, subtitulo, caracteristicas, especificaciones, software) 
VALUES 
('$nombre', '$precio', '$ruta', '$subtitulo', '$caracteristicas', '$especificaciones', '$software')";

if(mysqli_query($con, $sql)){
    header("Location: productos.php");
} else {
    echo "Error: " . mysqli_error($con);
}
?>