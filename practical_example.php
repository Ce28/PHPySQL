<?php
require_once('connection.php');





$sql = 'SELECT * FROM news WHERE 1 ORDER BY id DESC';

$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll();
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>PHP & SQL</title>
<link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>
<body>
 
<div class="top-bar">
<div class="top-bar-left">
<ul class="menu">
<li class="menu-text">Curso PHP & SQL</li>
<li><a href="#" id="lnkRefresh">Refrescar</a></li>
<li><a href="#" id="lnkNew">Nuevo Artículo</a></li>
</ul>
</div>

</div>
 
<div class="row column text-center">
<h2>INSERT</h2>
<hr>
</div>
<div class="row column">
<div class="callout secondary" id="divFormNew">
<h3>Nueva Noticia</h3>
<form method="post" id="frmNew">
  <div class="row">
    <div class="medium-6 columns">
      <label>Ingrese el título
        <input type="text" name="title" placeholder="ej. Javascript" value="">
        
      </label>
      <p class="help-text">El contenido deberá ser claro sobre su posible contenido</p>
    </div>
    <div class="medium-6 columns">
      <label>&nbsp;
        <!--<input type="text" name="title" placeholder="ej. javascript" value="">-->
        
      </label>
    </div>
  </div>
  <div class="row">
    <div class="medium-12 columns">
      <label>Ingrese el Contenido
        <textarea name="content" placeholder="ej. Lorem ipsum..."></textarea>
        <input class="button primary" type="submit" value="AGREGAR" id="btnAdd" />
      </label>
      
    </div>
  </div>
</form>
</div>
<div class="callout secondary" id="divFormDetails">
<h3>Detalles Noticia</h3>
<form method="post" id="frmUpdate">
  <div class="row">
    <div class="medium-6 columns">
      <label>Ingrese el título
        <input type="text" name="title" placeholder="ej. Javascript" value="" id="txtTitle">
        
      </label>
      <p class="help-text">El contenido deberá ser claro sobre su posible contenido</p>
    </div>
    <div class="medium-6 columns">
      <label>&nbsp;
      </label>
    </div>
  </div>
  <div class="row">
    <div class="medium-12 columns">
      <label>Ingrese el Contenido
        <textarea name="content" placeholder="ej. Lorem ipsum..." id="txaContent"></textarea>
        <input class="button secondary" type="submit" value="MODIFICAR" id="btnUpdate" />
      </label>
      
    </div>
  </div>
</form>
</div>
<div id="divNews">
  
</div>
</div>
<hr>

</div>
<div class="large-3 large-offset-2 columns">
</div>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
<script src="js/main.js"></script>
</body>
</html>
