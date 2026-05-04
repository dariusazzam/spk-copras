<?php include 'koneksi.php'; ?>
<?php include 'header.php'; ?>

<div class="hero-bg text-center">
    <div class="container">
        <span class="badge bg-white text-primary rounded-pill px-3 py-2 mb-3 fw-bold shadow-sm">Project DSS - Informatics 2026</span>
        <h1 class="display-5 fw-bold">Sistem Penilaian Kinerja Dosen</h1>
        <p class="opacity-75 fs-5">Implementasi Komputasi Metode Complex Proportional Assessment (COPRAS)</p>
    </div>
</div>

<div class="container" style="margin-top: -50px;">
    <div class="row g-4">

        <div class="col-md-4">
            <div class="custom-card card p-4 text-center border-0 shadow">
                <div class="display-6 text-primary mb-2"><i class="bi bi-people-fill"></i></div>
                <h6 class="text-muted fw-bold small text-uppercase italic">Data Alternatif</h6>
                <?php 
                $res = mysqli_query($conn, "SELECT COUNT(*) as t FROM dosen"); 
                $d = mysqli_fetch_assoc($res); 
                ?>
                <h2 class="fw-bold"><?= $d['t']; ?> <span class="fs-6 text-muted">Dosen</span></h2>
            </div>
        </div>

        <div class="col-md-8">
            <div class="custom-card card h-100 p-4 border-0 shadow">
                <h5 class="fw-bold mb-4 text-primary"><i class="bi bi-cpu me-2"></i>Alur Proses COPRAS</h5>
                <div class="row text-center g-2">
                    <?php 
                    $steps = ['Matriks Keputusan', 'Normalisasi', 'Normalisasi Terbobot', 'Hitung S+ & S-', 'Signifikansi Qi', 'Utilitas Ui'];
                    foreach($steps as $key => $s) : ?>
                        <div class="col-4 col-md-2">
                            <div class="p-2 border border-primary border-opacity-10 rounded-4 bg-white shadow-sm d-flex flex-column align-items-center justify-content-center" 
                                 style="min-height: 100px; transition: transform 0.3s; cursor: default;" 
                                 onmouseover="this.style.transform='translateY(-5px)'" 
                                 onmouseout="this.style.transform='translateY(0)'">
                                <span class="badge bg-primary rounded-circle mb-2" style="width: 25px; height: 25px; display: flex; align-items: center; justify-content: center;"><?= $key+1; ?></span>
                                <p class="mb-0 fw-bold" style="font-size: 0.75rem; color: #444ce7;"><?= $s; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="custom-card card p-4 border-0 shadow bg-white overflow-hidden">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-info-circle-fill me-2"></i>Mengenal Metode COPRAS</h5>
                        <p class="text-secondary" style="text-align: justify; line-height: 1.8;">
                            <strong>COPRAS (Complex Proportional Assessment)</strong> adalah metode yang digunakan untuk mengevaluasi alternatif berdasarkan kriteria yang saling bertentangan. Keunggulan utamanya adalah kemampuan untuk menghitung <strong>Indeks Utilitas</strong>, yang menunjukkan seberapa dekat suatu alternatif terhadap alternatif ideal (terbaik) dalam skala persentase.
                        </p>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small fw-bold text-dark">Efektif untuk Kriteria Benefit & Cost</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small fw-bold text-dark">Menghasilkan Ranking Objektif</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small fw-bold text-dark">Sederhana & Presisi Tinggi</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small fw-bold text-dark">Indikator Utilitas 0 - 100%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-none d-md-flex flex-column align-items-center justify-content-center">

                            <div class="mb-3 position-relative d-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">

                            <div class="position-absolute w-100 h-100 rounded-circle bg-primary opacity-10 animate-pulse"></div>

                            <div class="bg-white shadow-sm rounded-4 d-flex align-items-center justify-content-center border border-primary border-opacity-10" style="width: 80px; height: 80px; z-index: 2;">
                                <i class="bi bi-cpu-fill text-primary" style="font-size: 2.5rem;"></i>
                            </div>

                            <i class="bi bi-gear-fill position-absolute text-warning opacity-50" style="top: 10px; right: 10px; font-size: 1.5rem; z-index: 1;"></i>
                        </div>

                        <div class="px-3 py-1 rounded-pill bg-primary bg-opacity-10 border border-primary border-opacity-20 shadow-sm">
                            <span class="text-primary fw-bold small text-uppercase" style="letter-spacing: 1px;">
                                <i class="bi bi-shield-check me-1"></i> COPRAS Engine
                            </span>
                        </div>
                        <p class="text-muted tiny mt-2 mb-0">Automated Computation System</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-5">
            <div class="custom-card card p-4 border-0 shadow bg-white border-start border-warning border-5">
                <div class="row align-items-center text-center text-md-start">
                    <div class="col-md-2">
                        <i class="bi bi-award text-warning" style="font-size: 5rem;"></i>
                    </div>
                    <div class="col-md-7">
                        <h6 class="text-warning fw-bold text-uppercase italic mb-1">Dosen Kinerja Terbaik Saat Ini:</h6>
                        <?php
                        $q_top = mysqli_query($conn, "SELECT nama_dosen FROM dosen LIMIT 1"); 
                        $top = mysqli_fetch_assoc($q_top);
                        if($d['t'] > 0) {
                            echo "<h2 class='fw-bold text-dark mb-1'>" . $top['nama_dosen'] . "</h2>";
                            echo "<p class='text-muted mb-0 small'>Dihitung berdasarkan integrasi kriteria akademik dan profesionalisme dosen.</p>";
                        } else {
                            echo "<h2 class='text-muted'>Belum Ada Data</h2>";
                        }
                        ?>
                    </div>
                    <div class="col-md-3 text-center">
                        <a href="hasil_perhitungan.php" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                            Detail Ranking <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-4 mt-5 text-muted border-top bg-white">
    <small>&copy; 2026 Darius Fikram Azzam - SPK COPRAS Project</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>