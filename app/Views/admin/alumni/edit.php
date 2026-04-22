<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mb-5">
    <a href="/admin/alumni" class="btn btn-light rounded-pill px-4 mb-3">
        <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar
    </a>
    <h2 class="fw-bold text-dark mb-1">Edit Profil Alumni</h2>
    <p class="text-muted">Perbarui informasi profil dan status pekerjaan untuk alumni ini.</p>
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

                <form action="/admin/alumni/update/<?= $alumnus['id'] ?>" method="post">
                    <!-- Identity Section -->
                    <div class="mb-5">
                        <h5 class="fw-bold text-primary mb-4">
                            <i class="bi bi-person-badge me-2"></i>Identitas Akademik
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label small fw-bold text-muted text-uppercase">Nama Lengkap</label>
                                <input type="text" name="full_name" class="form-control bg-light border-0 rounded-3 py-2" value="<?= old('full_name', $alumnus['full_name']) ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-muted text-uppercase">NIM</label>
                                <input type="text" class="form-control bg-light border-0 rounded-3 py-2 opacity-75" value="<?= $alumnus['nim'] ?>" readonly>
                                <small class="text-muted">NIM tidak dapat diubah</small>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label small fw-bold text-muted text-uppercase">Program Studi</label>
                                <input type="text" name="major" class="form-control bg-light border-0 rounded-3 py-2" value="<?= old('major', $alumnus['major']) ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-muted text-uppercase">Tahun Lulus</label>
                                <input type="number" name="graduation_year" class="form-control bg-light border-0 rounded-3 py-2" value="<?= old('graduation_year', $alumnus['graduation_year']) ?>" required>
                            </div>
                        </div>
                    </div>

                    <!-- Career Status Section -->
                    <div class="mb-5">
                        <h5 class="fw-bold text-primary mb-4">
                            <i class="bi bi-briefcase me-2"></i>Status Karir Saat Ini
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label small fw-bold text-muted text-uppercase">Status Pekerjaan</label>
                                <select name="status" class="form-select bg-light border-0 rounded-3 py-2" required>
                                    <option value="employed" <?= old('status', $alumnus['status']) == 'employed' ? 'selected' : '' ?>>Bekerja (Employed)</option>
                                    <option value="unemployed" <?= old('status', $alumnus['status']) == 'unemployed' ? 'selected' : '' ?>>Belum Bekerja (Unemployed)</option>
                                    <option value="other" <?= old('status', $alumnus['status']) == 'other' ? 'selected' : '' ?>>Lainnya (Wirausaha/Lanjut Studi)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">Instansi / Perusahaan</label>
                                <input type="text" name="company" class="form-control bg-light border-0 rounded-3 py-2" value="<?= old('company', $alumnus['company']) ?>" placeholder="Nama tempat bekerja">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">Posisi / Jabatan</label>
                                <input type="text" name="position" class="form-control bg-light border-0 rounded-3 py-2" value="<?= old('position', $alumnus['position']) ?>" placeholder="Jabatan saat ini">
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3">
                        <a href="/admin/alumni" class="btn btn-light rounded-pill px-5">Batalkan</a>
                        <button type="submit" class="btn btn-primary rounded-pill px-5 shadow-sm">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 bg-light rounded-4 shadow-sm mb-4">
            <div class="card-body p-4 text-center">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                    <?php if($alumnus['avatar']): ?>
                        <img src="/uploads/avatars/<?= $alumnus['avatar'] ?>" class="w-100 h-100 object-fit-cover rounded-circle shadow-sm">
                    <?php else: ?>
                        <i class="bi bi-person-fill display-4"></i>
                    <?php endif; ?>
                </div>
                <h5 class="fw-bold mb-1"><?= $alumnus['full_name'] ?></h5>
                <p class="text-muted small mb-3"><?= $alumnus['nim'] ?></p>
                <div class="d-flex justify-content-center gap-2">
                    <?php if($alumnus['linkedin_url']): ?>
                        <a href="<?= $alumnus['linkedin_url'] ?>" target="_blank" class="btn btn-primary btn-sm rounded-circle"><i class="bi bi-linkedin"></i></a>
                    <?php endif; ?>
                    <?php if($alumnus['portfolio_url']): ?>
                        <a href="<?= $alumnus['portfolio_url'] ?>" target="_blank" class="btn btn-dark btn-sm rounded-circle"><i class="bi bi-globe"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
