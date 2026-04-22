<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'SI Alumni' ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --secondary: #64748b;
            --background: #f8fafc;
            --surface: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --sidebar-width: 260px;
            --radius-lg: 1rem;
            --radius-md: 0.75rem;
        }

        body {
            background-color: var(--background);
            color: var(--text-main);
            font-family: 'Outfit', sans-serif;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            padding: 0.75rem 1rem;
            z-index: 1060;
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary) !important;
            font-size: 1.25rem;
        }

        /* Sidebar System */
        .sidebar {
            background: var(--surface);
            height: 100vh;
            padding-top: 80px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: fixed;
            top: 0;
            bottom: 0;
            z-index: 1040;
            width: var(--sidebar-width);
        }

        .sidebar .nav-link {
            border-radius: var(--radius-md);
            margin: 0.25rem 1rem;
            padding: 0.75rem 1rem;
            color: var(--text-muted);
            font-weight: 500;
            display: flex;
            align-items: center;
            transition: all 0.2s ease;
        }

        .sidebar .nav-link i {
            font-size: 1.25rem;
            margin-right: 0.75rem;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: #eff6ff;
            color: var(--primary);
        }

        /* Content Wrapper */
        .main-wrapper {
            padding-top: 70px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .main-content {
            padding: 2rem;
        }

        /* Responsive Logic */
        @media (max-width: 767.98px) {
            .sidebar {
                right: 0; /* Align sidebar to right in mobile */
                transform: translateX(100%);
                border-left: 1px solid #e2e8f0;
            }
            .sidebar.show {
                transform: translateX(0);
                box-shadow: -20px 0 25px -5px rgba(0,0,0,0.1);
            }
            .main-wrapper {
                margin-left: 0 !important;
            }
            .main-content {
                padding: 1.5rem 1rem;
            }
            .navbar-profile {
                display: none !important; /* Profile in topbar hidden on mobile */
            }
        }

        @media (min-width: 768px) {
            .sidebar {
                left: 0; 
                border-right: 1px solid #e2e8f0;
            }
            /* Hanya beri margin jika sidebar muncul (user login) DAN bukan di Landing Page */
            <?php if(session()->get('isLoggedIn') && !url_is('/')): ?>
            .main-wrapper {
                margin-left: var(--sidebar-width);
            }
            <?php else: ?>
            .main-wrapper {
                margin-left: 0;
            }
            <?php endif; ?>
            .btn-menu {
                display: none;
            }
        }

        /* Utilities */
        .btn-menu {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #f1f5f9;
            color: var(--secondary);
            border: none;
        }
    </style>
    <?= $this->renderSection('styles') ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <i class="bi bi-mortarboard-fill me-2 d-none d-sm-inline"></i>SI ALUMNI
            </a>

            <div class="d-flex align-items-center gap-3">
                <?php if(session()->get('isLoggedIn')): ?>
                    <!-- Desktop Profile (Right Side) -->
                    <div class="dropdown navbar-profile">
                        <a class="d-flex align-items-center gap-2 text-decoration-none" href="#" role="button" data-bs-toggle="dropdown">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center overflow-hidden" style="width: 35px; height: 35px; font-size: 0.8rem;">
                                <?php 
                                    $alumniModel = new \App\Models\AlumniModel();
                                    $me = $alumniModel->where('user_id', session()->get('user_id'))->first();
                                ?>
                                <?php if($me && $me['avatar']): ?>
                                    <img src="/uploads/avatars/<?= $me['avatar'] ?>" class="w-100 h-100 object-fit-cover">
                                <?php else: ?>
                                    <?= substr(session()->get('username'), 0, 1) ?>
                                <?php endif; ?>
                            </div>
                            <span class="fw-medium text-dark"><?= session()->get('username') ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-3">
                            <li><a class="dropdown-item py-2" href="/alumni/profile"><i class="bi bi-person me-2"></i> Profil Saya</a></li>
                            <li><hr class="dropdown-divider opacity-50"></li>
                            <li><a class="dropdown-item py-2 text-danger" href="/logout"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                    
                    <!-- Mobile Menu Toggler (Right Side) - Hidden on Landing Page -->
                    <?php if(!url_is('/')): ?>
                    <button class="btn-menu d-md-none" type="button" id="sidebarToggler">
                        <i class="bi bi-list fs-4"></i>
                    </button>
                    <?php endif; ?>
                <?php else: ?>
                    <a class="btn btn-primary btn-sm px-4 rounded-pill" href="/login">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <?php if(session()->get('isLoggedIn') && !url_is('/')): ?>
    <nav class="sidebar shadow-sm" id="sidebarMenu">
        <div class="position-sticky">
            <div class="px-4 py-3 mb-2 border-bottom border-light mx-2">
                <small class="text-uppercase text-muted fw-bold" style="font-size: 0.65rem; letter-spacing: 0.05em;">Menu Navigasi</small>
            </div>
            <ul class="nav flex-column mt-2">
                <?php if(session()->get('role') === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('admin/dashboard') || url_is('admin') ? 'active' : '' ?>" href="/admin/dashboard">
                            <i class="bi bi-grid-fill"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('admin/alumni*') ? 'active' : '' ?>" href="/admin/alumni">
                            <i class="bi bi-people-fill"></i> Data Alumni
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('admin/jobs*') ? 'active' : '' ?>" href="/admin/jobs">
                            <i class="bi bi-briefcase me-2"></i> Lowongan Kerja
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <small class="text-muted text-uppercase fw-bold px-3" style="font-size: 0.65rem;">Akun</small>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('admin/profile') ? 'active' : '' ?>" href="/admin/profile">
                            <i class="bi bi-person-gear me-2"></i> Profil Saya
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('alumni/dashboard') || url_is('alumni') ? 'active' : '' ?>" href="/alumni/dashboard">
                            <i class="bi bi-grid-fill"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('alumni/profile') ? 'active' : '' ?>" href="/alumni/profile">
                            <i class="bi bi-person-bounding-box"></i> Profil Saya
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('jobs*') ? 'active' : '' ?>" href="/jobs">
                            <i class="bi bi-briefcase-fill"></i> Pusat Karir
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item mt-4 pt-4 border-top border-light mx-3 d-md-none">
                    <a class="nav-link text-danger" href="/logout">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <?php endif; ?>

    <div class="main-wrapper">
        <main class="main-content">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success border-0 shadow-sm rounded-4 alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger border-0 shadow-sm rounded-4 alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </main>

        <!-- Footer Section -->
        <?php if(url_is('/') || !session()->get('isLoggedIn')): ?>
            <!-- Full Premium Footer for Public Pages -->
            <footer class="footer mt-auto py-5 border-top border-light bg-white">
                <div class="container">
                    <div class="row g-4 mb-5">
                        <div class="col-lg-4 col-md-6">
                            <a class="navbar-brand mb-3 d-block" href="/">
                                <i class="bi bi-mortarboard-fill me-2"></i>SI ALUMNI
                            </a>
                            <p class="text-muted small lh-lg">Portal pusat karir dan jejaring alumni terpadu. Membantu alumni tetap terhubung dan menemukan peluang terbaik di dunia profesional.</p>
                            <div class="d-flex gap-3 mt-4">
                                <a href="#" class="btn btn-light btn-sm rounded-circle shadow-sm p-2"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="btn btn-light btn-sm rounded-circle shadow-sm p-2"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="btn btn-light btn-sm rounded-circle shadow-sm p-2"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-6 ms-lg-auto">
                            <h6 class="fw-bold mb-4">Navigasi</h6>
                            <ul class="list-unstyled small d-grid gap-2">
                                <li><a href="/" class="text-muted text-decoration-none">Beranda</a></li>
                                <li><a href="/jobs" class="text-muted text-decoration-none">Lowongan Kerja</a></li>
                                <li><a href="/login" class="text-muted text-decoration-none">Login Alumni</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-3 col-6">
                            <h6 class="fw-bold mb-4">Legal</h6>
                            <ul class="list-unstyled small d-grid gap-2">
                                <li><a href="#" class="text-muted text-decoration-none">Kebijakan Privasi</a></li>
                                <li><a href="#" class="text-muted text-decoration-none">Syarat & Ketentuan</a></li>
                                <li><a href="#" class="text-muted text-decoration-none">Hubungi Kami</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h6 class="fw-bold mb-4">Kontak Kami</h6>
                            <ul class="list-unstyled small d-grid gap-3">
                                <li class="d-flex gap-3">
                                    <i class="bi bi-geo-alt text-primary"></i>
                                    <span class="text-muted">Jl. Kampus Alumni No. 123, Kota Pendidikan, Indonesia</span>
                                </li>
                                <li class="d-flex gap-3">
                                    <i class="bi bi-envelope text-primary"></i>
                                    <span class="text-muted">info@sialumni.ac.id</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pt-4 border-top border-light text-center">
                        <p class="text-muted small mb-0">&copy; <?= date('Y') ?> SI Alumni Portal. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        <?php else: ?>
            <!-- Simple Footer for Dashboard Panels -->
            <footer class="py-3 bg-white border-top border-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">&copy; <?= date('Y') ?> SI Alumni Management System</div>
                        <div>
                            <a href="#" class="text-muted text-decoration-none">Privacy</a>
                            &middot;
                            <a href="#" class="text-muted text-decoration-none">Terms</a>
                        </div>
                    </div>
                </div>
            </footer>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebarToggler = document.getElementById('sidebarToggler');
        const sidebarMenu = document.getElementById('sidebarMenu');
        
        if (sidebarToggler) {
            sidebarToggler.addEventListener('click', function() {
                sidebarMenu.classList.toggle('show');
            });
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth < 768 && sidebarMenu && sidebarToggler) {
                const isClickInsideSidebar = sidebarMenu.contains(event.target);
                const isClickInsideToggler = sidebarToggler.contains(event.target);
                
                if (!isClickInsideSidebar && !isClickInsideToggler && sidebarMenu.classList.contains('show')) {
                    sidebarMenu.classList.remove('show');
                }
            }
        });
    </script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
