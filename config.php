<?php
    // $serverName = "tcp:bukabuku.database.windows.net,1433";
    $dbName = "bukabuku";
    $username = "mafrizal";
    $password = "Timpakul2016+";

    try {
        $conn = new PDO("sqlsrv:server = $serverName; Database = $dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }

    // SQL Server Extension Sample Code:
    $connectionInfo = array("UID" => "mafrizal@bukabuku", "pwd" => "$password", "Database" => "$dbName", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:bukabuku.database.windows.net,1433";
    $conn = sqlsrv_connect($serverName, $connectionInfo);
?>