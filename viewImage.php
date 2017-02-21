

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>AppSec Ankit Chandra</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	 <link href="css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="css/bootstrap-custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
</head>
<body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script src="js/bootstrap.min.js"></script>
   

<div class="container ">

<div class="row">
	  <nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <p class="navbar-brand">Application Security Assignment 1</p>
	        </div>
	        
	      </div>
	  </nav>
  </div>


  <div class="modified-container">
			
   
  </div>
	    	
	

</div>

<footer class="footer">   

<div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
</div>

</footer>


<?php 
session_start();
//include'css/jquery.dataTables.min.css';
include("config.php");


//$result = mysql_query("select * from user_image where user_id=".$_SESSION['id']." order by id desc");
$result = mysqli_query($con, "select * from user_image where user_id=".$_SESSION['id']." order by user_id desc");
echo "<table id='tbl' class='active' cellspacing='0' width='100%'>"; // start a table tag in the HTML
echo " <thead>
            <tr>
                <th>id</th>
                <th>image</th>
                <th>caption</th>
				 <th>uploaded time</th>
                <th>action</th>
               
            </tr> 
        </thead><tbody>";
//while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results

if(mysqli_affected_rows($con) <= 0)
{
    echo "No images in db";
    exit(0);
}

while($row = mysqli_fetch_assoc($result))
{
echo "<tr><td >" . $row['user_id'] . "</td>" ;


 echo "<td r><img src=".$row['image']." height='75px' width='75px'></td>";


echo "<td > <input type='text' name='caption".$row['user_id']."' value='".$row['caption']."' id='". $row['caption']."'></input> <input type='button' name='del' value='Edit'  onClick='doEdit(\"".$row['image']."\",\"". $row['caption'] ."\")'></input></td>";
echo "<td >" . $row['upload_time'] . "</td>" ;
echo "<td >   <input type='button' name='del' value='Delete' id='btn-del'  onClick='doDelete(\"".$row['image']."\")'></input></td></tr>";  
}

echo "<tbody></table>"; //Close the table in HTML

mysqli_free_result($result);
mysqli_close($con); //Make sure to close out the database connection
echo "<script src='js/jquery-1.12.4.js' type='text/javascript'></script>";
//secho "<script src='js/jquery.dataTables.min.js' type='text/javascript'></script>";


//echo "<script src='https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js' type='text/javascript'></script>

//<script src='https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js'></script>";

echo "<script>
$(document).ready(function() {

    //$('#tbl').DataTable();
	$('#tbl').DataTable({
                    'pageLength' : 10,
					'searching' : false,
					 'search': {
			'smart': true
		}
                    
                    
                 });
} );
function doDelete(image){

window.location = 'imageRemove.php?image='+image;
} 
function doEdit(image,caption){

var ncap= document.getElementById(caption).value;
if(ncap != caption)
  {
    window.location = 'caption.php?cap='+ncap+'&image='+image;
  }
  else
  {
    alert(\"Pease update caption.\")
  }
}</script>";

?>

<a href="home.php">upload new Image</a>

<link href="css/bootstrap.min.css" rel="stylesheet"
    type="text/css">

<link href="css/dataTables.bootstrap.min.css" rel="stylesheet"
    type="text/css">
<script src='https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js' type='text/javascript'></script>

<script src='https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js'></script>

