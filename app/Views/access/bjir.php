<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class='my-3'>Form Tambah Data Sampah</h2>
            <form action="/access/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="kucing" id="flexCheckDefault" name="a">
                    <label class="form-check-label" for="flexCheckDefault">
                        kucing
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="bjir" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault" name="a">
                        bjir
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Sampah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
