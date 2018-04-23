<pre>
<?php
	require_once('connection.php');

	$sql = 'SELECT user.*, status.name, user_type.name AS type_name FROM user INNER JOIN status ON user.status_id = status.id INNER JOIN user_type ON user.user_type_id = user_type.id';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();
	// var_dump($results);


	$sql_log = 'SELECT user.*, user_log.*, status.name, user_type.name AS type_name FROM user LEFT JOIN user_log ON user.id = user_log.user_id LEFT JOIN status ON user.status_id = status.id LEFT JOIN user_type ON user.user_type_id = user_type.id';
	$statement_log = $pdo->prepare($sql_log);
	$statement_log->execute();
	$results_log = $statement_log->fetchAll();
	// var_dump($results_log);
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
	<h2>JOIN</h2>
	<hr>
</div>
<div class="row column">
	<div class="callout primary">
		<h3>Usuarios con tipo y status</h3>
	</div>
	<table width="100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th width="150">Status</th>
				<th width="150">Tipo</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($results as $rs) 
				{
			?>
			<tr>
				<td><?php echo $rs['id']; ?></td>
				<td><?php echo $rs['email']; ?></td>
				<td><?php echo $rs['name']; ?></td>
				<td><?php echo $rs['type_name']?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>
<hr>
<div class="row column">
	<div class="callout secondary">
		<h3>Usuarios con bitacora</h3>
	</div>
	<table width="100%">
		<thead>
		<tr>
			<th>ID</th>
			<th>Email</th>
			<th width="150">Contraseña</th>
			<th width="150">Status</th>
			<th width="150">Tipo</th>
			<th>ID</th>
			<th>Fecha</th>
			<th>Usuario</th>
		</tr>
		</thead>
		<tbody>
			<?php
				foreach ($results_log as $rl) 
				{
			?>
			<tr>
				<td><?php echo $rl[0]; ?></td>
				<td><?php echo $rl[1]; ?></td>
				<td><?php echo $rl[2]; ?></td>
				<td><?php echo $rl['name']; ?></td>
				<td><?php echo $rl['type_name']; ?></td>
				<td><?php echo $rl[5]; ?></td>
				<td><?php echo $rl[6]; ?></td>
				<td><?php echo $rl[7]; ?></td>
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
