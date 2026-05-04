<?php include 'koneksi.php'; ?>
<?php include 'header.php'; ?>

<div class="hero-bg py-4 mb-0" style="border-radius: 0 0 30px 30px;">
    <div class="container text-center">
        <h2 class="fw-bold text-white mb-1"><i class="bi bi-info-circle-fill me-2"></i>Kriteria & Pembobotan</h2>
        <p class="text-white opacity-75">Konfigurasi parameter penilaian menggunakan metode Rank Order Centroid (ROC)</p>
    </div>
</div>

<div class="container" style="margin-top: 40px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="custom-card card border-0 shadow-sm mb-5">
                <div class="card-header-custom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-diagram-3 me-2"></i>Daftar Kriteria Penilaian</h5>
                    <span class="badge bg-white text-primary rounded-pill px-3 shadow-sm">Total 8 Kriteria</span>
                </div>
                <div class="card-body p-4">
                    <div class="alert alert-info border-0 rounded-4 mb-4 shadow-sm">
                        <div class="d-flex">
                            <i class="bi bi-lightbulb-fill fs-4 me-3"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Informasi Metode ROC</h6>
                                <p class="small mb-0 opacity-75 text-dark">Pembobotan ROC didasarkan pada tingkat kepentingan kriteria, di mana prioritas tertinggi mendapatkan bobot paling besar secara sistematis.</p>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="bg-light text-secondary small">
                                <tr>
                                    <th class="ps-4 py-3">KODE</th>
                                    <th>KETERANGAN KRITERIA</th>
                                    <th class="text-center">BOBOT (ROC)</th>
                                    <th class="text-center pe-4">JENIS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $q = mysqli_query($conn, "SELECT * FROM kriteria");
                                while($r = mysqli_fetch_assoc($q)) :
                                ?>
                                <tr>
                                    <td class="ps-4"><span class="badge bg-primary rounded-pill px-3"><?= $r['kode_kriteria']; ?></span></td>
                                    <td class="fw-bold text-dark"><?= $r['nama_kriteria']; ?></td>
                                    <td class="text-center">
                                        <div class="fw-bold text-indigo"><?= $r['bobot']; ?></div>
                                    </td>
                                    <td class="text-center pe-4">
                                        <?php if($r['jenis'] == 'benefit'): ?>
                                            <span class="badge bg-success-light text-success rounded-pill px-3 py-2 border border-success border-opacity-10">
                                                <i class="bi bi-arrow-up-circle me-1"></i> Benefit
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-warning-light text-warning rounded-pill px-3 py-2 border border-warning border-opacity-10">
                                                <i class="bi bi-arrow-down-circle me-1"></i> Cost
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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