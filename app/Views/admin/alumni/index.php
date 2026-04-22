<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
<style>
    /* Fix dropdown menu being cut off in responsive table */
    .table-responsive {
        overflow: visible !important;
    }
    .dropdown-menu {
        z-index: 1070 !important; /* Higher than navbar but below modals */
        min-width: 160px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mb-5 d-flex align-items-center justify-content-between">
    <div>
        <h2 class="fw-bold text-dark mb-1">Kelola Data Alumni</h2>
        <p class="text-muted mb-0">Manajemen daftar alumni dan informasi pekerjaan mereka.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="/admin/alumni/create" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-lg me-2"></i>Tambah Alumni
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4">
        <form action="/admin/alumni" method="get" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label small fw-bold text-muted text-uppercase">Cari Alumni</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control bg-light border-0" placeholder="Nama atau NIM..." value="<?= $filters['search'] ?>">
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-bold text-muted text-uppercase">Angkatan</label>
                <input type="number" name="year" class="form-control bg-light border-0" placeholder="2024" value="<?= $filters['year'] ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-bold text-muted text-uppercase">Status Kerja</label>
                <select name="status" class="form-select bg-light border-0">
                    <option value="">Semua Status</option>
                    <option value="employed" <?= $filters['status'] == 'employed' ? 'selected' : '' ?>>Bekerja</option>
                    <option value="unemployed" <?= $filters['status'] == 'unemployed' ? 'selected' : '' ?>>Belum Bekerja</option>
                    <option value="other" <?= $filters['status'] == 'other' ? 'selected' : '' ?>>Lainnya</option>
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary w-100 rounded-pill">Terapkan</button>
                <a href="/admin/alumni" class="btn btn-light w-100 rounded-pill">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light bg-opacity-50">
                    <tr>
                        <th class="border-0 px-4 py-3 text-muted fw-semibold small">INFO ALUMNI</th>
                        <th class="border-0 px-4 py-3 text-muted fw-semibold small">PRODI</th>
                        <th class="border-0 px-4 py-3 text-muted fw-semibold small">TAHUN</th>
                        <th class="border-0 px-4 py-3 text-muted fw-semibold small">STATUS</th>
                        <th class="border-0 px-4 py-3 text-muted fw-semibold small text-end">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($alumni)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-3 opacity-25"></i>
                                Tidak ada data alumni ditemukan.
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach($alumni as $row): ?>
                    <tr>
                        <td class="px-4 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-0"><?= $row['full_name'] ?></h6>
                                    <small class="text-muted"><?= $row['nim'] ?></small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-muted fw-medium"><?= $row['major'] ?></td>
                        <td class="px-4 py-3">
                            <span class="badge bg-light text-dark border rounded-pill px-3"><?= $row['graduation_year'] ?></span>
                        </td>
                        <td class="px-4 py-3">
                            <?php if($row['status'] == 'employed'): ?>
                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2">
                                    <i class="bi bi-check-circle-fill me-1"></i> Bekerja
                                </span>
                            <?php elseif($row['status'] == 'unemployed'): ?>
                                <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-2">
                                    <i class="bi bi-clock-fill me-1"></i> Belum Kerja
                                </span>
                            <?php else: ?>
                                <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3 py-2">
                                    Lainnya
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3 text-end">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle border-0" type="button" data-bs-toggle="dropdown" style="width: 32px; height: 32px;">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg">
                                    <li><a class="dropdown-item py-2" href="/admin/alumni/edit/<?= $row['id'] ?>"><i class="bi bi-pencil-square me-2"></i> Edit Data</a></li>
                                    <li><hr class="dropdown-divider opacity-50"></li>
                                    <li><a class="dropdown-item py-2 text-danger" href="/admin/alumni/delete/<?= $row['id'] ?>" onclick="return confirm('Hapus data alumni ini?')"><i class="bi bi-trash me-2"></i> Hapus</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-top border-light py-3 px-4">
        <?= $pager->links() ?>
    </div>
</div>
<?= $this->endSection() ?>
