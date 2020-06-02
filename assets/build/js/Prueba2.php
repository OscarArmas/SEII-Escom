<?php
$mysqli = new mysqli("localhost", "root", "2016630398", "escuela");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "INSERT INTO `alumno_materias`(`Materia_id`, `Usuario_id`, `Turno`, `Recurse`) VALUES (?,?,?,?)";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("iisi", $_GET['K'], $_GET['J'], $_GET['R'], $_GET['V']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($Res,$Res1,$Res2);
$stmt->fetch();
$stmt->close();
echo "Insert Correct";
?>