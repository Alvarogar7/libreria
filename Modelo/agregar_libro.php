<?php

include ("sentencias_sql.php");
?>


<h2>
<center><h2>Formulario de Registro</h2></center>
<div class="group"><center>
<form action="modelo/ingresar_libro.php" method="POST"><center>

	<p><label for="codigo_autor"> Codigo_autor </label>
	<input type="text" readonly name="codigo_autor" 
	<option value= "<?php echo "$id"?> "> 	
	</option></p>

	<p><label for="nombre_autor">Nombre Autor </label>
	<input type="text" readonly name="id" 
	<option value= "<?php echo "$nombre"?> "> 	
	</option></p>

	<p><label for="detalle">Ingrese Nombre Libro </label>
	<input type="text"  name="detalle" required> 	</input> </p> 

	<p><label for="anio">Año publicacion </label>
	<input type="text"  name="anio" required> 	</input> </p> 
 
 	<p> Categoria 
    <select name="categoria" size="0">
	<?php while($row = $resultado_categoria->fetch_assoc()) { ?> 
    <option value= "<?php echo $row["codigo_categoria"] ?> ">  <?php echo $row["detalle_categoria"]  ?>
    <?php } ?></option></select></p> 

    <p> Editorial
    <select name="editorial" size="0">
	<?php while($row = $resultado_editorial->fetch_assoc()) { ?> 
    <option value= "<?php echo $row["codigo_editorial"] ?> ">  <?php echo $row["nombre_editorial"]  ?>
    <?php } ?></option></select></p> 

    <p> Genero literario
    <select name="genero" size="0">
	<?php while($row = $resultado_genero->fetch_assoc()) { ?> 
    <option value= "<?php echo $row["codigo_genero"] ?> ">  <?php echo $row["detalle_genero"]  ?>
    <?php } ?></option></select></p> 

        <p> Idioma
    <select name="idioma" size="0">
	<?php while($row = $resultado_idioma->fetch_assoc()) { ?> 
    <option value= "<?php echo $row["codigo_idioma"] ?> ">  <?php echo $row["descripcion_idioma"]  ?>
    <?php } ?></option></select></p> 

    <p><label for="precio">Precio </label>
    <input type="number"  name="precio" required>   </input> </p> 
    
    <p>
    <input type="submit" name="boton1" class="button" id="boton1" value="GUARDAR"  />
    <br>
    </p>
    </p>
      
    <?php
 	$conn->close();
?>
				
                



