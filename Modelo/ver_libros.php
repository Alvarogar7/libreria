<?php

include ("C:/wamp64/www/libreria/conexion/conexion.php");
include ("sentencias_sql.php");


if ($resultado_libro->num_rows > 0) {
echo "<center><h2>Libros</h2><br>";
echo "<table border=2 cellspacing='0' width='75%' ;>\n<tr>\n";
echo "<td><b>ID</b></td>\n<td><b>NOMBRE</b></td>\n<td><b>Nombre Libro</b></td>\n<td><b>Categoria</b></td>\n<td><b>Editorial</b></td>\n<td><b>Genero</b></td>\n<td><b>Idioma</b></td>\n<td><b>Facturar</b></td>\n";
    while($row = $resultado_libro->fetch_assoc()) {
    	echo "<tr>\n";
      echo "<td>" . $row["codigo_libro"] . "</td>";
      $id =  $row["codigo_libro"];
	    echo "<td>" . $row["nombre"] . "</td>";    	
    	echo "<td>" . $row["detalle_libro"] . "</td>";
      echo "<td>" . $row["detalle_categoria"] . "</td>";
      echo "<td>" . $row["nombre_editorial"] . "</td>";
      echo "<td>" . $row["detalle_genero"] . "</td>";
      echo "<td>" . $row["descripcion_idioma"] . "</td>";   
      echo "<td>" . "     <a href=\"Modelo\Agregar_temporal_libro.php?id=$id&&vista=1"."\">Agregar</a></td>";	
   	  echo "</tr>\n";   
    }

 	echo "<tr><td colspan='6'> Libros disponibles: $resultado_libro->num_rows</td></tr></table>";
} else {
    echo "No hay libros disponibles";
}

$conn->close();
?>