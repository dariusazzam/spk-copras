<?php include 'koneksi.php'; include 'header.php'; ?>

<div class="hero-bg py-4 mb-0" style="border-radius: 0 0 30px 30px;">
    <div class="container">
        <div class="d-flex align-items-center">
            <a href="data_dosen.php" class="btn back-btn rounded-circle me-3 shadow-sm" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-arrow-left fs-5"></i>
            </a>
            <div>
                <h2 class="fw-bold text-white mb-0">Input Penilaian Dosen</h2>
                <p class="text-white opacity-75 mb-0">Tambahkan alternatif baru untuk proses komputasi COPRAS</p>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 40px;">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="custom-card card border-0 shadow-sm mb-5">
                <div class="card-header-custom">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-person-plus-fill me-2"></i>Formulir Data Alternatif</h5>
                </div>
                <div class="card-body p-4 p-md-5">
                    <form action="simpan_dosen.php" method="POST">
                        <!-- NAMA DOSEN -->
                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary small text-uppercase">Identitas Dosen</label>
                            <div class="input-group shadow-sm rounded-3 overflow-hidden">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-person text-primary"></i></span>
                                <input type="text" name="nama_dosen" class="form-control border-0 bg-light py-3" placeholder="Masukkan nama lengkap dosen" required>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        <!-- KRITERIA KUALITATIF -->
                        <label class="form-label fw-bold text-secondary small text-uppercase mb-3">Kriteria Kualitatif (Pilihan)</label>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">C1 - Golongan</label>
                                <select name="c1" class="form-select border-light bg-light" required>
                                    <option value="" selected disabled>-- Pilih Golongan --</option>
                                    <option value="6">IVA</option>
                                    <option value="5">IIID</option>
                                    <option value="4">IIIC</option>
                                    <option value="3">IIIB</option>
                                    <option value="2">IIIA</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">C2 - Surat Peringatan</label>
                                <select name="c2" class="form-select border-light bg-light" required>
                                    <option value="" selected disabled>-- Pilih Status SP --</option>
                                    <option value="3">0 (Tanpa SP)</option>
                                    <option value="2">1 SP</option>
                                    <option value="1">>= 2 SP</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">C3 - H-Index Scopus</label>
                                <select name="c3" class="form-select border-light bg-light" required>
                                    <option value="" selected disabled>-- Pilih Range H-Index --</option>
                                    <option value="10">>= 11</option>
                                    <option value="5">6 - 10</option>
                                    <option value="3">1 - 5</option>
                                    <option value="1">0</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">C4 - Pendidikan</label>
                                <select name="c4" class="form-select border-light bg-light" required>
                                    <option value="" selected disabled>-- Pilih Pendidikan --</option>
                                    <option value="4">S3</option>
                                    <option value="2">S2</option>
                                </select>
                            </div>
                        </div>

                        <!-- KRITERIA KUANTITATIF -->
                        <label class="form-label fw-bold text-secondary small text-uppercase mb-3">Kriteria Kuantitatif (Angka)</label>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label small fw-semibold">C5 - Lama Mengajar (Tahun)</label>
                                <input type="number" name="c5" class="form-control border-light bg-light" placeholder="Contoh: 5" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-semibold">C6 - Rank Sinta Institusi</label>
                                <input type="number" name="c6" class="form-control border-light bg-light" placeholder="Contoh: 3" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-semibold">C7 - Umur</label>
                                <input type="number" name="c7" class="form-control border-light bg-light" placeholder="Contoh: 35" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label small fw-semibold">C8 - Pembicara Eksternal</label>
                                <select name="c8" class="form-select border-light bg-light" required>
                                    <option value="" selected disabled>-- Pilih Intensitas Pembicara --</option>
                                    <option value="5">4 - 8 Kali</option>
                                    <option value="3">1 - 3 Kali</option>
                                    <option value="1">0</option>
                                </select>
                            </div>
                        </div>

                        <div class="pt-3">
                            <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold shadow">
                                <i class="bi bi-cloud-arrow-up-fill me-2"></i>Simpan Data Dosen
                            </button>
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