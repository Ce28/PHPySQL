<pre>
<?php
	require_once('connection.php');
	$sql = 'SELECT * FROM user WHERE status_id = 1';
	$statement = $pdo->prepare($sql);
	$statement->execute(array());
	$results = $statement->fetchAll();
	// var_dump($results);
?>
</pre>
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
	<h2>Listado que apunta a detalles</h2>
	<hr>
</div>
<div class="row column">
	<div class="callout primary">
		<h3>Usuarios</h3>
	</div>
	<table width="100%">
		<thead>
			<tr>
				<th>Email</th>
				<th width="150">Acción</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($results as $rs) 
				{
			?>			
			<tr>
				<td><?php echo $rs['email']; ?></td>
				<td>
					<a class="small hollow button" href="where_detalles.php?id=<?php echo $rs['id']; ?>">Ver detalles</a>
				</td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
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
</body>
</html>
