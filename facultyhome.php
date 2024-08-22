<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-image: url("admin.png");
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(20px);
        }

        .container {
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
        }

        header {
            background: linear-gradient(to left, #DDE16C, orange, red);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 80px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            top: 10px;
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

        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            z-index: 5; 
        }
        .welcome-message {
            font-size: 50px;
            color: #666;
            margin-bottom: 40px;
        }

        .button-box {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .button {
            width: 250px;
            height: 100px;
            border: none;
            border-radius: 10px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 25px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-decoration: none;
        }

        .button i {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .button#add {
            background-color: #D85E13;
        }

        .button#update {
            background-color: #B4B416;
        }

        .button#change {
            background-color: #3554BB;
        }

        .button#view {
            background-color: #1ABC9C;
        }

        .button#suggest {
            background-color: #8e44ad;
        }
      
        .button-text {
            margin-left: 10px;
        }

        footer {
            width: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
    <header>
        <i class="fas fa-book-open fa-icon"></i> 
        LIBRAREASE
        <i class="fas fa-book-open fa-icon"></i>
    </header>
    <button class="logout-button" onclick="location.href='logout.php'"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</button>

    <div class="container">
        <div class="welcome-message">
            Welcome, Admin  
        </div>
        <div class="button-box">
            <a href="add.php" class="button" id="add" target="_blank">
                <i class="fas fa-plus-circle"></i>
                <span class="button-text">Add Books</span>
            </a>
            <a href="update.php" class="button" id="update" target="_blank">
                <i class="fas fa-sync-alt"></i>
                <span class="button-text">Update Books</span>
            </a>
            <a href="record.php" class="button" id="change" target="_blank">
                <i class="fas fa-book"></i>
                <span class="button-text">Records</span>
            </a>
            <a href="faculty_view.php" class="button" id="view" target="_blank">
                <i class="fas fa-clipboard"></i>
                <span class="button-text">View Books</span>
            </a>
            <a href="view_suggestions.php" class="button" id="suggest" target="_blank">
                <i class="fas fa-lightbulb"></i>
                <span class="button-text">Suggestions</span>
            </a>
        </div>
    </div>
    <footer>
        <marquee behavior="scroll" direction="left">"A library is not a luxury but one of the necessities of life." ― Henry Ward Beecher</marquee>
    </footer>
</body>
</html>
