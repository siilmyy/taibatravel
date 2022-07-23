<?= $this->extend('layout2') ?>
<?= $this->section('content') ?>
<!-- sign in -->
<section class="banner_part">
    <div class="sign_in container">
        <div class="sign_in row justify-content-center">
            <div class="inhere">
                <div class="col-12">
                    <div class="d-flex justify-content-center h-100">
                        <div class="card">
                            <div class="card-header">
                                <?php
                                $username = [
                                    'name' => 'username',
                                    'id' => 'username',
                                    'value' => null,
                                    'class' => 'form-control',
                                    'placeholder' => 'username'
                                ];

                                $password = [
                                    'name' => 'password',
                                    'id' => 'password',
                                    'class' => 'form-control',
                                    'placeholder' => 'password'
                                ];

                                $session = session();
                                $errors = $session->getFlashdata('errors');

                                ?>

                                <!-- jika ada error -->
                                <?php if ($errors != null) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <h4 class="alert-heading">Terjadi Kesalahan</h4>
                                        <hr>
                                        <p class="mb-0">
                                            <?php
                                            foreach ($errors as $err) {
                                                echo $err . '<br>';
                                            }
                                            ?>
                                        </p>
                                    </div>
                                <?php endif ?>

                                <h3>Log in</h3>
                                <div class="d-flex justify-content-end social_icon">
                                    <span><i class="fab fa-google-plus-square"></i></span>
                                </div>
                            </div>
                            <?= form_open('Auth/login') ?>
                            <div class="logincard card-body">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <div class="d-none">
                                        <?= form_label("Username", "username") ?>
                                    </div>
                                    <?= form_input($username) ?>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <div class="d-none">
                                        <?= form_label("Password", "password") ?>
                                    </div>
                                    <?= form_password($password) ?>
                                </div>
                                <div class="text-right form-group ">
                                    <?= form_submit('submit', 'Submit', ['class' => 'btn btn-warning btn-block mt-3']) ?>
                                </div>
                                <?= form_close() ?>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-center links mb-2">
                                    Don't have an account?<a href="<?= site_url('auth/register')  ?>">Sign Up</a>
                                </div>
                                <div class="d-flex justify-content-center links mb-3">
                                    Back to<a href="<?= site_url('home/index')  ?>">Home</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>