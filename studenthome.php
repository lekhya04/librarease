<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <style>
        body {
            background-image: url("background.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            backdrop-filter: blur(10px);
            height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: 'Helvetica', sans-serif;
            overflow: hidden;
        }

        .container {
            background-color: white;
            width: 80%;
            height: 50%;
            max-width: 800px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
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

        .hello {
            font-size: 60px;
            margin-top: 100px;
        }

        .username {
            color: black;
        }

        .button-container {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: space-around;
            width: 100%;
        }

        .but {
            background-color: #3498db;
            border: none;
            color: white;
            padding: 15px 30px;
            margin-left: 10px;
            font-size: 20px;
            cursor: pointer;
            border-radius: 5px;
            display: inline-block;
            align-items: center;
            transition: background-color 0.3s, transform 0.3s;
        }

        
        .but:hover{
            background-color: #2980b9;
        }

        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #e74c3c;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .logout-button:hover {
            background-color: #c0392b;
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
    <div class="container">
    <button class="logout-button" id="logout" onclick="window.location.href='logout.php'">
    <i class="fas fa-sign-out-alt"></i> Logout
</button>

        <div class="hello">Hello, <span class="username"><?php echo $_SESSION['username']; ?></span></div>
        <div class="button-container">
            <button class="but" id="borrow" onclick="window.open('bookborrow.php', '_blank')">
                <i class="fas fa-book"></i> Borrow
            </button>
            <button class="but" id="search" onclick="window.open('search.php', '_blank')">
                <i class="fas fa-search"></i> Search
            </button>
            <button class="but" id="view" onclick="window.open('total.php', '_blank')">
                <i class="fas fa-list"></i> View
            </button>
            <button class="but" id="suggest" onclick="window.open('suggestion_box.php', '_blank')">
                <i class="fas fa-lightbulb"></i> Suggestion Box
            </button>
        </div>
    </div>
    <footer>
        <marquee behavior="scroll" direction="left">"Reading is a discount ticket to everywhere." – Mary Schmich</marquee>
    </footer>
</body>
</html>
<?php
} else {
    header("Location: loginpage.php");
    exit();
}
?>
