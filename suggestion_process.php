<?php
$connection = mysqli_connect('localhost', 'root', '', 'library');
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $suggestion = htmlspecialchars($_POST['suggestion']);


    if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
        $student_id = $_SESSION['id'];
        $username = $_SESSION['username'];
        $datetime = date('Y-m-d H:i:s');
        
        $sql = "INSERT INTO suggestions (username, id, suggestion, time) 
                VALUES ('$username', '$student_id', '$suggestion', '$datetime')";

        if ($connection->query($sql) === TRUE) {
            echo '<script>alert("Thank you for your suggestion.");</script>';
            echo '<script>window.location.href = "suggestion_box.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    } else {
        echo "Session data not set.";
    }

    $connection->close();
} else {
    header("Location: suggestion_box.php");
    exit();
}
?>
