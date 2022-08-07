<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: berhasil_login.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("Location: berhasil_login.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login E-Tiket GoTrain</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error']?>
    </div>

    <div class="container">
        <form action="" method="POST" class="login-email">
            <font size="2">Welcome to, E-Tiket GoTrain</font><br>
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign in</p>
            <font size="2">Enter your email address</font><br>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <font size="2">Enter your password</font><br>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>"
                    required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn btn-warning">Sign in</button>
            </div>
            <p class="login-register-text">No Account? <a href="Signup.php">Sign up</a></p>
            <p class="login-register-text"><a href="index.php">
                    < Back</a>
            </p>

        </form>
    </div>
</body>

</html>