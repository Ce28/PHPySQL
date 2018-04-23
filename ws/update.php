<?php
require_once('../connection.php');

if($_POST)
{
	$sql_update_details = 'UPDATE news SET title = ?, content = ? WHERE id = ?';

	$title = isset($_POST['title']) ?  $_POST['title'] : '';
	$content = isset($_POST['content']) ?  $_POST['content'] : '';
	$id = isset($_GET['id']) ? $_GET['id'] : 0;

	$statement_update_details = $pdo->prepare($sql_update_details);
	$statement_update_details->execute(array($title, $content, $id));
}