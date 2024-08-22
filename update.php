<?php
    include "db_con.php";

    if(isset($_POST['update']))
    {
        $book_no = $_POST['book_no'];
        $book_stock = $_POST['book_stock'];

        $sql = "UPDATE books SET book_stock = '$book_stock' WHERE book_no = '$book_no'";

        $result = $con->query($sql);

        if($result == TRUE)
        {
            echo '<script type="text/javascript">';
            echo 'alert("Successfully updated")';
            echo '</script>';
        }
        else
        {
            echo "Error: ".$sql."<br>".$con->error;
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
    <title>Update Book Stock</title>
    <style>
        body {
            background-image: url("libraries.jpg");
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(10px);
        }

            header {
                    background: linear-gradient(to left, yellow, orange, red);
                    -webkit-background-clip: text;
                    color: transparent;
                    font-size: 70px;
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
                background-color: #fff;
                max-width: 1000px;
                width:500px;
                margin:160px auto;
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

            button:hover {
                background-color: #495057;
            }

            button[type="reset"] {
                background-color: #dc3545;
            }

            button[type="reset"]:hover {
                background-color: #c82333;
            }

            button[type="button"] {
                background-color: #17a2b8;
            }

            button[type="button"]:hover {
                background-color: #138496;
            }

            @media (max-width: 600px) {
                button {
                    width: 100%;
                    margin-bottom: 10px;
                }
            }
    </style>
</head>
<body>
<header>
        <i class="fas fa-book-open fa-icon"></i> 
        LIBRAREASE
        <i class="fas fa-book-open fa-icon"></i> 
    </header>
        <form action="update.php" method="post">
            <h1 align="center"><font color="Black">Update Book Stock</font></h1>
            <p class="data">Book Number: <input type="text" placeholder="Book No" autocomplete="off" name="book_no" required></p>
            <p class="data">Book Stock: <input type="text" placeholder="New Book Stock" autocomplete="off" name="book_stock" required ></p>
                <button type="submit"  name="update"><i class="fas fa-edit"></i> Update</button>
                <button type="button"  onclick="window.open('facultyhome.php', '_self')"><i class="fas fa-home"></i> Home</button>
                <button type="reset" ><i class="fas fa-times"></i> Clear</button>
        </form>
</body>
</html>
