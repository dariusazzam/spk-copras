<?php
include 'koneksi.php'; 
include 'header.php';


$kriteria = [];
$q_kriteria = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY kode_kriteria ASC");
while($rk = mysqli_fetch_assoc($q_kriteria)){
    $kriteria[$rk['kode_kriteria']] = [
        'bobot' => $rk['bobot'],
        'jenis' => $rk['jenis']
    ];
}


$dosen = [];
$q_dosen = mysqli_query($conn, "SELECT * FROM dosen");
while($rd = mysqli_fetch_assoc($q_dosen)){
    $dosen[] = $rd;
}

if(count($dosen) == 0) { 
    echo "<div class='container mt-5'><div class='alert alert-warning shadow-sm border-0 rounded-4'>
          <i class='bi bi-exclamation-triangle-fill me-2'></i> Belum ada data dosen untuk dihitung.
          </div></div>"; 
    exit; 
}


$total_kolom = [];
foreach($dosen as $d) {
    for($i=1; $i<=8; $i++) {
        $total_kolom["c$i"] = ($total_kolom["c$i"] ?? 0) + $d["c{$i}_val"];
    }
}

$S_plus = []; $S_minus = [];
foreach($dosen as $idx => $d) {
    $S_plus[$idx] = 0; $S_minus[$idx] = 0;
    for($i=1; $i<=8; $i++) {
        $kode = "C$i";
        $val_norm = $d["c{$i}_val"] / ($total_kolom["c$i"] ?: 1);
        $val_terbobot = $val_norm * $kriteria[$kode]['bobot'];
        if($kriteria[$kode]['jenis'] == 'benefit') { $S_plus[$idx] += $val_terbobot; }
        else { $S_minus[$idx] += $val_terbobot; }
    }
}

$total_inv_Smin = 0;
foreach($S_minus as $sm) { $total_inv_Smin += (1 / ($sm ?: 0.0001)); }
$sum_Smin = array_sum($S_minus);
$Q = [];
foreach($dosen as $idx => $d) {
    $term = $sum_Smin / (($S_minus[$idx] ?: 0.0001) * $total_inv_Smin);
    $Q[$idx] = $S_plus[$idx] + $term;
}

$Q_max = max($Q);
$hasil_final = [];
foreach($dosen as $idx => $d) {
    $hasil_final[] = [
        'nama' => $d['nama_dosen'],
        'skor' => ($Q[$idx] / $Q_max) * 100
    ];
}

usort($hasil_final, function($a, $b) { return $b['skor'] <=> $a['skor']; });
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
                    <?php if($key == 0): ?>
                        <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-bold"><i class="bi bi-star-fill me-1"></i> RANK 1</span>
                    <?php else: ?>
                        <span class="badge bg-light text-primary rounded-pill px-3 py-2 fw-bold">RANK <?= $key+1; ?></span>
                    <?php endif; ?>
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
        <div class="card-header-custom">
            <h5 class="mb-0 fw-bold"><i class="bi bi-list-ol me-2"></i>Seluruh Peringkat Dosen</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary small">
                        <tr>
                            <th class="ps-4 py-3">PERINGKAT</th>
                            <th>NAMA DOSEN</th>
                            <th class="text-end pe-4">INDERS UTILITAS (Ui)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($hasil_final as $h) : ?>
                        <tr>
                            <td class="ps-4">
                                <span class="badge <?= $no <= 3 ? 'bg-primary' : 'bg-secondary'; ?> rounded-circle" style="width: 30px; height: 30px; line-height: 20px;">
                                    <?= $no++; ?>
                                </span>
                            </td>
                            <td class="fw-bold"><?= $h['nama']; ?></td>
                            <td class="text-end pe-4">
                                <span class="fw-bold text-primary"><?= number_format($h['skor'], 4); ?> %</span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-4 text-muted mt-auto">
    <small>&copy; 2026 Darius Fikram Azzam - SPK COPRAS Project</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>