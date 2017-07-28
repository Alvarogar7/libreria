<?php
include ("sentencias_sql.php");
$dia= strip_tags($_POST['dia']);
$tipo_fecha= strip_tags($_POST['tipo_fecha']);
$tipo= strip_tags($_POST['tipo']);
$vista= strip_tags($_POST['vista']);
?>


<h2>
<?php if($vista==1){  ?>
<center><h2>Metodos minimos cuadrados</h2></center>
<?php } else {  ?>
<center><h2>Regresion Lineal</h2></center>
<?php } ?>
<div class="group"><center>
<form action="grafica.php" method="POST"><center>

<input type="hidden" name="vista"  value="<?php echo $vista; ?>" /> 
<input type="hidden" name="tipo"  value="<?php echo $tipo; ?>" /> 
<input type="hidden" name="tipo_fecha"  value="<?php echo $tipo_fecha; ?>" /> 
Ingrese años a estimar <input type="number" name="anios_estimar"  value="" required="" /> <br>

<?php if($tipo_fecha==2 or $tipo_fecha==3){  ?>
Mes:
<select name="subtipo_mes"> 
  <option value="1">Enero</option>
  <option value="2">Febrero</option>
  <option value="3">Marzo</option> 
  <option value="4">Abril</option>
  <option value="5">Mayo</option>
  <option value="6">Junio</option> 
  <option value="7">Julio</option>
  <option value="8">Agosto</option>
  <option value="9">Septiembre</option> 
  <option value="10">Octubre</option>
  <option value="11">Noviembre</option>
  <option value="12">Diciembre</option> 
</select> <br>  
<?php }

if ($tipo_fecha==3){
?>

Dia:
<select name="dia" id="dia" for="dia">
<?php
  for ($i=1; $i<=30; $i++) {
    ?>
      <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option> 
    
<?php } ?>

</select><br>

<?php  } ?>

<?php switch ($tipo) {
    case 1:
       break;
    case 2:  ?>
    <p> Categoria 
    <select name="categoria" size="0">
   <?php while($row = $resultado_categoria->fetch_assoc()) { ?> 
    <option value= "<?php echo $row["codigo_categoria"]; ?> ">  <?php echo $row["detalle_categoria"];  ?>
    <?php } ?></option></select></p> 
    <?php  break;     
    case 3:   ?>
     <p> Editorial
    <select name="editorial" size="0">
  <?php while($row = $resultado_editorial->fetch_assoc()) { ?> 
    <option value= "<?php echo $row["codigo_editorial"]; ?> ">  <?php echo $row["nombre_editorial"];  ?>
    <?php } ?></option></select></p> 
    <?php
    break;
    case 4: ?>
    <p> Genero literario
    <select name="genero" size="0">
  <?php while($row = $resultado_genero->fetch_assoc()) { ?> 
    <option value= "<?php echo $row["codigo_genero"]; ?> ">  <?php echo $row["detalle_genero"];  ?>
    <?php } ?></option></select></p> 
     <?php
    break;
    case 5:  ?>
    <p> Autor
    <select name="autor" size="0">
  <?php while($row = $resultado_autor->fetch_assoc()) { ?> 
    <option value= "<?php echo $row["codigo_autor"]; ?> ">  <?php echo $row["nombre"];  ?>
    <?php } ?></option></select></p> 
    <?php
    break;
   
}

?>

<p>
<input type="submit" name="boton1" class="button" id="boton1" value="Modelar"  />
<br>
</p>
</p>