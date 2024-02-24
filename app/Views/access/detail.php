<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class='my-3'>Detail Admin</h2>
            <form action="/access/update/<?= $admin->id; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <?php $errors = validation_errors(); ?>
                <div class="row mb-3">
                    <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Sampah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['nama_lengkap']) ? 'is-invalid' : ''; ?>" id="nama_lengkap" name="nama_lengkap" autofocus value="<?= old('nama_lengkap', $admin->namaLengkap) ?>">
                        <div class="invalid-feedback">
                            <?= $errors['nama_lengkap'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="admin.dashboard" name="permission[]" id="flexCheckDefault" <?php if ($admin->hasPermission('admin.dashboard')) : ?>checked<?php endif; ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        Dashboard
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="admin.list-nasabah" name="permission[]" id="flexCheckDefault" <?php if ($admin->hasPermission('admin.list-nasabah')) : ?>checked<?php endif; ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        List Nasabah
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="admin.list-unit" name="permission[]" id="flexCheckDefault" <?php if ($admin->hasPermission('admin.list-unit')) : ?>checked<?php endif; ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        List Unit
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="admin.pengajuan-unit" name="permission[]" id="flexCheckDefault" <?php if ($admin->hasPermission('admin.pengajuan-unit')) : ?>checked<?php endif; ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        Pengajuan Unit
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="admin.list-sampah" name="permission[]" id="flexCheckDefault" <?php if ($admin->hasPermission('admin.list-sampah')) : ?>checked<?php endif; ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        List Sampah
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="admin.tambah-sampah" name="permission[]" id="flexCheckDefault" <?php if ($admin->hasPermission('admin.tambah-sampah')) : ?>checked<?php endif; ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        Tambah Sampah
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="admin.saldo-pusat" name="permission[]" id="flexCheckDefault" <?php if ($admin->hasPermission('admin.saldo-pusat')) : ?>checked<?php endif; ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        Saldo Pusat
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="admin.saldo-unit" name="permission[]" id="flexCheckDefault" <?php if ($admin->hasPermission('admin.saldo-unit')) : ?>checked<?php endif; ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        Saldo Unit
                    </label>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="admin.access-control" name="permission[]" id="flexCheckDefault" <?php if ($admin->hasPermission('admin.access-control')) : ?>checked<?php endif; ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        Pengaturan Akses
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
