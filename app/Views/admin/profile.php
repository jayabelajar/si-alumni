<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mb-5">
    <h2 class="fw-bold text-dark mb-1">Pengaturan Profil</h2>
    <p class="text-muted">Kelola informasi akun dan keamanan panel administrator Anda.</p>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <!-- Profile Info Card -->
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white border-0 p-4 pb-0">
                <h5 class="fw-bold text-dark mb-0"><i class="bi bi-person-gear me-2 text-primary"></i>Informasi Dasar</h5>
            </div>
            <div class="card-body p-4">
                <form action="/admin/profile/update" method="post">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Username</label>
                        <input type="text" name="username" class="form-control bg-light border-0 rounded-3 py-2" value="<?= old('username', $user['username']) ?>" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Email Address</label>
                        <input type="email" name="email" class="form-control bg-light border-0 rounded-3 py-2" value="<?= old('email', $user['email']) ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm w-100 py-2">Perbarui Profil</button>
                </form>
            </div>
        </div>

        <!-- Role Info -->
        <div class="card border-0 bg-primary text-white rounded-4 shadow-sm">
            <div class="card-body p-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-shield-lock-fill fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">Role: Administrator</h6>
                        <small class="opacity-75">Anda memiliki akses penuh ke sistem.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <!-- Change Password Card -->
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-0 p-4 pb-0">
                <h5 class="fw-bold text-dark mb-0"><i class="bi bi-key me-2 text-warning"></i>Keamanan Akun</h5>
            </div>
            <div class="card-body p-4">
                <form action="/admin/profile/change-password" method="post">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Password Saat Ini</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-lock"></i></span>
                            <input type="password" name="current_password" class="form-control bg-light border-0 rounded-end-3 py-2" required>
                        </div>
                    </div>
                    <hr class="my-4 opacity-50">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Password Baru</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-shield-plus"></i></span>
                            <input type="password" name="new_password" class="form-control bg-light border-0 rounded-end-3 py-2" placeholder="Minimal 8 karakter" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Konfirmasi Password Baru</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-shield-check"></i></span>
                            <input type="password" name="confirm_password" class="form-control bg-light border-0 rounded-end-3 py-2" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning text-dark fw-bold rounded-pill px-4 shadow-sm w-100 py-2">Ganti Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
