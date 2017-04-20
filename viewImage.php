

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
                 <p class="navbar-brand">Application Security Assignment 1</p> <!-- Header-->
                 </div>
                <div class="navbar-header pull-right" >
                    <!--logout button-->
                    <a class="btn btn-info center-block log-out-custom" type="button" href="login.html">logout</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="modified-container">


    </div>

</div>

<div>
    <a href="home.php">upload new Image</a>
</div>



<footer class="footer">   

    <div class="container">
      <p class="text-muted">Developed by ac6426@nyu.edu</p>
  </div>

</footer>


<?php 
/*
Code to handle view image screen
*/
include("config.php");
include("appUtilities.php");
//session_start();
getSession();
if(!isset($_SESSION["id"]) && empty($_SESSION["id"])){
   echo "<script>;
   alert(\"Session ended. Please login again\"); </script>";
   
   redirect("login.html");
   //exit(0);
}
else
{
    
    
    
    $result = mysqli_query($con, "select * from user_image where user_id=".$_SESSION['id']." order by upload_time desc");
    
    

    if(mysqli_affected_rows($con) <= 0)
    {
      echo "No images in db";
      exit();
    }

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

    while($row = mysqli_fetch_assoc($result))
    {
      echo "<tr><td >" . noHTML($row['user_id']) . "</td>" ;


      echo "<td><img src=".noHTML($row['image'])." height='75px' width='75px'></td>";


      echo "<td > <input type='text' name='caption". noHTML($row['user_id']) ."' value='". noHTML($row['caption']) ."' id='". noHTML($row['caption']) ."'></input> <input type='button' name='del' value='Edit'  onClick='doEdit(\"". noHTML($row['image']) ."\",\"". noHTML($row['caption']) ."\")'></input></td>";
      echo "<td >" . noHTML($row['upload_time']) . "</td>" ;
      echo "<td >   <input type='button' name='del' value='Delete' id='btn-del'  onClick='doDelete(\"". noHTML($row['image'])."\")'></input></td></tr>";  
    }

    echo "</tbody></table>"; //Close the table in HTML

    mysqli_free_result($result);
    mysqli_close($con); //Make sure to close out the database connection
    echo "<script src='js/jquery-1.12.4.js' type='text/javascript'></script>";

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
    });
    function doDelete(image){
      if(image != null && image != \"\")
        window.location = 'imageRemove.php?image='+image;
    else
        alert(\"Error in deleting image\")
    } 
    function doEdit(image,caption)
    {

        var ncap= document.getElementById(caption).value;
        if(ncap != null && ncap != \"\" && ncap != caption)
        {
            window.location = 'caption.php?cap='+ncap+'&image='+image;
        }
        else
        {
            alert(\"Please update caption.\")
        }
    }
    </script>";

}

?>

<link href="css/bootstrap.min.css" rel="stylesheet"
type="text/css">

<link href="css/dataTables.bootstrap.min.css" rel="stylesheet"
type="text/css">
<script src='https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js' type='text/javascript'></script>

<script src='https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js'></script>