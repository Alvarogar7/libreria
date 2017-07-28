
<?php 
$ingreso_de_anio=$anios_estimar;
$sumax=0;
$sumay=0;
$sumaxy=0;
$sumaxx=0;
$contador = 0;

foreach($x as $k => $v)
{
echo "[".$v.",".$y[$contador]."]".","." ";
$xy[$contador]=$x[$contador]*$y[$contador];
$xx[$contador]=$x[$contador]*$x[$contador];
echo $cuenta_x[$contador];
$sumax= $x[$contador]+$sumax;
$sumay= $y[$contador]+$sumay;
$sumaxy=$xy[$contador]+$sumaxy;
$sumaxx=$xx[$contador]+$sumaxx;
echo $cuenta_x[$contador];
settype($cuenta_x[$contador], "integer");
$final_fecha=$cuenta_x[$contador]+$ingreso_de_anio;
$contador = 1+$contador;
}
echo $sumax." sumax ";
echo $sumay." ";
echo $sumaxy." ";
echo $sumaxx." ";
echo $contador." contador ";


include ("modelo/operacion_minimo.php");
?>

	
	

