<?php include 'koneksi.php'; ?>
<?php include 'header.php'; ?>


<div class="hero-bg py-4 mb-0" style="border-radius: 0 0 30px 30px;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold text-white mb-0">Manajemen Data</h2>
                <p class="text-white opacity-75 mb-0">Kelola alternatif dosen untuk perhitungan COPRAS</p>
            </div>
            <a href="tambah_dosen.php" class="btn btn-light rounded-pill px-4 fw-bold shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Tambah Dosen
            </a>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 40px;">
    <div class="custom-card card border-0 shadow-sm mb-5">

        <div class="card-header-custom">
            <h5 class="mb-0 fw-bold"><i class="bi bi-table me-2"></i>Daftar Nilai Kriteria Dosen</h5>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary small">
                        <tr>
                            <th class="ps-4 py-3">NAMA DOSEN</th>
                            <th class="text-center">C1</th>
                            <th class="text-center">C2</th>
                            <th class="text-center">C3</th>
                            <th class="text-center">C4</th>
                            <th class="text-center">C5</th>
                            <th class="text-center">C6</th>
                            <th class="text-center">C7</th>
                            <th class="text-center">C8</th>
                            <th class="text-center pe-4">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = mysqli_query($conn, "SELECT * FROM dosen");
                        if(mysqli_num_rows($q) > 0):
                            while($d = mysqli_fetch_assoc($q)) :
                        ?>
                        <tr>
                            <td class="ps-4 fw-bold text-dark"><?= $d['nama_dosen']; ?></td>

                            <td class="text-center"><?= $d['c1_val']; ?></td>
                            <td class="text-center"><?= $d['c2_val']; ?></td>
                            <td class="text-center"><?= $d['c3_val']; ?></td>
                            <td class="text-center"><?= $d['c4_val']; ?></td>
                            <td class="text-center"><?= $d['c5_val']; ?></td>
                            <td class="text-center"><?= $d['c6_val']; ?></td>
                            <td class="text-center"><?= $d['c7_val']; ?></td>
                            <td class="text-center"><?= $d['c8_val']; ?></td>
                            <td class="text-center pe-4">
                                <div class="btn-group shadow-sm rounded-pill overflow-hidden">
                                    <a href="edit_dosen.php?id=<?= $d['id_dosen']; ?>" class="btn btn-sm btn-white border-end" title="Edit">
                                        <i class="bi bi-pencil-square text-info"></i>
                                    </a>
                                    <a href="hapus_dosen.php?id=<?= $d['id_dosen']; ?>" class="btn btn-sm btn-white" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus">
                                        <i class="bi bi-trash text-danger"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            endwhile; 
                        else:
                        ?>
                        <tr>
                            <td colspan="10" class="text-center py-5 text-muted">
                                <i class="bi bi-folder-x fs-1 d-block mb-2"></i>
                                Belum ada data dosen. Silakan tambah data baru.
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="p-4 bg-white shadow-sm rounded-4 border-start border-primary border-5 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold mb-1 text-dark">Data Sudah Siap?</h6>
                    <p class="text-muted small mb-0">Klik tombol di samping untuk memproses perangkingan dengan metode COPRAS.</p>
                </div>
                <a href="hasil_perhitungan.php" class="btn btn-warning rounded-pill px-4 fw-bold shadow-sm">
                    Mulai Perhitungan <i class="bi bi-arrow-right-circle ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-4 text-muted mt-auto bg-white border-top">
    <small>&copy; 2026 Darius Fikram Azzam - SPK COPRAS Project</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>