<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mb-5">
    <h2 class="fw-bold text-dark mb-1">Profil Profesional</h2>
    <p class="text-muted">Lengkapi profil Anda untuk meningkatkan peluang karir.</p>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm text-center p-4 h-100">
            <div class="card-body">
                <div class="position-relative d-inline-block mb-4">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center mx-auto shadow-sm overflow-hidden" style="width: 120px; height: 120px; font-size: 3rem;">
                        <?php if($alumnus['avatar']): ?>
                            <img src="/uploads/avatars/<?= $alumnus['avatar'] ?>" class="w-100 h-100 object-fit-cover">
                        <?php else: ?>
                            <?= substr($alumnus['full_name'], 0, 1) ?>
                        <?php endif; ?>
                    </div>
                    <label for="avatarInput" class="btn btn-sm btn-white border shadow-sm rounded-circle position-absolute bottom-0 end-0" style="width: 35px; height: 35px; cursor: pointer;">
                        <i class="bi bi-camera"></i>
                    </label>
                </div>
                
                <h4 class="fw-bold text-dark mb-1"><?= $alumnus['full_name'] ?></h4>
                <p class="text-muted small mb-3"><?= $alumnus['nim'] ?> | Lulus <?= $alumnus['graduation_year'] ?></p>
                
                <div class="d-flex justify-content-center gap-2 mb-4">
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2"><?= $alumnus['major'] ?></span>
                </div>

                <hr class="opacity-10 mb-4">

                <div class="text-start">
                    <h6 class="fw-bold text-dark mb-3">Tautan Profesional</h6>
                    <?php if($alumnus['linkedin_url']): ?>
                        <a href="<?= $alumnus['linkedin_url'] ?>" target="_blank" class="d-flex align-items-center text-decoration-none mb-2 text-muted">
                            <i class="bi bi-linkedin text-primary me-2"></i> LinkedIn Profile
                        </a>
                    <?php endif; ?>
                    <?php if($alumnus['portfolio_url']): ?>
                        <a href="<?= $alumnus['portfolio_url'] ?>" target="_blank" class="d-flex align-items-center text-decoration-none mb-2 text-muted">
                            <i class="bi bi-globe text-primary me-2"></i> Portfolio Web
                        </a>
                    <?php endif; ?>
                    <?php if(!$alumnus['linkedin_url'] && !$alumnus['portfolio_url']): ?>
                        <p class="text-muted small italic">Belum ada tautan ditambahkan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3 border-bottom border-light">
                <h5 class="fw-bold mb-0">Edit Informasi Karir</h5>
            </div>
            <div class="card-body p-4 p-md-5">
                <form action="/alumni/profile/update" method="post" enctype="multipart/form-data">
                    <input type="file" name="avatar" id="avatarInput" class="d-none" accept="image/*">
                    <div class="row g-3">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Status Saat Ini</label>
                            <select name="status" class="form-select border-0 bg-light" required>
                                <option value="employed" <?= $alumnus['status'] == 'employed' ? 'selected' : '' ?>>Bekerja</option>
                                <option value="unemployed" <?= $alumnus['status'] == 'unemployed' ? 'selected' : '' ?>>Belum Bekerja</option>
                                <option value="other" <?= $alumnus['status'] == 'other' ? 'selected' : '' ?>>Lainnya</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Instansi / Perusahaan</label>
                            <input type="text" name="company" class="form-control border-0 bg-light" value="<?= old('company', $alumnus['company']) ?>" placeholder="Nama Perusahaan">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Posisi Pekerjaan</label>
                            <input type="text" name="position" class="form-control border-0 bg-light" value="<?= old('position', $alumnus['position']) ?>" placeholder="Contoh: Senior Developer">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Bio Ringkas</label>
                            <textarea name="bio" class="form-control border-0 bg-light" rows="3" placeholder="Ceritakan singkat tentang pengalaman Anda..."><?= old('bio', $alumnus['bio']) ?></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Keahlian (Skills)</label>
                            <input type="text" name="skills" class="form-control border-0 bg-light" value="<?= old('skills', $alumnus['skills']) ?>" placeholder="Contoh: PHP, UI Design, Project Management">
                            <small class="text-muted">Pisahkan dengan koma.</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">LinkedIn URL</label>
                            <input type="url" name="linkedin_url" class="form-control border-0 bg-light" value="<?= old('linkedin_url', $alumnus['linkedin_url']) ?>" placeholder="https://linkedin.com/in/username">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold">Portfolio / Web URL</label>
                            <input type="url" name="portfolio_url" class="form-control border-0 bg-light" value="<?= old('portfolio_url', $alumnus['portfolio_url']) ?>" placeholder="https://yourportfolio.com">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm">Simpan Perubahan Profil</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.getElementById('avatarInput').onchange = function (evt) {
        const [file] = this.files
        if (file) {
            // Optional: You could auto-submit here if you want:
            // this.form.submit();
            
            // Or just show a preview (we'd need an ID on the img tag)
            const previewContainer = document.querySelector('.object-fit-cover') || document.querySelector('.bg-primary.bg-opacity-10');
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-100 h-100 object-fit-cover';
                    
                    const container = document.querySelector('.bg-primary.bg-opacity-10');
                    container.innerHTML = '';
                    container.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        }
    }
</script>
<?= $this->endSection() ?>
