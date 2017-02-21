<?php 
include("config.php");
$name = $_POST["name"];
$email = $_POST["email"];
$mobile = $_POST["contact"];
$password = $_POST["password"];

$insertuserdetail=mysql_query("insert into user(name,password,email) values('$name','$password','$email')") or die(mysql_error());
if($insertuserdetail)
echo "<script>alert('successfully register');

 window.location = 'login.html'; </script>";
else
echo "<script>
alert('problem occur');
 window.location = 'signup.html'; </script>";
 ?>