<?php
$con = mysqli_connect('localhost', 'root', '', 'library');
if (!$con) {
    die('Database connection failed: ' . mysqli_connect_error());
}
if(isset($_GET['S_no'])){
    $S_no=$_GET['S_no'];
    $delete="DELETE FROM suggestions where S_no=$S_no";
    mysqli_query($con, $delete);
}
mysqli_close($con);

header("Location: view_suggestions.php");
exit;
?>