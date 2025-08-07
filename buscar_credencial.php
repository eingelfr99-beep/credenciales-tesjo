<?php
header('Content-Type: application/json');

// Conexión a la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$db = "credenciales_tesjo";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  echo json_encode(["error" => "Error de conexión a la base de datos"]);
  exit();
}

// Obtener matrícula
$matricula = $_GET['matricula'] ?? '';
$matricula = $conn->real_escape_string($matricula);

// Buscar en la base de datos
$sql = "SELECT matricula, nombre, carrera, vigencia, nombre_foto FROM credenciales WHERE matricula = '$matricula'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo json_encode($row);
} else {
  echo json_encode(["error" => "No se encontró la credencial"]);
}

$conn->close();
?>
