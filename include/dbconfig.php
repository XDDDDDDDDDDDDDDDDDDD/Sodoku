<?php
	//Datenbankverbindung

	$db_user = 'root';
	$db_password = '';
	try
	{
		$pdo = new PDO("mysql:host=localhost;dbname=sudoku", $db_user, $db_password);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>