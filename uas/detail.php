<?php
include "koneksi.php";
$id=$_GET['id'];
$produk=mysqli_query($koneksi,"select * from jadwal where no='$id'");
$hasil=mysqli_fetch_array($produk);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Cari Tiket</title>
    <style>
            body{
                background: #B2C8DF;
            }
            .detail {
            width:20%;
            min: height 300px;
            border:1px solid;
            margin:2.2%;
            float: left;
        }
                .card {
            width:20%;
            min: height 300px;
            border:1px solid;
            margin:2.2%;
            float: left;
        }
    </style>
</head>
<a href="berhasil_login.php"><button class="btn btn-warning">Back</button></a>
<header align="center"><h2><i>Kelas Kereta</i></h2></header>
<body>
<div class="container rounded d-flex justify-content-center">
<div class="detail">
<div class="card px-2 py-2" style="width: 18rem;">
    <img class="mb-3 rounded " src="./images/<?php echo $hasil['gambar'];?>"/>
    <h5 class="text-solid">Express(?) : <?php echo  $hasil['expres'];?></h3><hr>
    <h5 class="text-solid">Deskripsi : <?php echo $hasil['deskripsi'];?><hr>
    </div>
</div>
</div>
    <div class="container rounded d-flex justify-content-center">
                    <div class="card px-2 py-2" style="width: 18rem;">
                        <img class="mb-3 rounded " src="3ekonomi.jpg    ">
                        <h3>Ekonomi</h3>
                    </div>
                    <div class="card px-2 py-2" style="width: 18rem;">
                        <img class="mb-3 rounded " src="2bisnis.jpg    ">
                        <h3>Bisnis</h3>
                    </div>
                    <div class="card px-2 py-2" style="width: 18rem;">
                        <img class="mb-3 rounded " src="1eksekutif.jpg    ">
                        <h3>Eksekutif</h3>
                    </div>
    </div>
    <div align="center">
    <table border="1"style="border-collapse:collapse">
<tr bgcolor="#eee">
 <th class="border bg-sky-200 font-semibold" width="50">No</th>
 <th class="border bg-sky-200 font-semibold" width="100">ID Kereta</th>
 <th class="border bg-sky-200 font-semibold" width="150">Jenis Kereta</th>
 <th class="border bg-sky-200 font-semibold" width="150">Fasilitas</th>
 <th class="border bg-sky-200 font-semibold" width="150">Harga</th>
</tr>
                <tbody class="font-semibold">
                    <?php
                    include "koneksi.php";
                    $no = 1;
                    $data = mysqli_query($koneksi, "select * from kelaskereta");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td class="border bg-sky-200 font-semibold" align="center"><?php echo $no++; ?></td>
                            <td class="border bg-sky-200 font-semibold" align="center"><?php echo $d['IdKereta']; ?></td>
                            <td class="border bg-sky-200 font-semibold" align="center"><?php echo $d['kelaskereta']; ?></td>
                            <td class="border bg-sky-200 font-semibold"><?php echo $d['fasilitas']; ?></td>
                            <td class="border bg-sky-200 font-semibold" align="center"><?php echo $d['harga']; ?></td>
                        </tr>
                    <?php } ?>
    </p>
                    </div>
</body>