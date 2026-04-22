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
                <h3 class="fw-bold text-dark mb-4">Tambah Lowongan Baru</h3>
                
                <form action="/admin/jobs/store" method="post">
                    <div class="row g-3">
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Posisi Pekerjaan</label>
                            <input type="text" name="title" class="form-control" placeholder="Contoh: Backend Developer" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nama Perusahaan</label>
                            <input type="text" name="company" class="form-control" placeholder="Nama instansi/perusahaan" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Lokasi</label>
                            <input type="text" name="location" class="form-control" placeholder="Contoh: Jakarta / Remote" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tipe Pekerjaan</label>
                            <select name="type" class="form-select" required>
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                                <option value="Contract">Contract</option>
                                <option value="Remote">Remote</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Estimasi Gaji</label>
                            <input type="text" name="salary_range" class="form-control" placeholder="Contoh: Rp 5jt - 8jt">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label class="form-label fw-bold">Deskripsi & Syarat Pekerjaan</label>
                            <textarea name="description" class="form-control" rows="8" placeholder="Tuliskan detail lowongan di sini..." required></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold">Simpan Lowongan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
