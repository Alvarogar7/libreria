<!DOCTYPE HTML>
<html>
<head>
<title>UMG</title>
<meta name="description" content="website description">
<meta name="keywords" content="website keywords, website keywords">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" id="theme" href="css/style.css">
<script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>

<?php
error_reporting(E_ALL ^ E_NOTICE);
$vista=1;
$vista = $_GET['vista'];
?>

<body>
  <div id="main">
    <header><div id="logo">
        <div id="logo_text">
          <h1><a href="index.php">Modelos Econométricos<span class="logo_colour"></span></a></h1>
          <h2>Alvaro García</h2>
          </div></div>

          <nav><ul class="sf-menu" id="nav">
          <li ><a href="index.php">Principal</a></li>
          <li ><a href="vender.php">Vender</a></li>
          <li class="current"><a href="inventario.php">Inventario</a></li>
          <li>
          <a href="#">Modelo Econometrico</a>
          <ul>
         <li><a href="modelo.php?vista=1">Modelo minimos</a></li>
         <li><a href="modelo.php?vista=2">Regresion Lineal</a></li></ul></li></ul></nav></header>

             
         <div class="sidebar_base"></div></div></div>
         <div class="content">  

          <?php                    
          if ($vista==1 or $vista ==""){
          echo "<h1>Autores</h1>";
          echo "<div class='content_item'>";
          echo "<p>";
          include ("Modelo/ver_autores.php");}
          if ($vista==2){
         
          echo "<h1>Agregar Libros</h1>";
          echo "<div class='content_item'>";
          echo "<p>";
          include ("Modelo/agregar_libro.php");}
          ?>
 

          </p></div></div></div>

          <?php 
          if ($vista=="" ){
          echo "<div class='sidebar_base'></div></div></div>";
          echo "<div class='content'>";  
          echo "<h1>Autor no seleccionado</h1>";
          echo "<div class='content_item'>";
          echo "<p>";
            }                 
          if ($vista==1 ){
          echo "<div class='sidebar_base'></div></div></div>";
          echo "<div class='content'>";  
          echo "<h1>Libros</h1>";
          echo "<div class='content_item'>";
          echo "<p>";
          include ("Modelo/ver_libros.php");  }
          
          ?>
 

          </p></div></div></div>
 
 </div>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script><script type="text/javascript" src="js/jquery.easing-sooper.js"></script><script type="text/javascript" src="js/jquery.sooperfish.js"></script><script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>
