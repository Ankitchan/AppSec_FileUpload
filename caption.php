<?php 
session_start();
if(!is_null($_SESSION["id"]))
{
	include("config.php");

	//$res=mysqli_query($con, "SELECT * FROM user_image WHERE id=".$_SESSION['id']) or die(mysql_error());
	//while($row = mysqli_fetch_assoc($res)){  
	//echo $row['image'];
	echo "<pre>";
	echo $_GET['cap'] . " - " . $_GET['image'];
	echo "</pre>";
	$resup = mysqli_query($con, "update  `appsecdb`.`user_image` set `caption`='".$_GET['cap']."' WHERE `user_id`='".$_SESSION["id"]."' AND `image`='".$_GET['image']."'");


	//}

	if($resup)
	{
	echo "<script>;
	alert('caption updated');
	window.location = 'viewImage.php'; </script>";
	}
	else
	{
		echo "<script>
		alert('problem in caption');
		window.location = 'viewImage.php'; </script>";
	}
}
?>