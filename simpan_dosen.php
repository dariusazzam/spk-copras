<?php
include 'koneksi.php';

$nama = $_POST['nama_dosen'];
$nilai_array = $_POST['nilai'];


$kolom = "nama_dosen";
$values = "'$nama'";

foreach ($nilai_array as $kode => $val) {
    $nama_kolom = strtolower($kode) . "_val";
    $kolom .= ", $nama_kolom";
    $values .= ", '$val'";
}

$query = "INSERT INTO dosen ($kolom) VALUES ($values)";
$simpan = mysqli_query($conn, $query);

if($simpan) {
    echo "<script>alert('Data Dosen Berhasil Disimpan!'); window.location='data_dosen.php';</script>";
} else {
    echo "Gagal simpan! Pastikan kolom di tabel dosen sudah sesuai. Error: " . mysqli_error($conn);
}
?>