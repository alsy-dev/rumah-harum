<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class='my-3'>Form Tambah Data Sampah</h2>
            <form action="/nasabah/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <?php $errors = validation_errors(); ?>
                <div class="row mb-3">
                    <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['nama_lengkap']) ? 'is-invalid' : ''; ?>" id="nama_lengkap" name="nama_lengkap" autofocus value="<?= old('nama_lengkap'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['nama_lengkap'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['email']) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['email'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga_nasabah" class="col-sm-2 col-form-label">Harga Nasabah</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= isset($errors['harga_nasabah']) ? 'is-invalid' : ''; ?>" id="harga_nasabah" name="harga_nasabah" value="<?= old('harga_nasabah'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['harga_nasabah'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga_unit" class="col-sm-2 col-form-label">Harga Unit</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= isset($errors['harga_unit']) ? 'is-invalid' : ''; ?>" id="harga_unit" name="harga_unit" value="<?= old('harga_unit'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['harga_unit'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['keterangan']) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" value="<?= old('keterangan'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['keterangan'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/sampah/kucing.webp" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control <?= isset($errors['gambar']) ? 'is-invalid' : ''; ?>" type="file" id="gambar" name="gambar" onchange="previewImg()" accept="image/*">
                        <div class="invalid-feedback">
                            <?= $errors['gambar'] ?? ''; ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Sampah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
