<?php
include ("C:/wamp64/www/libreria/conexion/conexion.php");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$vista= strip_tags($_POST['vista']);
echo "vista".$vista." ";
$tipo= strip_tags($_POST['tipo']);
echo "tipo".$tipo;
$tipo_fecha= strip_tags($_POST['tipo_fecha']);
echo "tipo_fecha".$tipo_fecha;
$anios_estimar= strip_tags($_POST['anios_estimar']);
echo "anios_estimar".$anios_estimar;
$dia= strip_tags($_POST['dia']);
echo "dia".$dia;
$subtipo_mes =  strip_tags($_POST['subtipo_mes']);
echo "subtipo_mes".$subtipo_mes;
$categoria =  strip_tags($_POST['categoria']);
echo "categoria".$categoria;
$editorial =  strip_tags($_POST['editorial']);
echo "editorial".$editorial;
$genero =  strip_tags($_POST['genero']);
echo "genero".$editorial;
$autor =  strip_tags($_POST['autor']);
echo "autor".$autor."<br>";

if($tipo_fecha==1){ //Esto es para anios
	if($tipo==1){ //Esto es para todos(genero, editorial, categoria, autor)
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio FROM detalle_factura GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";
		$resultado_temporal_factura = $conn->query($sql); 
		$variables_independientes=0;
		if ($resultado_temporal_factura->num_rows > 0) {
    	while($row = $resultado_temporal_factura->fetch_assoc()) {    
    	echo "año".$row["anio"]. "<br>" ;     
      	echo $row["total_anio"]. "<br>" ;      		
     	$x[$variables_independientes]=$row["total_anio"];
      	$cuenta_x[$variables_independientes]=$row["anio"];
      	$y[$variables_independientes]=$variables_independientes+1;
      	$variables_independientes=1+$variables_independientes;          
    	}
			}

 		 }

	if($tipo==2){ //Esto es para categoria
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio, c.detalle_categoria as detalle_categoria FROM detalle_factura df INNER JOIN libro l ON df.codigo_libro=l.codigo_libro INNER JOIN categoria c on c.codigo_categoria=$categoria and l.codigo_categoria= c.codigo_categoria GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";
		$resultado_temporal_factura = $conn->query($sql); 
		$variables_independientes=0;
		if ($resultado_temporal_factura->num_rows > 0) {
    	while($row = $resultado_temporal_factura->fetch_assoc()) {    
    	echo "año".$row["anio"]. "<br>" ;     
      	echo $row["total_anio"]. "<br>" ;      		
     	$x[$variables_independientes]=$row["total_anio"];
      	$cuenta_x[$variables_independientes]=$row["anio"];
      	$y[$variables_independientes]=$variables_independientes+1;
      	$variables_independientes=1+$variables_independientes; 
      	$var_nombre= $row["detalle_categoria"];        
    	}
			}
		$var_nombre=" categoria: ".$var_nombre;
	}

	if($tipo==3){ //Esto es para editorial
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio, e.nombre_editorial as nombre_editorial FROM detalle_factura df INNER JOIN libro l ON df.codigo_libro=l.codigo_libro INNER JOIN editorial e on e.codigo_editorial=$editorial and l.codigo_editorial=e.codigo_editorial GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";
		$resultado_temporal_factura = $conn->query($sql); 
		$variables_independientes=0;
		if ($resultado_temporal_factura->num_rows > 0) {
    	while($row = $resultado_temporal_factura->fetch_assoc()) {    
    	echo "año".$row["anio"]. "<br>" ;     
      	echo $row["total_anio"]. "<br>" ;      		
     	$x[$variables_independientes]=$row["total_anio"];
      	$cuenta_x[$variables_independientes]=$row["anio"];
      	$y[$variables_independientes]=$variables_independientes+1;
      	$variables_independientes=1+$variables_independientes; 
      	$var_nombre= $row["nombre_editorial"];        
    	}
			}
		$var_nombre=" editorial: ".$var_nombre;
	}

	if($tipo==4){ //Esto es para genero
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio, g.detalle_genero as nombre_genero FROM detalle_factura df INNER JOIN libro l ON df.codigo_libro=l.codigo_libro INNER JOIN genero g on g.codigo_genero=$genero and l.codigo_genero=g.codigo_genero GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";
		$resultado_temporal_factura = $conn->query($sql); 
		$variables_independientes=0;
		if ($resultado_temporal_factura->num_rows > 0) {
    	while($row = $resultado_temporal_factura->fetch_assoc()) {    
    	echo "año".$row["anio"]. "<br>" ;     
      	echo $row["total_anio"]. "<br>" ;      		
     	$x[$variables_independientes]=$row["total_anio"];
      	$cuenta_x[$variables_independientes]=$row["anio"];
      	$y[$variables_independientes]=$variables_independientes+1;
      	$variables_independientes=1+$variables_independientes; 
      	$var_nombre= $row["nombre_genero"];        
    	}
			}
		$var_nombre=" genero: ".$var_nombre;
	}

	if($tipo==5){ //Esto es para autor
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio, a.nombre as nombre_autor FROM detalle_factura df INNER JOIN libro l ON df.codigo_libro=l.codigo_libro INNER JOIN autor a on a.codigo_autor=$autor and l.codigo_autor=a.codigo_autor GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";
		$resultado_temporal_factura = $conn->query($sql); 
		$variables_independientes=0;
		if ($resultado_temporal_factura->num_rows > 0) {
    	while($row = $resultado_temporal_factura->fetch_assoc()) {    
    	echo "año".$row["anio"]. "<br>" ;     
      	echo $row["total_anio"]. "<br>" ;      		
     	$x[$variables_independientes]=$row["total_anio"];
      	$cuenta_x[$variables_independientes]=$row["anio"];
      	$y[$variables_independientes]=$variables_independientes+1;
      	$variables_independientes=1+$variables_independientes; 
      	$var_nombre= $row["nombre_autor"];        
    	}
			}
		$var_nombre=" autor: ".$var_nombre;
	}
}

