<?php 
/*
Code to handle login functionality
*/

include("config.php");
include("appUtilities.php");

//Sanitizing input
$uname = (filter_var($_POST['uname'], FILTER_SANITIZE_STRING)) ? filter_var($_POST['uname'], FILTER_SANITIZE_STRING) : "";//$_POST['uname'];//$_POST['uname']);
$pwd = (filter_var($_POST['password'], FILTER_SANITIZE_STRING)) ? filter_var($_POST['password'], FILTER_SANITIZE_STRING) : "";//$_POST['password'];
if(validate_input($uname) && validate_input($pwd) && preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $pwd))
{
	echo "<pre>";
	var_dump("uname: " . $uname . " pwd: " . $pwd);
	echo "</pre>";
	//$result = mysqli_query($con, "SELECT user_id FROM users WHERE username = '$_POST[uname]' AND password = '$_POST[password]'");// or die(mysql_error());
	$stmt = mysqli_prepare($con, "SELECT user_id FROM users WHERE username = ? AND password = ?");
	
	if(!mysqli_stmt_bind_param($stmt, 'ss', $uname, $pwd))
	{
		echo "<script>alert(\"Error in login bind params\");</script>";
		exit();
	}
	if(!mysqli_stmt_execute($stmt))
	{
		echo "<script>alert(\"Error in login query execution\");</script>";
		exit();	
	}
	/* store result */
    mysqli_stmt_store_result($stmt);
	 if(mysqli_stmt_num_rows($stmt) > 0)
	{// Start the session
		$userid="";	
		mysqli_stmt_bind_result($stmt, $userid);
		while(mysqli_stmt_fetch($stmt))
		{
			/*echo "<pre>";
			var_dump("userid: ".$userid);
			echo "</pre>";*/
		}		
		getSession();
		// Set session variables
		
		$_SESSION["id"] = $userid;//$row["user_id"];
		
		/*if (!isset($_SESSION["CREATED"])) //To fix session fixation attack
		{
		    $_SESSION["CREATED"] = time();
		}
		else if (time() - $_SESSION["CREATED"] > 300) 
		{
		    // session started more than 30 minutes ago
		    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
		    $_SESSION["CREATED"] = time();  // update creation time
		}

		//Session Timeout
		/*if (isset($_SESSION["LAST_ACTIVITY"]) && (time() - $_SESSION["LAST_ACTIVITY"] > 300))
		{
	    // last request was more than 5 minutes ago
	    session_unset();     // unset $_SESSION variable for the run-time 
	    session_destroy();   // destroy session data in storage
		}
		$_SESSION["LAST_ACTIVITY"] = time(); // update last activity time stamp
		*/
		//echo "<script>;
		//window.location = 'home.php'; </script>";
		redirect("home.php");
	}
	elseif (mysqli_stmt_num_rows($stmt) == 0)
	{
		$errmsg = "User & pwd doesnt exist";
		//console_log($errmsg);
		echo "<pre>";
		var_dump($errmsg);
		echo "</pre>";
		//echo "	<script type="text/javascript">
		//alert('User doest not Exist'); </script>";
		//window.location = 'signup.htm'; </script>";
		//redirect("login.html");
	}
	else
	{
		$errmsg = "Error in login";
		//console_log($errmsg);
		echo "<pre>";
		var_dump($errmsg);
		echo "</pre>";
		echo "<script>
		alert('error in login');</script>";
		exit(0);
	}
	/* free result */
    mysqli_stmt_free_result($stmt);

    /* close statement */
    mysqli_stmt_close($stmt);
    /* close connection */
	mysqli_close($con);
}
else
{
	//$errmsg = "User & pwd not valid";
	echo "	<script type=\"text/javascript\">alert('User and password not valid'); </script>";	
	//redirect("login.html");
}
?>