<?php
$datos  = explode(",",$_GET['datos']);
$servername = "localhost";
$username = "root";
$password = "jackcloudman";
$dbname = "escuela";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `Alumno_Materias`(`Alumno_Materias_ID`, `Materia_id`, `Usuario_id`, `Ciclo_escolar`, `Recurse`, `Turno`) VALUES (".$datos[0].",".$datos[1].",".$datos[2].",".$datos[3].",".$datos[4].",".$datos[5].") ";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
