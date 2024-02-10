<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class='my-3'>Form Update Data Unit</h2>
            <form action="/unit/update/<?= $unit['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <?php $errors = validation_errors(); ?>
                <input type="hidden" name="slug" value="<?= $unit['slug']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $unit['gambar']; ?>">
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Unit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['nama']) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama', $unit['nama']) ?>">
                        <div class="invalid-feedback">
                            <?= $errors['nama'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= old('email', $unit['email']); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['email'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tel" class="col-sm-2 col-form-label">No. Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tel" name="tel" value="<?= old('tel', $unit['tel']); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['tel'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ketua" class="col-sm-2 col-form-label">Ketua</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ketua" name="ketua" value="<?= old('ketua', $unit['ketua']); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['ketua'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= old('provinsi', $unit['provinsi']); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['provinsi'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kota" name="kota" value="<?= old('kota', $unit['kota']); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['kota'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= old('kecamatan', $unit['kecamatan']); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['kecamatan'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?= old('kelurahan', $unit['kelurahan']); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['kelurahan'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat', $unit['alamat']); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['alamat'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $unit['gambar']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control <?= isset($errors['gambar']) ? 'is-invalid' : ''; ?>" type="file" id="gambar" name="gambar" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $errors['gambar'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
