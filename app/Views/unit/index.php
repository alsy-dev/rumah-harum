<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/unit/create" class="btn btn-primary mt-3">Tambah Data Unit</a>
            <h1 class="mt-2">Daftar Unit</h1>
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
                        <th scope="col">Nama Unit</th>
                        <th scope="col">Ketua</th>
                        <th scope="col">Tanggal Berdiri</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Jenis Admin</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Kelurahan</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($unit as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="\img\<?= $u['gambar']; ?>" class="sampul" alt=""></td>
                            <td><?= $u['nama']; ?></td>
                            <td><?= $u['ketua']; ?></td>
                            <td><?= $u['created_at']; ?></td>
                            <td><?= $u['tel']; ?></td>
                            <td>Unit</td>
                            <td><?= $u['kecamatan']; ?></td>
                            <td><?= $u['kelurahan']; ?></td>
                            <td><a href="/unit/<?= $u['slug']; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
