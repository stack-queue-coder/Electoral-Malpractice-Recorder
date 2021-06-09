<?php

$server = "localhost";
$host = "root";
$password = "";
$db = "emr";

$con = mysqli_connect($server , $host , $password, $db);

if($con){
?>
        <script>
            alert("Connected to DATABASE name 'EMR'");
        </script>
<?php
}
else{
?>
        <script>
            alert("Error : No DATABASE connected!!");
        </script>
        <h1>Connection - Error :</h1>
<?php
        echo mysqli_connect_error()."<br>";
}
?>