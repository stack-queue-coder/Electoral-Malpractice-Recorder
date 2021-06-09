<?php
include "dbconnection.php";
?>


<?php
if(isset($_POST['submit'])){
    $name = $_FILES['file']['name'];
    $max_size = 52428800; //50 MB
    //file upload
    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
            $name = $_FILES['file']['name'];
            $target_dir = "DATABASE_MEDIA_STORAGE/";
            $target_file = $target_dir.$name;
            
            // file extension
            $file_ext = strtolower(end(explode('.',$name)));
            $extension = array("mp4" , "mpeg" , "mp3" ,"jpeg" , "png" ,"gif" ,"txt" , "pdf" ,"docx");
            if(in_array($file_ext , $extension) == FALSE){
                $_SESSION['message'] = "ERROR : Acceptable formats are mp4 , mpeg , mp3 ,jpeg , png ,gif ,txt , pdf ,docx  only!<br>";
                    
            }
            else{
                // size
                $file_size =  $_FILES['file']['size']; 
                if($file_size > $max_size){ // 50 MB
                    $_SESSION['message'] = "File size can't be greater than 50MB<br>";
                }
                else{
                    // upload
                    if(move_uploaded_file($_FILES['file']['tmp_name'] , $target_file)){
                        // insert record
                        $sql = "INSERT INTO media(MediaPath , Details) VALUES('".$name."','".$target_file."')";
                        mysqli_query($con,$sql);
                        $_SESSION['message'] = "<h1>Upload Succesfull!</h1><br>";
                    }
                }
            }                       
            
    }
    else{
        $_SESSION['message'] = "Please select a file.<br>";
    }
    // header('location : index.php');

}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>EMR Upload Page</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <!-- upload -->
    <?php 
    if(isset($_SESSION['message'])){
       echo $_SESSION['message'];
       unset($_SESSION['message']);
    }
    ?>
    <div class="main_div">
    <div class="header">
            Upload Portal - Electoral Malpractice Recorder
        </div>
    <div class="form">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" name="submit" value="Upload" />
        </form>
    </div>
    <div class="footer">copyright@2021</div>
    </div>
</body>
</html>