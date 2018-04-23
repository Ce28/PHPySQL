<?php

$dsn = 'mysql:dbname=php_sql_course;host=127.0.0.1';
$user = 'root';
$password = '';

try{
	$pdo = new PDO(	$dsn,
					$user,
					$password
					);

	// echo 'Conexión correcta ';

	// $sql = 'SELECT * FROM user';
	// foreach ($pdo->query($sql) as $rs) 
	// {
	// 	var_dump($rs);
	// }
}
catch(PDOException $e){
	echo 'Error al conectarnos: ' . $e->getMessage();
}