<?php

include ("C:/wamp64/www/libreria/conexion/conexion.php");
include ("sentencias_sql.php");
$anio = strip_tags($_POST['anio']);
echo $anio;
$mes= strip_tags($_POST['mes']);
echo $mes;
$dia= strip_tags($_POST['dia']);
echo $dia;
$fecha=$anio ."-". $mes."-". $dia;
echo $fecha;

if ($resultado_temporal_factura->num_rows > 0) {

    while($row = $resultado_temporal_factura->fetch_assoc()) {      
     
      echo "<td>" . $row["codigo_libro"] . "</td>";
      echo "<td>" . $row["nombre_libro"] . "</td>";
      echo "<td>" . $row["nombre_autor"] . "</td>";
      echo "<td>" . $row["precio"] . "</td>";  
      $precio =  $row["precio"]; 
      $codigo_libro=$row["codigo_libro"];
      $sql = "INSERT INTO detalle_factura (total, codigo_libro, fecha_detalle) VALUES ('$precio', '$codigo_libro', '$fecha')";

		if ($conn->query($sql) === TRUE) {
    	echo "Ingreso Correctamente";
		} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
		}      
    
    }
 
} else {
    echo "No hay libros disponibles";
}

$sql = "DELETE FROM `temporal_detalle_factura`";

if ($conn->query($sql) === TRUE) {
 echo "Borrado exitosamente";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
header('Location: ../vender.php');
?>