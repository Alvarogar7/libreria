<?php    
$vista = $_GET['vista'];

?>

<h2>
<?php if($vista==1){  ?>
<center><h2>Metodos minimos cuadrados</h2></center>
<?php } else {  ?>
<center><h2>Regresion Lineal</h2></center>
<?php } ?>
<div class="group"><center>
<form action="modelo.php" method="POST"><center>

 <input type="hidden" name="vista"  value="<?php echo $vista; ?>" /> 

<p>
<p><label for="anio_mes"> </label>
<div class="container">
    <div class="comboSelector">
    Modelo Por 
    <select name="tipo_fecha" id="tipo_fecha"">
      <option value="1">Año</option>
      <option value="2">Mes</option>
      <option value="3">Dia</option>
    </select>
    </div>
</div></p>

<p> Modelo por: 
  <select name="tipo" size="0">
    <option value="1">Todos</option>
    <option value="2">Categoria</option>  
    <option value="3">Editorial</option>
    <option value="4">Genero</option>  
    <option value="5">Autor</option>  
</select> </p>  
    
<p>
<input type="submit" name="boton1" class="button" id="boton1" value="Modelar"  />
<br>
</p>
</p>


      
  
	