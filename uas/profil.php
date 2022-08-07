<?php
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Tiket GoTrain</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                E-Tiket GoTrain
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="" method="POST" class="login-email">
                            <a class="nav-link" href="profil.php"><button type="button" class="btn btn-outline-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M4 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H4zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"
                                            fill="rgba(255,255,255,1)" />
                                    </svg>
                                    <bold>Hi, <?php echo $_SESSION['username']; ?></bold>
                                </button></button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="berhasil_login.php"><button type="button" class="btn btn-dark"
                                style="color: #fff"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M5.828 7l2.536 2.536L6.95 10.95 2 6l4.95-4.95 1.414 1.414L5.828 5H13a8 8 0 1 1 0 16H4v-2h9a6 6 0 1 0 0-12H5.828z"
                                        fill="rgba(255,255,255,1)" />
                                </svg>Back</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- jumbotron -->
    <section class="jumbotron text-center">
        <img src="logo.png" width="200" class="rounded-circle img-thumbnail">
        <h1 class="text-center text-warning">EDIT PROFILE</h1>
    </section>
    <!-- akhir jumbotron -->

    <!-- form -->
    <?php
    error_reporting(0);
    include 'koneksi.php';
    $id = $_SESSION['id'];
       
    if (isset($_SESSION['id'])) {
        $result = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
        while($row = mysqli_fetch_array($result)) {
            $username = $row["username"];
            $contact = $row["contact"];
            $email = $row["email"];
            $password = $row["password"];
        }

    }else{
        header("location:profil.php");
    }
    ?>
    <div class="container">
        <form action="" method="post" class="login-email">
            <font size="2">Email address</font><br>
            <div class="form-control">
                <input type="email" placeholder="Email address" name="email" value="<?php echo $email; ?>" required>
            </div>
            <font size="2">Username</font><br>
            <div class="form-control">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <font size="2">Contact Number</font><br>
            <div class="form-control">
                <input type="contact" placeholder="Contact Number" name="contact" value="<?php echo $contact; ?>"
                    required>
            </div>
            <font size="2">Password</font><br>
            <div class="form-control">
                <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" required>
            </div>
            <div class="form-control">
                <input class="btn btn-warning" type="submit" name="edit" value="edit"></button>
            </div>
        </form>
    </div>
    <!-- Proses Edit Profil -->
    <?php
    error_reporting(0);
    include 'koneksi.php';

    if (isset($_POST['edit']))
    {
    $username = $_SESSION['username'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $query = "UPDATE users set email = '$email',  username = '$username', contact = '$contact', 
    password = '$password' where username = '$username'";

    if (mysqli_query($koneksi, $query))
    {
        echo "<script>alert('Data Berhasil Diubah');window.location.href='profil.php'</script>";
    }
    else
    {
        die("Data gagal di ubah; ".mysqli_errno($koneksi).mysqli_error($koneksi));
    }
    }

    ?>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#273036" fill-opacity="1"
            d="M0,32L80,64C160,96,320,160,480,160C640,160,800,96,960,74.7C1120,53,1280,75,1360,85.3L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
    </svg>
    <!--akhir form -->

    <!-- footer -->
    <footer class="bg-primary text-white text-center pb-2">
        <p>Created By <a href="index.php" class="text-white fw-bold">Kelompok 3</a></p>
    </footer>
    <!-- akhir footer -->
</body>

</html>