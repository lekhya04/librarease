<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suggestion Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .container {
            max-width: 630px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        form {
            text-align: center;
        }
        textarea {
            width: 90%;
            height: 150px;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        .submit-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }
        #but {
            padding: 10px 30px;
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
        .submit-btn:hover {
            background-color: #2980b9;
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
    <div class="container">
        <h1>Suggestion Box</h1>
        <form action="suggestion_process.php" method="post">
            <textarea name="suggestion" placeholder="Write your suggestion here..." required></textarea><br>
            <input type="submit" name="submit" value="Submit Suggestion" class="submit-btn">
        </form>
        <a href="studenthome.php" target="_self">
                <button id="but">Home</button>
        </a>
    </div>
</body>
</html>
