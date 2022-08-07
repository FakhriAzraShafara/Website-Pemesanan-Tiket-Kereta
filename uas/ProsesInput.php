<?php
error_reporting(0);
include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $ID_penumpang = $_POST['ID_penumpang'];
    $Tanggal = $_POST['Tanggal'];
    $nama = $_POST['nama'];
    $Titik_singgah = $_POST['Ruteperjalanan'];
    $Nomor_bus = $_POST['kewarganegaraan'];
    $Putaran = $_POST['kelas_kereta'];
    $Nomor_kursi = $_POST['Nomor_kursi'];

        $query = "INSERT INTO pemesanan VALUES ('$ID_penumpang', '$Tanggal', '$nama', '$Titik_singgah', 
        '$Nomor_bus', '$Putaran', '$Nomor_kursi')";

        $result = mysqli_query($koneksi, $query);

        if (!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi)).
                " - " . mysqli_error($koneksi);
        }
        else
        {
            echo "<script>alert('Data Berhasil Ditambah');window.location.href='preview.php'</script>";
        }
}

?>