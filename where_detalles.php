<pre>
<?php
	require_once('connection.php');
	$sql = 'SELECT user.*, status.name FROM user INNER JOIN status ON user.status_id = status.id WHERE user.id = ? AND status_id = 1';
	$statement = $pdo->prepare($sql);
	$statement->execute(array($_GET['id']));

	// var_dump($statement->errorInfo());

	$results = $statement->fetchAll();
	// var_dump($results);

	$rs = $results[0];
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
	<h2>Filtrado de detalles con WHERE</h2>
	<hr>
</div>
<div class="row column">
	<div class="callout primary">
		<h3>Detalles Usuario</h3>
	</div>
	<table width="100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th>Password</th>
				<th width="150">Status</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $rs['id']; ?></td>
				<td><?php echo $rs['email']; ?></td>
				<td><?php echo $rs['password']; ?></td>
				<td><?php echo $rs['name']; ?></td>
			</tr>
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
