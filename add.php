<?php
    include "db_con.php";

    if(isset($_POST['submit']))
    {
        $book_no= $_POST['book_no'];
        $book_name= $_POST['book_name'];
        $book_author=$_POST['book_author'];
        $publisher=$_POST['publisher'];
        $subject=$_POST['subject'];
        $edition=$_POST['edition'];
        $book_stock= $_POST['book_stock'];

        $sql="INSERT INTO books (book_no,book_name,book_author,publisher,subject,edition,book_stock) VALUES('$book_no','$book_name','$book_author','$publisher','$subject','$edition',$book_stock)";

        $result=$con->query($sql);

        if($result == TRUE)
        {
            echo '<script type="text/javascript">';
            echo 'alert("successfully added")';
            echo '</script>';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Add Books</title>
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
                    font-size: 60px;
                    text-align: center;
                    font-family: 'Georgia', serif;
                    top: 0px;
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
            width: 600px;
            height:600px;
            margin-top:90px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h2 {
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
    
        <form action="add.php" method="post">
            <h2>Add Book</h2>
            <p class="data">Book Number: <input type="text" placeholder="Book No" autocomplete="off" name="book_no" required></p>
            <p class="data">Book Name : <input type="text" placeholder="Book Name" autocomplete="off" name="book_name" required></p>
            <p class="data">Book Author : <input type="text" placeholder="Book Author" autocomplete="off" name="book_author" required></p>
            <p class="data">Book Publisher : <input type="text" placeholder="Book Publisher" autocomplete="off" name="publisher" required></p>
            <p class="data">Subject : <input type="text" placeholder="Subject" autocomplete="off" name="subject" required></p>
            <p class="data">Edition : <input type="text" placeholder="Edition" autocomplete="off" name="edition" required></p>
            <p class="data">Book Stock : <input type="text" placeholder="Book Stock" autocomplete="off" name="book_stock" required></p>
            
                <button type="submit" name="submit"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add</button>
                <button type="button" onclick="window.open('facultyhome.php', '_self')"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp; Home</button>
                <button type="reset" ><i class="fas fa-times"></i>&nbsp;&nbsp;&nbsp;Clear</button>
            
        </form>

</body>
</html>