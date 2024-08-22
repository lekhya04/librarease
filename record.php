<!DOCTYPE html>
<html lang="en">
<head>
    <title>Librarease Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 40px;
            text-align: center;
            width: 90%;
            max-width: 600px;
            margin-top: 120px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        p {
            font-size: 1.1em;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
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
        .btn, .home-btn {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 15px 30px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
            max-width: 300px;
        }

        .btn:hover, .home-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .home-btn {
            background-color: #28a745;
        }

        .home-btn:hover {
            background-color: #218838;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
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

    <div class="container">
        <h1>Records</h1>
        <p>Please choose an action below:</p>
        <div class="button-container">
            <button class="btn" onclick="location.href='borrow_records.php'">
                <i class="fas fa-book-reader"></i> Borrowed Records
            </button>
            <button class="btn" onclick="location.href='return_records.php'">
                <i class="fas fa-undo-alt"></i> Return Records
            </button>
        </div>
        <div class="button-container" style="margin-top: 20px;">
            <button class="home-btn" onclick="location.href='facultyhome.php'">
                <i class="fas fa-home"></i> Home
            </button>
        </div>
    </div>
</body>
</html>
