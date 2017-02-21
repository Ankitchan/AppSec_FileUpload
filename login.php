<?php 
include("config.php");

//$selectuserdetail =
 $result = mysqli_query($con, "SELECT user_id FROM users WHERE username = '$_POST[uname]' AND password = '$_POST[password]'");// or die(mysql_error());




//if($row = mysql_fetch_array($selectuserdetail) or die(mysql_error()))
if(mysqli_affected_rows($con) > 0)
{// Start the session
	session_start();
	// Set session variables
	$row = mysqli_fetch_assoc($result);
	/*echo "	<script>
	alert('user_id: " +$row["user_id"]+" ');
	</script>";*/
	/*echo '<pre>';
	var_dump($row);
	echo '</pre>';*/
	$_SESSION["id"] = $row["user_id"];//mysqli_affected_rows($con);//$row[0];
	//echo $_SESSION["id"];

	echo "<script>;
	window.location = 'home.php'; </script>";
}
elseif (mysqli_affected_rows($con) == 0)
{
	echo "	<script>
	alert('User doest not Exist');
	 window.location = 'signup.htm'; </script>";
}
else
	echo "error in login"
 ?>