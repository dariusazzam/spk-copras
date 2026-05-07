<?php 
include 'koneksi.php'; 
include 'header.php'; 

$is_edit = isset($_GET['mode']) && $_GET['mode'] == 'edit';
?>

<div class="hero-bg py-4 mb-0" style="border-radius: 0 0 30px 30px;">
    <div class="container text-white d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold mb-0">Manajemen Kriteria</h2>
            <p class="opacity-75 mb-0">Kelola bobot dan parameter perhitungan COPRAS</p>
        </div>
        <?php if(!$is_edit): ?>
        <a href="?mode=edit" class="btn btn-light rounded-pill px-4 fw-bold shadow-sm">
            <i class="bi bi-pencil-fill me-1"></i> Edit Kriteria
        </a>
        <?php endif; ?>
    </div>
</div>

<div class="container" style="margin-top: 40px;">
    <div class="custom-card card border-0 shadow-sm mb-5">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold">Daftar Kriteria Penilaian</h5>
                <?php if($is_edit): ?>
                    <button type="button" id="btnTambahKriteria" class="btn btn-success rounded-pill px-3 shadow-sm" onclick="simpanLaluTambah()">
                        <i class="bi bi-plus-lg me-1"></i> Tambah Kriteria
                    </button>
                <?php endif; ?>
            </div>

            <form id="formKriteria" action="update_kriteria.php" method="POST">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light text-secondary small">
                            <tr>
                                <th>KODE</th>
                                <th>NAMA KRITERIA</th>
                                <th>JENIS</th>
                                <th width="200">BOBOT</th>
                                <?php if($is_edit): ?> <th width="80" class="text-center">AKSI</th> <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY kode_kriteria ASC");
                            if(mysqli_num_rows($query) > 0):
                                while($data = mysqli_fetch_assoc($query)):
                            ?>
                            <tr>
                                <td><span class="badge bg-primary rounded-pill"><?= $data['kode_kriteria']; ?></span></td>
                                <td>
                                    <?php if($is_edit): ?>
                                        <input type="text" name="nama[<?= $data['kode_kriteria']; ?>]" class="form-control border-light bg-light" value="<?= $data['nama_kriteria']; ?>" required>
                                    <?php else: ?>
                                        <span class="fw-semibold text-dark"><?= $data['nama_kriteria']; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($is_edit): ?>
                                        <select name="jenis[<?= $data['kode_kriteria']; ?>]" class="form-select border-light bg-light">
                                            <option value="benefit" <?= $data['jenis'] == 'benefit' ? 'selected' : ''; ?>>Benefit</option>
                                            <option value="cost" <?= $data['jenis'] == 'cost' ? 'selected' : ''; ?>>Cost</option>
                                        </select>
                                    <?php else: ?>
                                        <span class="badge <?= $data['jenis'] == 'benefit' ? 'bg-info-light text-info' : 'bg-warning-light text-warning'; ?> text-uppercase" style="font-size: 0.75rem;">
                                            <?= $data['jenis']; ?>
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($is_edit): ?>
                                        <input type="number" step="0.01" min="0" max="1" name="bobot[<?= $data['kode_kriteria']; ?>]" class="form-control border-light bg-light input-bobot" value="<?= $data['bobot']; ?>" required>
                                    <?php else: ?>
                                        <span class="text-primary fw-bold"><?= $data['bobot']; ?></span>
                                    <?php endif; ?>
                                </td>
                                <?php if($is_edit): ?>
                                <td class="text-center">
                                    <a href="hapus_kriteria.php?id=<?= $data['kode_kriteria']; ?>" class="btn btn-sm btn-outline-danger border-0 rounded-circle" onclick="return confirm('Hapus kriteria ini?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endwhile; else: ?>
                            <tr><td colspan="5" class="text-center py-4 text-muted">Belum ada data kriteria.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if($is_edit): ?>
                <div class="alert alert-secondary d-flex justify-content-between align-items-center mt-3 shadow-sm rounded-4 border-0">
                    <div class="fw-bold text-dark">Total Bobot Saat Ini: <span id="displayTotal">0</span></div>
                    <div id="statusValidasi"></div>
                </div>

                <div class="d-flex justify-content-end gap-2 pt-3">
                    <a href="data_kriteria.php" class="btn btn-light rounded-pill px-4 fw-bold">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="button" id="btnSimpan" class="btn btn-primary px-5 rounded-pill fw-bold shadow" onclick="simpanData()" disabled>
                        <i class="bi bi-save2-fill me-2"></i>Simpan Perubahan
                    </button>
                </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<script>

