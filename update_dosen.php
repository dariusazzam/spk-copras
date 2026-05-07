<?php
include 'koneksi.php';

$id = $_POST['id_dosen'];
$nama = $_POST['nama_dosen'];
$nilai_array = $_POST['nilai'];

$query = "UPDATE dosen SET nama_dosen = '$nama'";

foreach ($nilai_array as $kode => $val) {
    $nama_kolom = strtolower($kode) . "_val";
    $query .= ", $nama_kolom = '$val'";
}

$query .= " WHERE id_dosen = '$id'";

$update = mysqli_query($conn, $query);

if($update) {
    echo "<script>alert('Data Dosen Berhasil Diperbarui!'); window.location='data_dosen.php';</script>";
} else {
    echo "Gagal update: " . mysqli_error($conn);
}
?>