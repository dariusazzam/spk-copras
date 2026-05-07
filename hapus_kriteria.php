<?php
include 'koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM kriteria WHERE kode_kriteria = '$id'");

if($query) {
    echo "<script>alert('Kriteria Berhasil Dihapus!'); window.location='data_kriteria.php?mode=edit';</script>";
} else {
    echo "Gagal hapus: " . mysqli_error($conn);
}
?>