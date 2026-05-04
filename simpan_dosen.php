<?php
include 'koneksi.php';

$nama = $_POST['nama_dosen'];
$c1   = $_POST['c1'];
$c2   = $_POST['c2'];
$c3   = $_POST['c3'];
$c4   = $_POST['c4'];
$c5   = $_POST['c5'];
$c6   = $_POST['c6'];
$c7   = $_POST['c7'];
$c8   = $_POST['c8'];

$query = "INSERT INTO dosen (nama_dosen, c1_val, c2_val, c3_val, c4_val, c5_val, c6_val, c7_val, c8_val) 
          VALUES ('$nama', '$c1', '$c2', '$c3', '$c4', '$c5', '$c6', '$c7', '$c8')";

$simpan = mysqli_query($conn, $query);

if($simpan) {
    echo "<script>alert('Data Dosen Berhasil Ditambahkan!'); window.location='data_dosen.php';</script>";
} else {
    echo "Gagal simpan: " . mysqli_error($conn);
}
?>