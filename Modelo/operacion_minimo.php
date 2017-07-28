<?php 
$m= ($sumaxy-($sumay*$sumax)/$contador)/($sumaxx-(($sumax*$sumax)/$contador));
echo $m. " MSss ";
$b= ($sumay/$contador)-$m*($sumax/$contador);
echo $b." bbb";

$incognitaX= (($ingreso_de_anio+$contador)-$b)/$m;
$incognitaX_CERO= (0-$b)/$m;
$incognitaX_CERO = number_format($incognitaX_CERO, 2, '.', '');
$incognitaX = number_format($incognitaX, 2, '.', '');
echo "<br>".$incognitaX;
$conn->close();
?>

 <?php  include ("modelo/grafica.php");  ?>