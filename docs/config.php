<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','clouda8989_ardhu');
define('DB_PASS','CloudArdhu2025');
define('DB_NAME','clouda8989_dbArdhu');
// Establish database connection.
try
{
	$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
	exit("Error: " . $e->getMessage());
}
?>