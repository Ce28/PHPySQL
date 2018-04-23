<?php
require_once('../connection.php');

if( $_POST )
{
	$sql_insert = 'INSERT INTO news (title, content) VALUES (? , ?)';

	$title = isset( $_POST['title'] ) ?  $_POST['title'] : '';
	$content = isset( $_POST['content'] ) ?  $_POST['content'] : '';

	$statement_insert = $pdo->prepare($sql_insert);
	$statement_insert->execute(array($title, $content));
}