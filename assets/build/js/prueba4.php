<?php
$servername = "localhost";
$username = "root";
$password = "2016630398";
$dbname = "escuela";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT count(*) FROM Alumno_Materias";
$result = mysqli_query($conn, $sql);
$Materias = array();


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
                 $ID =  $row["count(*)"];
  }
  echo $ID;
} else {       
  echo "0 results";
}

mysqli_close($conn);
?>
