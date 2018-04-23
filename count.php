<pre>
<?php
	require_once('connection.php');

	//Usuarios.
	$sql = 'SELECT COUNT(*) AS total_users FROM user';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();
	// var_dump($results);
	// $total_users = $results[0]['COUNT(*)'];	
	$total_users = $results[0]['total_users'];

	//Tipos.
	$sql = 'SELECT COUNT(*) AS total_users_types FROM user_type';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();
	// var_dump($results);
	$total_users_types = $results[0]['total_users_types'];

	//Status.
	$sql = 'SELECT COUNT(*) AS total_status FROM status';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();
	// var_dump($results);
	$total_status = $results[0]['total_status'];

	//Accesos.
	$sql = 'SELECT COUNT(*) AS total_users_logs FROM user_log';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();
	// var_dump($results);
	$total_users_logs = $results[0]['total_users_logs'];

	//Usuarios activos.
	$sql = 'SELECT COUNT(*) AS total_users_active FROM user WHERE status_id = 1';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();
	// var_dump($results);
	$total_users_active = $results[0]['total_users_active'];

	//Usuarios inactivos.
	$sql = 'SELECT COUNT(*) AS total_users_inactive FROM user WHERE status_id = 2';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();
	// var_dump($results);
	$total_users_inactive = $results[0]['total_users_inactive'];
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
	<h2>Contando datos</h2>
	<hr>
</div>
<div class="row column">
	<div class="callout success">
		<h3>Totales</h3>
	</div>
	<table width="100%">
		<thead>
			<tr>
				<th>Usuarios</th>
				<th>Tipos</th>
				<th>Status</th>
				<th>Accesos</th>
				<th>Usuarios Activos</th>
				<th>Usuarios Inactivos</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $total_users; ?></td>
				<td><?php echo $total_users_types; ?></td>
				<td><?php echo $total_status; ?></td>
				<td><?php echo $total_users_logs; ?></td>
				<td><?php echo $total_users_active; ?></td>
				<td><?php echo $total_users_inactive; ?></td>
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
