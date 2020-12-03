<?php 

//this class executes mysql connections using object oriented structure

// DB credentials.
define('DB_HOST','--IP_ADDRESS_OF_DB_SERVER--');//put your data here
define('DB_USER','--USER_WITH_ADMIN_PRIVILEGES--');//put your data here
define('DB_PASS','--USER_PASSWORD--');//put your data here
define('DB_NAME','--DB_NAME--');//put your data here
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
