<?php

include ("C:/wamp64/www/libreria/conexion/conexion.php");

$sql = "SELECT * FROM autor";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<center><h2>Autores disponibles</h2><br>";
echo "<table border=2 cellspacing='0' width='75%' ;>\n<tr>\n";
echo "<td><b>ID</b></td>\n<td><b>NOMBRES</b></td>\n<td><b>Numeros de premios</b></td>\n<td><b>Ingresar Libros</b></td>\n<td><b>Ver Libros</b></td>\n";
    while($row = $result->fetch_assoc()) {
    	echo "<tr>\n";
	    echo "<td>" . $row["codigo_autor"] . "</td>";
    	echo "<td>" . $row["nombre"] . "</td>";
    	echo "<td>" . $row["numero_premios"] . "</td>";
      $id=  $row["codigo_autor"];
      $nombre=$row["nombre"];
   		echo "<td>" . "     <a href=\"inventario.php?id=$id&&vista=2&&nombre=$nombre"."\">Ingresar Libros</a></td>";
      echo "<td>" . "     <a href=\"inventario.php?id=$id&&vista=1"."\">Ver Libros</a></td>";
   	    echo "</tr>\n";   
    }

 	echo "<tr><td colspan='6'> Autores disponibles: $result->num_rows</td></tr></table>";
} else {
    echo "No hay libros disponibles";
}

$conn->close();
?>