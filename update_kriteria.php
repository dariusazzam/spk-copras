<?php
include 'koneksi.php';

$nama_array  = $_POST['nama'];
$jenis_array = $_POST['jenis'];
$bobot_array = $_POST['bobot'];

$error = false;

foreach ($nama_array as $kode => $nama) {
    $jenis = $jenis_array[$kode];
    $bobot = $bobot_array[$kode];

    $query = "UPDATE kriteria SET 
              nama_kriteria = '$nama', 
              jenis = '$jenis', 
              bobot = '$bobot' 
              WHERE kode_kriteria = '$kode'";
    
    $update = mysqli_query($conn, $query);

    if (!$update) { $error = true; break; }
}

if (!$error) {
    if(isset($_GET['next']) && $_GET['next'] == 'tambah') {
        header("Location: tambah_kriteria.php");
    } else {
        echo "success";
    }
} else {
    http_response_code(500);
    echo "error";
}
?>