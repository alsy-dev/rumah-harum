<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Komik</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $unit['gambar']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $unit['nama']; ?></h5>
                            <p class="card-text"><b>Email : </b><?= $unit['email']; ?></p>
                            <p class="card-text"><b>Tanggal Gabung : </b><?= $unit['created_at']; ?></p>
                            <a href="/unit/edit/<?= $unit['slug']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/unit/<?= $unit['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                            </form>
                            <br><br>
                            <a href="/unit">Kembali ke daftar unit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
