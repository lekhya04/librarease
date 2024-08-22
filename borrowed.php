<?php

$connection = mysqli_connect('localhost', 'root', '', 'library');
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if (isset($_GET['username'])) {
    $id = $_GET['username'];
    $query = "SELECT * FROM borrowed WHERE stu_id = '$id' ORDER BY borrowed_id DESC";
    $result = mysqli_query($connection, $query);
} else {
    die('No student ID provided.');
}
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
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 80%;
            max-width: 1000px;
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
        }
        th:nth-child(1),
        td:nth-child(1) {
            width: 150px;
        }
        th:nth-child(2),
        td:nth-child(2) {
            width: 150px;
        }
        th:nth-child(3),
        td:nth-child(3) {
            width: 150px;
        }
        th:nth-child(4),
        td:nth-child(4) {
            width: 150px;
        }
        th:nth-child(5),
        td:nth-child(5) {
            width: 150px;
        }
        th:nth-child(6),
        td:nth-child(6) {
            width: 150px;
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
                    <th>Action</th>
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
                    echo '<td><a href="borrow.php?borrowed_id=' . $row['borrowed_id']  . '&username=' . $id . '" class="return-link"><button class="return-button">Borrowed</button></a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <div class="but">
            
            <a href="borrow_records.php" target="_self">
                <button id="but">Home</button>
            </a>
        </div>
    </div>
</body>
</html>
