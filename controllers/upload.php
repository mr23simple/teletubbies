<?php 
session_start();
 
$servername = "localhost";
$username = "root";  //your user name for php my admin
$password = "mySQLp@ssword127";  //password
$databasename = "hackunamatata"; //db name
$conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server


// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif', 'PNG'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $eMail = $_SESSION['userId'];
           
            $sql = "UPDATE  user set user_Image =  '$imgContent' WHERE user_email = '$sessionUserid'";
            $result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);

             
            if($result){ 
              Print '<script>alert("Image Upload successful.");</script>'; // prompts the user
              Print '<script>window.location.assign("../views/user.php");</script>'; // redirects to ../index.php
            }else{ 
              Print '<script>alert("Image Upload failed.");</script>'; // prompts the user
              Print '<script>window.location.assign("../views/user.php");</script>'; // redirects to ../index.php
            }  
        }else{ 
          Print '<script>alert("Image Upload failed: Image file type is invalid.");</script>'; // prompts the user
          Print '<script>window.location.assign("../views/user.php");</script>'; // redirects to ../index.php
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>