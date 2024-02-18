<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.register') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="container d-flex justify-content-center p-5">
    <div class="card col-12 col-md-5 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-5"><?= lang('Auth.register') ?></h5>

            <?php if (session('error') !== null) : ?>
                <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
            <?php elseif (session('errors') !== null) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php if (is_array(session('errors'))) : ?>
                        <?php foreach (session('errors') as $error) : ?>
                            <?= $error ?>
                            <br>
                        <?php endforeach ?>
                    <?php else : ?>
                        <?= session('errors') ?>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <form action="<?= url_to('register') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Email -->
                <div class="form-floating mb-2">
                    <input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
                    <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
                </div>

                <!-- Nama Lengkap -->
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="floatingnama_lengkapInput" name="nama_lengkap" inputmode="text" autocomplete="nama_lengkap" placeholder="Nama Lengkap" value="<?= old('nama_lengkap') ?>" required>
                    <label for="floatingNamaLengkapInput">Nama Lengkap</label>
                </div>

                <!-- jenis -->
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="floatingJenisNasabahInput" name="jenis_nasabah" inputmode="text" autocomplete="jenis_nasabah" placeholder="jenis_nasabah" value="<?= old('jenis_nasabah') ?>" required>
                    <label for="floatingJenisNasabahInput">Jenis</label>
                </div>

                <!-- Username -->
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required>
                    <label for="floatingUsernameInput"><?= lang('Auth.username') ?></label>
                </div>

                <!-- Alamat -->
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="floatingAlamatInput" name="alamat" inputmode="text" autocomplete="alamat" placeholder="Alamat Lengkap" value="<?= old('alamat') ?>" required>
                    <label for="floatingAlamatInput">Alamat</label>
                </div>

                <!-- Mobile Number -->
                <div class="form-floating mb-2">
                    <input type="tel" class="form-control" id="floatingMobileNumberInput" name="mobile_number" autocomplete="tel" placeholder="Mobile Number (without hyphen)" value="<?= old('mobile_number') ?>" required>
                    <label for="floatingMobileNumberInput">Mobile Number (without hyphen)</label>
                </div>

                <div class="form-floating mb-2">
                    <select class="form-select" id="id_unit" aria-label="Floating label select example" name="id_unit" required>
                        <option selected>Pilih unit...</option>
                        <?php foreach (model('UnitModel')->findAll() as $u) : ?>
                            <option value="<?= $u['id']; ?>"><?= $u['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="id_unit">Bank unit</label>
                </div>

                <!-- Password -->
                <div class="form-floating mb-2">
                    <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" required>
                    <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
                </div>

                <!-- Password (Again) -->
                <div class="form-floating mb-5">
                    <input type="password" class="form-control" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>" required>
                    <label for="floatingPasswordConfirmInput"><?= lang('Auth.passwordConfirm') ?></label>
                </div>

                <div class="d-grid col-12 col-md-8 mx-auto m-3">
                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                </div>

                <p class="text-center"><?= lang('Auth.haveAccount') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.login') ?></a></p>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
