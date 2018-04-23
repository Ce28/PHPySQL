<pre>
<?php
	require_once('connection.php');
	//Codigo antiguo----------------------------------------------------------------
	// $sql = 'SELECT * FROM news WHERE title LIKE :search';
	// $search_terms = isset($_GET['title']) ? $_GET['title'] : '';

	// $arr_sql_terms[':search'] = '%' . $search_terms . '%';

	// $statement = $pdo->prepare($sql);
	// $statement->execute($arr_sql_terms);

	//Codigo optimizado de busqueda-------------------------------------------------
	$sql = 'SELECT * FROM news WHERE 1';
	//Si existe el GET de title asigna a $search_terms los terminos del GET, si no este asigna vacio
	$search_terms = isset($_GET['title']) ? $_GET['title'] : '';
	//Separa todos los terminos en un arreglo con valores por defecto (0, 1, 2, 3, etc)
	$search_arr = explode(' ', $search_terms);
	//Se crea el array donde se guardaran los elementos de $search_arr pero con un nombre
	$arr_sql_terms = array();
	$n = 0;
	foreach ($search_arr as $search_term) 
	{
		//Se concatena a $sql el nuevo espacio que se esta buscando
		$sql .= " AND title LIKE :search{$n}";
		//Se agrega al arreglo la palabra buscada con un nombre en vez de mandarlo con un valor por defecto
		$arr_sql_terms[":search{$n}"] = '%' . $search_term . '%';
		$n++;
	}

	$statement = $pdo->prepare($sql);		//Prepara la sentencia.
	$statement->execute($arr_sql_terms);	//Ejecuta la sentencia con el arreglo como parametro	
	$results = $statement->fetchAll();		//Guarda los datos de tal manera que puedan ser usados

	// // Muestra el array de $arr_sql_terms el cual guarda todas las palabras a buscar
	// echo 'Array $search_arr <br>';
	// var_dump($search_arr);
	// echo '<br>Array $arr_sql_terms <br>';
	// var_dump($arr_sql_terms);
	// echo '<br>Sentencia final <br>';
	// echo $sql;
	// //Muestra todos los datos traidos por la consulta
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
	<h2>Buscador sencillo con LIKE</h2>
	<hr>
</div>
<div class="row column">
	<div class="callout primary">
		<h3>Noticias</h3>
		<form method="get">
			<div class="row">
				<div class="medium-6 columns">
					<label>Ingrese el título
					<input type="text" name="title" placeholder="ej. javascript" value="<?php echo $search_terms; ?>">
					<input class="button" type="submit" value="BUSCAR" />
					</label>
				</div>
			</div>
		</form>
	</div>
	<table width="100%">
		<thead>
			<tr>
				<th>Título</th>
				<th>Contenido</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($results as $rs) 
				{
			?>
			<tr>
				<td width="300"><?php echo $rs['title']; ?></td>
				<td><?php echo $rs['content']; ?></td>
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
