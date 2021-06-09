<?php
include "dbconnection.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Videos</title>
    <link rel="stylesheet" href="view.css">
</head>
<body>

    <div class="main">
    <div class="header">View Portal EMR</div>
        <?php
            $sql = "SELECT * FROM media ORDER BY MediaId DESC;";
            $fetchMedia = mysqli_query($con , $sql);

            while($row =  mysqli_fetch_assoc($fetchMedia)){
                $MediaId = $row['MediaId'];
                $MediaPath = $row['MediaPath'];
                $Location = $row['Location'];
                $Detail = $row['Details'];
                echo "
                    <div class='video'; style= 'float: left; margin-right : 5px;'>
                    <video src = '".$Detail."' controls width = '320px
                        height = '320px' > </video> <br>
                        <span>".$MediaPath."</span>
                    </div>    
                ";
            }
        ?>
    </div>
    <div class="footer">copyright@2021</div>
</body>
</html>