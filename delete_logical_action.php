<?php
	require_once('connection.php');

	$id = isset($_GET['id']) ? $_GET['id']: 0;
	$sql = 'UPDATE news SET status = 0 WHERE id = ?';

	$statement = $pdo->prepare($sql);
	$statement->execute(array($id));
	$results = $statement->fetchAll();

	header('Location: delete_logical.php');