function setBtnSimpanState(state) {
    const btn = document.getElementById('btnSimpan');
    if (!btn) return;
    
    if (state === 'active') {
        btn.disabled = false;
        btn.classList.replace('btn-success', 'btn-primary');
        btn.innerHTML = '<i class="bi bi-save2-fill me-2"></i>Simpan Perubahan';
    } else if (state === 'disabled') {
        btn.disabled = true;
        btn.classList.replace('btn-success', 'btn-primary');
        btn.innerHTML = '<i class="bi bi-save2-fill me-2"></i>Simpan Perubahan';
    } else if (state === 'saved') {
        btn.disabled = true;
        btn.classList.replace('btn-primary', 'btn-success');
        btn.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i>Perubahan Disimpan';
    }
}

function simpanData() {
    const form = document.getElementById('formKriteria');
    const formData = new FormData(form);
    const btnSimpan = document.getElementById('btnSimpan');

    btnSimpan.disabled = true;
    btnSimpan.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';

    fetch('update_kriteria.php', { method: 'POST', body: formData })
    .then(res => res.text())
    .then(data => {
        setBtnSimpanState('saved');
    })
    .catch(err => {
        alert('Gagal simpan!');
        setBtnSimpanState('active');
    });
}

function simpanLaluTambah() {
    const form = document.getElementById('formKriteria');
    form.action = "update_kriteria.php?next=tambah";
    form.submit();
}

function jalankanValidasi() {
    let inputs = document.querySelectorAll('.input-bobot');
    if(inputs.length === 0) return;

    let totalKumulatif = 0;
    
    for (let input of inputs) {
        let currentVal = parseFloat(input.value) || 0;

        let sisaKuotaBeneran = 1 - totalKumulatif;
        sisaKuotaBeneran = Math.max(0, Math.round(sisaKuotaBeneran * 100) / 100);

        if (Math.round((totalKumulatif + currentVal) * 100) / 100 > 1.00) {
            alert("Total bobot melebihi 1.00! Sisa maksimal yang tersedia adalah " + sisaKuotaBeneran);
            input.value = sisaKuotaBeneran.toFixed(2);
            currentVal = sisaKuotaBeneran;
        }

        if (currentVal > 1) {
            input.value = 1;
            currentVal = 1;
        }

        totalKumulatif += currentVal;
    }

    let totalAkhir = 0;
    inputs.forEach(i => totalAkhir += parseFloat(i.value) || 0);
    totalAkhir = Math.round(totalAkhir * 100) / 100;

    const displayTotal = document.getElementById('displayTotal');
    const statusValidasi = document.getElementById('statusValidasi');
    const btnSimpan = document.getElementById('btnSimpan');
    const btnTambah = document.getElementById('btnTambahKriteria');

    displayTotal.innerText = totalAkhir.toFixed(2);

    if (totalAkhir === 1.00) {
        displayTotal.className = "text-success fs-5 fw-bold";
        statusValidasi.innerHTML = '<span class="badge bg-success px-3 rounded-pill">Pas 1.00</span>';
        if (btnSimpan.innerHTML.indexOf("Disimpan") === -1) {
            setBtnSimpanState('active');
        }
        if(btnTambah) {
            btnTambah.className = "btn btn-secondary disabled rounded-pill px-3 shadow-sm";
            btnTambah.style.pointerEvents = 'none';
            btnTambah.innerHTML = '<i class="bi bi-lock-fill me-1"></i> Bobot Terpenuhi';
        }
    } else {
        displayTotal.className = "text-danger fs-5 fw-bold";
        statusValidasi.innerHTML = '<span class="badge bg-danger px-3 rounded-pill">Sisa: ' + (1 - totalAkhir).toFixed(2) + '</span>';
        setBtnSimpanState('disabled');
        if(btnTambah) {
            btnTambah.className = "btn btn-success rounded-pill px-3 shadow-sm";
            btnTambah.style.pointerEvents = 'auto';
            btnTambah.innerHTML = '<i class="bi bi-plus-lg me-1"></i> Tambah Kriteria';
        }
    }
}

document.addEventListener('input', function (e) {
    const btnSimpan = document.getElementById('btnSimpan');
    if (!btnSimpan) return;

    if (btnSimpan.classList.contains('btn-success')) {
        setBtnSimpanState('active');
    }
    jalankanValidasi();
});

document.addEventListener('change', function (e) {
    if (e.target.tagName === 'SELECT') {
        setBtnSimpanState('active');
        jalankanValidasi();
    }
});

window.onload = jalankanValidasi;
</script>

<footer class="text-center py-4 text-muted mt-auto bg-white border-top">
    <small>&copy; 2026 Darius Fikram Azzam - SPK COPRAS Project</small>
</footer>