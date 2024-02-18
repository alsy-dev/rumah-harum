<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <a href="/nasabah/create" class="btn btn-primary mt-3">Tambah Data Nasabah</a>
            <h1 class="mt-2">Daftar Orang</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan keyword pencarian.." name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Nama Nasabah</th>
                        <th scope="col">Jenis Nasabah</th>
                        <th scope="col">Tanggal Gabung</th>
                        <th scope="col">Alamat Lengkap</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + ($pager->getCurrentPage() - 1) * $pager->getPerPage(); ?>
                    <?php foreach ($nasabah as $n) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $units->getNamaUnit($n->idUnit); ?></td>
                            <td><?= $n->namaLengkap; ?></td>
                            <td><?= $n->jenisNasabah; ?></td>
                            <td><?= $n->createdAt; ?></td>
                            <td><?= $n->alamat; ?></td>
                            <td><a href="/nasabah/<?= $n->username; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('users', 'pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
