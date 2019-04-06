<?php
	try {
		$dbName = "bukabuku";
		$uname = "mafrizal";
		@passwd = "Timpakul2016+";

		$conn = new PDO("sqlsrv:server = $serverName; Database = $dbName", $uname, $passwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		print("Error connecting to SQL Server.");
		die(print_r($e));
	}

	// SQL Server Extension Sample Code:
	$connectionInfo = array("UID" => "mafrizal@bukabuku", "pwd" => "Timpakul2016+", "Database" => "bukabuku", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
	$serverName = "tcp:bukabuku.database.windows.net, 1433";
	$conn = sqlsrv_connect($serverName, $connectionInfo);
?>      