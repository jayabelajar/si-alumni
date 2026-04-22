<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mb-5">
    <h2 class="fw-bold text-dark mb-1">Halo, <?= $alumnus['full_name'] ?>! 👋</h2>
    <p class="text-muted">Selamat datang kembali di Portal Alumni.</p>
</div>

<!-- Status Tracer Study -->
<div class="row mb-5">
    <div class="col-12">
        <div class="card border-0 shadow-sm overflow-hidden" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);">
            <div class="card-body p-4 p-md-5 text-white">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <?php if($isTracerComplete): ?>
                            <h3 class="fw-bold mb-2">Terima Kasih! ✨</h3>
                            <p class="opacity-75 mb-0">Anda telah melengkapi data Tracer Study. Informasi Anda sangat berharga bagi pengembangan kampus kita.</p>
                        <?php else: ?>
                            <h3 class="fw-bold mb-2">Lengkapi Tracer Study 📝</h3>
                            <p class="opacity-75 mb-4">Data pekerjaan Anda belum lengkap. Yuk, bantu kampus dengan memperbarui informasi karir Anda saat ini.</p>
                            <a href="/alumni/profile" class="btn btn-light rounded-pill px-4 fw-bold">Update Data Sekarang</a>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4 text-center d-none d-md-block">
                        <i class="bi bi-patch-check-fill display-1 opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Quick Actions -->
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
                <h5 class="fw-bold text-dark mb-4">Akses Cepat</h5>
                <div class="row g-3">
                    <div class="col-6">
                        <a href="/jobs" class="text-decoration-none">
                            <div class="bg-light p-4 rounded-4 text-center transition-hover">
                                <i class="bi bi-briefcase-fill text-primary fs-2 mb-2 d-block"></i>
                                <span class="text-dark fw-medium">Cari Kerja</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="/alumni/profile" class="text-decoration-none">
                            <div class="bg-light p-4 rounded-4 text-center transition-hover">
                                <i class="bi bi-person-fill-gear text-primary fs-2 mb-2 d-block"></i>
                                <span class="text-dark fw-medium">Edit Profil</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Career Stats -->
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
                <h5 class="fw-bold text-dark mb-4">Peluang Karir</h5>
                <div class="d-flex align-items-center justify-content-between p-4 bg-light rounded-4">
                    <div>
                        <h2 class="fw-bold text-primary mb-0"><?= $totalJobs ?></h2>
                        <p class="text-muted mb-0">Lowongan Aktif</p>
                    </div>
                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle">
                        <i class="bi bi-arrow-up-right-circle fs-3"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="/jobs" class="text-primary text-decoration-none fw-bold small">Lihat semua lowongan <i class="bi bi-chevron-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .transition-hover {
        transition: all 0.2s ease;
    }
    .transition-hover:hover {
        background: #eff6ff !important;
        transform: translateY(-3px);
    }
</style>
<?= $this->endSection() ?>
