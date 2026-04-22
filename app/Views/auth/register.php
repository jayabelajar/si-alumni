<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body p-5">
                <h3 class="text-center mb-4 fw-bold">Register Alumni</h3>
                <form action="/register" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required value="<?= old('username') ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="full_name" class="form-control" required value="<?= old('full_name') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control" required value="<?= old('nim') ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Major</label>
                            <input type="text" name="major" class="form-control" required value="<?= old('major') ?>">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Graduation Year</label>
                            <input type="number" name="graduation_year" class="form-control" required value="<?= old('graduation_year') ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2">Create Account</button>
                </form>
                <div class="text-center mt-4">
                    <p class="mb-0">Already have an account? <a href="/login">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
