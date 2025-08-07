<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "credenciales_tesjo";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$carrera = $_POST['carrera'];
$vigencia = $_POST['vigencia'];
$nombre_foto = $_FILES['foto']['name'];
$tmp_foto = $_FILES['foto']['tmp_name'];

// Guardar la imagen en una carpeta
$ruta_destino = "fotos/" . $nombre_foto;
move_uploaded_file($tmp_foto, $ruta_destino);

// Insertar en la base de datos
$sql = "INSERT INTO credenciales (matricula, nombre, carrera, vigencia, nombre_foto) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $matricula, $nombre, $carrera, $vigencia, $nombre_foto);

if ($stmt->execute()) {
    echo "Credencial guardada correctamente.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
