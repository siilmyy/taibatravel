<?= $this->extend('auth/templates/index'); ?>
<!--::header part start::-->
<?= $this->section('content'); ?>

<!-- sign in end-->
<section class="banner_part">
    <div class="sign_in container">
        <div class="sign_in row justify-content-center">
            <div class="inhere">
                <div class="col-12">
                    <div class="d-flex justify-content-center h-100">
                        <div class="card">
                            <div class="card-header">
                                <h3><?= lang('Auth.loginTitle') ?></h3>
                                <div class="d-flex justify-content-end social_icon">

                                    <span><i class="fab fa-google-plus-square"></i></span>

                                </div>
                            </div>
                            <div class="logincard card-body">
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= route_to('login') ?>" method="post">
                                    <?= csrf_field() ?>


                                    <?php if ($config->validFields === ['email']) : ?>
                                        <div class="form-group">
                                            <label for="login"><?= lang('Auth.email') ?></label>
                                            <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                    <?php else : ?>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>

                                    <?php endif; ?>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>
                                    <?php if ($config->allowRemembering) : ?>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="remember" class="form-check-input text-white" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                <?= lang('Auth.rememberMe') ?>
                                            </label>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-warning btn-block mt-3"><?= lang('Auth.loginAction') ?></button>
                                    </div>

                                </form>
                            </div>
                            <div class="card-footer">
                                <?php if ($config->allowRegistration) : ?>
                                    <div class="d-flex justify-content-center links mb-3">
                                        Don't have an account?<a href="<?= route_to('register') ?>">Sign Up</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>