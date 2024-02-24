<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Komik</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/sampah/<?= $sampah['gambar']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $sampah['nama']; ?></h5>
                            <p class="card-text"><b>Jenis : </b><?= $sampah['jenis']; ?></p>
                            <p class="card-text"><b>Tsatuan : </b>g</p>
                            <a href="/sampah/edit/<?= $sampah['slug']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/sampah/<?= $sampah['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                            </form>
                            <br><br>
                            <a href="/sampah">Kembali ke daftar sampah</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
