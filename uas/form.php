<?php
include 'koneksi.php';
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
    <!-- bootstrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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

<br><br><br>

            <section class="text-center">
            <img src="logo.png" width="200">
        <h1 class="text-center text-solid"><b><u> INPUT DATA</u></b></h1><br>
</section>
        <section id="form">
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4 row justify-content-center fs-5">
                    <div class="col-mb-4 mb-3">
                        <div class="">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <strong><label for="rute">Rute Perjalanan</label></strong>
                    <input type="text" name="rute"class="form-control" id="rute">
               </div>
               <div class="form-group">
               <strong><label for="IdKereta">Kelas Kereta</label></strong>
                   <select name="IdKereta" class="form-select mb-2" type="option" id="IdKereta">
                            <?php
                            include "koneksi.php";
                            $query = mysqli_query($koneksi,"SELECT * FROM kelaskereta") or die(mysqli_error($koneksi));
                            while($data=mysqli_fetch_array($query)){
                                echo"<option value=$data[IdKereta]>$data[kelaskereta]</option>";}
                            ?>
                    </select>
               </div>
               <div class="form-group">
               <strong><label for="tiba">Tiba</label></strong>
                   <input type="text" name="tiba" class="form-control" id="tiba">
               </div>
               <div class="form-group">
               <strong><label for="berangkat">Berangkat</label></strong>
                   <input type="text" name="berangkat" class="form-control" id="berangkat" required>
               </div>
               <div class="input-radiobutton">
                    <strong><label>Nama Kereta</label></strong>
               <div class="input-radiobutton">
                    <input class="form-check-input" type="radio" name="namakereta" value="Jayabaya" required>
                    <label class="input-radiobutton" for="1">Jayabaya</label>
                </div>
                <div class="input-radiobutton">
                    <input class="form-check-input" type="radio" name="namakereta" value="Krakatau">
                    <label class="form-check-label" for="2">Krakatau</label>
                </div>
                <div class="input-radiobutton">
                    <input class="form-check-input" type="radio" name="namakereta" value="Gajayana">
                    <label class="form-check-label" for="3">Gajayana</label>
                </div>
                <div class="input-radiobutton">
                    <input class="form-check-input" type="radio" name="namakereta" value="Sembrani">
                    <label class="form-check-label" for="4">Sembrani</label>
                </div>
                <div class="input-radiobutton">
                    <input class="form-check-input" type="radio" name="namakereta" value="Turangga">
                    <label class="form-check-label" for="5">Turangga</label>
                </div>
                <div class="input-radiobutton">
                    <input class="form-check-input" type="radio" name="namakereta" value="Malabar">
                    <label class="form-check-label" for="6">Malabar</label>
                </div>
                <div class="form-group">
                <strong><label for="expres">Express</label></strong><br>
                    <input type="checkbox" name="expres" id="Ya" value="Ya"> Ya
               </div>
               <div class="form-group">
                <strong><label for="deskripsi">Deskripsi</label></strong>
                   <textarea name="deskripsi" cols="35" rows="5" class="form-control"></textarea>
               </div>
               <div class="form-group">
               <strong><label for="gambar">Gambar Kereta</label></strong><br>
                    <input type="file" name="gambar" value="gambar" class="form-control">
                </div>
               <hr>
               <div class="form-group">
                    <input type="Submit" value="Submit" name="proses" class="btn btn-primary w-100">
                </div>
               </form>
               <hr>
                            </div>
                            </div>
                            </div>
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
</body>
</html>

<?php
if(isset($_POST['proses'])){
    
if (isset($_POST['expres'])) {
        $expres = $_POST['expres'];
    } else {
        $expres = "Tidak";
    }
    $folder = './images/';
    $name_p = $_FILES['gambar']['name'];
    $sumber_p = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($sumber_p, $folder.$name_p);
    $insert = mysqli_query($koneksi, "INSERT INTO jadwal VALUES (NULL,'".$_POST['rute']."','".$_POST['IdKereta']."','".$_POST['tiba']."','".$_POST['berangkat']."','".$_POST['namakereta']."','".$expres."','".$_POST['deskripsi']."','".$_FILES['gambar']['name']."')");
if($insert){
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>location='listinput.php?p'</script>";
}else{
    echo "<script>alert('Gagal menambahkan data')</script>";
}
}
?>

<?php
    error_reporting(0);
?>