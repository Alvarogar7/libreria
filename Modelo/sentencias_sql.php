<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include ("C:/wamp64/www/libreria/conexion/conexion.php");
$id = $_GET['id'];
$nombre = $_GET['nombre'];

$sql = "SELECT * FROM categoria ";
$resultado_categoria = $conn->query($sql );

$sql = "SELECT * FROM editorial ";
$resultado_editorial = $conn->query($sql );

$sql = "SELECT * FROM genero ";
$resultado_genero = $conn->query($sql );

$sql = "SELECT * FROM idioma ";
$resultado_idioma = $conn->query($sql );

$sql = "SELECT * FROM autor ";
$resultado_autor = $conn->query($sql );

$sql = "SELECT a.codigo_autor, a.nombre, l.codigo_libro, l.detalle_libro, c.detalle_categoria, e.nombre_editorial, g.detalle_genero, i.descripcion_idioma
FROM libro l
INNER JOIN autor a ON l.codigo_autor = a.codigo_autor
INNER JOIN categoria c ON l.codigo_categoria = c.codigo_categoria
INNER JOIN editorial e ON l.codigo_editorial = e.codigo_editorial
INNER JOIN genero g ON g.codigo_genero = l.codigo_genero
INNER JOIN idioma i ON l.codigo_idioma = i.codigo_idioma  
WHERE a.codigo_autor = '$id'
ORDER BY `l`.`codigo_libro` ASC";
$resultado_libro = $conn->query($sql);

$sql = "SELECT l.codigo_libro, l.detalle_libro, a.nombre, a.codigo_autor, l.precio from libro l INNER JOIN autor a on l.codigo_autor = a.codigo_autor where l.codigo_libro = '$id' ORDER BY `l`.`codigo_libro` ASC ";
$resultado_para_guardar_libro = $conn->query($sql);

$sql = "SELECT * FROM `temporal_detalle_factura` ORDER BY `temporal_detalle_factura`.`codigo_libro` ASC  ";
$resultado_temporal_factura = $conn->query($sql);

?> 