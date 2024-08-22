<?php
session_start();


$faculty_username = "admin"; 
$faculty_password = "gcet@123"; 

if (isset($_POST['user']) && isset($_POST['password'])) {
    $username = $_POST['user'];
    $password = $_POST['password'];

    if ($username === $faculty_username && $password === $faculty_password) {
        $_SESSION['faculty_id'] = $username;
        header("Location: facultyhome.php");
        exit();
    } else {
        header("Location: facultylogin.php?error=Invalid username or password");
        exit();
    }
} else {
    header("Location: facultylogin.php");
    exit();
}
?>
