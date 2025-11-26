<?php
include '../php/conexion.php';


$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
function limpiarTexto($texto) {
    if (empty($texto)) return "Pendiente.";
    $texto = htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
    
    return nl2br($texto);
}


$subtitulo = !empty($_POST['subtitulo']) ? $_POST['subtitulo'] : "Increíble smartphone.";

$caracteristicas = limpiarTexto($_POST['caracteristicas']);
$especificaciones = limpiarTexto($_POST['especificaciones']);
$software = limpiarTexto($_POST['software']);


$nombre_imagen = $_FILES['imagen']['name'];
$temporal = $_FILES['imagen']['tmp_name'];
$carpeta = "../imgen"; 
$ruta = "imgen/" . $nombre_imagen; 

move_uploaded_file($temporal, $carpeta . "/" . $nombre_imagen);




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