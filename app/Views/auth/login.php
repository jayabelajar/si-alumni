<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
<style>
    body {
        background: url('/images/login_bg.png') no-repeat center center fixed;
        background-size: cover;
    }
    .login-container {
        min-height: 100vh; /* Use full viewport height */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        position: relative;
        z-index: 1;
    }
    .login-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 2.5rem;
        width: 100%;
        max-width: 450px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }
    @media (max-width: 576px) {
        .login-card {
            padding: 2rem !important;
        }
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
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="login-container">
    <div class="login-card p-5">
        <div class="text-center mb-5">
            <div class="brand-logo">
                <i class="bi bi-mortarboard-fill"></i>
            </div>
            <h2 class="fw-bold text-dark">Selamat Datang</h2>
            <p class="text-muted">Masuk ke Sistem Informasi Alumni</p>
        </div>

        <form action="/login" method="post">
            <div class="mb-3">
                <label for="username" class="form-label fw-medium">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0">
                        <i class="bi bi-person text-muted"></i>
                    </span>
                    <input type="text" name="username" class="form-control border-start-0 ps-0" id="username" placeholder="Masukkan username" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label fw-medium">Kata Sandi</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0">
                        <i class="bi bi-lock text-muted"></i>
                    </span>
                    <input type="password" name="password" class="form-control border-start-0 ps-0" id="password" placeholder="••••••••" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-3 mb-4">
                Masuk Sekarang <i class="bi bi-arrow-right ms-2"></i>
            </button>
        </form>

        <div class="text-center">
            <p class="mb-0 text-muted small">Belum punya akun? <a href="/register" class="text-primary fw-semibold text-decoration-none">Daftar di sini</a></p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
