<?php
session_start();
include "db_con.php";

if (isset($_POST['user']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['user']);
    $pass = validate($_POST['password']);

    if (empty($username)) {
        echo '<script type="text/javascript">';
        echo 'alert("Username is empty");';
        echo 'window.location.href = "loginpage.php";';
        echo '</script>';
        exit();
    } else if (empty($pass)) {
        echo '<script type="text/javascript">';
        echo 'alert("Password is empty");';
        echo 'window.location.href = "loginpage.php";';
        echo '</script>';
        exit();
    }

    $sql = "SELECT * FROM student WHERE id='$username' AND password='$pass'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        header("Location: studenthome.php");
        exit();
    } 
    $query = "SELECT * FROM student WHERE id='$username' ";
    $r = mysqli_query($con, $query);
    if(mysqli_num_rows($r) == 1)
    {
        echo '<script type="text/javascript">';
        echo 'alert("password is incorrect");';
        echo 'window.location.href = "loginpage.php";';
        echo '</script>';
        exit();
    }
    else 
    {
        echo '<script type="text/javascript">';
        echo 'alert("No user found please register");';
        echo 'window.location.href = "register.php";';
        echo '</script>';
        exit();
    }
} 
else 
{
    header("Location:loginpage.php");
    exit();
}
?>
