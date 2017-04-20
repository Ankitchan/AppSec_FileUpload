<?php 

/*
Code to connect to mysql database
*/
$con = mysqli_connect("localhost","root","", "appsecdb"); //or die ('Error Connectiong to mysql: '.mysql_error());
//$dbname = "appsecdb";
if(mysqli_connect_errno())
{
	echo "Connection failed: "  . mysqli_connect_errno();
	exit();
	//die("Connection failed: " . $con->connect_error);
}


?>
