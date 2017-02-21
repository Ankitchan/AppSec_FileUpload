
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

</body>
<?php 

include("config.php");


$result = mysql_query("select * from user_image  order by id desc");

echo "<table id='tbl' class='display' cellspacing='0' width='100%'>"; // start a table tag in the HTML
echo " <thead>
            <tr>
                <th>id</th>
                <th>image</th>
                <th>caption</th>
				 <th>Upload Time</th>
             </tr>
        </thead><tbody>";
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['id'] . "</td>" ;

 echo "<td><img src=".$row['image']." height='50px' width='50px'></td>";
echo "<td>" . $row['caption'] . "</td>";
echo "<td >" . $row['upload_time'] . "</td>" ;
echo "</tr>";

}

echo "</tbody></table>"; //Close the table in HTML

mysql_close(); //Make sure to close out the database connection

echo "<script>;
$(document).ready(function() {

   var tbl=$('#tbl').DataTable({
                    'pageLength' : 10,
					'searching' : false,
					 'search': {
			'smart': false
		}
                    
                 });
				
} );
</script>";

?>
<a href="login.html">upload new Image</a>

<link href="css/bootstrap.min.css" rel="stylesheet"
    type="text/css">

<link href="css/dataTables.bootstrap.min.css" rel="stylesheet"
    type="text/css">
<script src='https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js' type='text/javascript'></script>

<script src='https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js'></script>
