<pre>
<?php
	require_once('connection.php');
	$sql = 'SELECT * FROM user';
	$statement = $pdo->prepare($sql);
	$statement->execute(array());
	$result = $statement->fetchAll();

	$sql_status = 'SELECT user.*, status.name FROM user INNER JOIN status ON user.status_id = status.id';
	$statement_status = $pdo->prepare($sql_status);
	$statement_status->execute(array());
	$result_status = $statement_status->fetchAll();
	// var_dump($result_status);
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
	<h2>Seleccionando datos</h2>
	<hr>
</div>
<div class="row column">
	<div class="callout primary">
		<h3>Usuarios</h3>
	</div>
	<table width="100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th width="150">Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($result as $rs) 
				{
			?>
			<tr>
				<td><?php echo $rs['id']; ?></td>
				<td><?php echo $rs['email']; ?></td>
				<td><?php echo $rs['status_id']; ?></td>
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
		<h3>Usuarios y status</h3>
	</div>
	<table width="100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th width="150">Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($result_status as $rs) 
				{
			?>
			<tr>
				<td><?php echo $rs['id']; ?></td>
				<td><?php echo $rs['email']; ?></td>
				<td><?php echo $rs['name']; ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>
<hr>

<div class="row column">
	<div class="callout warning">
		<h3>Usuarios y tipos</h3>
	</div>
	<table width="100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th width="150">Tipo</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>ID2</td>
				<td>correo2</td>
				<td>Content Goes Here</td>
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
