<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM dosen WHERE id_dosen = '$id'";
$hapus = mysqli_query($conn, $query);

if($hapus) {
    echo "<script>alert('Data Berhasil Dihapus!'); window.location='data_dosen.php';</script>";
} else {
    echo "Gagal menghapus: " . mysqli_error($conn);
}
?>