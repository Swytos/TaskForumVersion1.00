<?php
	$connect = require_once 'constants.php';
	$dsn = 'mysql:host='.$connect['host'].';dbname='.$connect['db_name'].';charset='.$connect['charset'];
	try {
    	$dbh = new PDO($dsn, $connect['username'], $connect['passname']);
	} catch (PDOException $e) {
    	echo 'Подключение не удалось: ' . $e->getMessage();
	}

	//$con = mysqli_connect(DB_SERVER,DB_USER, DB_PASS,DB_NAME) or die(mysql_error());
?>