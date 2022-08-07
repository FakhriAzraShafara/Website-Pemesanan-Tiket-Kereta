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
                        <a class="nav-link active" aria-current="page" href="berhasil_login.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#jadwal">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="input.php">Buat Tiketmu Sekarang!</a>
                    </li>
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
                        <a class="nav-link" href="logout.php"><button type="button" class="btn btn-dark"
                                style="color: #fff"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M5 11h8v2H5v3l-5-4 5-4v3zm-1 7h2.708a8 8 0 1 0 0-12H4A9.985 9.985 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10a9.985 9.985 0 0 1-8-4z"
                                        fill="rgba(255,255,255,1)" />
                                </svg>Logout</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- jumbotron -->
    <section class="jumbotron text-center">
        <img src="logo.png" width="200" class="rounded-circle img-thumbnail">
        <h1 class="text-center text-danger">Bukti Pemesanan</h1>
        <h1 class="text-center text-success">E-Tiket GoTrain</h1>
        <h1 class="text-center text-warning">“Go Train”</h1><br>
        <p class="text-center text-light">Platform pemesanan tiket online kereta api “GoTrain”.</p>
        <p class="text-center text-light">Reservasi Mudah, Tanpa Berebut.</p>
        </div>
        <br>
        <p class="text-white">NB : Data penumpang akan diberitahukan oleh petugas saat di titik singgah </p>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </section>
    <!-- akhir jumbotron -->

    <?php
    error_reporting(0);
    include 'koneksi.php';

    header("location:ProsesInput.php");
    

?>

</body>
<script>
window.print();
</script>

</html>