if($tipo_fecha==2){// Esto es para meses
	if($tipo==1){ //Esto es para todos(genero, editorial, categoria, autor)
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio FROM detalle_factura where MONTH(fecha_detalle)= $subtipo_mes GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";
		$var_nombre=" del mes".$subtipo_mes;
		$resultado_temporal_factura = $conn->query($sql);  		
	}

	if($tipo==2){ //Esto es para categoria
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio, c.detalle_categoria as detalle_categoria FROM detalle_factura df INNER JOIN libro l ON df.codigo_libro=l.codigo_libro INNER JOIN categoria c on c.codigo_categoria=$categoria and l.codigo_categoria= c.codigo_categoria where MONTH(fecha_detalle)= $subtipo_mes GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";
		$resultado_temporal_factura = $conn->query($sql); 
		$variables_independientes=0;
		if ($resultado_temporal_factura->num_rows > 0) {
    	while($row = $resultado_temporal_factura->fetch_assoc()) {    
    	echo "año".$row["anio"]. "<br>" ;     
      	echo $row["total_anio"]. "<br>" ;      		
     	$x[$variables_independientes]=$row["total_anio"];
      	$cuenta_x[$variables_independientes]=$row["anio"];
      	$y[$variables_independientes]=$variables_independientes+1;
      	$variables_independientes=1+$variables_independientes; 
      	$var_nombre= $row["detalle_categoria"];        
    	}
			}
		$var_nombre=" categoria: ".$var_nombre. " del mes: ".$subtipo_mes;
	}

	if($tipo==3){ //Esto es para editorial
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio, e.nombre_editorial as nombre_editorial FROM detalle_factura df INNER JOIN libro l ON df.codigo_libro=l.codigo_libro INNER JOIN editorial e on e.codigo_editorial=$editorial and l.codigo_editorial=e.codigo_editorial where MONTH(fecha_detalle)= $subtipo_mes GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";
		$resultado_temporal_factura = $conn->query($sql); 
		$variables_independientes=0;
		if ($resultado_temporal_factura->num_rows > 0) {
    	while($row = $resultado_temporal_factura->fetch_assoc()) {    
    	echo "año".$row["anio"]. "<br>" ;     
      	echo $row["total_anio"]. "<br>" ;      		
     	$x[$variables_independientes]=$row["total_anio"];
      	$cuenta_x[$variables_independientes]=$row["anio"];
      	$y[$variables_independientes]=$variables_independientes+1;
      	$variables_independientes=1+$variables_independientes; 
      	$var_nombre= $row["nombre_editorial"];        
    	}
			}
		$var_nombre=" editorial: ".$var_nombre. " del mes: ".$subtipo_mes;
	}

	if($tipo==4){ //Esto es para genero
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio, g.detalle_genero as nombre_genero FROM detalle_factura df INNER JOIN libro l ON df.codigo_libro=l.codigo_libro INNER JOIN genero g on g.codigo_genero=$genero and l.codigo_genero=g.codigo_genero where MONTH(fecha_detalle)= $subtipo_mes GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";
		$resultado_temporal_factura = $conn->query($sql); 
		$variables_independientes=0;
		if ($resultado_temporal_factura->num_rows > 0) {
    	while($row = $resultado_temporal_factura->fetch_assoc()) {    
    	echo "año".$row["anio"]. "<br>" ;     
      	echo $row["total_anio"]. "<br>" ;      		
     	$x[$variables_independientes]=$row["total_anio"];
      	$cuenta_x[$variables_independientes]=$row["anio"];
      	$y[$variables_independientes]=$variables_independientes+1;
      	$variables_independientes=1+$variables_independientes; 
      	$var_nombre= $row["nombre_genero"];        
    	}
			}
		$var_nombre=" genero: ".$var_nombre. " del mes: ".$subtipo_mes;
	}

	if($tipo==5){ //Esto es para autor
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio, a.nombre as nombre_autor FROM detalle_factura df INNER JOIN libro l ON df.codigo_libro=l.codigo_libro  INNER JOIN autor a on a.codigo_autor=$autor and l.codigo_autor=a.codigo_autor where MONTH(fecha_detalle)= $subtipo_mes GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";
		$resultado_temporal_factura = $conn->query($sql); 
		$variables_independientes=0;
		if ($resultado_temporal_factura->num_rows > 0) {
    	while($row = $resultado_temporal_factura->fetch_assoc()) {    
    	echo "año".$row["anio"]. "<br>" ;     
      	echo $row["total_anio"]. "<br>" ;      		
     	$x[$variables_independientes]=$row["total_anio"];
      	$cuenta_x[$variables_independientes]=$row["anio"];
      	$y[$variables_independientes]=$variables_independientes+1;
      	$variables_independientes=1+$variables_independientes; 
      	$var_nombre= $row["nombre_autor"];        
    	}
			}
		$var_nombre=" autor: ".$var_nombre. " del mes: ".$subtipo_mes;
	}
	
}

