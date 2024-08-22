<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select</title>
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
        }
        header {
            background: linear-gradient(to left, yellow, orange, red);
            -webkit-background-clip: text;
            color: transparent;
            font-size: 80px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            top: 40px;
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
        .form {
            width: 40rem;
            margin-top: 100px;
            color: white;
            background-color: rgba(9, 4, 7, 0.42);
            border-radius: 12px;
            align-items: center;
            height: 370px;
            padding: 20px;
            box-sizing: border-box;
        }
        .img {
            width: 50px;
            height: 50px;
            margin: 10px auto 0;
        }
        .user {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 400px;
            padding: 15px 30px;
            margin: 10px 0;
            font-size: 30px;
            cursor: pointer;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .user:hover {
            background-color: rgba(124,134,144);
            transform: scale(1.05);
        }
        .data {
            font-size: 30px;
            font-family: 'Times New Roman', Times, serif;
        }
        .name {
            width: 240px;
            height: 30px;
            font-size: 20px;
            padding: 5px;
            box-sizing: border-box;
        }
        .buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top:25px;
        }
    </style>
</head>
<body>
<header>
    <i class="fas fa-book-open fa-icon"></i> 
    LIBRAREASE
    <i class="fas fa-book-open fa-icon"></i>
</header>
<div class="form">
    
    <center>
    <h1>Borrowed Records</h1>
        <div class="buttons">
            <button type="button" class="user" onclick="window.open('borrow_records.php', '_self')"><i class="fas fa-eye"></i> View</button>
            <button type="button" class="user" onclick="window.open('record.php', '_self')"><i class="fas fa-home"></i> Home</button>

        </div>
        <br>
    </center>
    </div>
</body>
</html>
