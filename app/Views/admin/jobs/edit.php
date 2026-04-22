<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mb-4">
    <a href="/admin/jobs" class="text-decoration-none text-muted small">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">
                <h3 class="fw-bold text-dark mb-4">Edit Lowongan Pekerjaan</h3>
                
                <form action="/admin/jobs/update/<?= $job['id'] ?>" method="post">
                    <div class="row g-3">
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Posisi Pekerjaan</label>
                            <input type="text" name="title" class="form-control" value="<?= old('title', $job['title']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nama Perusahaan</label>
                            <input type="text" name="company" class="form-control" value="<?= old('company', $job['company']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Lokasi</label>
                            <input type="text" name="location" class="form-control" value="<?= old('location', $job['location']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tipe Pekerjaan</label>
                            <select name="type" class="form-select" required>
                                <option value="Full-time" <?= $job['type'] == 'Full-time' ? 'selected' : '' ?>>Full-time</option>
                                <option value="Part-time" <?= $job['type'] == 'Part-time' ? 'selected' : '' ?>>Part-time</option>
                                <option value="Contract" <?= $job['type'] == 'Contract' ? 'selected' : '' ?>>Contract</option>
                                <option value="Remote" <?= $job['type'] == 'Remote' ? 'selected' : '' ?>>Remote</option>
                                <option value="Internship" <?= $job['type'] == 'Internship' ? 'selected' : '' ?>>Internship</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Estimasi Gaji</label>
                            <input type="text" name="salary_range" class="form-control" value="<?= old('salary_range', $job['salary_range']) ?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Link Lamaran / Email</label>
                            <input type="text" name="application_link" class="form-control" value="<?= old('application_link', $job['application_link']) ?>" placeholder="Contoh: https://glints.com/... atau mailto:hrd@perusahaan.com" required>
                            <small class="text-muted">Gunakan URL lengkap atau mailto:alamat@email.com</small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Deskripsi & Syarat Pekerjaan</label>
                            <textarea name="description" class="form-control" rows="8" required><?= old('description', $job['description']) ?></textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" <?= $job['is_active'] ? 'checked' : '' ?>>
                                <label class="form-check-label fw-bold" for="isActive">Tampilkan Lowongan (Aktif)</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold">Update Lowongan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
