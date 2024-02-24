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
                        <th scope="col">Unit</th>
                        <th scope="col">Ketua Unit</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($riwayatTransaksi as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $r['nama']; ?></td>
                            <td><?= $r['ketua']; ?></td>
                            <td><?= $r['created_at']; ?></td>
                            <td>+<?= number_to_currency((float) $r['nominal'], 'IDR', 'id_ID'); ?></td>
                            <td><?= $r['status']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
