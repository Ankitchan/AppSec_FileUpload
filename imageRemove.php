<?php 
/*
Code to handle Image deletion functionality
*/
include("config.php");
include("appUtilities.php");
//session_start();
getSession();
if(!isset($_SESSION["id"]) && empty($_SESSION["id"])){
   echo "<script>;
   alert(\"Session ended. Please login again\"); </script>";
   //window.location = 'login.html'; </script>";
   redirect("login.html");
   //exit(0);
}


//Validating and sanitizing input

if(!validate_input($_GET['image']))
{
	echo "<script>;
   alert(\"Session ended. Please login again\"); </script>";
   exit();
}
if(!file_exists($img))
{
	echo "<script>;
   alert(\"File doesn't exist\"); </script>";
   exit();
}
	$id = $_SESSION["id"];
	$img = filter_var($_GET['image'],FILTER_SANITIZE_STRING);
	$resdel=mysqli_query($con, "DELETE FROM `appsecdb`.`user_image` WHERE user_id='".$id."' AND image='".$img."'");

	
	$delfile = unlink($img);	

	//echo $resdel . " - " . $delfile;
	if($resdel && $delfile)
	{
		echo "<script>;
		alert('image deleted')";
		//window.location = 'viewImage.php'; </script>";
   
		redirect("viewImage.php");
	}
	else
	{
		echo "<script>
		alert('problem in image delete')";
		//window.location = 'viewImage.php'; </script>";
		redirect("viewImage.php");
	}

?>