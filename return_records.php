<?php
$connection = mysqli_connect('localhost', 'root', '', 'library');
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}
$query = "SELECT * FROM returnrecords ORDER BY id DESC";
$result = mysqli_query($connection, $query);
mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Return Records</title>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-size: cover;
            background-image: url("libraries.jpg");
            background-position: center;
            background-attachment: fixed;
            backdrop-filter: blur(10px);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(255, 255, 255);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 90%;
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

        tr:hover {
            background-color: #f9f9f9;
        }

        .return-link {
            text-decoration: none;
        }
        .table-container {
            flex-grow: 1;
            overflow-y: auto;
            margin-top: 20px;
        }

        .return-button {
            padding: 5px 10px;
            font-size: 14px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .return-button:hover {
            background-color: #2980b9;
        }

        .but {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 20px;
        }

        #but, #notify {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
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


        #but:hover, #notify:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Return Records</h1>
        <div class="search-container">
            <form action="returned.php" method="GET">
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
            <form action="send_notification.php" method="post">
                <button id="notify" type="submit">Send Notification</button>
            </form>
        </div>
    </div>
</body>
</html>
