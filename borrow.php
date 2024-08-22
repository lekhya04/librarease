<?php
$connection = mysqli_connect('localhost', 'root', '', 'library');
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if (isset($_GET['borrowed_id']) && isset($_GET['username'])) {
    $borrowed_id = $_GET['borrowed_id'];
    $username = $_GET['username'];

    $query = "SELECT * FROM borrowed WHERE borrowed_id='$borrowed_id'";
    $result = mysqli_query($connection, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $insert_query = "INSERT INTO returnrecords (stu_id, book_no, book_name, book_author, given_date, return_date)
                         VALUES ('{$row['stu_id']}', '{$row['book_no']}', '{$row['book_name']}', '{$row['book_author']}','{$row['publisher']}', '{$row['subject']}', '{$row['edition']}', '{$row['given_date']}', '{$row['return_date']}')";
        mysqli_query($connection, $insert_query);

        $delete_query = "DELETE FROM borrowed WHERE borrowed_id='$borrowed_id'";
        mysqli_query($connection, $delete_query);
    }
}
mysqli_close($connection);
header("Location: borrowed.php?username=$username");
exit();
?>
