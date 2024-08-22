<?php
    $con = mysqli_connect("localhost", "root", "", "library");
    if (!$con) {
        die("Connection failed" . " " . mysqli_connect_error());
    }
    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $pass = $_POST['password'];
        $rp = $_POST['reenter'];
        if ($username and $pass) {
            if ($pass == $rp) {
                $sql = "SELECT * FROM student WHERE id='$username'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) >= 1) {
                    $query = "UPDATE student SET password='$pass' WHERE id='$username'";
                    $re = mysqli_query($con, $query);
                    if ($re === TRUE) {
                        echo '<script type="text/javascript">';
                        echo 'alert("Password successfully updated")';
                        echo '</script>';
                    } else {
                        echo '<script type="text/javascript">';
                        echo 'alert("Failed to update password. Please try again.")';
                        echo '</script>';
                    }
                } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("Username not found")';
                    echo '</script>';
                }
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Passwords do not match")';
                echo '</script>';
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Username or password is empty")';
            echo '</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        header {
            color: #C8C8C8;
                    font-size: 60px;
                    text-align: center;
                    font-family: 'Times New Roman', Times, serif;
                    top: 30px;
                    position: fixed;
                    width: 100%;
                    height:60px;
                    left: 0;
                    text-align: center;
                    font-size: 50px;
                    background: linear-gradient(to left,
                            yellow,
                            orange,
                            red);
                    -webkit-background-clip: text;
                    color: transparent;
                            z-index: 1;
        }
        body{
            background:linear-gradient(to right,#DADADA,#BAB8B8,#7C7A7A);
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(255, 255, 255,0.4);
            box-sizing: border-box;
            border-radius: 12px 12px 12px 12px;
            width:100%;
            height:70%;
            margin-top:80px;
            margin-left:15px;
        }
        .form{
            width: 100%;
            max-width: 400px;
            color: white;
            padding: 20px;
        }
        .img{
            width: 50px;
            height: 50px;
            align-self: baseline;
        }
        .user{
            width: 410px;
            height: 40px;
            font-size: larger;
            cursor: pointer;
            background-color: #5FA9EE;
        }
        .data {
            font-size: larger;
            color:black;
            font-family: 'Times New Roman', Times, serif;
        }
        .name, .pass {
            width: 100%;
            height: 30px;
            font-size: large;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <center>
    <header>
        <i class="fas fa-book-open fa-icon"></i> 
            LIBRAREASE
        <i class="fas fa-book-open fa-icon"></i>
    </header>   
    <div class="form-container">
        <div class="form">
            <form action="forgot.php" method="post">
                <h1 align="center"><font color="black">Forgot Password</font></h1>
                            <?php if(isset($_GET['error'])) {?>
                                    <p class="error"><?php echo $_GET['error'];?></p>
                                <?php } ?>
                            <p class="data"><input type="text" placeholder="Username" autocomplete="off" name="user" class="name"></p>
                            <p class="data"><input type="password" placeholder="Password" autocomplete="off" name="password" class="pass"></p>
                            <p class="data"><input type="password" placeholder="Re-enter Password" autocomplete="off" name="reenter" class="pass"></p>
                            <div style="text-align: center;">
                                <input type="submit" value="Update" class="user" name="submit"><br><br>
                                <input type="button" value="Home" class="user" onclick="window.open('index.php', '_self')">
                            </div>
                            <p class="data"><a href="loginpage.php" style="color:black;">Back to Login</a></p>
                        </form>
                    </div>
                </div>
</body>
</html>