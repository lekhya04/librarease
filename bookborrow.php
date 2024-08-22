<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
    session_start();
    include "db_con.php";
    if(isset($_POST['submit']))
    {
        $id= $_POST['stu_id'];
        $book_no= $_POST['book_no'];
        $q="select book_name,book_author from books where book_no='$book_no'";
        $r=mysqli_query($con,$q);
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_assoc($r);
            $book_name=$row['book_name'];
            $author=$row['book_author'];
            $td=date("Y-m-d");
            $rd=date("Y-m-d",strtotime($td."+10days"));
            $sql = "INSERT INTO borrowed (stu_id, book_no, book_name, book_author, given_date, return_date) VALUES ('$id', '$book_no', '$book_name','$author', '$td', '$rd')";
            $result = $con->query($sql);
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("book no is incorrect please check")';
            echo '</script>';
        }

        if($result == TRUE)
        {
            echo '<script type="text/javascript">';
            echo 'alert("Borrow successful! Return by: ' . $rd . '.Take the book from library within 2 days")';
            echo '</script>';

            $up = "UPDATE books SET book_stock = book_stock - 1 WHERE book_no = '$book_no'";
            $up_result = $con->query($up);
            if (!$up_result) 
            {
                echo "Error updating book stock: " . $con->error;
            }
            
            $stu_query="SELECT email from student where id='$id'";
            $stu_result = $con->query($stu_query);
            $notifications_sent = false;

            if (mysqli_num_rows($stu_result) > 0) {
                echo "Records found: " . mysqli_num_rows($stu_result) . "<br>";

                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; 
                    $mail->SMTPAuth = true;
                    $mail->Username = 'lekhya1854@gmail.com'; 
                    $mail->Password = 'zxyenshmabniftuc'; 
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;

                    $mail->setFrom('lekhya1854@gmail.com', 'Librarease Notification');

                    while ($row = mysqli_fetch_assoc($stu_result)) {
                        echo "Sending email to: " . $row['email'] . "<br>";

                        $mail->addAddress($row['email']);
                        $mail->isHTML(true);
                        $mail->Subject = 'Borrowed Book Details';
                        $mail->Body = "
                        Dear Student,<br><br>

                        This is to inform you that you have borrowed the following book from our library:<br><br>

                        Book Title: $book_name<br>
                        Book Author: $author<br>
                        Borrowed Date: $td<br>
                        Return Date: $rd<br><br>

                        Please ensure to return the book by the specified return date to avoid any late fees.<br><br>

                        Thank you,<br>
                        Librarease 
                        ";
                        $mail->send();
                        $mail->clearAddresses();
                    }

                    $notifications_sent = true;
                } catch (Exception $e) {
                    error_log('Mail Error: ' . $mail->ErrorInfo);
                }
            } else {
                echo "No records found.<br>";
            }

            $message = $notifications_sent ? "Notifications sent to your registered email." : "No notifications to send.";

            echo "<script>alert('$message'); window.location.href = 'bookborrow.php';</script>";
        }
        else
        {
            echo "Error:".$sql."<br>".$con->error;
        }

        
        $con->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Borrow Books</title>
    <style>
        body {
            background-size: cover;
            background-image: url("libraries.jpg");
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }
        header {
            background: linear-gradient(to left, yellow, orange, red);
            -webkit-background-clip: text;
            color: transparent;
            font-size: 60px;
            text-align: center;
            font-family: 'Georgia', serif;
            top: 20px;
            position: fixed;
            width: 100%;
            height: 100px;
            line-height: 100px;
            left: 0;
            z-index: 1;
            white-space: nowrap;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }
        form {
            background-color: rgba(255, 255, 255, 0.85);
            max-width: 1000px;
            width: 550px;
            height:300px;
            margin: 160px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #343a40;
        }
        .data {
            margin-bottom: 15px;
        }
        .data input {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            display: inline-block;
            width: 30%;
            padding: 10px;
            background-color: #343a40;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
            margin-right: 5px;
        }
        .home{
            background-color: #138496;        
        }
        .view{
            background-color: #c82333;
        }
    </style>
</head>
<body>
<header>
        <i class="fas fa-book-open fa-icon"></i> 
        LIBRAREASE
        <i class="fas fa-book-open fa-icon"></i> 
    </header>
        <form action="bookborrow.php" method="post">
            <h1 align="center"><font color="black">Book Borrow</font></h1>
            <p class="data">Student Id: <input type="text" placeholder="Student-ID" autocomplete="off" name="stu_id" class="name" value="<?php echo $_SESSION['id']; ?>" readonly></p>
            <p class="data">Book No: <input type="text" placeholder="Book No" autocomplete="off" name="book_no" class="name" required></p>
            <div style="text-align: center;">
                <button type="submit" name="submit"><i class="fas fa-book"></i> Borrow</button>
                <button type="button" class="view" onclick="window.open('total.php', '_self')"><i class="fas fa-list"></i> View</button>
                <button type="button" class="home" onclick="window.open('studenthome.php', '_self')"><i class="fas fa-home"></i> Home</button>
            </div>
        </form>
</body>
</html>