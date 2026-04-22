<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
<style>
    .hero-section {
        padding: 60px 0; /* Reduced from 100px */
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        position: relative;
        overflow: hidden;
    }
    .hero-section::before {
        content: '';
        position: absolute;
        top: -10%;
        right: -5%;
        width: 300px;
        height: 300px;
        background: rgba(37, 99, 235, 0.05);
        border-radius: 50%;
        filter: blur(80px);
    }
    .hero-title {
        font-size: 2.75rem; /* Reduced from 3.5rem */
        font-weight: 800;
        letter-spacing: -0.03em;
        line-height: 1.2;
        color: #1e293b;
        margin-bottom: 1.5rem;
    }
    .feature-card {
        border: none;
        border-radius: 1.5rem;
        transition: all 0.3s ease;
        background: white;
    }
    .hero-image {
        max-height: 450px;
        width: 100%;
        object-fit: cover;
        border-radius: 2rem;
    }
    @media (max-width: 767.98px) {
        .hero-title {
            font-size: 2rem;
        }
        .hero-section {
            padding: 40px 0;
            text-align: center;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="hero-section mb-5 rounded-5 shadow-sm">
    <div class="container px-4">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-3 fw-bold">Official Alumni Portal v2.0</span>
                <h1 class="hero-title mb-4">Membangun Masa Depan Bersama Alumni.</h1>
                <p class="text-muted fs-5 mb-5 lh-lg">Portal terpadu untuk menjalin networking, berbagi informasi lowongan kerja, dan melacak kesuksesan karir lulusan kami.</p>
                <div class="d-flex flex-column flex-md-row gap-3">
                    <a href="/login" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm fw-bold py-3">Mulai Sekarang</a>
                    <a href="#features" class="btn btn-outline-light btn-lg px-5 rounded-pill text-dark border-0 shadow-none fw-bold py-3">Pelajari Lebih Lanjut</a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?q=80&w=600&auto=format&fit=crop" class="img-fluid hero-image shadow-lg" alt="Alumni">
                    <div class="position-absolute bottom-0 start-0 bg-white p-4 rounded-4 shadow-lg m-4 d-none d-md-block text-start border border-light">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-success rounded-circle" style="width: 12px; height: 12px;"></div>
                            <span class="fw-bold text-dark">50+ Lowongan Baru Hari Ini</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-primary fw-bold text-uppercase small tracking-widest">Ecosystem</span>
            <h2 class="fw-extrabold text-dark mt-2 display-6">Fitur Unggulan Kami</h2>
            <div class="mx-auto bg-primary rounded-pill mt-3" style="width: 50px; height: 4px;"></div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="card feature-card h-100 p-4 border-0 shadow-sm overflow-hidden">
                    <div class="card-body p-2">
                        <div class="icon-box-new mb-4 text-primary">
                            <i class="bi bi-briefcase-fill display-5"></i>
                        </div>
                        <h4 class="fw-bold mb-3 text-dark">Pusat Karir</h4>
                        <p class="text-muted mb-0 leading-relaxed">Akses eksklusif ke lowongan kerja dari perusahaan mitra yang mencari talenta terbaik dari kampus kami.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card feature-card h-100 p-4 border-0 shadow-sm overflow-hidden">
                    <div class="card-body p-2">
                        <div class="icon-box-new mb-4 text-success">
                            <i class="bi bi-people-fill display-5"></i>
                        </div>
                        <h4 class="fw-bold mb-3 text-dark">Jejaring Alumni</h4>
                        <p class="text-muted mb-0 leading-relaxed">Jalin kembali komunikasi dan kolaborasi profesional dengan ribuan alumni di berbagai sektor industri.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card feature-card h-100 p-4 border-0 shadow-sm overflow-hidden">
                    <div class="card-body p-2">
                        <div class="icon-box-new mb-4 text-warning">
                            <i class="bi bi-shield-check display-5"></i>
                        </div>
                        <h4 class="fw-bold mb-3 text-dark">Tracer Study</h4>
                        <p class="text-muted mb-0 leading-relaxed">Sistem pelacakan karir yang efisien untuk membantu institusi meningkatkan standar kualitas pendidikan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .fw-extrabold { font-weight: 800; }
    .tracking-widest { letter-spacing: 0.2em; }
    .leading-relaxed { line-height: 1.6; }
    
    .feature-card {
        border-radius: 2rem;
        background: #ffffff;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid transparent !important;
    }
    
    .feature-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 30px 60px -12px rgba(0,0,0,0.08) !important;
        border-color: rgba(37, 99, 235, 0.1) !important;
        background: #ffffff;
    }
    
    .icon-box-new {
        transition: all 0.3s ease;
        display: inline-block;
    }
    
    .feature-card:hover .icon-box-new {
        transform: scale(1.1) rotate(5deg);
    }
</style>

<section class="py-5 mt-5">
    <div class="bg-dark rounded-5 p-5 text-center text-white shadow-lg overflow-hidden position-relative">
        <div class="position-relative z-1">
            <h2 class="fw-bold mb-4">Siap untuk Bergabung dengan Komunitas?</h2>
            <p class="opacity-75 mb-5 fs-5">Sudah ribuan alumni bergabung dan mendapatkan manfaatnya.</p>
            <a href="/login" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold py-3 shadow-lg">Login ke Portal Sekarang</a>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
