<?php
$connection = mysqli_connect('localhost', 'root', '', 'library');
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if (isset($_GET['return_id']) && isset($_GET['username'])) {
    $return_id = $_GET['return_id'];
    $username=$_GET['username'];

    $query = "SELECT book_no FROM returnrecords WHERE id = $return_id";
    $result = mysqli_query($connection, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $book_no = $row['book_no'];

        $update_query = "UPDATE books SET book_stock = book_stock + 1 WHERE book_no = '$book_no'";
        mysqli_query($connection, $update_query);

        $delete_query = "DELETE FROM returnrecords WHERE id = $return_id";
        mysqli_query($connection, $delete_query);
    }
}

mysqli_close($connection);

header("Location: returned.php?username=$username");
exit;
?>
