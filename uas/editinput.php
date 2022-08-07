<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>UPDATE</title>
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
$id=$_GET['id'];
$data=mysqli_query($koneksi,"select * from jadwal where no='$id'");
$d=mysqli_fetch_array($data);
foreach ($data as $item)
?>
<div class="container">
<div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">
      <h1>UPDATE DATA</h1>
          <br>
<div class="col-md-5">

          <form action=""method="POST" enctype="multipart/form-data">
          <div class="form-group">
                   <label>Rute Perjalanan</label>
                   <input class="form-control" type="text"name="rute"value="<?php echo $d['rute'];?>">

               </div>
               <br>
               <div class="form-group">
                   <label>Id Kereta</label>
                   <select name="IdKereta" class="form-select mb-2" type="option" id="IdKereta" value="<?php echo$d['IdKereta'];?>">

                   <?php
                                    $datatiket = mysqli_query($koneksi, "SELECT * FROM kelaskereta");
                                    $i = 1;
                                    foreach ($datatiket as $list) {
                                    ?>
                                    <option value="<?php echo $list['IdKereta']; ?>" 
                                    <?php $isSelected = $list['IdKereta'] == $item['IdKereta'] ? "selected" : "";
                                        echo $isSelected; ?>>
                                        <?php echo $list['IdKereta'] ?></option>
                                    <?php } ?>
                    </select>
               <br>
               <div class="form-group">
                   <label>Tiba</label>
                   <input class="form-control" type="text"name="tiba"value="<?php echo$d['tiba'];?>">

               </div>
               <br>
               <div class="form-group">
                   <label>Keberangkatan</label>
                   <input class="form-control" type="text"name="berangkat"value="<?php echo$d['berangkat'];?>">
               </div>
               <br>
               <div class="form-group">
               <label class="form-label" for="namakereta">Nama Kereta</label>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="namakereta" value="Jayabaya" required
                                    <?php if ($item['namakereta'] == "Jayabaya") {
                                        echo "checked";
                                    } ?>>
                                    <label class="form-check-label" for="kondisi1">
                                        Jayabaya
                                    </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="namakereta" value="Krakatau"
                                    <?php if ($item['namakereta'] == "Krakatau") {
                                        echo "checked";
                                        } ?>>
                                    <label class="form-check-label" for="kondisi2">
                                        Krakatau
                                    </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="namakereta" value="Gajayana"
                                    <?php if ($item['namakereta'] == "Gajayana") {
                                        echo "checked";
                                        } ?>>
                                    <label class="form-check-label" for="kondisi2">
                                        Gajayana
                                    </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="namakereta" value="Sembrani"
                                    <?php if ($item['namakereta'] == "Sembrani") {
                                        echo "checked";
                                        } ?>>
                                    <label class="form-check-label" for="kondisi2">
                                        Sembrani
                                    </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="namakereta" value="Turangga"
                                    <?php if ($item['namakereta'] == "Turangga") {
                                        echo "checked";
                                        } ?>>
                                    <label class="form-check-label" for="kondisi2">
                                        Turangga
                                    </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="namakereta" value="Malabar"
                                    <?php if ($item['namakereta'] == "Malabar") {
                                        echo "checked";
                                        } ?>>
                                    <label class="form-check-label" for="kondisi2">
                                        Malabar
                                    </label>
                                    </div>
               <br>
               <div class="form-group">
               <strong><label for="expres">Express(?)</label></strong><br>
               <input class="form-check-input" type="checkbox" name="expres" value="Ya"
                                    <?php if ($item['expres'] == "Ya") {
                                        echo "checked";
                                        } ?>>
                                    <label class="form-check-label" for="expres">
                                        Ya
                                    </label>
                                    </div><br>
               <div class="form-group">
                <strong><label for="deskripsi">Deskripsi</label></strong>
                   <textarea name="deskripsi" cols="35" rows="5" class="form-control"><?php echo$d['deskripsi'];?></textarea>
               </div>
               <div class="form-group">
               <label for="gambar">Gambar Kereta</label>
                    <input type="file" name="gambar" class="form-control" value="<?php echo$d['gambar'];?>" selected="./images/<?php echo $d['gambar'];?>">
                    <p align="right" class="text-info"><i class="text-dark">gambar saat ini : </i><?php echo$d['gambar'];?></p>
                    <p align="right"><img style="width: 180px;" class="mb-3 rounded " src="./images/<?php echo $d['gambar'];?>"/></p>
                </div>
               <hr>
               <input type="Submit" value="Submit" name="proses" class="btn btn-primary w-100">
          </form>
          </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
          <br><br>
              <!-- footer -->
    <footer class="bg-primary text-white text-center pb-2">
        <p>Created By <a href="" class="text-white fw-bold">Kelompok 3</a></p>
    </footer>
    <!-- akhir footer -->
    <?php
    include"koneksi.php";
    if(isset($_POST['proses'])){

    $rute = $_POST['rute'];
    $IdKereta = $_POST['IdKereta'];
    $tiba = $_POST['tiba'];
    $berangkat = $_POST['berangkat'];
    $namakereta = $_POST['namakereta'];
    if (isset($_POST['expres'])) {
        $expres = $_POST['expres'];
    } else {
        $expres = "Tidak";
    }
    $deskripsi = $_POST['deskripsi'];
    $folder = './images/';
    $name_p = $_FILES['gambar']['name'];
    $sumber_p = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($sumber_p, $folder.$name_p);

    echo "data sudah update";

    mysqli_query($koneksi, "UPDATE jadwal SET rute = '$rute', IdKereta = '$IdKereta', tiba = '$tiba', berangkat ='$berangkat', namakereta = '$namakereta', expres = '$expres', deskripsi = '$deskripsi', gambar = '$name_p' WHERE `jadwal`.no= '$id';") or die(mysqli_error($koneksi));
    echo "<meta http-equiv=refresh content=0;URL='listinput.php'>";
    }
    ?>
      </div>
</body>
</html>