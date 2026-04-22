<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mb-5 d-flex align-items-center justify-content-between">
    <div>
        <h2 class="fw-bold text-dark mb-1">Kelola Lowongan Kerja</h2>
        <p class="text-muted mb-0">Atur daftar lowongan kerja yang akan ditampilkan ke alumni.</p>
    </div>
    <a href="/admin/jobs/create" class="btn btn-primary rounded-pill px-4 shadow-sm">
        <i class="bi bi-plus-lg me-2"></i>Tambah Lowongan
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light bg-opacity-50">
                    <tr>
                        <th class="border-0 px-4 py-3 text-muted fw-semibold small">POSISI & PERUSAHAAN</th>
                        <th class="border-0 px-4 py-3 text-muted fw-semibold small">LOKASI</th>
                        <th class="border-0 px-4 py-3 text-muted fw-semibold small">TIPE</th>
                        <th class="border-0 px-4 py-3 text-muted fw-semibold small">STATUS</th>
                        <th class="border-0 px-4 py-3 text-muted fw-semibold small text-end">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($jobs)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Belum ada data lowongan.</td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach($jobs as $job): ?>
                    <tr>
                        <td class="px-4 py-3">
                            <div>
                                <h6 class="fw-bold text-dark mb-0"><?= $job['title'] ?></h6>
                                <small class="text-primary"><?= $job['company'] ?></small>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-muted small"><?= $job['location'] ?></td>
                        <td class="px-4 py-3">
                            <span class="badge bg-light text-dark border rounded-pill px-3"><?= $job['type'] ?></span>
                        </td>
                        <td class="px-4 py-3">
                            <?php if($job['is_active']): ?>
                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2">Aktif</span>
                            <?php else: ?>
                                <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3 py-2">Non-Aktif</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3 text-end">
                            <a href="/admin/jobs/edit/<?= $job['id'] ?>" class="btn btn-light btn-sm rounded-circle me-1" style="width: 32px; height: 32px;"><i class="bi bi-pencil-square"></i></a>
                            <a href="/admin/jobs/delete/<?= $job['id'] ?>" class="btn btn-light btn-sm rounded-circle text-danger" style="width: 32px; height: 32px;" onclick="return confirm('Hapus lowongan ini?')"><i class="bi bi-trash"></i></a>
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
