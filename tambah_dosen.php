<?php include 'koneksi.php'; include 'header.php'; ?>

<div class="hero-bg py-4 mb-0" style="border-radius: 0 0 30px 30px;">
    <div class="container text-white d-flex align-items-center">
        <a href="data_dosen.php" class="btn back-btn rounded-circle me-3 shadow-sm" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
            <i class="bi bi-arrow-left fs-5 text-white"></i>
        </a>
        <div>
            <h2 class="fw-bold mb-0">Input Penilaian Dosen</h2>
            <p class="opacity-75 mb-0">Tambahkan alternatif baru untuk proses komputasi COPRAS</p>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 40px;">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="custom-card card border-0 shadow-sm mb-5">
                <div class="card-header-custom p-4">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-person-plus-fill me-2"></i>Formulir Data Alternatif</h5>
                </div>
                <div class="card-body p-4 p-md-5">
                    <form action="simpan_dosen.php" method="POST">
                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary small text-uppercase">Identitas Dosen</label>
                            <div class="input-group shadow-sm rounded-3 overflow-hidden border">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-person text-primary"></i></span>
                                <input type="text" name="nama_dosen" class="form-control border-0 bg-light py-3" placeholder="Masukkan nama lengkap dosen" required>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        <label class="form-label fw-bold text-secondary small text-uppercase mb-3">Nilai Kriteria Penilaian</label>
                        <div class="row g-3 mb-4">
                            <?php
                            $q_kriteria = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY kode_kriteria ASC");
                            while($rk = mysqli_fetch_assoc($q_kriteria)):
                                $kode = $rk['kode_kriteria'];
                                $nama = strtolower($rk['nama_kriteria']);
                            ?>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-dark">
                                    <?= $kode; ?> - <?= $rk['nama_kriteria']; ?>
                                    <span class="text-muted" style="font-size: 0.7rem;">(<?= ucfirst($rk['jenis']); ?>)</span>
                                </label>

                                <?php 
                                if (strpos($nama, 'golongan') !== false): ?>
                                    <select name="nilai[<?= $kode; ?>]" class="form-select border-light bg-light py-2" required>
                                        <option value="" selected disabled>-- Pilih Golongan --</option>
                                        <option value="6">IVA</option>
                                        <option value="5">IIID</option>
                                        <option value="4">IIIC</option>
                                        <option value="3">IIIB</option>
                                        <option value="2">IIIA</option>
                                    </select>

                                <?php elseif (strpos($nama, 'sp') !== false || strpos($nama, 'peringatan') !== false): ?>
                                    <select name="nilai[<?= $kode; ?>]" class="form-select border-light bg-light py-2" required>
                                        <option value="" selected disabled>-- Pilih Status SP --</option>
                                        <option value="3">0 (Tanpa SP)</option>
                                        <option value="2">1 SP</option>
                                        <option value="1">>= 2 SP</option>
                                    </select>

                                <?php elseif (strpos($nama, 'pendidikan') !== false): ?>
                                    <select name="nilai[<?= $kode; ?>]" class="form-select border-light bg-light py-2" required>
                                        <option value="" selected disabled>-- Pilih Pendidikan --</option>
                                        <option value="4">S3</option>
                                        <option value="2">S2</option>
                                    </select>

                                <?php elseif (strpos($nama, 'pembicara') !== false): ?>
                                    <select name="nilai[<?= $kode; ?>]" class="form-select border-light bg-light py-2" required>
                                        <option value="" selected disabled>-- Pilih Intensitas --</option>
                                        <option value="5">4 - 8 Kali</option>
                                        <option value="3">1 - 3 Kali</option>
                                        <option value="1">0</option>
                                    </select>

                                <?php else: 
                                    $placeholder = "Input nilai...";
                                    if (strpos($nama, 'umur') !== false) $placeholder = "Contoh: 35";
                                    if (strpos($nama, 'mengajar') !== false) $placeholder = "Contoh: 5 (dalam tahun)";
                                    if (strpos($nama, 'sinta') !== false) $placeholder = "Contoh: 3";
                                    if (strpos($nama, 'h-index') !== false) $placeholder = "Contoh: 2";
                                ?>
                                    <input type="number" step="0.01" name="nilai[<?= $kode; ?>]" class="form-control border-light bg-light py-2" placeholder="<?= $placeholder; ?>" required>
                                <?php endif; ?>
                            </div>
                            <?php endwhile; ?>
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

<footer class="text-center py-4 text-muted mt-auto bg-white border-top">
    <small>&copy; 2026 Darius Fikram Azzam - SPK COPRAS Project</small>
</footer>