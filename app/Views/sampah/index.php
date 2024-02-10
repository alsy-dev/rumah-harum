<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/sampah/create" class="btn btn-primary mt-3">Tambah Data Sampah</a>
            <h1 class="mt-2">Tabel Sampah</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga Nasabah</th>
                        <th scope="col">Harga Unit</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($sampah as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="\img\sampah\<?= $s['gambar']; ?>" class="sampul" alt=""></td>
                            <td><?= $s['nama']; ?></td>
                            <td><?= $s['jenis']; ?></td>
                            <td>Rp<?= $s['harga_nasabah']; ?></td>
                            <td>Ep<?= $s['harga_unit']; ?></td>
                            <td><?= $s['keterangan']; ?></td>
                            <td>G</td>
                            <td><a href="/sampah/<?= $s['slug']; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
