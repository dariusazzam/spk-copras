<?php
include 'koneksi.php';

$kode  = $_POST['kode_kriteria'];
$nama  = $_POST['nama_kriteria'];
$jenis = $_POST['jenis'];
$bobot = 0; 


$cek = mysqli_query($conn, "SELECT * FROM kriteria WHERE kode_kriteria = '$kode'");
if(mysqli_num_rows($cek) > 0) {
    
    $res = mysqli_query($conn, "SELECT COUNT(*) as total FROM kriteria");
    $row = mysqli_fetch_assoc($res);
    $kode = "C" . ($row['total'] + 1);
}

$query = "INSERT INTO kriteria (kode_kriteria, nama_kriteria, jenis, bobot) 
          VALUES ('$kode', '$nama', '$jenis', '$bobot')";

if(mysqli_query($conn, $query)) {
    echo "<script>alert('Kriteria baru berhasil ditambahkan! Jangan lupa atur ulang bobotnya.'); window.location='data_kriteria.php?mode=edit';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>