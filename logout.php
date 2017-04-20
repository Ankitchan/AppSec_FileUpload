<?php
/*
Code to handle logout functionality
*/
session_start();
echo "<script>alert(\"".$_SESSION["id"]."\");</script>"
session_destroy();
$_SESSION = array();
echo "<pre>"
echo "<script>alert(\"".$_SESSION["id"]."\");</script>"
echo "</pre>"
if(!isset($_SESSION["id"]) && empty($_SESSION["id"])){
	echo 'You have been logged out. <a href="login.html">Go back</a>';
	else
		echo 'Error in logout';
exit(0);
?>