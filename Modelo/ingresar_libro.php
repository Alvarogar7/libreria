<?php

include ("C:/wamp64/www/libreria/conexion/conexion.php");

$codigo_autor = strip_tags($_POST['codigo_autor']);
echo $codigo_autor;
$detalle = strip_tags($_POST['detalle']);
echo $detalle;
$categoria = strip_tags($_POST['categoria']);
echo $categoria;
$editorial = strip_tags($_POST['editorial']);
echo $editorial;
$genero = strip_tags($_POST['genero']);
echo $genero;
$idioma = strip_tags($_POST['idioma']);
echo $idioma;
$anio = strip_tags($_POST['anio']);
echo $anio;
$precio = strip_tags($_POST['precio']);
echo $precio;

$sql = "INSERT INTO libro (detalle_libro, anio_publicacion, codigo_idioma, codigo_categoria, codigo_editorial, codigo_genero, codigo_autor, precio)
VALUES ('$detalle', '$anio', '$idioma', '$categoria', '$editorial', '$genero', '$codigo_autor', '$precio')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


header('Location: ../inventario.php');

?>