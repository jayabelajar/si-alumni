<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mb-5">
    <a href="/admin/alumni" class="btn btn-light rounded-pill px-4 mb-3">
        <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar
    </a>
    <h2 class="fw-bold text-dark mb-1">Tambah Alumni Baru</h2>
    <p class="text-muted">Lengkapi data di bawah untuk membuat profil alumni dan akun aksesnya.</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <?php if(session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger border-0 rounded-4 mb-4">
                        <ul class="mb-0">
                            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="/admin/alumni/store" method="post">
                    <!-- Account Section -->
                    <div class="mb-5">
                        <h5 class="fw-bold text-primary mb-4">
                            <i class="bi bi-shield-lock me-2"></i>Informasi Akun
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">Username</label>
                                <input type="text" name="username" class="form-control bg-light border-0 rounded-3 py-2" value="<?= old('username') ?>" placeholder="contoh: alumni2024" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">Email</label>
                                <input type="email" name="email" class="form-control bg-light border-0 rounded-3 py-2" value="<?= old('email') ?>" placeholder="alumni@email.com" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label small fw-bold text-muted text-uppercase">Password Sementara</label>
                                <input type="password" name="password" class="form-control bg-light border-0 rounded-3 py-2" placeholder="Minimal 6 karakter" required>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Section -->
                    <div class="mb-5">
                        <h5 class="fw-bold text-primary mb-4">
                            <i class="bi bi-person-badge me-2"></i>Profil Alumni
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label small fw-bold text-muted text-uppercase">Nama Lengkap</label>
                                <input type="text" name="full_name" class="form-control bg-light border-0 rounded-3 py-2" value="<?= old('full_name') ?>" placeholder="Nama lengkap sesuai ijazah" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-muted text-uppercase">NIM</label>
                                <input type="text" name="nim" class="form-control bg-light border-0 rounded-3 py-2" value="<?= old('nim') ?>" placeholder="Contoh: 2021001" required>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label small fw-bold text-muted text-uppercase">Program Studi</label>
                                <input type="text" name="major" class="form-control bg-light border-0 rounded-3 py-2" value="<?= old('major') ?>" placeholder="Sistem Informasi, Teknik Informatika, dll" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-muted text-uppercase">Tahun Lulus</label>
                                <input type="number" name="graduation_year" class="form-control bg-light border-0 rounded-3 py-2" value="<?= old('graduation_year', date('Y')) ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3">
                        <button type="reset" class="btn btn-light rounded-pill px-5">Reset</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-5 shadow-sm">Simpan & Buat Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 bg-primary text-white rounded-4 shadow-sm h-100 overflow-hidden">
            <div class="card-body p-4 d-flex flex-column justify-content-center">
                <div class="mb-4">
                    <i class="bi bi-info-circle-fill display-4 opacity-50"></i>
                </div>
                <h4 class="fw-bold mb-3">Informasi</h4>
                <p class="opacity-75 mb-4 lh-lg">Menambahkan alumni baru akan otomatis membuatkan akun login dengan role "alumni".</p>
                <ul class="list-unstyled d-grid gap-2 small opacity-75">
                    <li><i class="bi bi-check-circle-fill me-2"></i> Username harus unik</li>
                    <li><i class="bi bi-check-circle-fill me-2"></i> Email harus valid</li>
                    <li><i class="bi bi-check-circle-fill me-2"></i> NIM tidak boleh duplikat</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
