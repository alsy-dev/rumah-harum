<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Pengajuan Unit</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Sampah</th>
                        <th scope="col">Total Point</th>
                        <th scope="col">Berat Sampah</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pengajuanNasabah->getAllPengajuan() as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $r['nama_nasabah']; ?></td>
                            <td><?= $r['nama_unit']; ?></td>
                            <td><?= $r['created_at']; ?></td>
                            <td><?= character_limiter($pengajuanNasabah->getSampahView($r['id']), 10); ?></td>
                            <td><?= $pengajuanNasabah->getPointSum($r['id']); ?></td>
                            <td><?= $pengajuanNasabah->getWeightSum($r['id']); ?></td>
                            <td><?= $r['status']; ?></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
