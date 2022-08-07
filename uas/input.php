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
    <title>E-Tiket Go-Train</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="ProsesInput.php" method="post" enctype="multipart/form-data" id="form1">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img src="logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                    E-Tiket Go-Train
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <form action="" method="POST" class="login-email">
                                <a class="nav-link" href="profil.php"><button type="button"
                                        class="btn btn-outline-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24">
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
            <h1 class="text-center text-warning">FORM RESERVASI</h1>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#fff" fill-opacity="1"
                    d="M0,96L48,128C96,160,192,224,288,245.3C384,267,480,245,576,208C672,171,768,117,864,122.7C960,128,1056,192,1152,229.3C1248,267,1344,277,1392,282.7L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </section>
        <!-- akhir jumbotron -->

        <!-- form -->

        <section id="form">
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4 row justify-content-center fs-5">
                    <div class="col-mb-4 mb-3">
                        <div class="card border-primary">
                            <h2 class="card-header bg-primary"><font class="text-light">Pesan Tiket Sekarang!</font> </h2>
                            <div class="card-body">
                                <div class="col-md-15">
                                    <form>
                                        <div class="input-date">
                                            <strong><label>Tanggal Pemesanan</label></strong>
                                            <input class="form-control" type="date" name="Tanggal" id="Tanggal" required
                                                pattern="d-m-Y" />
                                        </div>
                                        <div class="input-field">
                                            <strong><label for="nama" class="form-label">Nama</label></strong>
                                            <input name="nama" type="text" class="form-control" id="nama"
                                                placeholder="Masukkan Nama Anda" required>
                                        </div>
                                        <div class="option-select">
                                            <strong><label for="kategori" class="form-label">Rute Perjalanan
                                                    </label></strong>
                                                    <select name="Ruteperjalanan" class="form-select mb-2" type="option">
                            <?php
                            include "koneksi.php";
                            $query = mysqli_query($koneksi,"SELECT * FROM jadwal") or die(mysqli_error($koneksi));
                            while($data=mysqli_fetch_array($query)){
                                echo"<option value=$data[rute]>$data[rute]</option>";}
                            ?>
                    </select>
                                        </div>
                                        <div>
                                            <div class="input-radiobutton">
                                                <strong><label>Kewarganegaraan</label></strong>
                                                <div class="input-radiobutton">
                                                    <input class="form-check-input" type="radio" name="kewarganegaraan"
                                                        value="WNI" required>
                                                    <label class="input-radiobutton" for="1">
                                                        WNI</label>
                                                </div>
                                                <div class="input-radiobutton">
                                                    <input class="form-check-input" type="radio" name="kewarganegaraan"
                                                        value="WNA">
                                                    <label class="form-check-label" for="2">
                                                        WNA
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="option-select">
                                            <strong><label for="kategori" class="form-label">Jenis Kereta
                                                    </label></strong>
                                                    <select name="kelas_kereta" class="form-select mb-2" type="option">
                            <?php
                            include "koneksi.php";
                            $query = mysqli_query($koneksi,"SELECT * FROM kelaskereta") or die(mysqli_error($koneksi));
                            while($data=mysqli_fetch_array($query)){
                                echo"<option value=$data[IdKereta]>$data[kelaskereta]</option>";}
                            ?>
                    </select>
                                        </div>
                                        <div class="option-select">
                                            <strong><label for="kategori" class="form-label">Kursi</label></strong>
                                            <select class="form-select" select name="Nomor_kursi" id="Nomor_kursi"
                                                required>
                                                <option value="">--Pilih Kursi--</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                            </select>
                                        </div>
                                        <br>
                                        <input type="submit" name="simpan" id="simpan" value="Simpan"
                                            class="btn btn-success" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <img src="img.svg" class="card-img-top">
                        <div class="card-body">
                            <strong>
                                <h5 class="card-title">Keterangan Reservasi E-Tiket Go-Train :</h5>
                            </strong>
                            <p class="card-text">1. Tiket dapat dipesan Max 2x dalam sehari.</p>
                            <p class="card-text">2. Jam operasional Sabtu dan Minggu mulai Pukul 09.00 - 16.00 WIB</p>
                            <p class="card-text">3. Dalam 1 Gerbong memiliki 30 kursi</p>
                            <p class="card-text">4. Memiliki rute yang berbeda,</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#273036" fill-opacity="1"
                    d="M0,32L80,64C160,96,320,160,480,160C640,160,800,96,960,74.7C1120,53,1280,75,1360,85.3L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
                </path>
            </svg>
            <!-- akhir form -->

            <!-- footer -->
            <footer class="bg-primary text-white text-center pb-2">
                <p>Created By <a href="index.php" class="text-white fw-bold">Kelompok 3</a></p>
            </footer>
            <!-- akhir footer -->
</body>

</html>