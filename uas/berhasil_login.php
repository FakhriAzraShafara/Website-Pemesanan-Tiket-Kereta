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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
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
        <h1 class="text-center text-warning">E-Tiket GoTrain</h1>
        <h1 class="text-center text-warning">“GoTrain”</h1>
        <p class="text-center text-white">Platform pemesanan tiket online kereta api “GoTrain”.</p>
        <p class="text-center text-white">Reservasi Mudah, Tanpa Berebut.</p>
        <a class="nav-link" href="input.php"><button type="button" class="btn btn-warning">Pesan
                Sekarang!</button></a>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#fff" fill-opacity="1"
                d="M0,96L48,128C96,160,192,224,288,245.3C384,267,480,245,576,208C672,171,768,117,864,122.7C960,128,1056,192,1152,229.3C1248,267,1344,277,1392,282.7L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>
    <!-- akhir jumbotron -->

    <!-- jadwal -->
    <section id="jadwal">
        <div class="container">
            <div class="row text-center">
                <h2>Jadwal dan Rute Perjalanan</h2>
                <table class="table table-dark table-sm table table-bordered border-light">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Rute Perjalanan</th>
                            <th scope="col">Kelas Kereta</th>
                            <th scope="col">Tiba</th>
                            <th scope="col">Keberangkatan</th>
                            <th scope="col">Kereta</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include "koneksi.php";
                        $no = 1;
                        $data = mysqli_query($koneksi, "select * from jadwal, kelaskereta
                        WHERE jadwal.IdKereta = kelaskereta.IdKereta") or die (mysqli_error($koneksi));
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                            <td><?php echo $no++; ?></td>
                                <td class="border bg-sky-200 font-semibold"><?php echo $d['rute']; ?></td>
                                <td class="border bg-sky-200 font-semibold"><?php echo $d['IdKereta']; ?></td>
                                <td class="border bg-sky-200 font-semibold"><?php echo $d['tiba']; ?></td>
                                <td class="border bg-sky-200 font-semibold"><?php echo $d['berangkat']; ?></td>
                                <td class="border bg-sky-200 font-semibold"><?php echo $d['namakereta']; ?></td>
                                <td><button type="submit" class="border-solid shadow-md py-1 px-2 m-1 font-bold text-lg border-4 rounded-md bg-white border-blue-600 hover:bg-blue-400 hover:text-slate-200"><?php echo "<a href='detail.php?id=" . $d['no'] . "'>Detail</a>"; ?></button></td>
                                <?php } ?>
                                </tr>
                    </tbody>
                </table>
            </div>
    </section>
    <!-- akhir jadwal -->

    <!-- about -->
    <section id="about">
        <div class="container">
            <div class="row text-center">
                <h2>About</h2>
                <p>Go Train merupakan salah satu fasilitas Pemesanan tiket online Kereta Api.
                    Selain mudah digunakan, Go Train juga tentu saja terjamin keaslianya.
                    Jadi tunggu apalagi...yuk pesen tiket sekarang!!!!!!!
                </p>
            </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#273036" fill-opacity="1"
            d="M0,32L80,64C160,96,320,160,480,160C640,160,800,96,960,74.7C1120,53,1280,75,1360,85.3L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
    </svg>
    <!-- akhir about -->

    <!-- footer -->
    <footer class="bg-primary text-white text-center pb-2">
        <p>Created By <a href="" class="text-white fw-bold">Kelompok 3</a></p>
    </footer>
    <!-- akhir footer -->
</body>
</html>