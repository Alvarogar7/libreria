<?php

include ("C:/wamp64/www/libreria/conexion/conexion.php");
include ("sentencias_sql.php");
$agregar_fecha=0;


if ($resultado_temporal_factura->num_rows > 0) {
echo "<center><h2>Datos para facturar</h2><br>";
echo "<table border=2 cellspacing='0' width='75%' ;>\n<tr>\n";
echo "<td><b>codigo_libro</b></td>\n<td><b>Nombre del Libro</b></td>\n<td><b>Nombre Autor</b></td>\n<td><b>Precio</b></td>\n<td><b>Eliminar</b></td>\n";
    while($row = $resultado_temporal_factura->fetch_assoc()) {
      echo "<tr>\n";
      $serie = $row["serie"];
      echo "<td>" . $row["codigo_libro"] . "</td>";
      echo "<td>" . $row["nombre_libro"] . "</td>";
      echo "<td>" . $row["nombre_autor"] . "</td>";
      echo "<td>" . $row["precio"] . "</td>";   
      echo "<td>" . "<a href=\"Modelo/borrar_un_detalle.php?serie=$serie"."\">Borrar</a></td>";
      echo "</tr>\n";
      $agregar_fecha+=1;   
    }

  echo "<tr><td colspan='6'> Libros en total: $resultado_temporal_factura->num_rows</td></tr></table>";
} else {
    echo "No hay libros disponibles";
}


$conn->close();
if($agregar_fecha>=1){
?>
    <h2>
    <center><h7>Fecha de Factura</h7></center>
    <div class="group"><center>
    <form action="modelo/insertar_detalle.php" method="POST"><center>

    <p><label for="anio">AÑO </label>
    <input type="number"  name="anio" required>   </input> </p> 

    <p><label for="mes">MES </label>
    <input type="number"  name="mes" required>   </input> </p> 

     <p><label for="dia">DIA </label>
    <input type="number"  name="dia" required>   </input> </p> 
    
    <p>
    <input type="submit" name="boton1" class="button" id="boton1" value="Facturar"  />
    <br>
    </p>
    </p></center></form></center></div></h2>

 <?php  }  ?>   


