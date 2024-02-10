<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class='my-3'>Form Update Data Sampah</h2>
            <?= validation_list_errors(); ?>
            <form action="/sampah/update/<?= $sampah['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <?php $errors = validation_errors(); ?>
                <input type="hidden" name="slug" value="<?= $sampah['slug']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $sampah['gambar']; ?>">
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Sampah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['nama']) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama', $sampah['nama']) ?>">
                        <div class="invalid-feedback">
                            <?= $errors['nama'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jenis" name="jenis" value="<?= old('jenis', $sampah['jenis']); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['jenis'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga_nasabah" class="col-sm-2 col-form-label">Harga Nasabah</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="harga_nasabah" name="harga_nasabah" value="<?= old('harga_nasabah', $sampah['harga_nasabah']); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['harga_nasabah'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga_unit" class="col-sm-2 col-form-label">Harga Unit</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="harga_unit" name="harga_unit" value="<?= old('harga_unit', $sampah['harga_unit']); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['harga_unit'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= old('keterangan', $sampah['keterangan']); ?>">
                        <div class="invalid-feedback">
                            <?= $errors['keterangan'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/sampah/<?= $sampah['gambar']; ?>" class="img-thumbnail img-preview">
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
