<?php
	require_once('connection.php');
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
		</ul>
	</div>
</div>
 
<div class="row column text-center">
	<h2>Ejecución de una sentencia SQL</h2>
	<hr>
</div>
<div class="row column">
	<div class="callout primary">
		<h3>Datos SQL</h3>
		<pre>
		<?php
			$sql = 'SELECT * FROM user';
			foreach ($pdo->query($sql) as $rs) 
			{
				var_dump($rs);
			}
		?>
		</pre>
	</div>
</div>
<hr>
<div class="callout large secondary">
	<div class="row">

	</div>
	<div class="large-3 large-offset-2 columns">
	</div>
</div>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
</script>
</body>
</html>
