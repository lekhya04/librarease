<?php
    $host="localhost";
    $user="root";
    $password="";
    $db_name="library";
    $con=mysqli_connect($host,$user,$password,$db_name);
    if(!$con)
    {
        echo "Connection Failed";
    }
?>