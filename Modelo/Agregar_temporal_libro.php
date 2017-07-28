<?php
include ("C:/wamp64/www/libreria/conexion/conexion.php");
include ("sentencias_sql.php");

if ($resultado_para_guardar_libro->num_rows > 0) {
    while($row = $resultado_para_guardar_libro->fetch_assoc()) {
      $codigo_libro= $row["codigo_libro"];
      $detalle_libro= $row["detalle_libro"];
      $codigo_autor= $row["codigo_autor"];
      $nombre_autor= $row["nombre"];
      $precio= $row["precio"];
      } 
} else {
    echo "No se guardo";}


$sql = "INSERT INTO temporal_detalle_factura (codigo_libro, nombre_libro, nombre_autor, precio)
VALUES ('$codigo_libro', '$detalle_libro', '$nombre_autor', '$precio')";
if ($conn->query($sql) === TRUE) {
 echo "Ingresado correctamente para comprar";
} else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
echo "<meta http-equiv='refresh' content='1;URL= ../inventario.php?vista=1&&id=$codigo_autor' />";


?>

