<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mb-5">
    <h2 class="fw-bold text-dark mb-1">Ringkasan Dashboard</h2>
    <p class="text-muted">Pantau data statistik alumni Anda secara real-time.</p>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm overflow-hidden h-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-4">
                        <i class="bi bi-people-fill text-primary fs-3"></i>
                    </div>
                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2">+12%</span>
                </div>
                <h6 class="text-muted fw-medium mb-1">Total Alumni</h6>
                <h3 class="fw-bold mb-0 text-dark"><?= number_format($total_alumni) ?></h3>
            </div>
            <div class="bg-primary" style="height: 4px; width: 100%;"></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm overflow-hidden h-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="bg-success bg-opacity-10 p-3 rounded-4">
                        <i class="bi bi-briefcase-fill text-success fs-3"></i>
                    </div>
                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2">Stabil</span>
                </div>
                <h6 class="text-muted fw-medium mb-1">Sudah Bekerja</h6>
                <h3 class="fw-bold mb-0 text-dark"><?= number_format($total_employed) ?></h3>
            </div>
            <div class="bg-success" style="height: 4px; width: 100%;"></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm overflow-hidden h-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="bg-warning bg-opacity-10 p-3 rounded-4">
                        <i class="bi bi-clock-history text-warning fs-3"></i>
                    </div>
                    <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-2">-3%</span>
                </div>
                <h6 class="text-muted fw-medium mb-1">Belum Bekerja</h6>
                <h3 class="fw-bold mb-0 text-dark"><?= number_format($total_unemployed) ?></h3>
            </div>
            <div class="bg-warning" style="height: 4px; width: 100%;"></div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-4 border-bottom border-light d-flex align-items-center justify-content-between px-4">
                <h5 class="fw-bold mb-0 text-dark">Statistik Lulusan per Tahun</h5>
                <button class="btn btn-light btn-sm rounded-pill px-3">Lihat Detail <i class="bi bi-chevron-right ms-1"></i></button>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light bg-opacity-50">
                            <tr>
                                <th class="border-0 px-4 py-3 text-muted fw-semibold small">TAHUN LULUS</th>
                                <th class="border-0 px-4 py-3 text-muted fw-semibold small text-end">JUMLAH ALUMNI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($by_year as $row): ?>
                            <tr>
                                <td class="px-4 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-secondary bg-opacity-10 text-secondary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                                            <i class="bi bi-calendar-event" style="font-size: 0.8rem;"></i>
                                        </div>
                                        <span class="fw-medium text-dark"><?= $row['graduation_year'] ?></span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-end fw-bold text-primary">
                                    <?= $row['total'] ?> Orang
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
