<?php 
include 'koneksi.php';
include 'header.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM dosen WHERE id_dosen = '$id'");
$d = mysqli_fetch_assoc($data);

if (!$d) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='data_dosen.php';</script>";
    exit;
}
?>

<div class="hero-bg py-4 mb-0" style="border-radius: 0 0 30px 30px;">
    <div class="container">
        <div class="d-flex align-items-center">

            <a href="data_dosen.php" class="btn back-btn rounded-circle me-3 shadow-sm" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-arrow-left fs-5"></i>
            </a>
            <div>
                <h2 class="fw-bold text-white mb-0">Edit Profil Dosen</h2>
                <p class="text-white opacity-75 mb-0">Perbarui informasi dan nilai kriteria akademik</p>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 40px;">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="custom-card card border-0 shadow-sm mb-5">
                <div class="card-header-custom">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2"></i>Form Pembaruan Data: <?= $d['nama_dosen']; ?></h5>
                </div>
                <div class="card-body p-4 p-md-5">
                    <form action="update_dosen.php" method="POST">
                        <input type="hidden" name="id_dosen" value="<?= $d['id_dosen']; ?>">
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary small text-uppercase">Identitas Dosen</label>
                            <div class="input-group shadow-sm rounded-3 overflow-hidden">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-person text-primary"></i></span>
                                <input type="text" name="nama_dosen" class="form-control border-0 bg-light py-3" value="<?= $d['nama_dosen']; ?>" required>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        <!-- KRITERIA KUALITATIF -->
                        <label class="form-label fw-bold text-secondary small text-uppercase mb-3">Kriteria Kualitatif (Pilihan)</label>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">C1 - Golongan</label>
                                <select name="c1" class="form-select border-light bg-light">
                                    <option value="6" <?= $d['c1_val'] == 6 ? 'selected' : ''; ?>>IVA</option>
                                    <option value="5" <?= $d['c1_val'] == 5 ? 'selected' : ''; ?>>IIID</option>
                                    <option value="4" <?= $d['c1_val'] == 4 ? 'selected' : ''; ?>>IIIC</option>
                                    <option value="3" <?= $d['c1_val'] == 3 ? 'selected' : ''; ?>>IIIB</option>
                                    <option value="2" <?= $d['c1_val'] == 2 ? 'selected' : ''; ?>>IIIA</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">C2 - Surat Peringatan</label>
                                <select name="c2" class="form-select border-light bg-light">
                                    <option value="3" <?= $d['c2_val'] == 3 ? 'selected' : ''; ?>>0 (Tanpa SP)</option>
                                    <option value="2" <?= $d['c2_val'] == 2 ? 'selected' : ''; ?>>1 SP</option>
                                    <option value="1" <?= $d['c2_val'] == 1 ? 'selected' : ''; ?>>>= 2 SP</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">C3 - H-Index Scopus</label>
                                <select name="c3" class="form-select border-light bg-light">
                                    <option value="10" <?= $d['c3_val'] == 10 ? 'selected' : ''; ?>>>= 11</option>
                                    <option value="5" <?= $d['c3_val'] == 5 ? 'selected' : ''; ?>>6 - 10</option>
                                    <option value="3" <?= $d['c3_val'] == 3 ? 'selected' : ''; ?>>1 - 5</option>
                                    <option value="1" <?= $d['c3_val'] == 1 ? 'selected' : ''; ?>>0</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">C4 - Pendidikan</label>
                                <select name="c4" class="form-select border-light bg-light">
                                    <option value="4" <?= $d['c4_val'] == 4 ? 'selected' : ''; ?>>S3</option>
                                    <option value="2" <?= $d['c4_val'] == 2 ? 'selected' : ''; ?>>S2</option>
                                </select>
                            </div>
                        </div>

                        <!-- KRITERIA KUANTITATIF -->
                        <label class="form-label fw-bold text-secondary small text-uppercase mb-3">Kriteria Kuantitatif (Angka)</label>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label small fw-semibold">C5 - Lama Mengajar (Tahun)</label>
                                <input type="number" name="c5" class="form-control border-light bg-light" value="<?= $d['c5_val']; ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-semibold">C6 - Rank Sinta Institusi</label>
                                <input type="number" name="c6" class="form-control border-light bg-light" value="<?= $d['c6_val']; ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-semibold">C7 - Umur</label>
                                <input type="number" name="c7" class="form-control border-light bg-light" value="<?= $d['c7_val']; ?>" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label small fw-semibold">C8 - Pembicara Eksternal</label>
                                <select name="c8" class="form-select border-light bg-light">
                                    <option value="5" <?= $d['c8_val'] == 5 ? 'selected' : ''; ?>>4 - 8 Kali</option>
                                    <option value="3" <?= $d['c8_val'] == 3 ? 'selected' : ''; ?>>1 - 3 Kali</option>
                                    <option value="1" <?= $d['c8_val'] == 1 ? 'selected' : ''; ?>>0</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex gap-3 pt-3">
                            <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 fw-bold shadow">
                                <i class="bi bi-save me-2"></i>Update Data
                            </button>
                            <a href="data_dosen.php" class="btn btn-light rounded-pill px-4 py-3 fw-bold text-muted border">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-4 text-muted border-top bg-white">
    <small>&copy; 2026 Darius Fikram Azzam - SPK COPRAS Project</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>