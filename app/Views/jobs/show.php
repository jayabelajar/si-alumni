<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mb-4">
    <a href="/jobs" class="text-decoration-none text-muted small">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Lowongan
    </a>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4 p-md-5">
                <div class="d-flex align-items-center gap-4 mb-4">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-4 p-4 d-none d-md-block">
                        <i class="bi bi-building fs-1"></i>
                    </div>
                    <div>
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-2">
                            <?= $job['type'] ?>
                        </span>
                        <h2 class="fw-bold text-dark mb-1"><?= $job['title'] ?></h2>
                        <h5 class="text-primary fw-medium"><?= $job['company'] ?></h5>
                    </div>
                </div>

                <hr class="opacity-10 mb-4">

                <h5 class="fw-bold text-dark mb-3">Deskripsi Pekerjaan</h5>
                <div class="text-muted lh-lg mb-5">
                    <?= nl2br($job['description']) ?>
                </div>

                <div class="bg-light rounded-4 p-4 d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div>
                        <p class="text-muted small mb-1">Tertarik dengan posisi ini?</p>
                        <h6 class="fw-bold text-dark mb-0">Klik tombol di samping untuk melamar.</h6>
                    </div>
                    <a href="<?= $job['application_link'] ?>" target="_blank" class="btn btn-primary px-5 py-3 rounded-pill fw-bold">
                        Lamar Sekarang <i class="bi bi-send-fill ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm sticky-top" style="top: 100px;">
            <div class="card-body p-4">
                <h5 class="fw-bold text-dark mb-4">Detail Informasi</h5>
                
                <div class="mb-4">
                    <label class="text-muted small text-uppercase fw-bold d-block mb-1">Lokasi</label>
                    <div class="d-flex align-items-center text-dark fw-medium">
                        <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                        <?= $job['location'] ?>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small text-uppercase fw-bold d-block mb-1">Estimasi Gaji</label>
                    <div class="d-flex align-items-center text-dark fw-medium">
                        <i class="bi bi-cash-stack text-primary me-2"></i>
                        <?= $job['salary_range'] ?? 'Negosiasi' ?>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="text-muted small text-uppercase fw-bold d-block mb-1">Diposting Pada</label>
                    <div class="d-flex align-items-center text-dark fw-medium">
                        <i class="bi bi-calendar-check-fill text-primary me-2"></i>
                        <?= date('d F Y', strtotime($job['created_at'])) ?>
                    </div>
                </div>

                <hr class="opacity-10 mb-4">

                <div class="text-center">
                    <p class="text-muted small mb-3">Bagikan lowongan ini:</p>
                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-light rounded-circle" style="width: 40px; height: 40px;"><i class="bi bi-whatsapp"></i></button>
                        <button class="btn btn-light rounded-circle" style="width: 40px; height: 40px;"><i class="bi bi-linkedin"></i></button>
                        <button class="btn btn-light rounded-circle" style="width: 40px; height: 40px;"><i class="bi bi-link-45deg"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
