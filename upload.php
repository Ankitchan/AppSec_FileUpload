<?php
/*
Code to handle File Upload functionality
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
else
{
    
        $target_dir = "uploads/";
        $filename = basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . $filename;
        $uploadOk = 1;
        
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $fileContents = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
        $mimeType = $finfo->buffer($fileContents);
        //echo "<script>alert(".$mimeType.");</script>";

        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        /*echo "<pre>";
        var_dump('target_file: '.$target_file);
        echo "</pre>";*/
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "<script>alert(\"File is not an image.\")</script>";
                $uploadOk = 0;
                //redirect("home.php");
            }
        }
        //Check if filename is valid
        if(!preg_match('/^[\w,\s-_]{1,255}\.[A-Za-z]{3}$/',$filename))
        {
            echo "<script>alert(\"file name should be alphanumeric upto 255 char and contains only 1 dot.\")</script>";
            $uploadOk = 0;
        }
// Check if file already exists
        if (file_exists($target_file)) {
            echo "<script>alert(\"file already exists.\")</script>";
            $uploadOk = 0;
            //redirect("home.php");
        }
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            echo "<script>alert(\"Your file is too large.\")</script>";
            $uploadOk = 0;
            //redirect("home.php");
        }
// Allow certain file formats
        //if($imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif"){
        if(!validImageType($mimeType))
        {
            echo "<script>alert(\"Sorry, only JPG, JPEG, PNG & GIF files are allowed.\");</script>";
            $uploadOk = 0;
        //redirect("home.php");
        }
        // Sanitizing and validating caption
        $caption = (filter_var($_POST['caption'], FILTER_SANITIZE_STRING)) ? filter_var($_POST['caption'], FILTER_SANITIZE_STRING) : "";
        if(!validCaption($caption))
        {
            echo "<script>alert(\"Caption is not valid.\");</script>";
            $uploadOk = 0;
        }
        /*if () //checking using magic number
        {
            $filehandle = fopen($_FILES['file']['tmp_name'],"r");

            // get file's magic number
            $MNUMBER =  bin2hex(fread($filehandle,4));
            // check if libpcap
            if ("$MNUMBER" != "FFD8" && $MNUMBER != "474946" && $MNUMBER != "BD 50 4E 47") {
             print 'bad file format ! <br />';
            exit;
            }
        }*/
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk != 0) 
        {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
            {
                $id=$_SESSION["id"];
        
                $created_date = date("Y-m-d H:i:s");
                echo "<pre>";
                var_dump("id: ".$id." image: ".$target_file." cap: ".$caption." date: ".$created_date);
                echo "</pre>";
                //$result = mysqli_query($con, "insert into `appsecdb`.`user_image` (`user_id`,`image`,`caption`,`upload_time`) values ('" . $id . "','" . $target_file . "',' $_POST[caption]','" . $created_date . "')");// or die(mysql_error());
                $stmt = mysqli_prepare($con, "insert into `appsecdb`.`user_image` (`user_id`,`image`,`caption`,`upload_time`) values (?,?,?,?)");
                if(!mysqli_stmt_bind_param($stmt, 'ssss', $id, $target_file, $caption, $created_date))
                {
                    echo "<script>alert(\"Error in upload bind params\");</script>";
                    unlink($target_file);
                    redirect("home.php");
                }
                if(!mysqli_stmt_execute($stmt))
                {
                    echo "<script>alert(\"Error in upload query execution\");</script>";
                    unlink($target_file);
                    redirect("home.php");
                }

                /*if(! $result)
                {
                    printf(" %s\n",mysqli_error($con));
                    redirect("home.php");
                }
                //if($imagepath)
                /*echo "im header_remove()\n";
                echo "<pre>";
                echo var_dump(mysqli_affected_rows($con));
                echo "</pre>";*/
                //if(mysqli_affected_rows($con) > 0)
                
                 /* free result */
                mysqli_stmt_free_result($stmt);

                /* close statement */
                mysqli_stmt_close($stmt);
                redirect('viewImage.php');
         
            }
            else
            {
                echo "Sorry, there was an error uploading your file.";
                redirect("home.php");
            }
        }
    }


?>
<a href="viewImage.php">View Image</a></br>>
<a href="home.php">upload new Image</a>
