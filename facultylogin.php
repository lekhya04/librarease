<!DOCTYPE html>
<html lang="en">
<head>
    <title>Faculty Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        header {
            color: #C8C8C8;
                    font-size: 50px;
                    text-align: center;
                    font-family: 'Times New Roman', Times, serif;
                    top: 0px;
                    position: fixed;
                    width: 100%;
                    height:60px;
                    left: 0;
                    text-align: center;
                    background:linear-gradient(to left, yellow, orange, red);
                    -webkit-background-clip: text;
                    color: transparent;
                            z-index: 1;
        }
        body {
            background-size: cover;
            background-image: url("https://img.freepik.com/free-vector/elegant-white-wallpaper-with-golden-details_23-2149095007.jpg");
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            display: flex;
            width: 100%;
            height: 100%;
        }
        .form-container, .img-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            box-sizing: border-box;
        }
        .form-container {
            
            border-radius: 12px 12px 12px 12px;
            width:100%;
            height:85%;
            margin-top:60px;
            margin-left:15px;
        }
        .img-container {
            
            
            border-radius: 0 12px 12px 0;
        }
        .form {
            width: 100%;
            max-width: 400px;
            color: white;
            padding: 20px;
        }
        .img-container img {
            width: 100%;
            height:90%;
            margin-top:45px;
            border-radius: 12px;
        }
        .user {
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
        .fa-icon {
            font-size: 45px; 
        }
        .name, .pass {
            width: 100%;
            height: 30px;
            font-size: large;
            margin-bottom: 10px;
        }
        .imgcontainer {
            text-align: center;
            margin: 35px 0 12px 0;
            object-fit:cover;
        }
        img.avatar {
            width: 40%;
            border-radius: 50%;
        }
        .psw {
            align:center;
            font-size: larger;
            font-family: 'Times New Roman', Times, serif;
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
                <div class="form-container">
                    <div class="form">
                        <form action="facultycheck.php" method="post">
                            <h1 align="center"><font color="black">Admin Login</font></h1>
                            <div class="imgcontainer">
                                <img src="img_avatar2.jpg" alt="Avatar" class="avatar">
                            </div>
                            <?php if(isset($_POST['submit'])) {?>
                                <p class="error"><?php echo $_GET['error'];?></p>
                            <?php } ?>
                            <p class="data">Username: <input type="text" placeholder="Faculty Username" autocomplete="off" name="user" class="name"></p>
                            <p class="data">Password: <input type="password" placeholder="Faculty Password" autocomplete="off" name="password" class="pass"></p>
                            <div style="text-align: center;">
                                <input type="submit" value="Login" class="user" name="submit"><br><br>
                                <input type="button" value="Home" class="user" onclick="window.open('index.php', '_self')">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="img-container">
                    <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bGlicmFyeXxlbnwwfHwwfHx8MA%3D%3D" alt="Decorative Image">
                </div>
        </div>
</body>
</html>