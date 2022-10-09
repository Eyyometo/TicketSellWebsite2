<?php

	global $db;
	$host = 'localhost';
	$dbname = 'php_final';
	$username = 'root';
	$password = '24342434';
	$charset = 'utf8';
	$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
	$options = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_PERSISTENT => false,
		PDO::ATTR_EMULATE_PREPARES => false,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	];
	try {
		$db = new PDO($dsn, $username, $password, $options);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo 'Bağlantı hatası: ' . $e->getMessage();
		exit;
	}

?>