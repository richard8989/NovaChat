<?php
session_start();
error_reporting(0);
include('includes/config.php');

     $sql ="UPDATE users SET online=0, current_session=NULL WHERE id=(:id)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);
$query-> execute();

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}


unset($_SESSION['name']);
unset($_SESSION['id']);
unset($_SESSION['email']);
unset($_SESSION['login_details_id']);
session_destroy(); // destroy session
header("location:index.php"); 
?>

