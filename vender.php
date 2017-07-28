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
<body>
  <div id="main">
    <header><div id="logo">
        <div id="logo_text">    
        <h1><a href="index.php">Modelos Econométricos<span class="logo_colour"></span></a></h1>
        <h2>Alvaro García</h2></div></div>

        <nav><ul class="sf-menu" id="nav">
        <li ><a href="index.php">Principal</a></li>
        <li class="current"><a href="vender.php">Vender</a></li>
        <li><a href="inventario.php">Inventario</a></li>
        <li>
        <a href="#">Modelo Econometrico</a>
        <ul>
        <li><a href="modelo.php?vista=1">Modelo minimos</a></li>
        <li><a href="modelo.php?vista=2">Regresion Lineal</a></li></ul></li></ul></nav></header>



        <div id="site_content">
        <div id="sidebar_container">
        </div>
        <div class="content">
        <h1>Facturación</h1>
        <div class="content_item">
        <?php
          include ("Modelo/facturar.php");
        ?>
          <p></p></div></div></div>
  </div>

  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script><script type="text/javascript" src="js/jquery.easing-sooper.js"></script><script type="text/javascript" src="js/jquery.sooperfish.js"></script><script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>
