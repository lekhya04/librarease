<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
            width: 500px;
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
<form action="view.php" method="post" name="f1">
    <h1>Search Book</h1>
    <p class="data">Book Name: <input type="text" placeholder="Enter Book Name" autocomplete="off" name="book_name"></p>
    <p>or</p>
    <p class="data">Book Author: <input type="text" placeholder="Enter Book Author" autocomplete="off" name="book_author"></p>
    <div style="text-align: center;">
        <button type="submit" name="search"><i class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;Search</button>
        <button type="button" onclick="window.open('studenthome.php', '_self')"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;Home</button>
        <button type="reset"><i class="fas fa-times"></i>&nbsp;&nbsp;&nbsp;Clear</button>
    </div>
</form>
</body>
</html>
