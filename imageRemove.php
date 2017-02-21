<?php 
session_start();
if(!is_null($_SESSION["id"]))
{
	include("config.php");


	$id = $_SESSION["id"];
	$resdel=mysqli_query($con, "DELETE FROM `appsecdb`.`user_image` WHERE user_id='".$id."' AND image='".$_GET['image']."'");


	$delfile = unlink($_GET['image']);	

	//echo $resdel . " - " . $delfile;
	if($resdel && $delfile)
	{
		echo "<script>;
		alert('image deleted');
		window.location = 'viewImage.php'; </script>";
	}
	else
	{
		echo "<script>
		alert('problem in image delete');
		window.location = 'viewImage.php'; </script>";
	}
}
?>