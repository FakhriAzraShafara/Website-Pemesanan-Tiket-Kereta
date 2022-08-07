<?php
require('koneksi.php');
$id = $_GET['id'];

$data = mysqli_query($koneksi, "DELETE from jadwal where no = '$id'");
echo "<meta http-equiv=refresh content=0;URL='listinput.php'>";
?>