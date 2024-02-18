<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Nasabah</h2>
            <div class="card">
                <div class="card-header">
                    Detail Nasabah
                </div>
                <div class="card-body">
                    <p class="card-text">USERNAME: <?= $nasabah->username; ?></p>
                    <p class="card-text">ID NASABAH: <?= $nasabah->id; ?></p>
                    <p class="card-text">KATEGORI NASABAH: <?= $nasabah->jenisNasabah; ?></p>
                    <p class="card-text">TANGGAL GABUNG: <?= $nasabah->createdAt; ?></p>
                    <p class="card-text">EMAIL: <?= $nasabah->getEmail(); ?></p>
                    <a href="/nasabah/edit/<?= $nasabah->username; ?>" class="btn btn-warning">Edit</a>
                    <form action="/nasabah/<?= $nasabah->id; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                    </form>
                    <br><br>
                    <a href="/nasabah">Kembali ke daftar nasabah</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
