<pre>
<?php
	require_once('connection.php');

	$sql = 'SELECT * FROM news WHERE status <> 0';

	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();
?>
</pre>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>PHP & SQL</title>
	<link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
	<script>
		function delete_article(id_to_delete)
		{
			var confirmation = confirm('¿Está seguro de que desea elminar el registro con el ID ' + id_to_delete + '?');
			
			if(confirmation)
			{
				window.location = "delete_logical_action.php?id=" + id_to_delete;
			}
		}
	</script>
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
	<h2>Borrado lógico</h2>
	<hr>
</div>
<div class="row column">
	<div class="callout alert">
		<h3>Noticias</h3>
	</div>
	<table width="100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Título</th>
				<th>Contenido</th>
				<th width="150">Acción</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach($results as $rs)
				{
			?>
			<tr>
				<td><?php echo $rs['id']; ?></td>
				<td><?php echo $rs['title']; ?></td>
				<td><?php echo $rs['content']; ?></td>
				<td><a class="small button alert" onclick="delete_article(<?php echo $rs['id']; ?>)" href="#">ELIMINAR</a></td>
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
