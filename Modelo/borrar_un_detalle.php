<?php

include ("C:/wamp64/www/libreria/conexion/conexion.php");

$serie = $_GET['serie'];
echo $serie;
$sql = "DELETE FROM `temporal_detalle_factura` WHERE serie ='$serie'";

if ($conn->query($sql) === TRUE) {
 echo "Borrado exitosamente";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: ../vender.php');
?>