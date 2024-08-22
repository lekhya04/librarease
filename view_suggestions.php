<?php
$connection = mysqli_connect('localhost', 'root', '', 'library');
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}
$query = "SELECT * FROM suggestions ORDER BY time DESC";
$result = mysqli_query($connection, $query);
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Suggestions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-size: cover;
            background-image: url("libraries.jpg");
            background-position: center;
            backdrop-filter: blur(10px);
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
        }

        .container {
            margin-top: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 90%;
            max-width: 1000px;
            height: 75vh;
            display: flex;
            flex-direction: column;
        }

        h1 {
            color: #2c3e50;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #DADAD8;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e1e1e1;
        }
        tr:hover {
            background-color: #f9f9f9;
        }

        .table-container {
            flex-grow: 1;
            overflow-y: auto;
            margin-top: 20px;
        }

        header {
            background: linear-gradient(to left, yellow, orange, red);
            -webkit-background-clip: text;
            color: transparent;
            font-size: 70px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
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

        th {
            background-color: #f2f2f2;
            color: #2c3e50;
            position: sticky; 
            top: 0;
            z-index: 1;
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
    <header>
        <i class="fas fa-book-open fa-icon"></i> 
            LIBRAREASE
        <i class="fas fa-book-open fa-icon"></i>
    </header>

    <div class="container">
        <div class="header-container">
            <h1>List of Suggestions</h1>
            <a href="facultyhome.php" target="_self">
                <button id="but">Home</button>
            </a>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>ID</th>
                        <th>Suggestion</th>
                        <th>Suggested At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['username'] . '</td>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['suggestion'] . '</td>';
                        echo '<td>' . $row['time'] . '</td>';
                        echo '<td><a href="delete_suggestion.php?S_no=' . $row['S_no'] . '" class="return-link"><button class="return-button">Delete</button></a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
