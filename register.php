<!DOCTYPE html>
<html lang="en">
<head>
    <title>REGISTRATION</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden; 
        }
        header {
            color: #C8C8C8;
            font-size: 50px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            top: 5px;
            position: fixed;
            width: 100%;
            height: 60px;
            left: 0;
            background: linear-gradient(to left,
                            yellow,
                            orange,
                            red);
            text-align: center;
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
            border-radius: 12px;
            width: 100%;
            height: 85%;
            margin-top: 70px;
            margin-right: 15px;
            
        }
        .img-container {
            border-radius: 12px 0 0 12px;
            margin-left: 50px;
        }
        .form {
            width: 100%;
            max-width: 400px;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .img-container img {
            width: 100%;
            height: 90%;
            margin-top: 25px;
            border-radius: 12px;
        }
        .user {
            width: 410px;
            height: 40px;
            margin:5px;
            border-radius:5px;
            font-size: larger;
            cursor: pointer;
            background-color: #5FA9EE;
        }
        .user:hover{
            background-color: #007bff; 
            color: #fff; 
        }
        .data {
            font-size: larger;
            color: black;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            width:300px;
        }
        .name, .pass, .idno, .email, .password, .check, .gender, .dob {
            width: 100%;
            height: 30px;
            font-size: large;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .imgcontainer {
            text-align: center;
            margin: 35px 0 12px 0;
            object-fit: cover;
        }
        img.avatar {
            width: 30%;
            border-radius: 50%;
        }
        .fa-icon {
            font-size: 40px;
        }
        .psw {
            text-align: center;
            font-size: larger;
            font-family: 'Times New Roman', Times, serif;
        }
        .icon {
            color: black;
            font-size: 24px;
        }
        .but {
            width: 150px;
            height: 30px;
            align-items: center;
            background-color: #5FA9EE;
            font-size: 19px;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px 0;
        }
        .danger {
            color: red;
            text-align: center;
        }
        .login {
            font-size: larger;
            color: blue;
            font-family: 'Times New Roman', Times, serif;
        }
        .message {
            text-align: center;
            width: 100%;
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
        <div class="img-container">
            <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bGlicmFyeXxlbnwwfHwwfHx8MA%3D%3D" alt="Decorative Image">
        </div>
        <div class="form-container">
            <div class="form">
                <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'library');
                    if (mysqli_connect_error()) {
                        exit("Error connecting to Database");
                    }
                    if (isset($_POST["submit"])) {
                        $name = $_POST["name"];
                        $id = $_POST["id"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $dob = $_POST["dob"];
                        $rp = $_POST["rp"];
                        $errors = array();

                        if (strlen($password) < 8) {
                            array_push($errors, "password is too weak");
                        }
                        if ($password != $rp) {
                            array_push($errors, "password is not matched");
                        }

                        if ($stmt = $conn->prepare('SELECT * FROM student WHERE id = ?')) {
                            $stmt->bind_param('s', $_POST['id']);
                            $stmt->execute();
                            $stmt->store_result();

                            if ($stmt->num_rows() > 0) {
                                array_push($errors, "id already exists!");
                            }
                        }

                        if (count($errors) > 0) {
                            foreach ($errors as $error) {
                                echo "<div class='danger'>$error</div>";
                            }
                        } else {
                            if ($stmt = $conn->prepare('INSERT INTO student (username, password, id, email, dob) VALUES ( ?, ?, ?, ?, ? )')) {
                                $stmt->bind_param("sssss", $name, $password, $id, $email, $dob);
                                $stmt->execute();
                                echo '<script type="text/javascript">';
                                echo 'alert("successfully registered")';
                                echo '</script>';
                            } else {
                                die("Something went wrong");
                            }
                        }
                    }
                ?>
                <form action="register.php" method="post" id="form">
                    <h1 align="center"><font color="black">Student Registration</font></h1>
                    <div class="imgcontainer">
                        <img src="student.png" alt="Avatar" class="avatar">
                    </div>
                    <div class="name">
                        <div class="input">
                            <i class="icon fas fa-user"></i>
                            <input type="text" placeholder="Enter your Full name" name="name" id="name" class="data" required>
                        </div>
                    </div>
                    <div class="idno">
                        <div class="input">
                            <i class="icon fas fa-address-card"></i>
                            <input type="text" placeholder="Enter Identity number" name="id" id="id" class="data" required>
                        </div>
                    </div>
                    <div class="email">
                        <div class="input">
                            <i class="icon fas fa-envelope"></i>
                            <input type="email" placeholder="Enter your Email" name="email" id="email" class="data" required>
                        </div>
                    </div>
                    <div class="password">
                        <div class="input">
                            <i class="icon fas fa-lock"></i>
                            <input type="password" placeholder="Enter Password" name="password" id="password" class="data" required>
                        </div>
                    </div>
                    <div class="check password">
                        <div class="input">
                            <i class="icon fas fa-lock"></i>
                            <input type="password" placeholder="Re-enter password" name="rp" id="rp" class="data" required>
                        </div>
                    </div>
                    <div class="gender">
                        <div class="input">
                            <input type="radio" name="gender" id="male" value="male">
                            <i class="icon fas fa-male"></i>
                            <label for="male" style="color:black;">Male</label>
                            <input type="radio" name="gender" id="female" value="female">
                            <i class="icon fas fa-female"></i>
                            <label for="female" style="color:black;">Female</label>
                        </div>
                    </div>
                    <div class="dob">
                        <div class="input">
                            <input type="date" name="dob" id="dob" class="data" required>
                        </div>
                    </div>
                    <div class="message">
                        <input type="submit" value="Register" class="user" name="submit">
                        <input type="reset" class="user" value="Clear" name="clear">
                    </div>
                    <div class="message">
                        <p class="data">Already registered? <a href="loginpage.php" class="login">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
