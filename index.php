<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-image: url("libraries.jpg");
            background-size: cover;
            backdrop-filter: blur(7px);
            height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center; 
            font-family: 'Helvetica', sans-serif;
            overflow: hidden;
        }
        header {
                background: linear-gradient(to left, yellow, orange, red);
                -webkit-background-clip: text;
                color: transparent;
                font-size: 100px;
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
        .fa-icon {
            font-size: 80px; 
        }
        .button-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 300px; 
            margin-top: 150px;
        }
        .button {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .button img {
            width: 280px;
            height: 280px;
            cursor: pointer;
            border: none; 
        }
        .button img:hover {
            transform: scale(1.05); 
        }
        h1 {
            margin-top: 10px;
            font-size: 20px;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION['id'])) {
        header("Location: studenthome.php");
        exit();
    }
    if (isset($_SESSION['faculty_id'])) {
        header("Location: facultyhome.php");
        exit();
    }
?>
    <header>
        <i class="fas fa-book-open fa-icon"></i> 
        LIBRAREASE
        <i class="fas fa-book-open fa-icon"></i> 
    </header>
    <div class="button-container">
        <div class="button">
            <img src="book.png" alt="Librarian Button" class="lib" onclick="window.open('<?php echo isset($_SESSION['faculty_id']) ? 'facultyhome.php' : 'facultylogin.php' ?>', '_blank')">
            <h1>Librarian</h1>
        </div>
        <div class="button">
            <img src="graduated.png" alt="Student Button" class="stu" onclick="window.open('<?php echo isset($_SESSION['id']) ? 'studenthome.php' : 'loginpage.php' ?>', '_blank')">
            <h1>Student</h1>
        </div>
    </div>
</body>
</html>
