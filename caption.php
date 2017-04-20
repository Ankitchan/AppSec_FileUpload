<?php 
/*
Code to handle edit caption functionality
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
if(isset($_SESSION["id"]) && !empty($_SESSION["id"]))
{
	//include("config.php");

	//$res=mysqli_query($con, "SELECT * FROM user_image WHERE id=".$_SESSION['id']) or die(mysql_error());
	//while($row = mysqli_fetch_assoc($res)){  
	//echo $row['image'];
	
	
	$cap = $img = "";

	if(!validCaption($_GET['cap']))
	{
		echo "<script>;
		alert('Invalid caption')";
		//window.location = 'viewImage.php'; </script>";
		//redirect("viewImage.php");
	}
	else
	{
		$cap = filter_var($_GET['cap'],FILTER_SANITIZE_STRING);	
	}
	if(!validate_input($_GET['image']))
	{
		echo "<script>;
		alert('Accessing image error')</script>";
		//window.location = 'viewImage.php'; </script>";
		//redirect("viewImage.php");
		exit();
	}
	else
	{
		$img = filter_var($_GET['image'], FILTER_SANITIZE_STRING);
	} 
	/*echo "<pre>";
	var_dump($_GET['cap'] . " - " . $_SESSION["id"] ." - " . $_GET['image']);
	echo "</pre>";*/
	//$resup = mysqli_query($con, "update  `appsecdb`.`user_image` set `caption`='".$cap."' WHERE `user_id`='".$_SESSION["id"]."' AND `image`='".$img."'");
	$stmt = mysqli_prepare($con, "update  `appsecdb`.`user_image` set `caption`= ? WHERE `user_id`= ? AND `image`= ? ");
	if(!mysqli_stmt_bind_param($stmt, 'sis', $cap, $_SESSION["id"], $img))
	{
		echo "<script>;
		alert('Accessing image error')</script>";
		exit();
	}

	if(mysqli_stmt_execute($stmt))
	{
	echo "<script>;
	alert('caption updated')</script>";
	redirect("viewImage.php");
	}
	else
	{
		echo "<script>
		alert('problem in caption')</script>";
		redirect("viewImage.php");
	}

	/* free result */
    mysqli_stmt_free_result($stmt);
    /* close statement */
    mysqli_stmt_close($stmt);
    /* close connection */
	mysqli_close($con);
}

?>