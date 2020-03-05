หน้า Log in

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        require('db.php');
        session_start();

        if(isset($_POST['usernmae'])) {
            // removes backslashes
            $username = stripslashes($_REQUEST['username']);
            // escapes special characters in a string
            $username = mysqli_real_escape_string($con, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);


            $query = "SELECT * FROM users WHERE username='$username' AND password='".md5($password)."'";

            $result = mysqli_query($con, $query) or die(mysql_error());
            $row = mysqli_num_rows($result);

            if($rows == 1) {
                $_SESSION['username'] = $username;

                header("Location: index.php");
            } else {
                echo "<div class='form'>
                        <h3>Username/Password is incorrect.</h3>
                        <br>Click here to <a href='loginn.php'>Login</a>
                        </div>";
            }
        } else {
    ?>
            <div class="form">
                <h1>Log in</h1>
                <form action="" method="post"  name="login">
                    <input type="text" name="username" placeholder="Username" required> <br>
                    <input type="password" name="password" placeholder="Password" required> <br>
                    
                    <button type="submit" class="btn btn-success">เข้าสู่ระบบ</button>
                    
                    </form>
                    <p>Not registered yet? <a href="registration.php">Register Here</a></p>
            </div>
            <?php } ?>
</body>

</html>
