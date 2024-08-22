<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$connection = mysqli_connect('localhost', 'root', '', 'library');
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if (isset($_GET['delete_old_borrows'])) {
    $current_date = date('Y-m-d');
    $query = "SELECT book_name, book_no, stu_id FROM borrowed WHERE given_date <= DATE_SUB('$current_date', INTERVAL 2 DAY)";
    $result = mysqli_query($connection, $query);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'lekhya1854@gmail.com';
    $mail->Password = 'zxyenshmabniftuc';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('lekhya1854@gmail.com', 'Library Notification');

    $notifications_sent = false;

    while ($row = mysqli_fetch_assoc($result)) {
        $book_no = $row['book_no'];
        $stu_id = $row['stu_id'];
        $book_name = $row['book_name'];

        $deleteQuery = "DELETE FROM borrowed WHERE book_no='$book_no' AND stu_id='$stu_id'";
        mysqli_query($connection, $deleteQuery);

        $updateQuery = "UPDATE books SET book_stock = book_stock + 1 WHERE book_no = '$book_no'";
        mysqli_query($connection, $updateQuery);

        $studentQuery = "SELECT email FROM student WHERE id='$stu_id'";
        $studentResult = mysqli_query($connection, $studentQuery);

        if ($studentResult && mysqli_num_rows($studentResult) > 0) {
            $student = mysqli_fetch_assoc($studentResult);
            $studentEmail = $student['email'];

            try {
                $mail->addAddress($studentEmail);
                $mail->isHTML(true);
                $mail->Subject = 'Book Returned to Library';
                $mail->Body = "Dear Student,<br><br>The book with name <b>$book_name</b> has been returned to the library since you didn't take it within 2 days.<br><br>Thank you.";
                $mail->send();
                $mail->clearAddresses();
                $notifications_sent = true;
            } catch (Exception $e) {
                error_log('Mail Error: ' . $mail->ErrorInfo);
            }
        }
    }

    $message = $notifications_sent ? "Notifications sent and old borrows deleted successfully." : "No old borrows to delete or notifications to send.";
    echo "<script>alert('$message'); window.location.href = 'borrow_records.php';</script>";
    exit;
}

$query = "SELECT * FROM borrowed ORDER BY borrowed_id DESC";
$result = mysqli_query($connection, $query);
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>List of Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-size: cover;
            background-image: url("libraries.jpg");
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            backdrop-filter: blur(10px);
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            margin-top: 100px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 90%;
            max-width: 1000px;
            height: 65vh; 
            display: flex;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #DADAD8;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e1e1e1;
        }
        th {
            background-color: #f2f2f2;
            color: #2c3e50;
            position: sticky; 
            top: 0;
            z-index: 1;
        }
        tr:hover {
            background-color: #f9f9f9;
        }

        .but {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
        .return-link, .delete-link {
            text-decoration: none;
        }
        header {
            background: linear-gradient(to left, yellow, orange, red);
            -webkit-background-clip: text;
            color: transparent;
            font-size: 80px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
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
        .return-button, .delete-button {
            padding: 5px 10px;
            font-size: 14px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .return-button:hover, .delete-button:hover {
            background-color: #2980b9;
        }

        .send-notification-link {
            text-decoration: none;
        }

        .send-notification-button {
            padding: 5px 10px;
            font-size: 14px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .send-notification-button:hover {
            background-color: #2980b9;
        }
        .table-container {
            flex-grow: 1;
            overflow-y: auto;
            margin-top: 20px;
        }

        #but, #delete-old {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-container input[type=text] {
            width: 60%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }

        .search-container button {
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-container button:hover {
            background-color: #2980b9;
        }

        #but:hover, #delete-old:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <header>
        <i class="fas fa-book-open fa-icon"></i> 
        LIBRAREASE
        <i class="fas fa-book-open fa-icon"></i> 
    </header>

    <div class="container">
        <h1>Borrowed Books</h1>
        <div class="search-container">
            <form action="borrowed.php" method="GET">
                <input type="text" id="search" name="username" placeholder="Enter Student ID..." required>
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Student Id</th>
                        <th>Book No</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Subject</th>
                        <th>Edition</th>
                        <th>Borrowed date</th>
                        <th>Return date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['stu_id'] . '</td>';
                        echo '<td>' . $row['book_no'] . '</td>';
                        echo '<td>' . $row['book_name'] . '</td>';
                        echo '<td>' . $row['book_author'] . '</td>';
                        echo '<td>' . $row['publisher'] . '</td>';
                        echo '<td>' . $row['subject'] . '</td>';
                        echo '<td>' . $row['edition'] . '</td>';
                        echo '<td>' . $row['given_date'] . '</td>';
                        echo '<td>' . $row['return_date'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <div class="but">
            
            <a href="record.php" target="_self">
                <button id="but">Home</button>
            </a>
            <a href="borrow_records.php?delete_old_borrows=true" target="_self">
                <button id="delete-old">Delete</button>
            </a>
        </div>
    </div>
</body>
</html>
