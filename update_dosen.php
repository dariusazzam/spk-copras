<?php
include 'koneksi.php';

$id = $_POST['id_dosen'];
$nama = $_POST['nama_dosen'];
$c1 = $_POST['c1'];
$c5 = $_POST['c5'];

$query = "UPDATE dosen SET 
          nama_dosen = '$nama', 
          c1_val = '$c1', 
          c5_val = '$c5' 
          WHERE id_dosen = '$id'";

$update = mysqli_query($conn, $query);

if($update) {
    echo "<script>alert('Data Berhasil Diupdate!'); window.location='data_dosen.php';</script>";
} else {
    echo "Gagal update: " . mysqli_error($conn);
}
?>