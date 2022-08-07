<?php
require('koneksi.php');
$username = $_POST['username'];
$ = $_POST['password'];

$data = mysqli_query($koneksi,"SELECT * FROM `login` WHERE (`username`,`password`) VALUES ('$username', '$password'); ");
if ($data == 1) {
    echo "Data Berhasil Ditambahkan <br />";
?>
    <script>
        let url = "listinput.php";
        window.location.href = url;
    </script>
<?php
} else {
    echo "Data Gagal Ditambahkan <br/> ";
?>
    <script>

    </script>
<?php
}

