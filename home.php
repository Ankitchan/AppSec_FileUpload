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





<form action="upload.php" method="post" enctype="multipart/form-data">
<table class='table'>
<tr>
<td> Select image to upload:</td>
<td> <input type="file" name="fileToUpload" id="fileToUpload"></td>
</tr>
<tr>
<td>Caption:
</td>
<td>
 <input type="text" name="caption" id="caption">
</td>
</tr>
<tr>
<td>
</td>
<td>
 <input type="submit" value="Upload Image" name="submit">
</td>
</tr>
</table>
   
   
	
    
</form>
<a href="viewImage.php">View Image</a>

<footer class="footer">   
<div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
</div>
</footer>

</body>
</html>
