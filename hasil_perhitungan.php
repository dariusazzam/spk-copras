<?php
include 'koneksi.php'; 
include 'header.php';

$kriteria = [];
$q_kriteria = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY kode_kriteria ASC");
while($rk = mysqli_fetch_assoc($q_kriteria)){
    $kriteria[$rk['kode_kriteria']] = [
        'bobot' => (float)$rk['bobot'],
        'jenis' => $rk['jenis']
    ];
}

$dosen = [];
$q_dosen = mysqli_query($conn, "SELECT * FROM dosen");
while($rd = mysqli_fetch_assoc($q_dosen)){
    $dosen[] = $rd;
}

if(count($dosen) == 0 || count($kriteria) == 0) { 
    echo "<div class='container mt-5'><div class='alert alert-warning shadow-sm border-0 rounded-4'>Data belum lengkap.</div></div>"; 
    exit; 
}

$total_kolom = [];
foreach($kriteria as $kode => $detail) {
    $total_kolom[$kode] = 0;
    foreach($dosen as $d) {
        $col = strtolower($kode) . "_val";
        $total_kolom[$kode] += (float)$d[$col];
    }
}

$S_plus = []; $S_minus = [];
foreach($dosen as $idx => $d) {
    $S_plus[$idx] = 0; $S_minus[$idx] = 0;
    foreach($kriteria as $kode => $detail) {
        $col = strtolower($kode) . "_val";
        $val_norm = (float)$d[$col] / ($total_kolom[$kode] ?: 1);
        $terbobot = $val_norm * $detail['bobot'];
        
        if($detail['jenis'] == 'benefit') { $S_plus[$idx] += $terbobot; }
        else { $S_minus[$idx] += $terbobot; }
    }
}

$total_inv_Smin = 0;
foreach($S_minus as $sm) { 
    if ($sm > 0) {
        $total_inv_Smin += (1 / $sm); 
    }
}
$sum_Smin = array_sum($S_minus);

$Q = [];
foreach($dosen as $idx => $d) {
    $term = ($sum_Smin == 0 || $total_inv_Smin == 0 || $S_minus[$idx] == 0) ? 0 : ($sum_Smin / ($S_minus[$idx] * $total_inv_Smin));
    $Q[$idx] = (float)$S_plus[$idx] + (float)$term;
}

$Q_max = max($Q);
$hasil_final = [];
foreach($dosen as $idx => $d) {
    $hasil_final[] = [
        'nama' => $d['nama_dosen'],
        'skor' => ($Q[$idx] / $Q_max) * 100
    ];
}

usort($hasil_final, function($a, $b) { 
    return $b['skor'] <=> $a['skor']; 
});
?>

<div class="hero-bg py-4 mb-0" style="border-radius: 0 0 30px 30px;">
    <div class="container text-center">
        <h2 class="fw-bold text-white mb-1"><i class="bi bi-trophy-fill me-2 text-warning"></i>Hasil Perankingan Akhir</h2>
        <p class="text-white opacity-75">Urutan performa dosen berdasarkan tingkat utilitas COPRAS</p>
    </div>
</div>

<div class="container" style="margin-top: 40px;">
    <div class="row g-4 mb-5 justify-content-center">
        <?php foreach(array_slice($hasil_final, 0, 3) as $key => $top) : ?>
        <div class="col-md-4">
            <div class="custom-card card border-0 shadow-sm text-center p-4 <?= $key == 0 ? 'border-top border-warning border-5' : ''; ?>">
                <div class="mb-3">
                    <span class="badge <?= $key == 0 ? 'bg-warning text-dark' : 'bg-light text-primary'; ?> rounded-pill px-3 py-2 fw-bold">
                        RANK <?= $key+1; ?>
                    </span>
                </div>
                <h4 class="fw-bold mb-1"><?= $top['nama']; ?></h4>
                <div class="display-6 fw-bold text-primary mb-2"><?= number_format($top['skor'], 2); ?>%</div>
                <div class="progress rounded-pill" style="height: 10px;">
                    <div class="progress-bar bg-primary" style="width: <?= $top['skor']; ?>%"></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="custom-card card border-0 shadow-sm mb-5">
        <div class="card-header-custom p-3 bg-white border-bottom text-center">
            <h5 class="mb-0 fw-bold">Daftar Peringkat Keseluruhan</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary small">
                        <tr>
                            <th class="ps-4">RANK</th>
                            <th>NAMA DOSEN</th>
                            <th class="text-end pe-4">UTILITY DEGREE (Ni)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($hasil_final as $h) : ?>
                        <tr>
                            <td class="ps-4"><?= $no++; ?></td>
                            <td class="fw-bold"><?= $h['nama']; ?></td>
                            <td class="text-end pe-4 text-primary fw-bold"><?= number_format($h['skor'], 4); ?> %</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>