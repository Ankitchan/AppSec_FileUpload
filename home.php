<?php
/*
Code to handle File Upload screen
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
?>
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
  <!-- Jquery validation file -->
  <script src="js/jquery.validate.js" type="text/javascript"></script>


  <div class="container ">

    <div class="row">
     <nav class="navbar navbar-inverse navbar-fixed-top">
         <div class="container">
           <div class="navbar-header">
             <p class="navbar-brand">Application Security Assignment 1</p>
         </div>
         <div class="navbar-header pull-right" >
            <!--<a href='logout.php'>Click here to log out</a> -->
            <a class="btn btn-info center-block log-out-custom" type="button" href="login.html">logout</a>
        </div>
    </div>
</nav>
</div>


<div class="modified-container">


</div>



</div>





<form id="frmupload" name="frmupload" action="upload.php" method="post" enctype="multipart/form-data">
    <table class='table'>
        <tr>
            <td> Select image to upload:</td>
            <td> <input type="file" name="fileToUpload" id="fileToUpload" accept="image/x-png,image/gif,image/jpeg, image/jpg, image/JPG" ></td>
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
    <p class="text-muted">Developed by ac6426@nyu.edu.</p>
    </div>
</footer>

</body>
</html>
<script>
  var jqueryValidator;
  
  $.validator.addMethod("regex_valid", function(value,element){

  
  return /^(?=[A-Za-z])[A-Za-z\d]{1,75}$/.test(value);
  
  
  }, "Caption cannot be empty should start from a letter and can contain only 8alphanumeric characters upto 75 characters");

  // just for the demos, avoids form submit
  /*jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
  });*/
  $(document).ready(function(){

    jqueryValidator = $("form[name='frmupload']").validate({


    rules : {
        
      fileToUpload : {
        required: true
      },
      caption : {
        required:true,
        minlength:1,    
        maxlength:75,
        regex_valid: true
      }
    },

    messages : {

        fileToUpload : {
          required : "Please select an image"
        },
      
        caption : {
          
          maxlength : "Caption cannot be greater than 75 characters"
        }
    },

    highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
    errorElement : 'span'

  });

  });
</script>