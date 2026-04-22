<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mb-5">
    <h2 class="fw-bold text-dark mb-1">Pusat Karir Alumni</h2>
    <p class="text-muted">Temukan peluang karir terbaik dari mitra perusahaan kami.</p>
</div>

<div class="card border-0 shadow-sm mb-5 py-2">
    <div class="card-body px-4">
        <form action="/jobs" method="get" class="row g-3 align-items-end">
            <div class="col-md-5">
                <label class="form-label small fw-bold text-muted text-uppercase">Cari Pekerjaan</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control bg-light border-0" placeholder="Posisi, Perusahaan, atau Lokasi..." value="<?= $filters['search'] ?>">
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-bold text-muted text-uppercase">Tipe Pekerjaan</label>
                <select name="type" class="form-select bg-light border-0">
                    <option value="">Semua Tipe</option>
                    <option value="Full-time" <?= $filters['type'] == 'Full-time' ? 'selected' : '' ?>>Full-time</option>
                    <option value="Part-time" <?= $filters['type'] == 'Part-time' ? 'selected' : '' ?>>Part-time</option>
                    <option value="Remote" <?= $filters['type'] == 'Remote' ? 'selected' : '' ?>>Remote</option>
                    <option value="Internship" <?= $filters['type'] == 'Internship' ? 'selected' : '' ?>>Internship</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Cari Peluang</button>
            </div>
        </form>
    </div>
</div>

<div class="row g-4">
    <?php if(empty($jobs)): ?>
        <div class="col-12 text-center py-5">
            <i class="bi bi-briefcase text-muted opacity-25" style="font-size: 4rem;"></i>
            <p class="mt-3 text-muted">Belum ada lowongan yang sesuai dengan kriteria Anda.</p>
        </div>
    <?php endif; ?>

    <?php foreach($jobs as $job): ?>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100 transition-hover">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-4 p-3">
                        <i class="bi bi-building fs-3"></i>
                    </div>
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">
                        <?= $job['type'] ?>
                    </span>
                </div>
                
                <h5 class="fw-bold text-dark mb-1"><?= $job['title'] ?></h5>
                <p class="text-primary fw-medium mb-3"><?= $job['company'] ?></p>
                
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <div class="d-flex align-items-center text-muted small">
                        <i class="bi bi-geo-alt me-1"></i> <?= $job['location'] ?>
                    </div>
                    <div class="d-flex align-items-center text-muted small">
                        <i class="bi bi-currency-dollar me-1"></i> <?= $job['salary_range'] ?? 'Negosiasi' ?>
                    </div>
                    <div class="d-flex align-items-center text-muted small">
                        <i class="bi bi-calendar3 me-1"></i> <?= date('d M Y', strtotime($job['created_at'])) ?>
                    </div>
                </div>

                <a href="/jobs/<?= $job['id'] ?>" class="btn btn-outline-primary w-100 rounded-pill fw-bold">
                    Lihat Detail Pekerjaan
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="mt-5 d-flex justify-content-center">
    <?= $pager->links() ?>
</div>

<style>
    .transition-hover {
        transition: all 0.3s ease;
    }
    .transition-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px -5px rgba(0,0,0,0.1) !important;
    }
</style>
<?= $this->endSection() ?>
