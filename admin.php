<?php
include "dbconnection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
    

<?php
	
	
    if(isset($_POST['username   '])){
        $un = $_POST['username'];
        $pass = $_POST['password'];

        echo $un;
        $sql = "SELECT * FROM admin WHERE username ='".$un."' AND password ='".$pass."' limit 1;";

        $res  =mysqli_query($con , $sql);

        if(mysqli_num_rows($res) == 1){

            echo "logged in";

        }
        else{
            echo "wrong credentials";
        }

    }
    else{
        echo "Error";
    }
?>

</head>
<body>
        
    <div class="main_div">
        <div class="header">
            Admin Portal - Electoral Monitoring System
        </div>
        <div class="box">
            <h1>TELEPORT</h1>
            <form method="POST" action="view.php">
                <div class="inputBox">
                    <input type="text" name="username" autocomplete="off" required>
                    <label for="username">Username</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required >
                    <label for="password">Password</label>
                </div>
                <input type="submit" name="login" value="login" />
            </form>
        </div>
        <div class="footer">copyright@2021</div>
    </div>
    
</body>
</html>
