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

$current_date = date('Y-m-d');
echo "Current date: $current_date<br>";

$query = "SELECT r.stu_id, r.book_name, r.return_date, s.email FROM returnrecords r JOIN student s ON r.stu_id = s.id WHERE r.return_date = DATE_ADD(CURDATE(), INTERVAL 2 DAY)";
$result = mysqli_query($connection, $query);

$notifications_sent = false;

if (mysqli_num_rows($result) > 0) {
    echo "Records found: " . mysqli_num_rows($result) . "<br>";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'lekhya1854@gmail.com'; 
        $mail->Password = 'zxyenshmabniftuc'; 
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('lekhya1854@gmail.com', 'Library Notification');

        while ($row = mysqli_fetch_assoc($result)) {
            echo "Sending email to: " . $row['email'] . "<br>";

            $mail->addAddress($row['email']);
            $mail->isHTML(true);
            $mail->Subject = 'Book Return Reminder';
            $mail->Body = "Dear Student,<br><br>This is a reminder that the book <b>" . $row['book_name'] . "</b> is due for return on " . $row['return_date'] . ".<br><br>Thank you.";
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

mysqli_close($connection);

$message = $notifications_sent ? "Notifications sent successfully." : "No notifications to send.";

echo "<script>alert('$message'); window.location.href = 'return_records.php';</script>";
exit;
?>
