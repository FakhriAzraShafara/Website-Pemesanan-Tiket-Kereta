<?php
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login2.php");
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="style.css">
    <title>Data Rute Perjalanan</title>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                Admin E-Tiket GoTrain
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="listinput.php"><button type="button"
                                class="btn btn-secondary">List Data</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form.php"><button type="button"
                                class="btn btn-light">Tambah Data</button></a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link"><button type="button" class="btn btn-danger">Logout</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

<?php
include "koneksi.php";
//cookies
$duajamlagi = time() + 2 * 3600; 
setcookie('KunjunganTerakhir', date("G:i - m/d/y"), $duajamlagi);
?>

<div class="container flex flex-wrap max-w-screen-lg justify-center mb-52">
    <div class="flex my-10 py-3 bg-cyan-500 rounded-lg max-w-2xl">
    <div class="col-md-3">
</div>
    </div>
    <br>
    <br>    
    <br>
        <h2 class="font-serif text-4xl font-bold">DATA KERETA</h2>


                <div class="flex justify-center my-4">
                <table class="text-center table-auto border-separate border-4 border-sky-600 font-sans border-spacing-x-2 rounded-xl ">
                <thead class="border border-sky-600 bg-sky-400 font-bold">        
                <section id="jadwal">
        <div class="container">
            <div class="row text-center">
                <h2>Jadwal dan Rute Perjalanan</h2>
                <table class="table table-dark table-sm table table-bordered border-light">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th class="text-center" scope="col">Rute Perjalanan</th>
                            <th scope="col">Kelas Kereta</th>
                            <th scope="col">Tiba</th>
                            <th scope="col">Keberangkatan</th>
                            <th scope="col">Kereta</th>
                            <th scope="col">Expres(?)</th>
                            <th class="text-center" scope="col">Deskripsi</th>
                            <th class="text-center" scope="col">Gambar</th>
                            <th></th>
                            <th colspan="1"></th>
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
                                <td align="center" class="border bg-sky-200 font-semibold"><?php echo $d['rute']; ?></td>
                                <td align="center" class="border bg-sky-200 font-semibold"><?php echo $d['IdKereta']; ?></td>
                                <td align="center" class="border bg-sky-200 font-semibold"><?php echo $d['tiba']; ?></td>
                                <td align="center" class="border bg-sky-200 font-semibold"><?php echo $d['berangkat']; ?></td>
                                <td align="center" class="border bg-sky-200 font-semibold"><?php echo $d['namakereta']; ?></td>
                                <td align="center" class="border bg-sky-200 font-semibold"><?php echo $d['expres']; ?></td>
                                <td align="center" class="border bg-sky-200 font-semibold"><?php echo $d['deskripsi']; ?></td>
                                <td align="center" class="border bg-sky-200 font-semibold"><img style="width: 180px;" class="mb-3 rounded " src="./images/<?php echo $d['gambar'];?>"/></td>
                                <td><button type="submit" class="border-solid shadow-md py-1 px-2 m-1 font-bold text-lg border-4 rounded-md bg-white border-blue-600 hover:bg-blue-400 hover:text-slate-200"><?php echo "<a href='editinput.php?id=" . $d['no'] . "'>edit</a>"; ?></button></td>
                                <td><button type="submit" class="border-solid shadow-md py-1 px-2 m-1 font-bold text-lg border-4 rounded-md bg-white border-blue-600 hover:bg-blue-400 hover:text-slate-200"><?php echo "<a href='hapus.php?id=" . $d['no'] . "'>hapus</a>"; ?></button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
    </section>
                    </thead>
                 <a href="form.php"><button type="submit" class="btn btn-success">Tambah Data</button></a>
                        </div>
                        </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0d0b0e" fill-opacity="1"
            d="M0,32L80,64C160,96,320,160,480,160C640,160,800,96,960,74.7C1120,53,1280,75,1360,85.3L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
    </svg>
</body>

</html>