if($tipo_fecha==3){// Esto es para dias	
	if($tipo==1){ //Esto es para todos(genero, editorial, categoria, autor)
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio FROM detalle_factura where MONTH(fecha_detalle)= $subtipo_mes and DAY(fecha_detalle)=$dia GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";		
		$resultado_temporal_factura = $conn->query($sql); 
    $variables_independientes=0;
    if ($resultado_temporal_factura->num_rows > 0) {
      while($row = $resultado_temporal_factura->fetch_assoc()) {    
      echo "año".$row["anio"]. "<br>" ;     
        echo $row["total_anio"]. "<br>" ;         
      $x[$variables_independientes]=$row["total_anio"];
        $cuenta_x[$variables_independientes]=$row["anio"];
        $y[$variables_independientes]=$variables_independientes+1;
        $variables_independientes=1+$variables_independientes; 
        $var_nombre= $row["detalle_categoria"];        
      }
      }
      $var_nombre=" del mes: ".$subtipo_mes." dia: ". $dia;
	}

	if($tipo==2){ //Esto es para categoria
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio, c.detalle_categoria as detalle_categoria FROM detalle_factura df INNER JOIN libro l ON df.codigo_libro=l.codigo_libro INNER JOIN categoria c on c.codigo_categoria=$categoria and l.codigo_categoria= c.codigo_categoria where MONTH(fecha_detalle)= $subtipo_mes and DAY(fecha_detalle)=$dia GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";
		$resultado_temporal_factura = $conn->query($sql); 
		$variables_independientes=0;
		if ($resultado_temporal_factura->num_rows > 0) {
    	while($row = $resultado_temporal_factura->fetch_assoc()) {    
    	echo "año".$row["anio"]. "<br>" ;     
      	echo $row["total_anio"]. "<br>" ;      		
     	$x[$variables_independientes]=$row["total_anio"];
      	$cuenta_x[$variables_independientes]=$row["anio"];
      	$y[$variables_independientes]=$variables_independientes+1;
      	$variables_independientes=1+$variables_independientes; 
      	$var_nombre= $row["detalle_categoria"];        
    	}
			}
		$var_nombre=" categoria: ".$var_nombre. " del mes: ".$subtipo_mes. " dia: ". $dia;
	}

	if($tipo==3){ //Esto es para editorial
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio, e.nombre_editorial as nombre_editorial FROM detalle_factura df INNER JOIN libro l ON df.codigo_libro=l.codigo_libro INNER JOIN editorial e on e.codigo_editorial=$editorial and l.codigo_editorial=e.codigo_editorial where MONTH(fecha_detalle)= $subtipo_mes and DAY(fecha_detalle)=$dia GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";
		$resultado_temporal_factura = $conn->query($sql); 
		$variables_independientes=0;
		if ($resultado_temporal_factura->num_rows > 0) {
    	while($row = $resultado_temporal_factura->fetch_assoc()) {    
    	echo "año".$row["anio"]. "<br>" ;     
      	echo $row["total_anio"]. "<br>" ;      		
     	$x[$variables_independientes]=$row["total_anio"];
      	$cuenta_x[$variables_independientes]=$row["anio"];
      	$y[$variables_independientes]=$variables_independientes+1;
      	$variables_independientes=1+$variables_independientes; 
      	$var_nombre= $row["nombre_editorial"];        
    	}
			}
		$var_nombre=" editorial: ".$var_nombre. " del mes: ".$subtipo_mes. " dia: ". $dia;
	}

	if($tipo==4){ //Esto es para genero
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio, g.detalle_genero as nombre_genero FROM detalle_factura df INNER JOIN libro l ON df.codigo_libro=l.codigo_libro INNER JOIN genero g on g.codigo_genero=$genero and l.codigo_genero=g.codigo_genero where MONTH(fecha_detalle)= $subtipo_mes and DAY(fecha_detalle)=$dia
		GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";
		$resultado_temporal_factura = $conn->query($sql); 
		$variables_independientes=0;
		if ($resultado_temporal_factura->num_rows > 0) {
    	while($row = $resultado_temporal_factura->fetch_assoc()) {    
    	echo "año".$row["anio"]. "<br>" ;     
      	echo $row["total_anio"]. "<br>" ;      		
     	$x[$variables_independientes]=$row["total_anio"];
      	$cuenta_x[$variables_independientes]=$row["anio"];
      	$y[$variables_independientes]=$variables_independientes+1;
      	$variables_independientes=1+$variables_independientes; 
      	$var_nombre= $row["nombre_genero"];        
    	}
			}
		$var_nombre=" genero: ".$var_nombre. " del mes: ".$subtipo_mes. " dia: ". $dia;
	}

	if($tipo==5){ //Esto es para autor
		$sql = "SELECT YEAR(fecha_detalle) as anio, SUM(Total) AS total_anio, a.nombre as nombre_autor FROM detalle_factura df INNER JOIN libro l ON df.codigo_libro=l.codigo_libro  INNER JOIN autor a on a.codigo_autor=$autor and l.codigo_autor=a.codigo_autor where MONTH(fecha_detalle)= $subtipo_mes and DAY(fecha_detalle)=$dia GROUP BY YEAR(fecha_detalle) ORDER BY YEAR(fecha_detalle)";
		$resultado_temporal_factura = $conn->query($sql); 
		$variables_independientes=0;
		if ($resultado_temporal_factura->num_rows > 0) {
    	while($row = $resultado_temporal_factura->fetch_assoc()) {    
    	echo "año".$row["anio"]. "<br>" ;     
      	echo $row["total_anio"]. "<br>" ;      		
     	$x[$variables_independientes]=$row["total_anio"];
      	$cuenta_x[$variables_independientes]=$row["anio"];
      	$y[$variables_independientes]=$variables_independientes+1;
      	$variables_independientes=1+$variables_independientes; 
      	$var_nombre= $row["nombre_autor"];        
    	}
			}
		$var_nombre=" autor: ".$var_nombre. " del mes: ".$subtipo_mes. " dia: ". $dia;

	}	
}




if ($resultado_temporal_factura->num_rows > 1) {
   include ("modelo/sumas_para_operaciones.php");
}
 else {
    	echo "No existen datos suficientes";
		}


?>