<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class='my-3'>Form Tambah Data Unit</h2>
            <form action="/unit/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <?php $errors = validation_errors(); ?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Unit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['nama']) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['nama'] ?? ''; ?>
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
                    <label for="tel" class="col-sm-2 col-form-label">No. Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['tel']) ? 'is-invalid' : ''; ?>" id="tel" name="tel" value="<?= old('tel'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['tel'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ketua" class="col-sm-2 col-form-label">Ketua</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['ketua']) ? 'is-invalid' : ''; ?>" id="ketua" name="ketua" value="<?= old('ketua'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['ketua'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['provinsi']) ? 'is-invalid' : ''; ?>" id="provinsi" name="provinsi" value="<?= old('provinsi'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['provinsi'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['kota']) ? 'is-invalid' : ''; ?>" id="kota" name="kota" value="<?= old('kota'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['kota'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['kecamatan']) ? 'is-invalid' : ''; ?>" id="kecamatan" name="kecamatan" value="<?= old('kecamatan'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['kecamatan'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['kelurahan']) ? 'is-invalid' : ''; ?>" id="kelurahan" name="kelurahan" value="<?= old('kelurahan'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['kelurahan'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['alamat']) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['alamat'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2021/10/26071254/mengenal-fakta-menarik-seputar-kucing-anggora-turki-halodoc.jpg.webp" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control <?= isset($errors['gambar']) ? 'is-invalid' : ''; ?>" type="file" id="gambar" name="gambar" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $errors['gambar'] ?? ''; ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Unit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
