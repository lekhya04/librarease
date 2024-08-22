<?php
    include "db_con.php";
    if (isset($_POST['search'])) {
    $book_name = $_POST['book_name'];
    $book_author = $_POST['book_author'];

    if (!empty($book_name) && !empty($book_author)) {
        $stmt = $con->prepare("SELECT * FROM books WHERE book_name = ? AND book_author = ?");
        $stmt->bind_param("ss", $book_name, $book_author);
    } elseif (!empty($book_name)) {
        $stmt = $con->prepare("SELECT * FROM books WHERE book_name = ?");
        $stmt->bind_param("s", $book_name);
    } elseif (!empty($book_author)) {
        $stmt = $con->prepare("SELECT * FROM books WHERE book_author = ?");
        $stmt->bind_param("s", $book_author);
    } else {
        echo "<script>
        alert('please enter a book name or book author to search');
        window.location.href = 'search.php';
        </script>";
        exit();
    }

    $stmt->execute();
    $result = $stmt->get_result();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #9C9C98;
            display: flex;
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
            width: 70%;
            max-width: 700px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color:#DADAD8;
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

        .but {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        #but {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #but:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Book Details</h1>
        <table>
            <thead>
                <tr>
                    <th>Book No</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Subject</th>
                    <th>Edition</th>
                    <th>Book Stock</th>
                </tr>
            </thead>
           <tbody>
                 <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['book_no'] . '</td>';
                        echo '<td>' . $row['book_name'] . '</td>';
                        echo '<td>' . $row['book_author'] . '</td>';
                        echo '<td>' . $row['publisher'] . '</td>';
                        echo '<td>' . $row['subject'] . '</td>';
                        echo '<td>' . $row['edition'] . '</td>';
                        echo '<td>' . $row['book_stock'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
           </tbody>
        </table>
        <div class="but">
            <a href="search.php" target="_self">
                <button id="but">Home</button>
            </a>
        </div>
    </div>
</body>
</html>
