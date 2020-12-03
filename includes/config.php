<?php 

//this class executes mysql connections using object oriented structure

// DB credentials.
define('DB_HOST','localhost');//put your data here
define('DB_USER','admin');//put your data here
define('DB_PASS','novachat2020');//put your data here
define('DB_NAME','nova');//put your data here
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
