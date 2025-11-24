<?php
include '../php/conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$subtitulo = $_POST['subtitulo'];


function limpiarTexto($texto) {
    return nl2br(htmlspecialchars($texto, ENT_QUOTES, 'UTF-8'));
}

$caracteristicas = limpiarTexto($_POST['caracteristicas']);
$especificaciones = limpiarTexto($_POST['especificaciones']);
$software = limpiarTexto($_POST['software']);

// LÓGICA DE LA IMAGEN
if (!empty($_FILES['imagen']['name'])) {
    
    $nombre_imagen = $_FILES['imagen']['name'];
    $temporal = $_FILES['imagen']['tmp_name'];
    $carpeta = "../imgen";
    $ruta = "imgen/" . $nombre_imagen;
    
    move_uploaded_file($temporal, $carpeta . "/" . $nombre_imagen);
    
    
    $sql = "UPDATE productos SET 
            nombre='$nombre', precio='$precio', subtitulo='$subtitulo', 
            caracteristicas='$caracteristicas', especificaciones='$especificaciones', software='$software',
            url_imagen_principal='$ruta'
            WHERE id_producto='$id'";
} else {
   
    $sql = "UPDATE productos SET 
            nombre='$nombre', precio='$precio', subtitulo='$subtitulo', 
            caracteristicas='$caracteristicas', especificaciones='$especificaciones', software='$software'
            WHERE id_producto='$id'";
}

if(mysqli_query($con, $sql)){
    echo '<script>alert("Producto actualizado correctamente"); window.location="productos.php";</script>';
} else {
    echo "Error: " . mysqli_error($con);
}
?>