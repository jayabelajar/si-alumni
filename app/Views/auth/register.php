<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
<style>
    body {
        background: url('/images/login_bg.png') no-repeat center center fixed;
        background-size: cover;
    }
    .register-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        position: relative;
        z-index: 1;
    }
    .register-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 2.5rem;
        width: 100%;
        max-width: 600px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }
    .brand-logo {
        width: 64px;
        height: 64px;
        background: var(--primary);
        color: white;
        border-radius: 1.25rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 1.5rem;
        box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
    }
    .form-control, .form-select {
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
    }
    .form-control:focus {
        background: white;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="register-container">
    <div class="register-card p-4 p-md-5">
        <div class="text-center mb-5">
            <div class="brand-logo">
                <i class="bi bi-person-plus-fill"></i>
            </div>
            <h2 class="fw-bold text-dark">Daftar Akun Alumni</h2>
            <p class="text-muted">Lengkapi data di bawah untuk bergabung</p>
        </div>

        <form action="/register" method="post">
            <div class="row g-3">
                <div class="col-md-6 mb-2">
                    <label class="form-label small fw-bold text-muted text-uppercase">Username</label>
                    <input type="text" name="username" class="form-control" required value="<?= old('username') ?>" placeholder="alumni2024">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label small fw-bold text-muted text-uppercase">Kata Sandi</label>
                    <input type="password" name="password" class="form-control" required placeholder="Minimal 8 karakter">
                </div>
                <div class="col-md-12 mb-2">
                    <label class="form-label small fw-bold text-muted text-uppercase">Nama Lengkap</label>
                    <input type="text" name="full_name" class="form-control" required value="<?= old('full_name') ?>" placeholder="Nama sesuai ijazah">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label small fw-bold text-muted text-uppercase">NIM</label>
                    <input type="text" name="nim" class="form-control" required value="<?= old('nim') ?>" placeholder="Contoh: 2021001">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label small fw-bold text-muted text-uppercase">Tahun Lulus</label>
                    <input type="number" name="graduation_year" class="form-control" required value="<?= old('graduation_year', date('Y')) ?>">
                </div>
                <div class="col-md-12 mb-4">
                    <label class="form-label small fw-bold text-muted text-uppercase">Program Studi</label>
                    <input type="text" name="major" class="form-control" required value="<?= old('major') ?>" placeholder="Sistem Informasi / Teknik Informatika">
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm mb-4">
                Daftar Sekarang <i class="bi bi-check2-circle ms-2"></i>
            </button>
        </form>

        <div class="text-center">
            <p class="mb-0 text-muted small">Sudah memiliki akun? <a href="/login" class="text-primary fw-semibold text-decoration-none">Masuk di sini</a></p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
