<?php
$servername = "localhost";
$username = "root";
$password = "jackcloudman";
$dbname = "escuela";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->set_charset("ISO-8859-1");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Materia_ID, Nombre, Nivel, Carrera_ID FROM Materia";
$result = mysqli_query($conn, $sql);
$Materias = array();


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      $materia = array( $row["Materia_ID"],mb_convert_encoding($row["Nombre"],"UTF-8","iso-8859-1"),$row["Nivel"],$row["Carrera_ID"]);
      array_push($Materias,$materia);
  }
  echo json_encode($Materias);
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
