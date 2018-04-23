<?php
require_once('../connection.php');
$sql = 'SELECT * FROM news ORDER BY id DESC';

$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll();
?>
<table width="" class="stack">
	<thead>
		<tr>
			<th>ID</th>
			<th>Título</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach($results as $rs)
			{
		?>
		<tr>
			<td><?php echo $rs['id'] ?></td>
			<td><?php echo $rs['title'] ?></td>
			<td>
			<a class="hollow primary button" href="details" data-id="<?php echo $rs['id'] ?>" >Detalles</a>
			<a class="hollow alert button" href="delete" data-id="<?php echo $rs['id'] ?>">Eliminar</a>
			</td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>