<?php 
include 'koneksi.php'; 
include 'header.php'; 

$res = mysqli_query($conn, "SELECT COUNT(*) as total FROM kriteria");
$row = mysqli_fetch_assoc($res);
$next_id = $row['total'] + 1;
$kode_otomatis = "C" . $next_id;
?>

<div class="hero-bg py-4 mb-0" style="border-radius: 0 0 30px 30px;">
    <div class="container">
        <div class="d-flex align-items-center text-white">
            <a href="data_kriteria.php" class="btn back-btn rounded-circle me-3 shadow-sm" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-arrow-left fs-5"></i>
            </a>
            <div>
                <h2 class="fw-bold mb-0">Tambah Kriteria Baru</h2>
                <p class="opacity-75 mb-0">Tambahkan parameter penilaian baru untuk sistem COPRAS</p>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 40px;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="custom-card card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <form action="simpan_kriteria.php" method="POST">
                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary small text-uppercase">Kode Kriteria</label>
                            <input type="text" name="kode_kriteria" class="form-control border-0 bg-light py-3 fw-bold text-primary" value="<?= $kode_otomatis; ?>" readonly>
                            <small class="text-muted">*Kode digenerate otomatis oleh sistem.</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary small text-uppercase">Nama Kriteria</label>
                            <input type="text" name="nama_kriteria" class="form-control border-light bg-light py-3" placeholder="Contoh: Sertifikasi Keahlian" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary small text-uppercase">Jenis (Benefit / Cost)</label>
                            <select name="jenis" class="form-select border-light bg-light py-3" required>
                                <option value="" selected disabled>-- Pilih Jenis --</option>
                                <option value="benefit">Benefit (Makin besar makin baik)</option>
                                <option value="cost">Cost (Makin kecil makin baik)</option>
                            </select>
                        </div>

                        <div class="alert alert-warning border-0 rounded-4 small">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            Kriteria baru akan ditambahkan dengan <strong>bobot 0</strong>. 
                            Silakan atur ulang pembagian bobot di halaman edit kriteria setelah ini.
                        </div>

                        <div class="pt-3">
                            <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold shadow">
                                <i class="bi bi-plus-circle-fill me-2"></i>Daftarkan Kriteria
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-4 text-muted mt-auto bg-white border-top">
    <small>&copy; 2026 Darius Fikram Azzam - SPK COPRAS Project</small>
</footer>