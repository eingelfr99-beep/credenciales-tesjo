<?php
header('Content-Type: application/json');

$host = "localhost";
$user = "root";
$pass = "";
$db = "credenciales_tesjo";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  echo json_encode(["error" => "Conexión fallida"]);
  exit();
}

$matricula = $_GET['matricula'];

$sql = "SELECT * FROM credenciales WHERE matricula = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $matricula);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  // Convertir la foto BLOB a base64
  $fotoBase64 = base64_encode($row['foto']);
  $fotoDataUrl = 'data:image/jpeg;base64,' . $fotoBase64;

  echo json_encode([
    "nombre" => $row['nombre'],
    "carrera" => $row['carrera'],
    "vigencia" => $row['vigencia'],
    "foto" => $fotoDataUrl
  ]);
} else {
  echo json_encode(["error" => "No se encontró la credencial"]);
}

$conn->close();
?>
