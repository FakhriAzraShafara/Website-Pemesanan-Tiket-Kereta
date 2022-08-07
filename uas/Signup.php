<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO user (username, email,contact, password)
                    VALUES ('$username', '$email', '$contact', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Data Berhasil Ditambah');window.location.href='login.php'</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Sign Up E-Tiket GoTrain</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <font size="2">Welcome to, E-Tiket GoTrain</font><br>
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign up</p>
            <font size="2">Enter your email address</font><br>
            <div class="input-group">
                <input type="email" placeholder="Email address" name="email" value="<?php echo $email; ?>" required>
            </div>
            <font size="2">Username</font><br>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <font size="2">Contact Number</font><br>
            <div class="input-group">
                <input type="contact" placeholder="Contact Number" name="contact" value="<?php echo $contact; ?>"
                    required>
            </div>
            <font size="2">Enter your password</font><br>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>"
                    required>
            </div>
            <font size="2">Confirm password</font><br>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword"
                    value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Sign up</button>
            </div>
            <p class="login-register-text">Have an Account? <a href="login.php">Sign in </a></p>
            <p class="login-register-text"> <a href="index.php">
                    < Back </a>
            </p>
        </form>
    </div>
</body>

</html>